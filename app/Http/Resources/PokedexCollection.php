<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use JsonException;

class PokedexCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return $this->collection->transform(function($element){
            $url = 'https://pokeapi.co/api/v2/pokemon/'.$element->name;
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
                return false;
            }

            return [
                'id'  => $result->id,
                'name'  => ucfirst($element->name),
                'link'  => $element->url,
                'image' => $result->sprites->other->{"official-artwork"}->front_default,
                'types' => $result->types
            ];
        });
    }
}
