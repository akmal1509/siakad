<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Siswa;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function AdminLogin(Request $request)
    {
        $method_request = $request->method();
        switch ($method_request) {
            case 'POST':
                $this->validate($request, [
                    'email' => 'required|email',
                    'password' => 'required|min:8',
                ]);
                $credentials = $request->only('email', 'password');
                if (Auth::attempt($credentials)) {
                    return redirect()->intended("/home");
                }
                return redirect()->back()->withInput($request->only('email'));
                break;
            case 'GET':
                return view('auth.admin_login');
                break;
            default:
                return redirect()->back();
                break;
        }
    }

    public function UserLogin(Request $request)
    {
        $method_request = $request->method();
        switch ($method_request) {
            case 'POST':
                $this->validate($request, [
                    'nisn' => 'required|min:8',
                    'password' => 'required|min:8',
                ]);
                $siswa = Siswa::where('nis', $request->nisn)->first();
                if ($siswa) {
                    $user = User::where('no_induk', $siswa->no_induk)->first();
                    if ($user) {
                        $email = $user->email;
                        $password = $request->password;
                        $credentials = ['email' => $email, 'password' => $password];
                        if (Auth::attempt($credentials)) {
                            return redirect()->intended("/home");
                        }
                    }
                }
            case 'GET':
                return view('auth.user_login');
                break;
            default:
                return redirect()->back();
                break;
        }
    }
    public function Logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
