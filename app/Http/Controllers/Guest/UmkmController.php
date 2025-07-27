<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Umkm;
use App\Models\BusinessType;


class UmkmController extends Controller
{


    public function index()
    {
        $umkms = Umkm::with('businessType')->where('is_verified', true)->latest()->get();
        $totalUMKM = Umkm::count();
        $totalKategori = BusinessType::count();

        $categories = BusinessType::orderBy('name')->get(); // <-- ambil semua kategori

        return view('guest.umkm.index', compact('umkms', 'totalUMKM', 'totalKategori', 'categories'));
    }


    public function show($id)
    {
        $umkm = Umkm::with(['products', 'businessType'])->findOrFail($id);
        return view('guest.umkm.show', compact('umkm'));
    }

    public function landing()
    {
        $umkms = \App\Models\Umkm::latest()->take(8)->get(); // ambil 8 UMKM unggulan
        return view('welcome', compact('umkms')); // pastikan view-nya sesuai
    }
}
