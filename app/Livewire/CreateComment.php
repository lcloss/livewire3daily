<?php

namespace App\Livewire;

use Livewire\Attributes\Validate;
use Livewire\Component;
use App\Models\Post;

class CreateComment extends Component
{
    public Post $post;

    #[Validate('required')]
    public string $body = '';

    public function render()
    {
        return view('livewire.create-comment');
    }

    public function save()
    {
        $this->validate();

        $this->post->comments()->create([
            'body' => $this->body,
        ]);

        $this->dispatch('comment-added');

        $this->reset('body');
    }
}
