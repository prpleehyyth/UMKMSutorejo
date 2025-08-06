<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Aspiration;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AspirationController extends Controller
{
    /**
     * Menampilkan daftar aspirasi dengan fungsionalitas pencarian dan filter.
     */
    public function index(Request $request): View
    {
        // Memulai query dengan eager loading untuk relasi umkm dan user
        $query = Aspiration::with('umkm.user')->latest();

        // [LOGIC MERGED] Menambahkan filter pencarian
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('message', 'like', '%' . $search . '%')
                    ->orWhereHas('umkm', function ($subQ) use ($search) {
                        $subQ->where('name', 'like', '%' . $search . '%');
                    });
            });
        }

        // [LOGIC MERGED] Menambahkan filter berdasarkan status
        if ($request->filled('status')) {
            if ($request->status == 'responded') {
                $query->whereNotNull('response');
            } elseif ($request->status == 'pending') {
                $query->whereNull('response');
            }
        }

        // Mengambil data dengan pagination dan menyertakan query string untuk link halaman
        $aspirations = $query->paginate(10)->withQueryString();

        return view('admin.aspirations.index', compact('aspirations'));
    }

    /**
     * Menampilkan detail sebuah aspirasi.
     * Menggunakan Route Model Binding untuk efisiensi.
     */
    public function show(Aspiration $aspiration): View
    {
        // Tidak perlu findOrFail, Laravel sudah menanganinya secara otomatis
        // Eager load relasi untuk memastikan data tersedia di view
        $aspiration->load('umkm.user');

        return view('admin.aspirations.show', compact('aspiration'));
    }

    /**
     * Menampilkan form untuk merespon aspirasi.
     */
    public function respond(Aspiration $aspiration): View
    {
        return view('admin.aspirations.respond', compact('aspiration'));
    }

    /**
     * Menyimpan respon untuk sebuah aspirasi.
     * Method ini dipisah dari 'respond' untuk mengikuti best practice (GET untuk menampilkan, POST/PUT untuk menyimpan).
     */
    public function storeResponse(Request $request, Aspiration $aspiration): RedirectResponse
    {
        $request->validate([
            'response' => 'required|string',
        ]);

        $aspiration->response = $request->response;
        //$aspiration->responded_at = now(); // Opsional: menyimpan waktu respon
        // $aspiration->responder_id = auth()->id(); // Opsional: menyimpan siapa yang merespon
        $aspiration->save();

        return redirect()->route('admin.aspirations.show', $aspiration)->with('success', 'Respon berhasil dikirim.');
    }

    /**
     * [METHOD BARU] Menghapus data aspirasi dari database.
     */
    public function destroy(Aspiration $aspiration): RedirectResponse
    {
        $aspiration->delete();

        return redirect()->route('admin.aspirations.index')->with('success', 'Aspirasi berhasil dihapus.');
    }
}
