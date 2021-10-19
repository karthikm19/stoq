<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Price;

class StockPriceController extends Controller
{
    const API_ERROR = "An error occured while processing the request";

    public function check(Request $request)
    {
        $symbol= $request->symbol;
        $apiUrl = sprintf(env("API_URL"), env("API_FUNCTION"), $symbol, env("API_KEY"));
        $response = Http::get($apiUrl);
        $stockPrice  = $response->json();

        if($response->status() === 200 && isset($stockPrice["Global Quote"]) && count($stockPrice["Global Quote"]) > 0){
            
            $priceDetails = [
                "symbol" => $stockPrice["Global Quote"]["01. symbol"],
                "open" => $stockPrice["Global Quote"]["02. open"],
                "high" => $stockPrice["Global Quote"]["03. high"],
                "low" => $stockPrice["Global Quote"]["04. low"],
                "price" => $stockPrice["Global Quote"]["05. price"],
                "volume" => $stockPrice["Global Quote"]["06. volume"],
                "latest_trading_day" => $stockPrice["Global Quote"]["07. latest trading day"],
                "previous_close" => $stockPrice["Global Quote"]["08. previous close"],
                "change" => $stockPrice["Global Quote"]["09. change"],
            ];

            Price::create($priceDetails);

            return response()->json($priceDetails, $response->status());
        } else {
            return response()->json(self::API_ERROR, $response->status());
        }
    }
}
