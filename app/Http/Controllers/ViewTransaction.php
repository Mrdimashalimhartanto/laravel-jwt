<?php

namespace App\Http\Controllers;

use App\Models\ViewTransaction as ModelsViewTransaction;
use Illuminate\Http\Request;

class ViewTransaction extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     public $perPage = 10;

    public function get_detail_view_transaction()
    {
        return response()->json(ModelsViewTransaction::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_transaction($OrderId)
    {
        try {
            $detailOrder = ModelsViewTransaction::where('order_id', $OrderId)->first();
            if ($detailOrder != null) {
                return response()->json(array('status' => true, 'Detail order berhasil ditampilkan' => $detailOrder), 200);
            } else {
                return response()->json(array('message' => 'Detail Order gagal ditampilkan'), 400);
            }
        } catch (\Exception $e) {
            return response()->json(array('message' => 'gagal menampilkan detail transaction'), 500);
        }
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
