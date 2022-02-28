<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'category' => 'testCategory',
            'subcategory' => 'testSubcategory',
            'price' => 100,
            'about' => "about",
            'details' => 'details',
            'weight' => 10,
            'image' => 'image'
        ];
    }
}
