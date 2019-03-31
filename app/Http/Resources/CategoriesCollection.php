<?php

namespace App\Http\Resources;

class CategoriesCollection extends BaseResourceCollection
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
            'data' => $this->collection->map(function ($category) use ($request) {
                return $this->makeResource(CategoryResource::class, $category)->toArray($request);
            })
        ];
    }
}
