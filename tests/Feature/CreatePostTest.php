<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;
use App\Livewire\CreatePost;
use App\Models\Post;

class CreatePostTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_post_is_created(): void
    {
        $posts_count = Post::where('title', 'LIKE', 'My _ test post')->count();
        $title = 'My ' . ($posts_count + 1) . ' Test Post';
        $body = 'My ' . ($posts_count + 1) . ' test content';

        Livewire::test(CreatePost::class)
            ->set('form.title', $title)
            ->set('form.body', $body)
            ->call('save')
            ->assertSet('success', true);

        $this->assertDatabaseHas('posts', ['title' => $title, 'body' => $body]);
    }
}
