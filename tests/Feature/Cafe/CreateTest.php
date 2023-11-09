<?php

namespace Tests\Feature\Cafe;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Models\Menu;
use App\Models\Cafe;

class CreateTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        // テスト用のリクエストデータ
        $requestData = [
            'name' => 'Test Cafe',
            'country' => 'Canada',
            'province' => 'Ontario',
            'city' => 'Toronto',
            'street_address' => '123 Main St',
            'postalcode' => 'A1B2C3',
            'description' => 'A test cafe',
            'parking' => 'Available',
            'user_id' => $user->id,
        ];

        // ポストリクエストを送信
        $response = $this->post('/cafe/create', $requestData);

        $response->assertRedirect();

    }
}
