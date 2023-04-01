<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\UserResource;
use App\Http\Resources\V1\TagResource;

class QuoteCollection extends ResourceCollection
{
    public function toArray($request)
    {
        // return parent::toArray($request); //Add with() in function 'index' QuoteController

        return $this->collection->transform(function($quote) {

            return [
                'id' => $quote->id,
                'penulis' => strtoupper($quote->author),
                'deskripsi' => $quote->text,
                // 'user' => new UserResource($quote->whenLoaded('user')), //--> gunakan ini jika ingin data sama dengan UserResource.
                'user' => $quote->whenLoaded('user')->only('email'), //--> gunakan ini jika ingin data sebagian,
                'tags' => TagResource::collection($quote->tags),
            ];

        });
    }
}