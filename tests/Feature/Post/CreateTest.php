<?php

namespace Tests\Feature\Post;

use App\Models\Cafe;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class CreateTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $user = User::factory()->create();
        $cafe = Cafe::factory()->create(['user_id' => $user->id]);
        $this->actingAs($user);

        $postData = [
            'user_id' => $user->id,
            'post' => 'This is a test post.',
            'cafe_id' => $cafe->id,
        ];

        $response = $this->post('/post/create/' . $cafe->id, $postData);

        $response->assertRedirect('/cafe/detail/' . $cafe->id);

        $response->assertSessionHas('feedback.success', 'Posted successfully!');

        $this->assertDatabaseHas('posts', [
            'user_id' => $postData['user_id'],
            'content' => $postData['post'],
            'cafe_id' => $postData['cafe_id'],
        ]);
        
    }
}
