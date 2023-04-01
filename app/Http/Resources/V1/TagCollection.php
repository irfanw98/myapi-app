<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TagCollection extends ResourceCollection
{
    public function toArray($request)
    {
        // return parent::toArray($request);

        return $this->collection->transform(function($tag){

            return [
                'id' => $tag->id,
                'name' => $tag->name,
                // 'quote' => QuoteResource::collection($tag->quotes)
            ];
        });
    }
}