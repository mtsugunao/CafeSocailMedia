<?php

namespace Tests\Feature\Post;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Cafe;

class PutTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $user = User::factory()->create();
        $cafe = Cafe::factory()->create(['user_id' => $user->id]);
        $post = Post::factory()->create(['user_id' => $user->id, 'cafe_id' => $cafe->id]);
        $this->actingAs($user);
        $requestData = [
            'id' => $post->id,
            'user_id' => $user->id,
            'post' => 'Updated post content',
        ];

        $response = $this->put('/post/update/' . $post->id, $requestData);

        $response->assertRedirect('/');

        $response->assertSessionHas('feedback.success', 'Modified successfully!');

        $this->assertDatabaseHas('posts', [
            'id' => $post->id,
            'user_id' => $user->id,
            'content' => $requestData['post'],
        ]);
    }
}
