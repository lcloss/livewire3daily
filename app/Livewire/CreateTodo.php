<?php

namespace App\Livewire;

use App\Livewire\Forms\TodoForm;
use Livewire\Attributes\Url;
use Livewire\Component;
use App\Models\Todo;

class CreateTodo extends Component
{
    public TodoForm $form;

    #[Url]
    public string $search = '';

    public bool $success = false;

    public function render()
    {
        $todos = Todo::search($this->search)->get();

        return view('livewire.create-todo', [
            'todos' => $todos
        ]);
    }

    public function save(): void
    {
        $this->form->save();

        $this->success = true;
    }
}
