<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Category;

class CategoriesList extends Component
{
    use WithPagination;

    public string $searchQuery = '';

    public function render()
    {
        $categories = Category::when($this->searchQuery !== '', fn(Builder $query) => $query->where('name', 'like', '%'. $this->searchQuery .'%'))
            ->orderBy('name')
            ->paginate(10);

        return view('livewire.categories-list', [
            'categories' => $categories,
        ]);
    }

    public function updating($key): void
    {
        if ($key === 'searchQuery') {
            $this->resetPage();
        }
    }

    public function deleteCategory(int $categoryId): void
    {
        Category::where('id', $categoryId)->delete();
    }

}
