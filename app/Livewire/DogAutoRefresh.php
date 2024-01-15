<?php

namespace App\Livewire;

use Livewire\Component;

class DogAutoRefresh extends Component
{
    public function render()
    {
        $dog = file_get_contents('https://random.dog/woof.json');
        $image = json_decode($dog, true)['url'];

        return view('livewire.dog-auto-refresh', compact('image'));
    }
}
