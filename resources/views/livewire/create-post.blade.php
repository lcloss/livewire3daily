<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if($success)
                        <span class="block mb-4 text-green-500">{{ __('Post saved successfully.') }}</span>
                    @endif

                    <form method="POST" wire:submit="save">
                        <div>
                            <label for="title" class="block font-medium text-sm text-gray-700">{{ __('Title') }}</label>
                            <input id="title" wire:model.blur="form.title" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" type="text" />
                            @error('form.title')
                                <span class="mt-2 text-sm text-red-600">{{ $message }}</span>
                            @enderror
                            <button type="button" wire:click="validateTitle" class="block mt-4 px-4 py-2 bg-gray-800 rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                                {{ __('Validate Title') }}
                            </button>
                        </div>

                        <div class="mt-4">
                            <label for="body" class="block font-medium text-sm text-gray-700">{{ __('Body') }}</label>
                            <textarea id="body" wire:model.blur="form.body" wire:keydown="validateBody" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" rows="5"></textarea>
                            @error('form.body')
                                <span class="mt-2 text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <x-secondary-link :target="route('posts.index')" class="mb-4">
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

