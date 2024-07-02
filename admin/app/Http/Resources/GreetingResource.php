<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GreetingResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'lang' => $this->id,
            'name' => $this->name
        ];
    }
}
