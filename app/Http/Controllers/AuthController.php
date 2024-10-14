<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:5|max:20|unique:users,name',
            'no_hp' => 'required|string|min:10|max:14|unique:users,no_hp',
            'email' => 'required|string|email|min:6|max:25|unique:users,email',
            'password' => 'required|string|min:6|max:15|confirmed',
        ]);

        if (User::where('email', $request->email)->exists()) {
            return back()->withErrors(['email' => 'Email sudah terdaftar.'])->withInput();
        }

        User::create([
            'name' => $request->name,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            $user = Auth::user(); 

            session(['user_data' => $user]);
            return redirect()->route('beranda');
        }
        return back()->withErrors([
            'email' => 'Email ini belum terdaftar.',
            'password' => 'Email belum terdaftar atau Sandi anda salah',
        ]);
    }
    

    public function logout(Request $request)
    {
        $request->session()->forget('user_data');
        Auth::logout();
        return redirect()->route('landingpage');
    }
}
