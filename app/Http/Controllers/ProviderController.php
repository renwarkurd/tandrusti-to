<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function index()
    {
        return User::where('is_provider', 1)->where('is_admin', 0)->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string'],
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
            'email' => ['nullable', 'email'],
        ]);

        if (User::where('username', $request->username)->first()) {
            return respose(['message', 'ئەم ناوە پێشتر بەکارهێنراوە، تکایە ناوێکی تر هەڵبژێرە.'], 422);
        }

        $user = User::create([
            'name' => $validated['name'],
            'username' => $validated['username'],
            'password' => $validated['password'],
            'email' => $validated['email'] ?? null,
            'is_provider' => 1,
        ]);

        $token = $user->createToken('rest-api', ['is-provider']);

        $user->provider_token = $token->plainTextToken;
        $user->save();

        return $user;
    }

    public function update(Request $request, $provider)
    {
        $user = User::findOrFail($provider);

        $validated = $request->validate([
            'name' => ['required', 'string'],
            'username' => ['required', 'string'],
            'password' => ['nullable', 'string'],
            'email' => ['nullable', 'email'],
            'regenerate_token' => ['boolean'],
        ]);

        $user->name = $validated['name'];
        $user->username = $validated['username'];
        $user->email = $validated['email'];

        if (!empty($validated['password'])) {
            $user->password = $validated['password'];
        }

        if ($validated['regenerate_token']) {
            $user->tokens()->delete();
            $token = $user->createToken('rest-api', ['is-provider']);

            $user->provider_token = $token->plainTextToken;
        }

        $user->save();

        return $user;
    }
}
