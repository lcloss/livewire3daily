<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;
use App\Livewire\Forms\PostForm;
use App\Models\Post;

class EditPost extends Component
{
    public PostForm $form;

    public bool $success = false;

    public function mount(Post $post): void
    {
        $this->form->setPost($post);
    }

    #[Title('Edit Post')]
    public function render()
    {
        return view('livewire.edit-post');
    }

    public function update(): void
    {
        $this->form->update();

        $this->success = true;
    }

}
