<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Attributes\Rule;
use Livewire\Form;
use App\Models\Post;

class PostForm extends Form
{
    public ?Post $post;

    #[Rule('required|min:5')]
    public string $title = '';

    #[Rule('required|min:5')]
    public string $body = '';

    public function setPost(Post $post): void
    {
        $this->post = $post;

        $this->title = $post->title;

        $this->body = $post->body;
    }

    public function save(): void
    {
        $this->validate();

        Post::create($this->all());

        $this->reset('title', 'body');
    }

    public function update(): void
    {
        $this->post->update($this->all());
    }

}
