<?php

namespace App\Http\Controllers;

use App\Models\CalonMitra;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index() {
        return view('main.index');
    }
    public function dummyCalonMitra() {
        return view('admin.calonmitra.dummy');
    }
    public function sendCalonMitra(Request $request) {
        $calon = new CalonMitra();
        $request->validate([
            'nama' => 'required',
            'nik' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'lokasi' => 'required',
            'kota' => 'required',
        ]);
        $calon->nama = $request->nama;
        $calon->nik = $request->nik;
        $calon->email = $request->email;
        $calon->phone = $request->phone;
        $calon->lokasi = $request->lokasi;
        $calon->kota = $request->kota;
        $calon->save();
        return redirect()->back()->with('success','Data Calon Mitra Berhasil Dikirim');
    }
}
