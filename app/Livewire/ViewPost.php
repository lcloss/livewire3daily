<?php

namespace App\Livewire;

use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Post;
class ViewPost extends Component
{
    public Post $post;

    public int $commentsCount = 0;

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->post->loadCount('comments'); // Eager load comments count
        $this->commentsCount = $this->post->comments_count;
    }

    public function render()
    {

        return view('livewire.view-post')->title( __('View Post') );
    }

    #[Computed]
    public function comments()
    {
        return $this->post->comments()->get();
    }

    #[On('comment-added')]
    public function commentAdded(): void
    {
        $this->commentsCount++;
    }
}
