<?php

namespace App\Http\Resources\V1;

use App\Http\Resources\V1\TagResource;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class QuoteResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            // 'id'        => (string)$this->id, //id type string
            'id'        => $this->id,
            'penulis'   => $this->author,
            'deskripsi' => $this->text,
            // 'dibuat'    => Carbon::parse($this->created_at)->isoFormat('DD-MM-Y'), //01-11-2023,
            'dibuat'    => Carbon::parse($this->created_at)->isoFormat('DD MMMM Y'), //01 November 2023
            // 'tag'       => TagResource::collection($this->whenLoaded('tags'))
                            //Add with() in function 'index' QuoteController
                            //Add load() or loadMissing() in function 'show' QuoteController
            // 'tag'       => $this->whenLoaded('tags')
        ];
    }
}