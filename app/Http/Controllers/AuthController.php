<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        // Check if username and password match "admin123"
        if ($credentials['username'] === 'admin123' && $credentials['password'] === 'admin123') {
            return redirect()->route('pages.index')->with('success', 'Login berhasil!');
        }

        // Cek username di database
        $user = \App\Models\User::where('username', $credentials['username'])->first();
        if (!$user) {
            return redirect()->back()->withErrors(['username' => 'Username tidak ditemukan.']);
        }

        // Cek password
        if (!\Illuminate\Support\Facades\Hash::check($credentials['password'], $user->password)) {
            return redirect()->back()->withErrors(['password' => 'Password salah.']);
        }

        // Login
        if (Auth::attempt($credentials)) {
            return redirect()->route('welcome')->with('success', 'Login berhasil! Selamat datang.');
        }

        return redirect()->back()->withErrors(['login' => 'Login gagal. Silakan coba lagi.']);
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama_user' => 'required|string|max:100', // Validate nama_user
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan', // Validate jenis_kelamin
            'username' => 'required|unique:users|max:255', // Validate unique username
            'no_telepon' => 'nullable|string|max:20', // Optional no_telepon validation
            'email' => 'required|email|unique:users|max:255', // Validate unique email
            'password' => 'required|min:6', // Minimum 6 characters for password
        ]);

        User::create([
            'nama_user' => $request->nama_user,
            'jenis_kelamin' => $request->jenis_kelamin,
            'username' => $request->username,
            'no_telepon' => $request->no_telepon,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('welcome')->with('success', 'Selamat, Anda berhasil mendaftar!');
    }

    public function showProfile()
    {
        // Pastikan pengguna terautentikasi
        if (!Auth::check()) {
            return redirect()->route('login')->withErrors(['login' => 'Anda harus login untuk mengakses profil.']);
        }

        $user = Auth::user(); // Ambil pengguna yang sedang login
        return view('auth.profile', compact('user'));
    }


    // Update user profile
    public function profile(Request $request)
    {
        $user = User::find(Auth::id());

        $request->validate([
            'nama_user' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'username' => ['required', 'string', 'max:255', Rule::unique('users', 'username')->ignore($user->id_user, 'id_user')],
            'no_telepon' => 'nullable|string|max:15',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user->id_user, 'id_user')],
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        // Update profile data
        $user->nama_user = $request->nama_user;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->username = $request->username;
        $user->no_telepon = $request->no_telepon;
        $user->email = $request->email;

        // Update password if filled
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('welcome')->with('success', 'Profil berhasil diperbarui.');
    }

    public function destroy(Request $request)
    {
        Log::info('Method: ' . $request->method());
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'Logout berhasil!');
    }
}
