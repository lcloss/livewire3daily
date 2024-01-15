<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\Product;

class ProductsForm extends Form
{
    public ?Product $product;

    #[Validate('required|min:3')]
    public string $name = '';

    #[Validate('required|min:3')]
    public string $description = '';

    #[Validate('required|string')]
    public string $color = '';

    #[Validate('boolean')]
    public bool $in_stock = false;

    #[Validate('required|array', as: 'category')]
    public array $productCategories = [];

    #[Validate('nullable|image|max:1024')]
    public $image;

    public $photo;
    #[Validate('required|numeric')]
    public $price;

    public function setProduct(Product $product): void
    {
        $this->product = $product;

        $this->name = $product->name;
        $this->description = $product->description;
        $this->color = $product->color ?? '';
        $this->in_stock = $product->in_stock;
        $this->price = $product->price;
        $this->photo = $product->photo;
        $this->productCategories = $product->categories->pluck('id')->toArray();
    }

    public function save()
    {
        $this->validate();

        if ( $this->image ) {
            $filename = $this->image->store('products', 'public');

            // $product = Product::create($this->all());
            $product = Product::create($this->all() + ['photo' => $filename]);
        } else {
            $product = Product::create($this->all());
        }

        $product->categories()->sync($this->productCategories);
    }

    public function update()
    {
        $this->validate();

        if ( $this->image ) {
            $filename = $this->image->store('products', 'public');

            // $this->product->update($this->all());
            $this->product->update($this->all() + ['photo' => $filename]);
        } else {
            $this->product->update($this->all());
        }

        $this->product->categories()->sync($this->productCategories);
    }
}
