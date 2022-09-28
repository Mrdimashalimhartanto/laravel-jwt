<?php

namespace App\Http\Controllers;

use App\Models\Logs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class LogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_all_logs()
    {   
        return response()->json(Logs::all(), 200);
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
            'order_id' => 'required',
            'no_polis' => 'required',
            'action' => 'required',
            'type' => 'required',
            'response' => 'required',
            'message' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->message());
        }

        $user = auth()->user();

        $logs = $user->logs()->create([
            'title' => $request->title,
            'order_id' => $request->orderid,
            'no_polis' => $request->nopolis,
            'action' => $request->action,
            'type' => $request->type,
            'response' => $request->response,
            'message' => $request->message
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Article berhasil di tambahkan',
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
