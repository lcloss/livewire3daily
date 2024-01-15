<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create a Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if($success)
                        <span class="block mb-4 text-green-500">{{ __('Category saved successfully.') }}</span>
                    @endif

                    @include('livewire.partials.category-form')

                </div>
            </div>
        </div>
    </div>
</div>

