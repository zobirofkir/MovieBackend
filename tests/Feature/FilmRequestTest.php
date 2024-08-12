<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FilmRequestTest extends TestCase
{
    /**
     * Test Get Movies.
     */
    public function testGetFilms()
    {
        $response = $this->get('api/movies/1');
        $response->assertStatus(200);
    }

    /**
     * Test Search Request
     */
    public function testSearchFilm()
    {
        $response = $this->get("api/search/1?query=deadpool");
        $response->assertStatus(200);
    }

    /**
     * Test Get Search Movie
     */
    public function testGetMovie()
    {
        $response = $this->get("api/movies/1/533535");
        $response->assertStatus(200);
    }
}
