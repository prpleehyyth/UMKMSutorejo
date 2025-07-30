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
        $totalUmkm = Umkm::where('is_verified', true)->count();
        $totalKategori = BusinessType::count();

        $categories = BusinessType::orderBy('name')->get(); // <-- ambil semua kategori

        return view('guest.umkm.index', compact('umkms', 'totalUmkm', 'totalKategori', 'categories'));
    }


    public function show($id)
    {
        $umkm = Umkm::with(['products', 'businessType'])->findOrFail($id);
        return view('guest.umkm.show', compact('umkm'));
    }

    public function landing()
    {
        // 1. Eager load the 'businessType' relationship with 'with()'
        // 2. Ensure only verified UMKM are shown
        $umkms = Umkm::with('businessType')
            ->where('is_verified', true)
            ->latest()
            ->take(8) // Takes the 8 most recent verified UMKM
            ->get();

        // 3. Fetch all categories to create the filter buttons dynamically
        $categories = BusinessType::orderBy('name')->get();

        // 4. Pass both variables to the 'welcome' view
        return view('welcome', compact('umkms', 'categories'));
    }
}
