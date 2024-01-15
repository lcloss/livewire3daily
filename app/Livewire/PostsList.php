<?php

namespace App\Livewire;

use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Post;

class PostsList extends Component
{
    use WithPagination;

    #[Url]
    public $search = '';

    public function render()
    {
        // $posts = Post::where('title', 'LIKE', '%' . $this->search . '%')->paginate(10);
        // $posts = Post::where('title', 'LIKE', '%' . $this->search . '%')->get();
        $posts = Post::search($this->search)->get();

        return view('livewire.posts-list', ['posts' => $posts]);
    }
}
