<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class AuthController extends Controller
{
    public function login(LoginRequest $request){
        $credentials = request(['login', 'password']);
        if (!Auth::attempt($credentials)) {
            throw new ApiException(401, 'Unauthorized');
        }
        $user = Auth::user();
        $user->token = Hash::make(microtime(true)*1000 . $user->login);
        $user->save();
        return response()->json(['token' => $user->token])->setStatusCode(200);
    }
    public function logout(Request $request){
        $user = $request->user();
        $user->token = null;
        $user->save();
        return response()->json()->setStatusCode(204);
    }
}
