<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {

        $user = User::where(
            'email',
            $request->email
        )
            ->where('role', 'user')
            ->first();

        $movie = Movie::get();

        // Check if the account is in the database and the password is correct
        if ($user && password_verify($request->password, $user->password)) {
            // Generate a token for the user
            return response()->json([
                'user'   => $user,
                'status' => 'success',
                'token'  => $user->createToken('auth-token')->plainTextToken,
                'movie' => $movie
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'error'  => 'Invalid credentials',
            ], 401);
        }
    }

    public function register(Request $request)
    {
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $movie = Movie::get();

        Auth::login($user);

        return response()->json([
            'user'  => $user,
            'status' => 'success',
            'token' => $user->createToken('auth-token')->plainTextToken,
            'movie' => $movie
        ], 200);
    }
}
