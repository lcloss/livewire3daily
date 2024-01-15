<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Livewire\Forms\PostForm;
use App\Models\Post;

class CreatePost extends Component
{
    public PostForm $form;

    public bool $success = false;

    #[Title('Create Post')]
    public function render()
    {
        return view('livewire.create-post');
    }

    public function save(): void
    {
        $this->form->save();

        $this->success = true;
    }

    public function validateTitle(): void
    {
        $this->validateOnly('form.title');
    }

    public function validateBody(): void
    {
        $this->validateOnly('form.body');
    }

    public function updated($property): void
    {
        if ($property == 'form.title') {
            $this->form->title = Str::headline($this->form->title);
        }
    }
}
