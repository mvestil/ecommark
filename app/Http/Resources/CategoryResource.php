<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends BaseResource
{
    public function fields($request)
    {
        return [
            'name'        => $this->name,
            'description' => $this->description,
        ];
    }

    public function relationships($request)
    {
        return [];
    }

    public function links($request)
    {
        return [];
    }
}
