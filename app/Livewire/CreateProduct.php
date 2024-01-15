<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Collection;
use App\Models\Category;
use App\Livewire\Forms\ProductsForm;

class CreateProduct extends Component
{
    use WithFileUploads;

    public ProductsForm $form;

    public Collection $categories;

    public bool $success = false;

    public function mount(): void
    {
        $this->categories = Category::orderBy('name')->pluck('name', 'id');
    }

    public function save(): void
    {
        $this->form->save();

        $this->redirect('/products');
    }

    public function render()
    {
        return view('livewire.create-product');
    }
}
