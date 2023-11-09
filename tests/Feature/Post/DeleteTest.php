<?php

namespace Tests\Feature\Post;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Post;
use App\Models\Cafe;

class DeleteTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_delete_successed(): void
    {
        $user = User::factory()->create();
        $cafe = Cafe::factory()->create(['user_id' => $user->id]);
        $post = Post::factory()->create(['user_id' => $user->id, 'cafe_id' => $cafe->id]);
        $this->actingAs($user);
        $response = $this->delete('/post/delete/' . $post->id);

        $response->assertRedirect('/post');
    }
}
