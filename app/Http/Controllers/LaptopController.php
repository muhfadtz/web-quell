<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class LaptopController extends Controller
{
    public function recommend(Request $request)
    {
        $description = $request->input('description');
        
        $client = new Client();
        $response = $client->post('http://localhost:5000/recommend', [
            'json' => ['description' => $description]
        ]);

        $recommendedLaptops = json_decode($response->getBody()->getContents(), true);

        return response()->json($recommendedLaptops);
    }
}


