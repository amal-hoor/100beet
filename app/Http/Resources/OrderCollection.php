<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\Resource;

class OrderCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [

            'user'    => $this->users->name,
            'product'   => $this->products->name,
            'address' => $this->address,
            'created_at' => $this->created_at,

        ];
    }
}
