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

    /**
     * Create relation between order and order item
     *
     * @return order:order_item relation
     */
    public function order_items()
    {
        return $this->hasMany('App\Models\OrderItem','order_id');
    }

    /**
     * Create relation with product
     * @return product relation
     */
    public function product()
    {
        return $this->hasOne('App\Models\Product');
    }
}
