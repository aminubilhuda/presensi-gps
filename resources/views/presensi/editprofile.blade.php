@extends('layouts.presensi')

@section('header')
<header>

    <div class="bg-gradient-to-r from-blue-500 to-indigo-600 bg-white text-white flex items-center justify-between p-4 shadow-lg z-1">
        <!-- Left Section (Go Back Button) -->
        <div class="left">
            <a href="/dashboard" class="headerButton goBack text-white">
                <ion-icon name="chevron-back-outline" class="text-2xl"></ion-icon>
            </a>
        </div>
        
        <!-- Page Title -->
        <div class="pageTitle text-xl font-semibold">
            Edit Profile
        </div>
        
        <!-- Right Section (Empty for now) -->
        <div class="right">
            <!-- You can add content to the right section if needed -->
        </div>
    </header>
@endsection

@section('content')

    @php
        $messagesuccess = Session::get('success');
        $messageerror = Session::get('error');
    @endphp

    @if ($messagesuccess)
        <div class="flex items-center rounded bg-green-400 text-white text-sm font-bold px-4 py-3 ml-2 mr-2" role="alert">
          {{ $messagesuccess }}
        </div>
    @endif
    @if ($messageerror)
        <div class="flex items-center rounded bg-red-400 text-white text-sm font-bold px-4 py-3 ml-2 mr-2" role="alert">
          {{ $messageerror }}
        </div>
    @endif

<section class="pb-64">
    <div class="max-w-lg mx-auto p-6 h-screen">
        
        <form action="/presensi/{{ $karyawan->nik }}/updateprofile" method="POST" enctype="multipart/form-data">
          @csrf
          <!-- Nama Lengkap -->
          <div class="mb-4">
            <label for="nama_lengkap" class="block text-white-600 text-sm font-medium">Nama Lengkap</label>
            <input type="text" id="nama_lengkap" name="nama_lengkap" value="{{ $karyawan->nama_lengkap }}" class="w-full text-gray-900 p-3 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Masukkan Nomor HP" required>
          </div>

          <!-- No HP -->
          <div class="mb-4">
            <label for="no_hp" class="block text-white-600 text-sm font-medium">Nomor HP</label>
            <input type="text" id="no_hp" name="no_hp" value="{{ $karyawan->no_hp }}" class="w-full text-gray-900 p-3 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Masukkan Nomor HP" required>
          </div>

          <!-- Email -->
          <div class="mb-4">
            <label for="email" class="block text-white-600 text-sm font-medium">Email</label>
            <input type="text" id="email" name="email" value="{{ $karyawan->email }}" class="w-full text-gray-900 p-3 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Masukkan Nomor HP" required>
          </div>
    
          <!-- Password -->
          <div class="mb-4">
            <label for="password" class="block text-white-600 text-sm font-medium">Password</label>
            <input type="password" id="password" name="password" class="w-full text-gray-900 p-3 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Masukkan Password">
          </div>
    
          <!-- Upload Foto -->
          <div class="mb-4">
            <label for="foto" class="block text-white-600 text-sm font-medium">Upload Foto</label>
            <input type="file" id="foto" name="foto" accept=".png, .jpeg, .jpg" class="w-full text-gray-900 p-3 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" accept="image/*" onchange="previewImage(event)">
            
            <!-- Preview Image -->
            <div class="mt-4">
              <img id="imagePreview" src="" alt="Preview" class="hidden w-full h-48 object-cover rounded-md border mt-2">
            </div>
          </div>
    
          <!-- Submit Button -->
          <div class="mt-6">
            <button type="submit" class="w-full py-3 bg-green-400 text-white text-lg font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400">Update</button>
          </div>
        </form>
      </div>
</section>
@endsection