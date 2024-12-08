<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class PresensiController extends Controller
{
    public function create()
    {
        $hariini = date("Y-m-d");
        $nik = Auth::guard("karyawan")->user()->nik;
        $cek = DB::table("presensi")->where("tgl_presensi",$hariini)->where("nik",$nik)->count();
        return view("presensi.create", compact('cek'));
    }

    public function store(Request $request)
    {
        $nik = Auth::guard('karyawan')->user()->nik;
        $tgl_presensi = date("Y-m-d");
        $jam = date("H:i:s");
        $latkantor = -6.900287;
        $longkantor = 112.048966; 
        $lokasi = $request->lokasi;
        $lokasiuser = explode(",",$lokasi);
        $latuser = $lokasiuser[0];
        $longuser = $lokasiuser[1];
        
        $jarak = $this->distance($latkantor,$longkantor,$latuser, $longuser);
        $radius = round($jarak["meters"]);

        
        $cek = DB::table("presensi")->where("tgl_presensi",$tgl_presensi)->where("nik",$nik)->count();
        if($cek > 0){
            $ket = "out";
        } else{
            $ket = "in";
        }
        $image = $request->image;
        $folderPath = "uploads/absensi/";
        $formatName = $nik . "-" . $tgl_presensi. "-" .$ket;
        $image_parts = explode(";base64", $image);
        $image_base64 = base64_decode($image_parts[1]);
        $fileName = $formatName . ".png";
        $file = $folderPath . $fileName;
        
        if ($radius > 10000) {
            echo "error|Maaf Anda Berada Diluar Radius, Jarak anda " . $radius ." meter dari kantor|out-radius";
        } else {
            if($cek > 0){
                $data_pulang = [
                "jam_out" => $jam,
                "foto_out" => $fileName,
                "lokasi_out" => $lokasi,
            ];
            $update = DB::table("presensi")->where("tgl_presensi", $tgl_presensi)->where("nik", $nik)->update($data_pulang);
            if($update){
                Storage::put($file, $image_base64);
                echo "success|Terimakasih, Hati-Hati Dijalan|out";
            } else {
                echo "error|Maaf Gagal absen, Hubungi Tim IT|out";
            }
            } else {
                $data = [
                    "nik" => $nik,
                    "tgl_presensi" => $tgl_presensi,
                    "jam_in" => $jam,
                    "foto_in" => $fileName,
                    "lokasi_in" => $lokasi,
                ];

                $simpan = DB::table('presensi')->insert($data);
                if($simpan){
                    echo "success|Terimakasih, Selamat Bekerja|in";
                    Storage::put($file, $image_base64);
                } else {
                    echo "error|Maaf Gagal absen, Hubungi Tim IT|in";
                }
            }
        }
        
    }

    // menghitung jarak
    function distance($lat1, $lon1, $lat2, $lon2)
    {
        $theta = $lon1 - $lon2;
        $miles = (sin(deg2rad($lat1)) * sin(deg2rad($lat2))) + (cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta)));
        $miles = acos($miles);
        $miles = rad2deg($miles);
        $miles = $miles * 60 * 1.1515;
        $feet = $miles * 5280;
        $yards = $feet / 3;
        $kilometers = $miles * 1.609344;
        $meters = $kilometers * 1000;
        return compact('meters');
    }

    public function editProfile()
    {
        return view("presensi.editprofile");
    }
}