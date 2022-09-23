<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Logs extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'title' => 'required',
            'orderid' => 'required',
            'message' => 'required',
            'response' => 'required'
        ]);

       if ($validator->fails()) {
            return response()->json($validator->message());
       }

       $user = auth()->user();

       $logs = $user->logs()->create([
            'title' => $request->title,
            'orderid' => $request->orderid,
            'message' => $request->message,
            'response' => $request->response,
       ]);

       return response()->json([
            'success' => true,
            'message' => 'Data logs successfully insert',
            'body' => $logs
       ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
