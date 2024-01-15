<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Country and City Dropdown') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" wire:submit="save">
                        <div>
                            <label for="country">Country</label>
                            <select wire:model.live="country" id="country" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">
                                <option value="0">-- choose country --</option>
                                @foreach($countries as $id => $countryItem)
                                    <option value="{{ $id }}">{{ $countryItem }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-4">
                            <label for="city">City</label>
                            <select wire:model="city" id="city" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">
                                @if ($cities->count() == 0)
                                    <option value="">-- choose country first --</option>
                                @else
                                    <option value="">-- select a city from {{ $countries[$country] }} --</option>
                                @endif
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button class="mt-4 px-4 py-2 bg-gray-800 rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                            Save
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
