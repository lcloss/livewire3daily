<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    return redirect('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('posts', App\Livewire\PostsList::class)->name('posts.index'); // Full Page component
    Route::get('posts/create', App\Livewire\CreatePost::class)->name('posts.create'); // Full Page component
    Route::get('posts/{post}/edit', App\Livewire\EditPost::class)->name('posts.edit'); // Full Page component
    Route::get('posts/{post}', App\Livewire\ViewPost::class)->name('posts.show'); // Full Page component

    Route::get('todos', App\Livewire\TodosList::class)->name('todos.index'); // Full Page component
    Route::get('todos/create', App\Livewire\CreateTodo::class)->name('todos.create'); // Full Page component

    Route::get('products', [\App\Http\Controllers\ProductController::class, 'index'])->name('products.index');
    Route::get('products/create', \App\Livewire\CreateProduct::class)->name('products.create');
    Route::get('products/{product}/edit', \App\Livewire\EditProduct::class)->name('products.edit');

    Route::get('categories', \App\Livewire\CategoriesList::class)->name('categories.index');
    Route::get('categories/create', \App\Livewire\CreateCategory::class)->name('categories.create');
    Route::get('categories/{category}/edit', \App\Livewire\EditCategory::class)->name('categories.edit');

    Route::get('countries', \App\Livewire\CountryCityDropdown::class)->name('countries.index');

    Route::get('basket', \App\Livewire\ClientBasketParentChild::class)->name('basket.index');

    Route::get('dog', \App\Livewire\DogAutoRefresh::class)->name('dog.index');
});

require __DIR__.'/auth.php';
