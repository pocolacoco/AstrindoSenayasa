<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Auth\User as Authenticatable;



class AuthController extends Controller
{



    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication passed
            if (Auth::user()->usertype == 'admin') {
                return response()->json(['success' => true, 'redirect' => route('dashboardadmin')]);
            } else if (Auth::user()->usertype == 'mahasiswa') {
                return response()->json(['success' => true, 'redirect' => route('dashboardmahasiswa')]);
            }
        }
            // Authentication failed
            return response()->json(['success' => false]);
        }








public function register(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required',
        'nim' => 'nullable|unique:users,nim',
        'idcard' => 'nullable|unique:users,idcard',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6|confirmed',
    ]);

    $usertype = '';

    if ($request->has('nim')) {
        $validatedData['nim'] = $request->nim;
        $usertype = 'mahasiswa';
    }

    if ($request->has('idcard')) {
        $validatedData['idcard'] = $request->idcard;
        $usertype = 'admin';
    }

    $validatedData['usertype'] = $usertype;

    $user = User::create([
        'name' => $validatedData['name'],
        'nim' => $validatedData['nim'] ?? null,
        'idcard' => $validatedData['idcard'] ?? null,
        'email' => $validatedData['email'],
        'password' => bcrypt($validatedData['password']),
        'usertype' => $validatedData['usertype'],
    ]);

    if ($user->usertype == 'admin') {
        return redirect()->route('login')->with('success', 'Registration successful! Please log in.');
    } elseif ($user->usertype == 'mahasiswa') {
        return redirect()->route('login')->with('success', 'Registration successful! Please log in.');
    }
}



    public function showRegistrationForm()
    {
        return view('register');
    }

    public function role()
    {
        return view('role');
    }

    public function showRegistrationAdmin()
    {
        return view('registeradmin');
    }
}
