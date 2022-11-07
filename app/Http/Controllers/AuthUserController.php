<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AuthUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    /////////// FUNCTION UNTUK LOGIN ///////////
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if (!($token = auth()->attempt($validator->validate()))) {
            return response()->json(
                ['error' => 'Oops email and password is wrong'],
                401
            );
        }

        return $this->createNewToken($token);
    }

    /////////// FUNCTION UNTUK CREATE TOKEN ///////////
    protected function createNewToken($token)
    {
        return response()->json([
            'message' =>
                'Hore kamu berhasil login, Selamat datang di CMS EPAY - ASURANSI CIPUTRA INDONESIA',
            'access_token' => $token,
            'token_type' => 'bearer',
            'token_expire_in' =>
                auth()
                    ->factory()
                    ->getTTL() * 60,
            'user' => auth()->user(),
        ]);
    }

    /////////// FUNCTION UNTUK REGISTRASI ///////////
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'username' => 'required|string|unique:users,username',
            'email' => 'required|string|email|max:100|unique:users',
            'phone' => 'required|string|unique:users',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $user = User::create([
            'name' => $request->get('name'),
            'username' => $request->get('username'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'passowrd' => Hash::make($request->get('password')),
        ]);

        return response()->json(
            [
                'status' => 'Success',
                'message' =>
                    'Hallo, selamat datang! kamu berhasil melakukan registrasi. silahkan login',
                'user' => $user,
            ],
            201
        );
    }

    /////////// FUNCTION UNTUK LOGOUT ///////////
    public function logout()
    {
        Auth::logout();
        return response()->json([
            'status' => 'success',
            'message' => 'User Berhasil logout',
        ]);
    }

    /////////// FUNCTION UNTUK REFRESH TOKEN ///////////
    public function refresh()
    {
        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil melakukan refresh token',
            'Authorization' => [
                'access_token' => Auth::refresh(),
                'type' => 'Bearer',
            ],
        ]);
    }

    /////////// FUNCTION UNTUK GET USER BY TOKEN ///////////
    public function get_user_by_token()
    {
        return response()->json(auth()->user());
    }
}
