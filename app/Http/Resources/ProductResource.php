<?php

namespace App\Http\Resources;

use App\Models\Product;
use Illuminate\Support\Arr;

class ProductResource extends BaseResource
{
    public function fields($request)
    {
        return [
            'name'             => $this->name,
            'sku'              => $this->sku,
            'description'      => $this->description,
            'stocks_available' => $this->stocks_available,
            'price'            => (float) number_format($this->price, 2),
            'main_pic_url'     => $this->photos->first()->img_url ?? null
        ];
    }

    public function relationships($request)
    {
        return [
            'photos'     => new PhotosCollection($this->photos),
            'categories' => new CategoriesCollection($this->categories)
        ];
    }

    public function links($request)
    {
        return [
            'self' => route('products.show', ['product' => $this->id])
        ];
    }

    /**
     * @param $request
     * @return array
     */
    public function includes($request)
    {
        return (new CategoriesCollection($this->categories))->toArray($request)['data'];
    }
}
