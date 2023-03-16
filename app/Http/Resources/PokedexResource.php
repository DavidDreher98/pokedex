<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PokedexResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'length'    => $this->count,
            'next'      => $this->next,    
            'previous'  => $this->previous,   
            'list'      => new PokedexCollection($this->results)   
        ];
    }
}
