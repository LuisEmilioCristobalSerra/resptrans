<?php

namespace App\Http\Controllers;

use App\Helpers\JsonResponse;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        if (Auth::attempt($request->only(['email', 'password']))) {
            $user = $request->user();
            $token = $user->createToken('token-name')->plainTextToken;
            return JsonResponse::sendResponse([
                'token' => $token,
                'user' => $user->load('roles', 'permissions'),
            ]);
        }

        return JsonResponse::sendError('Credenciales invalidas', 401);
    }

    public function me(Request $request)
    {
        return JsonResponse::sendResponse($request->user()->load('roles', 'permissions'));
    }
}
