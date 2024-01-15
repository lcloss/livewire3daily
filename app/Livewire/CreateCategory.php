<?php

namespace App\Livewire;

use App\Livewire\Forms\CategoriesForm;
use Livewire\Component;

class CreateCategory extends Component
{
    public CategoriesForm $form;

    public bool $success = false;

    public function render()
    {
        return view('livewire.create-category');
    }

    public function save()
    {
        $this->form->save();
        $this->success = true;
        return redirect()->route('categories.index');
    }
}
