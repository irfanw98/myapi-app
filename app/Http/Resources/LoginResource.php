<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LoginResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'name'  => $this['user']->name,
            'email' => $this['user']->email,
            'token' => $this['token']
        ];
    }
}
