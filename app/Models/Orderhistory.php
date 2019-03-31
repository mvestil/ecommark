<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Orderhistory
 */
class Orderhistory extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['order_id', 'payment_id', 'status'];
}
