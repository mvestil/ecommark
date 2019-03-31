<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Orderitem
 */
class Orderitem extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['order_id', 'product_id', 'price', 'quantity'];
}
