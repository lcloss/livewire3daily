<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Collection;
use App\Models\Product;
use App\Models\Category;
use App\Livewire\Forms\ProductsForm;

class EditProduct extends Component
{
    use WithFileUploads;

    public ProductsForm $form;

    public Collection $categories;

    public bool $success = false;

    public function mount(Product $product): void
    {
        $this->form->setProduct($product);
        $this->categories = Category::orderBy('name')->pluck('name', 'id');
    }

    public function render()
    {
        return view('livewire.edit-product');
    }

    public function save(): void
    {
        $this->form->update();

        $this->redirect('/products');
    }
}
