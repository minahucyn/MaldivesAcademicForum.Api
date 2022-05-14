<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    
    public function register(Request $request){
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed'
        ]);

        $user = User::create([
            'name'=> $fields['name'],
            'email'=> $fields['email'],
            'password'=> bcrypt($fields['password'])
        ]);

        $token = $user->createToken('apptoken')->plainTextToken;
        $reponse = [
            'user' => $user,
            'token' => $token
        ];

        return response($reponse,201);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);

        $user = User::where('email', '=', $fields['email'])->first();

        if($user != null)
        {
            if ( Hash::check($fields['password'], $user -> password)) {

                $token = $user->createToken('apptoken')->plainTextToken;

                return [
                    'user' => $user,
                    'token' => $token
                ];
            };
        }

        return [
            'Error'=> 'Authentication failed!',
            'Details'=> 'The email and password does not match.'
        ];

    }
}
