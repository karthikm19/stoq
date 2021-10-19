<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class StockPriceController extends Controller
{
    public function check(Request $request)
    {
        $symbol= $request->symbol;
        $apiUrl = sprintf(env("API_URL"), env("API_FUNCTION"), $symbol, env("API_KEY"));
        $response = Http::get($apiUrl);
        $stockPrice  = $response->json();

        return response()->json(array(
            'price'=> $stockPrice["Global Quote"]["05. price"]
        ), 200);
    }
}
