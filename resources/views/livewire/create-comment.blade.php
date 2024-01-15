<div class="mt-4">
    <form method="POST" wire:submit="save">
        <div>
            <label for="body" class="block font-medium text-sm text-gray-700">{{ __('Comment') }}</label>
            <textarea id="body" wire:model="body" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm"></textarea>
            @error('body')
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
