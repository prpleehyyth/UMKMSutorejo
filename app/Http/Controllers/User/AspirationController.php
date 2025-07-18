<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Aspiration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AspirationController extends Controller
{
    public function index()
    {
        $aspirations = Auth::user()->umkm->aspirations()->latest()->get();
        return view('user.aspirations.index', compact('aspirations'));
    }

    public function create()
    {
        return view('user.aspirations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        $umkm = Auth::user()->umkm;

        $umkm->aspirations()->create([
            'message' => $request->message,
        ]);

        return redirect()->route('aspirations.index')->with('success', 'Aspirasi berhasil dikirim.');
    }

    public function show($id)
    {
        $aspiration = Aspiration::where('umkm_id', Auth::user()->umkm->id)->findOrFail($id);
        return view('user.aspirations.show', compact('aspiration'));
    }
}
