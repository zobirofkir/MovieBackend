<?php

namespace Tests\Feature; 

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContactRequestTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test Get Contacts
     */
    public function testGetContact()
    {
        $response = $this->get('/api/contacts');
        $response->assertStatus(200);
    }

    /**
     * test Post Contact
     */
    public function testPostContact()
    {
        $data = [
            "name" => "zobir",
            "email" => "zobirofkir19@gmail.com",
            "message" => "the is just test message"
        ];

        $response = $this->post("/api/contacts", $data);
        $response->assertStatus(201);
    }
}
