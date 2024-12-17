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
        Setting
    </div>

    <!-- Right Section (Empty for now) -->
    <div class="right">
        <!-- You can add content to the right section if needed -->
    </div>
</div>
@endsection

@section('content')
<section class="">
    <div class="justify-center">
        <div class="bg-white text-gray-800 shadow-xl-custom p-2 h-screen">
            <div class="flex justify-start ">
                <a href="/proseslogout" class="flex items-center gap-2 px-4 py-2 text-gray-700 hover:text-gray-900 transition-colors">
                    <span class="material-icons">logout</span>
                    <strong>Logout</strong>
                </a>
            </div>
        </div>
    </div>
</section>

@endsection