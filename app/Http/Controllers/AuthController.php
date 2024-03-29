<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function auth()
    {
        return auth()->user();
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);
        $user = User::where('username', $validated['username'])->first();

        if (!$user) {
            return response(['message' => 'Username is incorrect.'], 422);
        }

        if (!Hash::check($validated['password'], $user->password)) {
            return response(['message' => 'Password is incorrect.'], 422);
        }

        if ($user->is_provider) {
            return response(['message' => 'You are unauthorized to login directly in this portal.'], 422);
        }

        $token = $user->createToken('auth', ['is-system']);

        return ['token' => $token->plainTextToken, 'user' => $user];
    }

    public function logout()
    {
        auth()->user()->currentAccessToken()->delete();

        return response(['message' => 'Successfully logged out.'], 200);
    }
}
