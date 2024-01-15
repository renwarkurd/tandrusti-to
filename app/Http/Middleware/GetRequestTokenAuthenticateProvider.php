<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;

class GetRequestTokenAuthenticateProvider
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $token = PersonalAccessToken::findToken($request->token)->can('is-provider');

        if ($token) {
            return $next($request);
        }

        return response()->json(['message' => 'You are unauthorized'], 422);
    }
}
