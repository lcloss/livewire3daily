<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\Category;

class CategoriesForm extends Form
{
    public ?Category $category;

    #[Validate('required|min:3')]
    public string $name = '';

    public function setCategory(Category $category): void
    {
        $this->category = $category;

        $this->name = $category->name;
    }

    public function save()
    {
        $this->validate();

        Category::create($this->all());
    }

    public function update()
    {
        $this->validate();

        $this->category->update($this->all());
    }
}
