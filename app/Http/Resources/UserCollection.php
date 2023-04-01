<?php

namespace App\Http\Resources;

use App\Http\Resources\V1\QuoteResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
{
    public function toArray($request)
    {
        // return parent::toArray($request);

        return $this->collection->transform(function($user) {

            return [
                'id' => $user->id,
                'name' =>  $user->name,
                'email' => $user->email,
                'quotes' => QuoteResource::collection($user->quotes)
            ];

        });
    }
}