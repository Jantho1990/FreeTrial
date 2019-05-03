<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiResponseTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Run before each test.
     *
     * @return void
     */
    public function setUp(): void {
        parent::setUp();
        $this->user = factory(\App\User::class)->create();
    }

    /**
     * @test
     */
    public function getsTrueResponseWhenUserExists()
    {
        $postData = [
            'email' => $this->user->email
        ];

        $response = $this->post('/api/free-trial-submit', $postData);

        $response->assertStatus(200);
        $response->assertJson(['response' => true]);
    }
    
    /**
     * @test
     */
    public function getsFalseResponseWhenNoUserFound()
    {
        $postData = [
            'email' => 'i@shouldnot.exist'
        ];

        $response = $this->post('/api/free-trial-submit', $postData);

        $response->assertStatus(200);
        $response->assertJson(['response' => false]);
    }
}
