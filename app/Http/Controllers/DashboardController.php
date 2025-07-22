<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $umkm = $user->umkm;

        return view('dashboard', [
            'productCount' => $umkm?->products()->count() ?? 0,
            'aspirationCount' => $umkm?->aspirations()->count() ?? 0,
            'announcementCount' => \App\Models\Announcement::count(),
            'latestProducts' => $umkm?->products()->latest()->take(3)->get() ?? [],
            'latestAspirations' => $umkm?->aspirations()->latest()->take(3)->get() ?? [],
            'umkm' => $umkm,
        ]);
    }
}
