<?php

namespace App\Livewire;

use Illuminate\Support\Collection;
use Livewire\Component;
use App\Models\Country;
use App\Models\City;

class CountryCityDropdown extends Component
{
    public Collection $countries;
    public Collection $cities;

    public int $country;
    public int $city;

    public function mount()
    {
        $this->countries = Country::orderBy('name')->pluck('name', 'id');
        $this->cities = collect();
    }

    public function render()
    {
        return view('livewire.country-city-dropdown');
    }

    public function updatedCountry($value): void
    {
        $this->cities = City::where('country_id', $value)->orderBy('name')->get();
        $this->city = $this->cities->first()->id;
    }
}
