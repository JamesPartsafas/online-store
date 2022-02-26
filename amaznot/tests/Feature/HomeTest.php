<?php

namespace Tests\Feature;

use Tests\TestCase;

class HomeTest extends TestCase
{
    use \Illuminate\Foundation\Testing\DatabaseMigrations;

    public function test_home_page_can_be_viewed()
    {
        $response = $this->get(route('home'));

        $response->assertStatus(200);
    }
}
