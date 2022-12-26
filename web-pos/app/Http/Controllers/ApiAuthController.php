<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiAuthController extends Controller
{
    // public function register(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|string|max:255|unique:users',
    //         'password' => 'required|string|min:8'
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json($validator->errors());
    //     }

    //     $user = User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password)
    //     ]);

    //     $token = $user->createToken('auth_token')->plainTextToken;

    //     return response()->json([
    //         'data' => $user,
    //         'access_token' => $token,
    //         'token_type' => 'Bearer'
    //     ]);
    // }

    public function login(Request $request)
    {
        if (! Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'status' => FALSE,
                'msg' => 'Email password salah'
            ]);
        }

        $user = User::where('email', $request->email)->firstOrFail();

        $user['remember_token'] = $user->createToken('auth_token')->plainTextToken;
        $user->save();
        $token = $user['remember_token'];

        return response()->json([
            'statu' => TRUE,
            'access_token' => $token,
            'email' => $user['email'],
            'level_id' => $user['level_id']
        ]);
    }

    public function logout()
    {
        Auth::user()->tokens()->delete();
        $user = Auth::user('remember_token');
        $user['remember_token'] = Null;
        $user->save();
        // $user=Auth::user();
        return response()->json([
            'message' => 'logout success',
        ]);
    }
}
