<?php

namespace App\Http\Controllers;

use App\Http\Resources\PokedexCollection;
use App\Http\Resources\PokedexResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use JsonException;

class SearchController extends Controller
{
    public function pokedexList(Request $request){
        $url = 'https://pokeapi.co/api/v2/pokemon?limit=12&offset=000';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, 0);
        // curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($curl);
        curl_close($curl);

        try {
            $result = json_decode($result);
        } catch (JsonException $e) {
            Log::info('SearchController@pokedexList, erro: '. $e->getMessage());
            return false;
        }

        return new PokedexResource($result);
    }
}
