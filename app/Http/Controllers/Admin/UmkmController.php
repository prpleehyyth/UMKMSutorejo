<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Umkm;
use Illuminate\Http\Request;


class UmkmController extends Controller
{
    public function index()
    {
        $umkms = \App\Models\Umkm::with('user')
            ->where('is_verified', true)
            ->get();

        return view('admin.umkm.index', compact('umkms'));
    }

    public function show($id)
    {
        $umkm = \App\Models\Umkm::with('user')->findOrFail($id);
        return view('admin.umkm.show', compact('umkm'));
    }

    public function create()
    {
        $businessTypes = \App\Models\BusinessType::all();
        $users = \App\Models\User::all();
        return view('admin.umkm.create', compact('businessTypes', 'users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
            'nib' => 'nullable|string',
            'business_type_id' => 'required|exists:business_types,id',
            'revenue' => 'nullable|numeric',
            'halal_certified' => 'nullable|string',
            'address' => 'required|string',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);

        $validated['is_verified'] = true;
        \App\Models\Umkm::create($validated);

        return redirect()->route('admin.umkm.index')->with('success', 'UMKM berhasil ditambahkan');
    }

    public function edit($id)
    {
        $umkm = \App\Models\Umkm::findOrFail($id);
        $businessTypes = \App\Models\BusinessType::all();
        $users = \App\Models\User::all();
        return view('admin.umkm.edit', compact('umkm', 'businessTypes', 'users'));
    }

    public function update(Request $request, $id)
    {
        $umkm = \App\Models\Umkm::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
            'nib' => 'nullable|string',
            'business_type_id' => 'required|exists:business_types,id',
            'revenue' => 'nullable|numeric',
            'halal_certified' => 'nullable|string',
            'address' => 'required|string',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);

        $umkm->update($validated);

        return redirect()->route('admin.umkm.index')->with('success', 'UMKM berhasil diperbarui');
    }

    public function destroy($id)
    {
        $umkm = \App\Models\Umkm::findOrFail($id);
        $umkm->delete();

        return redirect()->route('admin.umkm.index')->with('success', 'UMKM berhasil dihapus');
    }
}
