<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Umkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\BusinessType;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class RegisterStepController extends Controller
{
    public function showStep1()
    {
        return view('auth.register-step-1');
    }

    public function processStep1(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'phone_number' => 'required|string',
            'nik' => 'required|string',
            'npwp' => 'nullable|string',
        ]);

        session(['register.step1' => $data]);

        return redirect()->route('register.step2');
    }

    public function showStep2()
    {
        if (!session()->has('register.step1')) {
            return redirect()->route('register.step1');
        }

        $businessTypes = BusinessType::all();
        return view('auth.register-step-2', compact('businessTypes'));
    }

    public function processStep2(Request $request)
    {
        $step1 = session('register.step1');

        $data = $request->validate([
            'name' => 'required|string|max:100',
            'nib' => ['required', 'digits:13'], // ← wajib 13 digit
            'business_type_id' => 'required|exists:business_types,id',
            'omzet' => ['required', 'numeric', 'min:1000'], // ← wajib angka & tidak boleh nol
            'halal_certified' => 'nullable|string|max:50',
            'address' => 'required|string',
            'google_maps_link' => 'nullable|string|url',
        ]);

        DB::transaction(function () use ($step1, $data) {
            $user = User::create([
                'name' => $step1['name'],
                'email' => $step1['email'],
                'password' => Hash::make($step1['password']),
                'phone_number' => $step1['phone_number'],
                'nik' => $step1['nik'],
                'npwp' => $step1['npwp'],
            ]);

            $user->umkm()->create([
                'name' => $data['name'],
                'nib' => $data['nib'],
                'business_type_id' => $data['business_type_id'],
                'omzet' => $data['omzet'],
                'halal_certified' => $data['halal_certified'],
                'address' => $data['address'],
                'google_maps_link' => $data['google_maps_link'],
                'is_verified' => false,
            ]);

            Auth::login($user);
            $user->sendEmailVerificationNotification(); // ← Ini harus setelah login
        });

        session()->forget('register.step1');

        return redirect()->route('verification.notice');
    }
}
