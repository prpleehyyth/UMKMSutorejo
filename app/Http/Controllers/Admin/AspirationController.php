<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Aspiration;
use Illuminate\Http\Request;

class AspirationController extends Controller
{
    public function index()
    {
        $aspirations = Aspiration::with('umkm.user')->latest()->paginate(10);
        return view('admin.aspirations.index', compact('aspirations'));
    }

    public function show($id)
    {
        $aspiration = Aspiration::with('umkm.user')->findOrFail($id);
        return view('admin.aspirations.show', compact('aspiration'));
    }

    public function respond(Request $request, $id)
    {
        $aspiration = Aspiration::findOrFail($id);
        $request->validate([
            'response' => 'required|string',
        ]);

        $aspiration->response = $request->response;
        $aspiration->save();

        return redirect()->route('admin.aspirations.index')->with('success', 'Respon berhasil dikirim.');
    }
}
