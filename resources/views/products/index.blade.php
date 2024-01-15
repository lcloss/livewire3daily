<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
{{--                <div class="p-6 bg-white border-b border-gray-200">--}}
{{--                    <x-primary-link :target="route('products.create')" class="mb-4">--}}
{{--                        {{ __('Add Product') }}--}}
{{--                    </x-primary-link>--}}

{{--                    <input type="text" wire:model.live="search" class="block mb-3 mt-2 w-full border-gray-300 rounded-md shadow-sm" />--}}


{{--                    <div class="overflow-hidden overflow-x-auto mb-4 min-w-full align-middle sm:rounded-md">--}}
                <livewire:products-list />
            </div>
        </div>
    </div>
</x-app-layout>
