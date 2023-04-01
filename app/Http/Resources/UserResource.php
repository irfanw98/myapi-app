<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'     => $this->id,
            'name'   => $this->name,
            'email'  => $this->email,
            // 'role'   => $this->role,
            'dibuat' => Carbon::parse($this->created_at)->isoFormat('DD MMMM Y'),
        ];
    }
}
