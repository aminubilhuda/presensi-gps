@extends('layouts.presensi')

@section('header')
<div class="bg[#2196f3] to-indigo-600 text-white flex items-center justify-between p-4 shadow-lg z-1">
    <!-- Left Section (Go Back Button) -->
    <div class="left">
        <a href="{{redirect()->back()->getTargetUrl()}}" class="headerButton goBack text-white">
            <ion-icon name="chevron-back-outline" class="text-2xl"></ion-icon>
        </a>
    </div>

    <!-- Page Title -->
    <div class="pageTitle text-xl text-white font-semibold">
        History
    </div>

    <!-- Right Section (Empty for now) -->
    <div class="right">
        <!-- You can add content to the right section if needed -->
    </div>
</div>
@endsection

@section('content')
<section>
    <div class="mt-2 justify-center">
        <div class="bg-white text-gray-800 rounded-md shadow-xl-custom p-2 ml-2 mr-2">
            <div class="flex items-center"> <!-- Flex container untuk mengatur gambar dan tulisan secara horizontal -->
                <!-- Gambar Profile -->
                <div class="rounded-full overflow-hidden">
                    <img src="{{asset('storage/public/uploads/karyawan/'.Auth::guard('karyawan')->user()->foto)}}" alt="Profile"
                    class="w-12 h-12 rounded-full object-cover border-4 border-white shadow-lg hover:scale-105 transition duration-300">
                </div>
                <!-- Tulisan -->
                <div class="ml-3"> <!-- Menambahkan margin kiri untuk memberi ruang antara gambar dan tulisan -->
                    <strong>asd</strong>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection