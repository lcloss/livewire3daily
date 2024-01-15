<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Livewire\Forms\CategoriesForm;

class EditCategory extends Component
{
    public CategoriesForm $form;

    public bool $success = false;

    public function mount(Category $category): void
    {
        $this->form->setCategory($category);
    }

    public function render()
    {
        return view('livewire.edit-category');
    }

    public function save(): void
    {
        $this->form->update();

        $this->redirect('/categories');
    }
}
