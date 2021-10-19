<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StockPriceController extends Controller
{
    public function check(Request $request)
    {
        $data= $request->dataval;
        return response()->json(array('msg'=> 'success'), 200);
    }
}
