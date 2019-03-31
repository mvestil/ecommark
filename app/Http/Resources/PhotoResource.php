<?php

namespace App\Http\Resources;

class PhotoResource extends BaseResource
{
    public function fields($request)
    {
        return [
            'img_url' => $this->img_url
        ];
    }

    public function relationships($request)
    {
        return [
            'product' => new ProductResource($this->product)
        ];
    }

    public function links($request)
    {
        return [];
    }
}
