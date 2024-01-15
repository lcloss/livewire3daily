<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Todo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if($success)
                        <span class="block mb-4 text-green-500">{{ __('Todo saved successfully.') }}</span>
                    @endif

                    <form method="POST" wire:submit="save">
                        <div>
                            <label for="title" class="block font-medium text-sm text-gray-700">{{ __('Title') }}</label>
                            <input id="title" wire:model="form.title" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" type="text" />
                            @error('form.title')
                                <span class="mt-2 text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label for="description" class="block font-medium text-sm text-gray-700">{{ __('Body') }}</label>
                            <textarea id="description" wire:model="form.description" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" rows="5"></textarea>
                            @error('form.description')
                                <span class="mt-2 text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label for="description" class="block font-medium text-sm text-gray-700">{{ __('Due date') }}</label>
                            <x-text-input type="date" id="date" wire:model="form.due_date" />
                            @error('form.due_date')
                                <span class="mt-2 text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <x-secondary-link :target="route('todos.index')" class="mb-4">
                            {{ __('Back') }}
                        </x-seconda-link>

                        <button class="mt-4 px-4 py-2 bg-gray-800 rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                            {{ __('Save') }}
                        </button>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

