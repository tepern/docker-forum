<?php

namespace Tests\Feature\Http\Controllers\Forum;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
use App\User;

class TopicControllerTest extends TestCase
{

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndex()
    {
        //$user = User::factory()->create();
        
        $response = $this->get('/forum/topic');

        $response->assertStatus(200);
    }
}
