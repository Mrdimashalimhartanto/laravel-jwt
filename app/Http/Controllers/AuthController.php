<?php

namespace App\Http\Controllers;

use App\Models\User;
use Tymon\JWTAuth\JWTAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;

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
            'message' => 'User successfully registered',
            'user' => $user
        ], 201);

      }


      /**
       * log the user out (Invalidate the token)
       * 
       * @return \Illuminate\Http\JsonResponse
       */

      public function logout()
      {
        auth()->logout();

        return response()->json(['message' => 'User berhasil logout']);
      }

       /**
        * Refresh a token.
        *
        * @return \Illuminate\Http\JsonResponse
        */

        public function refresh()
        {
            return $this->createNewToken(auth()->refresh());
        }

         /**
         * Get the authenticated User.
         *
         * @return \Illuminate\Http\JsonResponse
         */

        public function me() {
            return response()->json(auth()->user());
        }

        protected function createNewToken($token)
        {   
            return response()->json([
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => auth()->factory()->getTTL() * 60,
                'user' => auth()->user()
            ]);
        }
}
