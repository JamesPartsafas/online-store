<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ListTest extends TestCase
{
    use \Illuminate\Foundation\Testing\DatabaseMigrations;

    private $category;
    private $subcategory;

    function __construct()
    {
        parent::__construct();

        $this->category = "testCategory";
        $this->subcategory = "testSubcategory";
    } 

    public function test_product_list_returns_successfully()
    {
        Product::factory()->count(5)->create();

        $response = $this->get(route('productlist', ['category' => $this->category]));

        $response->assertStatus(200);
        $response->assertViewHas('products');
    }

    public function test_product_list_shows_products_with_subcategory()
    {
        Product::factory()->count(5)->create();

        $response = $this->get(
            route(
                'productsubcatlist', 
                [
                    'category' => $this->category, 
                    'subcategory' => $this->subcategory
                ]
            ));

        $response->assertStatus(200);
        $response->assertViewHas('products');
    }

    public function test_product_list_returns_404_for_invalid_category()
    {
        Product::factory()->count(5)->create();

        $response = $this->get(route('productlist', ['category' => 'invalidCategory']));

        $response->assertStatus(404);
    }
}
