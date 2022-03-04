<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'category',
        'subcategory',
        'price',
        'about',
        'details',
        'weight',
        'image'
    ];

    // Create Relation with OrderItem
    public function product()
    {
        return $this->belongsToMany('App\Models\OrderItem');
    }
}
