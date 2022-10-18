<?php

namespace App\Http\Controllers\Guzzle;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class PostGuzzleController extends Controller
{
    // public function createUser(Request $request){
    //     $theUrl     = config('app.guzzle_test_url').'/api/auth/register';
    //       $response= Http::post($theUrl, [
    //           'name' =>$request->get('name'),
    //           'username' =>$request->get('username'),
    //           'email' => $request->get('email'),
    //           'phone' => $request->get('phone'),
    //           'password' => Hash::make($request->get('password')),
    //       ]);
    //       return $response;
    //     }

    // public function index()
    // {
    //    $response = Http::get("https://jsonplaceholder.typicode.com/posts")->json();
    //     return view('posts', compact('response'));
    // }

    
    public function index()
    {
        $client = new \GuzzleHttp\Client();
        $request = $client->get('https://jsonplaceholder.typicode.com/posts');
        $response = $request->getBody()->getContents();
        return $response;
        // dd($response);

        // return view('posts');
    }

 
}
