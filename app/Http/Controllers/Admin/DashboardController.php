<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; // Tambahkan ini agar bisa extend Controller
use App\Models\Umkm;
use App\Models\Aspiration;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalUmkm' => Umkm::count(),
            'verifiedUmkm' => Umkm::where('is_verified', true)->count(),
            'unverifiedUmkm' => Umkm::where('is_verified', false)->count(),
            'totalAspirations' => Aspiration::count(),
            'recentAspirations' => Aspiration::latest()->take(5)->get(),
            'latestUmkm' => Umkm::latest()->take(5)->with('user')->get(),
        ]);
    }
}
