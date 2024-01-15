<?php

namespace App\Livewire;

use Livewire\Attributes\Reactive;
use Livewire\Component;
use App\Models\Todo;

class TodoInfo extends Component
{
    #[Reactive]
    public Todo $todo;

    public function render()
    {
        return view('livewire.todo-info');
    }
}
