<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\LoginResource;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\{
    RegisterRequest,
    LoginRequest
};

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        // $user = User::create([
        //     'name'     => $request['name'],
        //     'email'    => $request['email'],
        //     'role'     => 'user',
        //     'password' => Hash::make($request['password'])
        // ]);
        $user = User::create($request->validated());

        return new LoginResource([
            'user'    => $user,
            'token'   => $user->createToken('token')->plainTextToken
        ]);
    }

    public function login(LoginRequest $request)
    {
        if (!Auth::attempt($request->only(['email', 'password']))){
            return response()->json([
                'message' => 'Invalid Credentials'
            ], 401);
        }

        $user = User::where('email', $request->email)->first();
        return new LoginResource([
            'user'    => $user,
            'token'   => $user->createToken('token')->plainTextToken
        ]);
    }

    public function logout(Request $request)
    {
        // Hapus Token By User
        // $request->user()->currentAccessToken()->delete();
        // Hapus Semua Token
        $request->user()->tokens()->delete();
        //Response No Content 204
        return response()->noContent();
    }
}