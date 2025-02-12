<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Fungsi untuk menampilkan form login
    public function loginForm()
    {
        return view('auth/login'); // Tampilkan form login
    }
    // Fungsi untuk menampilakan form signup
    public function signUpForm()
    {
        return view('auth/signup'); // Tampilkan form signup
    }
    // Fungsi untuk pengguna login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Cek pengguna berdasarkan email
        $user = DB::table('users')->where('email', $request->email)->first();

        // Jika pengguna ditemukan dan password cocok
        if ($user && Hash::check($request->password, $user->password)) {
            // Simpan data pengguna ke session atau gunakan Auth untuk otentikasi
            Auth::loginUsingId($user->user_id); // Gunakan user_id sebagai ID otentikasi

            return redirect('home')->with('status', 'Login successfully.');
        }

        // Jika login gagal
        return redirect()->back()->with('error', 'Invalid email or password.');
    }

    public function signup(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:Manager,Staff       ',
        ]);

        try {
            // Insert data ke database
            DB::table('users')->insert([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
                'role' => $validatedData['role'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return redirect('home')->with('status', 'Pengguna berhasil ditambah.');
        } catch (\Exception $ex) {
            return redirect()->back()->with('status', 'Terjadi kesalahan: ' . $ex->getMessage())->withInput();
        }
    }

    public function logout()
    {
        Auth::logout(); // Logout pengguna
        return redirect('/login')->with('status', 'You have been logged out.');
    }
}