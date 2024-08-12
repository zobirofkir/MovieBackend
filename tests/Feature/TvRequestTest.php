<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TvRequestTest extends TestCase
{
    /**
     * Test Get Tv.
     */
    public function testGetTv()
    {
        $response = $this->get('/api/tv/1');

        $response->assertStatus(200);
    }

    /**
     * Test Show Tv
     */
    public function testShowTv()
    {
        $response = $this->get("/api/tv/1/237480");
        $response->assertStatus(200);
    }

    
}
