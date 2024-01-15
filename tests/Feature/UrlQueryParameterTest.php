<?php

namespace Tests\Feature;

use App\Livewire\PostsList;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;
use App\Models\Post;

class UrlQueryParameterTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_can_filter_by_url_parameter(): void
    {
        Post::factory()->create(['title' => 'This title contais the word alfarrabio.']);
        Post::factory()->create(['title' => 'This title does not contain the previous word.']);

        Livewire::withQueryParams(['search' => 'alfarrabio'])
            ->test(PostsList::class)
            ->assertSee('This title contais the word alfarrabio.')
            ->assertDontSee('This title does not contain the previous word.');
    }
}
