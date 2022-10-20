<?php

namespace App\Http\Controllers;

use App\Models\User;
use Tymon\JWTAuth\JWTAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    /**
     * Get a JWT via given credentials
     * 
     * @return \Illuminate\Http\JsonResponse
     */

    public function login(Request $request)
    {
       $validator = Validator::make($request->all(), [
           'email' => 'required|email',
           'password' => 'required|string',
       ]);

       if ($validator->fails()) {
           return response()->json($validator->errors(), 422);
       }

       if (! $token = auth()->attempt($validator->validate())) {
           return response()->json(['error' => 'Either email or password is wrong'], 401);
       }

       return $this->createNewToken($token);
    }

    protected function createNewToken($token)
    {   
        return response()->json([
            'message' => 'Hore kamu berhasil login, Selamat datang di CMS EPAY - ASURANSI CIPUTRA INDONESIA',
            'access_token' => $token,
            'token_type' => 'bearer',
            'masa berlaku token sampai' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }

     
     /**
      * Register a user.
      *
      * @return \Illuminate\Http\JsonResponse
      */

      public function register(Request $request)
      {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'username' => 'required|string|unique:users,username',
            'email' => 'required|string|email|max:100|unique:users',
            'phone' => 'required|string|unique:users',
            'password' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $user = User::create([
            'name' => $request->get('name'),
            'username' => $request->get('username'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'password' => Hash::make($request->get('password')),
        ]);

        return response()->json([
            'status' => 'Success',
            'message' => 'Hallo, selamat datang! kamu berhasil melakukan registrasi. silahkan login',
            'user' => $user,
        ], 201);

      }


      /**
       * log the user out (Invalidate the token)
       * 
       * @return \Illuminate\Http\JsonResponse
       */

      public function logout()
      {
        Auth::logout();
        return response()->json([
            'status' => 'success',
            'message' => 'User Successfully logout'
        ]);
      }

       /**
        * Refresh a token.
        *
        * @return \Illuminate\Http\JsonResponse
        */

        // REFRESH TOKEN USER
        public function refresh()
        {
            return response()->json([
                'status' => 'success',
                'user' => Auth::user(),
                'Authorization' => [
                    'access_token' => Auth::refresh(),
                    'type' => 'Bearer',
                ],
            ]);
        }




         /**
         * Get the authenticated User.
         *
         * @return \Illuminate\Http\JsonResponse
         */

        public function get_user_by_token() {
            return response()->json(auth()->user());
        }

}
