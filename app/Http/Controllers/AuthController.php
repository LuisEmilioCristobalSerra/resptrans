<?php

namespace App\Http\Controllers;

use App\Helpers\JsonResponse;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        if (Auth::attempt($request->only(['email', 'password']))) {
            $user = $request->user();
            $token = $user->createToken('token-name')->plainTextToken;
            return JsonResponse::sendResponse(['token' => $token]);
        }

        return JsonResponse::sendError('Credenciales invalidas', 401);
    }
}
