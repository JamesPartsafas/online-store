<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $table = 'order_items';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'order_id',
        'product_id',
        'amount',
        'created_at',
        'updated_at',
    ];

    /**
     * Create relation with order
     *
     * @return order relation
     */
    public function order_items()
    {
        return $this->belongsTo('App\Models\Order');
    }

    /**
     * Create relation with product
     * 
     * @return product relation
     */
    public function product()
    {
        return $this->hasMany('App\Models\Product');
    }

}
