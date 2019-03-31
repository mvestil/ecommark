<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 */
class Order extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['tracking_number', 'payment_id'];
}
