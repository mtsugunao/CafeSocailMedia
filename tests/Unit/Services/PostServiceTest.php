<?php

namespace Tests\Unit\Services;

use App\Services\PostService;
use Mockery;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Modules\ImageUpload\ImageManagerInterface;


class PostServiceTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     */
    public function test_check_own_post_and_comment(): void
    {
        $imageManager = Mockery::mock(ImageManagerInterface::class);
        $postService = new PostService($imageManager);

        $mock = Mockery::mock('alias:App\Models\Post');
        $mock->shouldReceive('where->first')->andReturn((object)[
            'id' => 1,
            'user_id' => 1,
        ]);

        $result = $postService->checkOwnPost(1, 1);
        $this->assertTrue($result);
        $result = $postService->checkOwnPost(2, 1);
        $this->assertFalse($result);

        $mock = Mockery::mock('alias:App\Models\Comment');
        $mock->shouldReceive('where->first')->andReturn((object)[
            'id' => 1,
            'user_id' => 1,
        ]);
        $result = $postService->checkOwnComment(1, 1);
        $this->assertTrue($result);
        $result = $postService->checkOwnComment(2, 1);
        $this->assertFalse($result);
    }

}
