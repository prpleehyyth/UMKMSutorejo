<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Umkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\BusinessType;

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
            'nib' => 'nullable|string',
            'business_type_id' => 'required|exists:business_types,id',
            'revenue' => 'nullable|string',
            'halal_certified' => 'nullable|string|max:50',
            'address' => 'required|string',
            'latitude' => 'numeric',
            'longitude' => 'numeric',
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
                'revenue' => $data['revenue'],
                'halal_certified' => $data['halal_certified'],
                'address' => $data['address'],
                'latitude' => $data['latitude'],
                'longitude' => $data['longitude'],
                'is_verified' => false,
            ]);

            Auth::login($user);
        });

        session()->forget('register.step1');

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login untuk melanjutkan.');
    }
}
