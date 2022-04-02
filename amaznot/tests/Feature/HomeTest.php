<?php

namespace Tests\Feature;

use Tests\TestCase;

class HomeTest extends TestCase
{
    use \Illuminate\Foundation\Testing\DatabaseMigrations;

    /**
     * Test for a viewable home page
    */
    public function test_home_page_can_be_viewed()
    {
        $response = $this->get(route('home'));

        $response->assertStatus(200);
    }
}
