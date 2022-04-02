<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    use \Illuminate\Foundation\Testing\DatabaseMigrations;

    private $category;

    /**
     * Test category construction
    */
    function __construct()
    {
        parent::__construct();

        $this->category = "testCategory";
    } 

    /**
     * Test for viewable product page
    */
    public function test_product_page_returns_successfully()
    {
        Product::factory()->create();

        $response = $this->get(route('productpage', ['category' => $this->category, 'id' => 1]));

        $response->assertStatus(200);
        $response->assertViewHas('product');
    }

    /**
     * Test if 404 is returned for invalid product id
    */
    public function test_product_page_returns_404_for_invalid_id()
    {
        $response = $this->get(route('productpage', ['category' => $this->category, 'id' => -1]));

        $response->assertStatus(404);
    }
}
