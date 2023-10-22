<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class GithubRepostioryTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    // public function test_example(): void
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }

    public function testIndex()
    {
        Http::fake([
            'https://api.github.com/search/repositories' => Http::response([
               [],
            ]),
        ]);

        $request = [
            'per_page' => 10,
            'language' => 'php',
            'date' => '2023-10-01',
        ];

        $response = $this->get('/api/github-repositories', $request);

        $response->assertStatus(200);
        $response->assertJsonStructure([]);

    }
}
