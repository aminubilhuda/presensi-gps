@extends('layouts.presensi')

@section('header')
<div class="bg-gradient-to-r from-blue-500 to-indigo-600 bg-white text-white flex items-center justify-between p-4 shadow-lg z-1">
    <!-- Left Section (Go Back Button) -->
    <div class="left">
        <a href="/dashboard" class="headerButton goBack text-white">
            <ion-icon name="chevron-back-outline" class="text-2xl"></ion-icon>
        </a>
    </div>

    <!-- Page Title -->
    <div class="pageTitle text-xl font-semibold">
        E-Presensi
    </div>

    <!-- Right Section (Empty for now) -->
    <div class="right">
        <!-- You can add content to the right section if needed -->
    </div>
</div>

<style>
    .webcam-capture,
    .webcam-capture video {
        display: inline-block;
        width: 100% !important;
        margin: auto;
        height: auto !important;
        border-radius: 15px;
        overflow: hidden;
    }
    #map { height: 250px; }
</style>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" ></script>
@endsection

@section('content')
<div class="pt-2 z-0"> <!-- Equivalent to margin-top: 65px -->
    <div class="px-4"> <!-- Column padding -->
        <input type="hidden" id="lokasi">
        <div class="webcam-capture w-full">
            <!-- Webcam capture area -->
        </div>
    </div>
</div>

<div class="px-4"> <!-- Row with button -->
    <div class="w-full">
        @if ($cek > 0)
            <button id="takeabsen" class="w-full bg-red-500 text-white py-3 rounded-lg flex items-center justify-center space-x-2 hover:bg-red-600 transition duration-300">
                <ion-icon name="camera-outline" class="text-xl"></ion-icon>
                <span>{{__('Absen Pulang')}}</span>
            </button>
        @else
            <button id="takeabsen" class="w-full bg-green-500 text-white py-3 rounded-lg flex items-center justify-center space-x-2 hover:bg-green-600 transition duration-300">
                <ion-icon name="camera-outline" class="text-xl"></ion-icon>
                <span>{{__('Absen Masuk')}}</span>
            </button>
        @endif
    </div>
</div>

<div class="px-4 mt-1"> <!-- Map row -->
    <div class="w-full">
        <div id="map" class="w-full h-64 z-0 rounded-lg"></div> <!-- Added some height for the map -->
    </div>
</div>

<div class="px-4">
    Selamat Absen
</div>

<audio id="notifikasi-in">
    <source src="{{asset('templates/assets_k/audio/in.mp3')}}" type="audio/mpeg">
</audio>
<audio id="notifikasi-out">
    <source src="{{asset('templates/assets_k/audio/out.mp3')}}" type="audio/mpeg">
</audio>
<audio id="notifikasi-out-radius">
    <source src="{{asset('templates/assets_k/audio/out-radius.mp3')}}" type="audio/mpeg">
</audio>
@endsection

@push('myscrip')
    <script>
        var notifikasi_in = document.getElementById('notifikasi-in');
        var notifikasi_out = document.getElementById('notifikasi-out');
        var notifikasi_out_radius = document.getElementById('notifikasi-out-radius');
        Webcam.set({
            height: 480,
            width: 640,
            image_format: 'jpeg',
            jpeg_quality: 80
        });

        Webcam.attach('.webcam-capture');

        var lokasi = document.getElementById('lokasi');
        if(navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
        }

        function successCallback(position) {
            lokasi.value = position.coords.latitude + "," + position.coords.longitude;

            var map = L.map('map').setView([position.coords.latitude, position.coords.longitude], 15);

            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);
            var marker = L.marker([position.coords.latitude, position.coords.longitude]).addTo(map);
            var circle = L.circle([-6.900287, 112.048966], {
                color: 'red',
                fillColor: '#f03',
                fillOpacity: 0.5,
                radius: 10000
            }).addTo(map);
        }

        function errorCallback() {
        }

        $("#takeabsen").click(function(e){
            Webcam.snap(function(uri) {
                image = uri;
            });
            var lokasi = $("#lokasi").val();
            $.ajax({
                type: 'POST',
                url: '/presensi/store',
                data: {
                    _token: "{{ csrf_token() }}",
                    image: image,
                    lokasi: lokasi
                },
                cache: false,
                success: function(respond) {
                    var status = respond.split("|");
                    if (status[0] == "success") {

                        if (status[2] == "in") {
                            notifikasi_in.play();
                        }
                        else {
                            notifikasi_out.play();
                        }

                        Swal.fire({
                            title: 'Berhasil..! ',
                            text: status[1],
                            icon: 'success',
                            confirmButtonText: "OK",
                        });

                        setTimeout(() => {
                            window.location.href= "/dashboard";
                        }, 7000);

                    } else {

                        if (status[2] == "out-radius") {
                            notifikasi_out_radius.play();
                        }
                        Swal.fire({
                            title: 'Error..! ',
                            text: status[1],
                            icon: 'error'
                        });
                    }
                }
            });
        });
    </script>
@endpush
