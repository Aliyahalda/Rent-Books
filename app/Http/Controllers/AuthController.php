<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;


class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function auth(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        // dd($credentials);
        //untuk cek user apakah sudah login atau belom
        if (Auth::attempt($credentials)) {
            //untuk cek status user active atau tidak
            if(Auth::user()->status != 'active')
            {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                Session::flash('status', 'failed');
                Session::flash('message', 'Your Account is not Active yet. Please contact admin!');
                return redirect('login');
            }

            $request->session()->regenerate();
            //cek apakah admin
            if(Auth::user()->roles_id == 1)
            {
                return redirect('dashboard');
            }
            //cek apakal client
            if(Auth::user()->roles_id == 2)
            {
                return redirect('profile');
            }

        }

        //untuk gagal login
                Session::flash('status', 'failed');
                Session::flash('message', 'Invalid Login. Please cek your username and password!');
                return redirect('login');
        }

        public function logout(Request $request)
        {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('login');
        }

        public function register()
        {
            return view('register');
        }

        public function regis(Request $request)
        {
            //validate data masuk atau tidak
            $validated = $request->validate([
                'username' => 'required|unique:users',
                'phone' => 'required|max:13',
                'addres' => 'required|max:255',
                'password' => 'required|min:5',
            ]);

            // dd($validated);
            $request['password'] = Hash::make($request->newPassword);
            $user = User::create($request->all());
            

            Session::flash('status', 'success');
            Session::flash('messege', 'Register Success! please, wait admin to approve!');
            return redirect('register');
        }
}
