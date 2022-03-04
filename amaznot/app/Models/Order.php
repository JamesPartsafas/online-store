<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'total',
        'credit_card',
        'created_at',
        'updated_at',
    ];

    // Create Relation between order and Order Item
    public function order_items()
    {
        return $this->hasMany('App\Models\OrderItem','order_id');
    }

    // Create Relation with Product
    public function product()
    {
        return $this->hasOne('App\Models\Product');
    }
}
