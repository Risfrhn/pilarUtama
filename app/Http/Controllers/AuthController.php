<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\landingModel as ModalData;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;



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
            'password' => 'required|min:3',
        ]);

        User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash password
        ]);
        
        $modalData = ModalData::first(); // Ambil 1 data pertama
        if (!$modalData) {
            $modalData = ModalData::create([
                'imageflyer'           => null,
                'gambarAboutUs'        => null,
                'architecturImage'     => null,
                'interiorImage'        => null,
                'landscapeImage'       => null,
                'renovationImage'      => null,
                'comercialBuildImage'  => null,
                'desk1'                => 'Deskripsi umum tentang perusahaan.',
                'desk2'                => 'Informasi tambahan tentang visi/misi perusahaan.',
                'architectur_desk'     => 'Deskripsi default untuk layanan arsitektur.',
                'interior_desk'        => 'Deskripsi default untuk layanan interior.',
                'landscape_desk'       => 'Deskripsi default untuk layanan landscape.',
                'renovation_desk'      => 'Deskripsi default untuk layanan renovasi.',
                'comercial_build_desk' => 'Deskripsi default untuk layanan bangunan komersial.',
            ]);
        }


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
                'password' => 'required|min:3|',
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


     // Formulir Forgot Password
     public function forgotPassForm()
     {
         return view('Auth.forgot-password');
     }

     public function resetPassLink(Request $request)
     {
         // Validasi email
         $request->validate([
             'email' => 'required|email|exists:users,email',
         ]);
     
         // Mengirimkan reset link ke email
         $status = Password::sendResetLink($request->only('email'));
     
         // Cek apakah reset link berhasil dikirim
         if ($status === Password::RESET_LINK_SENT) {
             // Menambahkan notifikasi berhasil
             return redirect()->route('password.request')->with('email_send', 'Kami sudah mengirim email, tolong periksa email anda!');
         }
     
         // Jika gagal mengirim reset link, kirimkan error
         return redirect()->route('password.request')->with('error','We cannot find a user with that e-mail address.');
     }     

 
     // Formulir Reset Password Baru
     public function newPassForm(Request $request)
     {
         // Mengambil token dari URL
         return view('auth.reset-password', ['token' => $request->route('token')]);
     }
 
     // Proses Reset Password Baru
    public function newPass(Request $request)
    {
        // Validasi input dari pengguna
        $request->validate([
            'token' => 'required',
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:3|confirmed',
        ]);

        // Proses reset password
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                // Mengupdate password pengguna
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->save();
            }
        );

        // Cek apakah reset password berhasil
        if ($status === Password::PASSWORD_RESET) {
            // Redirect dengan pesan keberhasilan
            return redirect()->route('login')->with('status', 'Password Anda berhasil diperbarui! Silakan login dengan password baru.');
        }

        // Jika gagal, tampilkan pesan error
        return back()->withErrors(['email' => 'Email tidak terdaftar atau token tidak valid. Silakan coba lagi.']);
    }
}
