<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;

class AuthController extends Controller
{
    //

    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|confirmed'
        ]);

        $user = User::create(request(['name', 'email', 'password']));

        auth()->login($user);

        return redirect()->to('/admin/dashboard');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function processLogin()
    {
        if (auth()->attempt(request(['email', 'password'])) == false) {
            return back()->withErrors([
                'message' => 'The email or password is incorrect, please try again'
            ]);
        }

        return redirect()->to('/admin/dashboard');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect()->to('/');
    }
}
