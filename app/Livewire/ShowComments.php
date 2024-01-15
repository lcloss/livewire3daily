<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Collection;

class ShowComments extends Component
{
    public Collection $comments;

    public function mount(Post $post): void
    {
        $this->comments = $post->comments;
    }

    public function render()
    {
        return view('livewire.show-comments');
    }

    public function placeholder(): string
    {
        return <<<'HTML'
            <div>
                Loading...
            </div>
        HTML;
    }
}
