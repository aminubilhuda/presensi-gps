@extends('layouts.presensi')

@section('content')

<!-- Main Profile Card -->
<section class="p-4">
    <div class="bg-gradient-to-r from-blue-400 to-blue-600 p-6 rounded-3xl shadow-xl-custom flex items-center space-x-6 transition-transform transform hover:scale-105 ease-in-out">
        <!-- Profile Picture -->
        <div class="relative">
            <!-- Profile Picture -->
            @if(!empty(Auth::guard('karyawan')->user()->foto))
                <img src="{{asset('storage/public/uploads/karyawan/'.Auth::guard('karyawan')->user()->foto)}}" alt="Profile"
                    class="w-24 h-24 rounded-full object-cover border-4 border-white shadow-lg hover:scale-105 transition duration-300">
            @else
                <img src="https://via.placeholder.com/150" alt="Profile"
                    class="w-24 h-24 rounded-full object-cover border-4 border-white shadow-lg hover:scale-105 transition duration-300">
            @endif
            <!-- Badge or Status indicator -->
            <span class="absolute bottom-0 right-0 w-4 h-4 rounded-full bg-green-500 border-2 border-white"></span>
        </div>

        <!-- Profile Info -->
        <div class="text-white">
            <h2 class="text-xl font-semibold tracking-tight">{{Auth::guard("karyawan")->user()->nama_lengkap}}</h2>
            <p class="text-lg opacity-90 mt-2">{{Auth::guard("karyawan")->user()->nik}}</p>
            <p class="text-sm opacity-80 mt-1">{{Auth::guard("karyawan")->user()->jabatan}}</p>
        </div>
    </div>
</section>


<!-- Card Overview (Cuti, Histori, Lokasi, Profile) -->
<section class="p-2">
    <div
        class="bg-white text-gray-800 p-6 rounded-xl shadow-xl-custom glassmorphism transition duration-300 ease-in-out flex justify-between items-center space-x-6">
        <!-- Cuti Icon -->
        <div class="flex flex-col items-center text-center hover:scale-150 transition duration-300 ease-in-out">
            <span class="material-icons text-4xl text-indigo-500">event_available</span>
            <p class="mt-2 text-lg text-gray-700">Cuti</p>
        </div>

        <!-- Histori Icon -->
        <div class="flex flex-col items-center text-center hover:scale-150 transition duration-300 ease-in-out">
            <span class="material-icons text-4xl text-teal-500">history</span>
            <p class="mt-2 text-lg text-gray-700">Histori</p>
        </div>

        <!-- Lokasi Icon -->
        <div class="flex flex-col items-center text-center hover:scale-150 transition duration-300 ease-in-out">
            <span class="material-icons text-4xl text-orange-500">location_on</span>
            <p class="mt-2 text-lg text-gray-700">Lokasi</p>
        </div>

        <!-- Profile Icon -->
        <a href="/editprofile">
            <div class="flex flex-col items-center text-center hover:scale-150 transition duration-300 ease-in-out">
                <span class="material-icons text-4xl text-blue-500">account_circle</span>
                <p class="mt-2 text-lg text-gray-700">Profil</p>
            </div>
        </a>
    </div>
</section>

<!-- Card for Masuk and Pulang with Photos -->
<section class="p-2 grid grid-cols-2 gap-2">
    <!-- Masuk Card -->
    <div
    class="bg-white text-gray-800 p-8 rounded-xl shadow-xl-custom glassmorphism hover:scale-105 transition duration-300 ease-in-out">
    <div class="flex items-center space-x-2">
        @if ($presensihariini != null)
        <!-- Gambar Masuk -->
        <img src="{{ asset('storage/public/uploads/absensi/'.$presensihariini->foto_in) }}" alt="Masuk Photo"
            class="w-16 h-16 rounded-full object-cover border-4 border-green-500 shadow-lg"> <!-- Menggeser gambar ke kiri -->
        @else
        <div class="bg-blue">
            <img src="https://via.placeholder.com/150" alt="Profile"
            class="w-16 h-16 rounded-full object-cover border-4 border-green-500 shadow-lg"> <!-- Menggeser gambar ke kiri -->
        </div>
        @endif
        <div>
            <p class="text-lg font-semibold opacity-70">Masuk</p>
            <p class="test-sm font-bold text-green-500">{{ $presensihariini != null ? $presensihariini->jam_in : "Belum Absen" }}</p>
        </div>
    </div>
</div>


    <!-- Pulang Card -->
    <div
        class="bg-white text-gray-800 p-8 rounded-xl shadow-xl-custom glassmorphism hover:scale-105 transition duration-300 ease-in-out">
        <div class="flex space-x-2">
            @if ($presensihariini != null && $presensihariini->foto_out != null)
            <img src="{{ asset('storage/public/uploads/absensi/'.$presensihariini->foto_out) }}" alt="Pulang Photo"
                class="w-16 h-16 rounded-full object-cover border-4 border-red-500 shadow-lg">
            @else
            <div class="bg-blue">
                <img src="https://via.placeholder.com/150" alt="Profile"
                class="w-16 h-16 rounded-full object-cover border-4 border-red-500 shadow-lg"> <!-- Menggeser gambar ke kiri -->
            </div>
            @endif
            <div>
                <p class="text-lg font-semibold opacity-70">Pulang</p>
                <p class="test-sm font-bold text-red-500">{{ $presensihariini != null && $presensihariini->jam_out != null ? $presensihariini->jam_out : "Belum Absen" }}</p>
            </div>
        </div>
    </div>
</section>


 <!-- Kehadiran Rekap: Berjajar 2 Kolom -->
 <section class="p-2">
    <div class="flex flex-col space-y-2 bg-white text-gray-800 rounded-xl shadow-xl-custom p-4 mb-1">
        <!-- Rekap Presensi Header -->
        <h4 class="text-md font-semibold">Rekap Presensi Bulan {{ $namabulan[$bulanini]}} Tahun {{ $tahunini}}</h4>
    
        <!-- Card Grid -->
        <div class="bg-gradient-to-r from-teal-400 to-blue-500 rounded-xl p-4 shadow-xl-custom grid grid-cols-4 md:grid-cols-4 gap-2">
            <!-- Hadir Card -->
            <div class="relative text-center text-white bg-white rounded-lg p-3 shadow-lg border border-gray-300 hover:scale-110 transition duration-300 ease-in-out">
                <span class="material-icons text-4xl text-green-500">check_circle</span>
                <p class="text-sm font-semibold text-gray-800 mt-2">Hadir</p>
                <!-- Badge untuk angka di pojok atas -->
                <div class="absolute top-0 right-0 bg-green-500 text-white font-semibold text-xs py-1 px-2 rounded-full transform translate-x-1/2 -translate-y-1/2">
                    {{ $rekappresensi->jmlhadir }}
                </div>
            </div>
    
            <!-- Izin Card -->
            <div class="relative text-center text-white bg-white rounded-lg p-3 shadow-lg border border-gray-300 hover:scale-110 transition duration-300 ease-in-out">
                <span class="material-icons text-4xl text-yellow-500">access_time</span>
                <p class="text-sm font-semibold text-gray-800 mt-2">Izin</p>
                <!-- Badge untuk angka di pojok atas -->
                <div class="absolute top-0 right-0 bg-yellow-500 text-white font-semibold text-xs py-1 px-2 rounded-full transform translate-x-1/2 -translate-y-1/2">
                    2
                </div>
            </div>
    
            <!-- Sakit Card -->
            <div class="relative text-center text-white bg-white rounded-lg p-3 shadow-lg border border-gray-300 hover:scale-110 transition duration-300 ease-in-out">
                <span class="material-icons text-4xl text-red-500">error</span>
                <p class="text-sm font-semibold text-gray-800 mt-2">Sakit</p>
                <!-- Badge untuk angka di pojok atas -->
                <div class="absolute top-0 right-0 bg-red-500 text-white font-semibold text-xs py-1 px-2 rounded-full transform translate-x-1/2 -translate-y-1/2">
                    1
                </div>
            </div>
    
            <!-- Telat Card -->
            <div class="relative text-center text-white bg-white rounded-lg p-3 shadow-lg border border-gray-300 hover:scale-110 transition duration-300 ease-in-out">
                <span class="material-icons text-4xl text-orange-500">alarm_on</span>
                <p class="text-sm font-semibold text-gray-800 mt-2">Telat</p>
                <!-- Badge untuk angka di pojok atas -->
                <div class="absolute top-0 right-0 bg-orange-500 text-white font-semibold text-xs py-1 px-2 rounded-full transform translate-x-1/2 -translate-y-1/2">
                    {{ $rekappresensi->jmlterlambat }}
                </div>
            </div>
        </div>
    </div>
    
</section>


<section class="p-2 pb-24">  <!-- Added pb-24 to create bottom padding -->
    <div class="bg-white text-gray-800 rounded-xl shadow-xl-custom p-2">
        <!-- Tabs -->
        <div class="flex justify-between mb-6">
            <button id="data-absen-tab" class="w-1/2 py-3 px-6 text-lg font-semibold tab-btn tab-btn-inactive"
                onclick="switchTab('data-absen')">Bulan Ini</button>
            <button id="leaderboard-tab" class="w-1/2 py-3 px-6 text-lg font-semibold tab-btn tab-btn-inactive"
                onclick="switchTab('leaderboard')">Leaderboard</button>
        </div>

        <!-- Tab Content -->
        <div id="data-absen" class="tab-content hidden text-center bg-white text-gray-800 rounded-xl shadow-xl-custom p-100">
            <ul class="space-y-2">
                @foreach ($historibulanini as $d)
                @php
                    $path = asset ('storage/uploads/absensi/'.$d->foto_in);
                @endphp
                <li class="flex justify-between items-center p-3 border-b border-gray-200">
                    <div class="flex items-center">
                        <ion-icon name="finger-print-outline" class="bg-blue-500 text-white p-2 rounded"> </ion-icon>
                        <span class="ml-2"> {{ date("d-m-Y", strtotime($d->tgl_presensi)) }} </span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <span class="bg-green-500 text-white px-2 py-1 rounded">{{ $d->jam_in }}</span>
                        <span class="bg-red-500 text-white px-2 py-1 rounded">{{ $presensihariini != null && $d->jam_out != null ? $d->jam_out : "Belum Absen" }}</span>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
        <div id="leaderboard" class="tab-content hidden text-left">
            <ul class="space-y-2">
                @foreach ($leaderboard as $d)
                <li class="flex justify-between items-center p-4 bg-white shadow-md rounded-lg">
                    <div class="flex items-center">
                        <img src="https://via.placeholder.com/40" alt="User Avatar" class="rounded-full mr-3">
                        <div>
                            <strong class="text-lg">{{ $d->nama_lengkap }}</strong><br>
                            <small class="text-gray-500">{{ $d->jabatan }}</small>
                        </div>
                    </div>
                    <span class="{{ $d->jam_in > '07:00' ? 'text-red-500' : 'text-blue-500' }}">{{ $d->jam_in }}</span>
                </li>
                @endforeach
            </ul>            
        </div>
    </div>
</section>

        {{-- <div class="card">
            <div class="card-body">
                <ul class="nav nav-tabs" id="presenceTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="month-tab" data-bs-toggle="tab" data-bs-target="#month"
                            type="button" role="tab" aria-controls="month" aria-selected="true">Bulan Ini</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="leaderboard-tab" data-bs-toggle="tab" data-bs-target="#leaderboard"
                            type="button" role="tab" aria-controls="leaderboard"
                            aria-selected="false">Leaderboard</button>
                    </li>
                </ul>
                <div class="tab-content mt-3" id="presenceTabContent">
                    <div class="tab-pane fade show active" id="month" role="tabpanel" aria-labelledby="month-tab">
                        <ul class="list-group list-group-flush">
                            @foreach ($historibulanini as $d)
                            @php
                                $path = asset ('storage/uploads/absensi/'.$d->foto_in);
                            @endphp
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <i class="fas fa-fingerprint me-2 bg-blue-500"></i>
                                    {{ date("d-m-Y", strtotime($d->tgl_presensi)) }}
                                </div>
                                <div>
                                    <span class="badge bg-success me-1">{{ $d->jam_in }}</span>
                                    <span class="badge bg-danger">{{ $presensihariini != null && $d->jam_out != null ? $d->jam_out : "Belum Absen" }}</span>
                                </div>
                            </li>
                            <!-- Add more list items for other dates -->
                            @endforeach
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="leaderboard" role="tabpanel" aria-labelledby="leaderboard-tab">
                        <ul class="list-group list-group-flush">
                            @foreach ($leaderboard as $d)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    @if ($d->foto != null)
                                    <img src="{{ asset('storage/public/uploads/karyawan/'.$d->foto) }}" alt="User Avatar"
                                        class="rounded-circle me-3">
                                    @else
                                    <img src="https://via.placeholder.com/40" alt="User Avatar"
                                        class="rounded-circle me-3">
                                    @endif
                                    <div>
                                        <strong>{{ $d->nama_lengkap }}</strong><br>
                                        <small class="text-muted">{{$d->jabatan}}</small>
                                    </div>
                                </div>
                                <span class="text-primary">{{ $d->jam_in }}</span>
                            </li>
                            <!-- Add more list items for other users -->
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div> --}}
          
@endsection