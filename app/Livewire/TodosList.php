<?php

namespace App\Livewire;

use Illuminate\Support\Collection;
use Livewire\Attributes\Url;
use Livewire\Attribuytes\Title;
use Livewire\Component;
use App\Models\Todo;

class TodosList extends Component
{
    public Collection $todos;

    public ?Todo $selected;

    #[Url]
    public string $search = '';

    public function mount(): void
    {
        $this->todos = Todo::search($this->search)->get();

        $this->selected = $this->todos->first();
    }

    #[Title('List of Todos')]
    public function render()
    {
        return view('livewire.todos-list');
    }

    public function select(Todo $todo): void
    {
        $this->selected = $todo;
    }

    public function deselect(): void
    {
        $this->selected = null;
    }
}
