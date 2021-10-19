<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class StockPriceController extends Controller
{
    public function check(Request $request)
    {
        $symbol= $request->symbol;

        $response = Http::get("https://www.alphavantage.co/query?function=GLOBAL_QUOTE&symbol=AMZN&apikey=0O18XUJW9P8QVGQJ");
        $stockPrice  = json_decode($response->body());

        return response()->json(array('price'=> $stockPrice->{"Global Quote"}->{"05. price"}), 200);
    }
}
