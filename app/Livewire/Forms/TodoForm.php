<?php

namespace App\Livewire\Forms;

use App\Models\Todo;
use Livewire\Attributes\Validate;
use Livewire\Form;

class TodoForm extends Form
{
    public ?Todo $todo;

    #[Validate('required')]
    public string $title = '';

    public string $description = '';
    public string $due_date = '';
    public int $importance = 3;

    public function save(): void
    {
        $this->validate();

        Todo::create($this->all());

        $this->reset('title', 'description', 'due_date', 'importance');
    }
}
