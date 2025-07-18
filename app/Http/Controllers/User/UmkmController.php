<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\BusinessType;
use App\Models\Umkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UmkmController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        $umkm = $user->umkm;

        $businessTypes = BusinessType::all();

        return view('user.umkm.edit', compact('umkm', 'businessTypes'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'address' => 'nullable|string',
            'nib' => 'nullable|string|max:255',
            'revenue' => 'nullable|string|max:255',
            'halal_certified' => 'nullable|string|max:255',
            'business_type_id' => 'nullable|exists:business_types,id',
            'google_maps_link' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $umkm = Auth::user()->umkm;

        $data = $request->only([
            'name',
            'description',
            'address',
            'nib',
            'revenue',
            'halal_certified',
            'business_type_id',
            'google_maps_link',
        ]);

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
            $data['logo'] = $logoPath;
        }

        $umkm->update($data);

        return redirect()->route('dashboard')->with('success', 'Data UMKM berhasil diperbarui.');
    }
}
