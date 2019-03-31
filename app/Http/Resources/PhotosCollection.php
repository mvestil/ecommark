<?php

namespace App\Http\Resources;

class PhotosCollection extends BaseResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection->map(function ($photo) use ($request) {
                return $this->makeResource(PhotoResource::class, $photo)->toArray($request);
            })
        ];
    }
}
