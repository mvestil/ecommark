<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Photo
 */
class Photo extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['product_id', 'img_url'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
