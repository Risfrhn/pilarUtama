<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    // registrasi
    public function showRegistrationForm()
    {
        return view('Auth.register'); // Tampilkan form registrasi
    }

    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash password
        ]);

        return redirect()->route('login.form')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    // login
    public function showLogin()
    {
        return view('Auth.login'); // Tampilkan form registrasi
    }

    public function login(Request $request)
    {
        
        if ($request->isMethod('post')) {
            $validated = $request->validate([
                'email' => 'required|email',
                'password' => 'required|min:3',
            ]);
            // Cek apakah email ada di database
            $userExists = User::where('email', $request->email)->exists();

            if (!$userExists) {
                return redirect()->route('login')->with('error', 'Email atau password salah!');
            }

            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                return redirect()->route('dashboardAdmin.view')->with('login_success', 'Anda telah berhasil login');
            } else {
                return redirect()->route('login')->with('error', 'Email atau password salah');
            }
        }

        return redirect()->route('login')->with('error', 'Email atau password salah');
    } 

    public function logout(Request $request)
    {
        Auth::logout();  // Log the user out

        $request->session()->invalidate();  

        $request->session()->regenerateToken();  

        return redirect()->route('login')->with('logout_success', 'Anda telah berhasil logout.'); 
    }
}
