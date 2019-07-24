<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class OfferCollection extends ResourceCollection
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

            'productname' => $this->product->name,
            'photo'       => $this->product->photo->path,
            'newPrice'    => $this->new_price,

        ];
    }
}
