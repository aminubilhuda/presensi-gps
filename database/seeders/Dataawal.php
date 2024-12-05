<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class Dataawal extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('karyawan')->insert([
            'nama_lengkap' => "Aminu Bil Huda",
            "nik"=> "12345",
            "jabatan"=> "Head Of IT",
            "no_hp"=> "085707357080",
            'email' => "aminubilhuda0707@gmail.com",
            'password' => Hash::make('12345'),
        ]);
    }
}