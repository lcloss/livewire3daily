<form method="POST" wire:submit="save">
    <div>
        <label for="name" class="block font-medium text-sm text-gray-700">Name</label>
        <input id="name" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" type="text" wire:model="form.name" />
        @error('form.name')
            <span class="mt-2 text-sm text-red-600">{{ $message }}</span>
        @enderror
    </div>

    <x-secondary-link :target="route('categories.index')" class="mb-4">
        {{ __('Back') }}
    </x-seconda-link>

    <button class="mt-4 px-4 py-2 bg-gray-800 rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
        {{ __('Save') }}
    </button>
</form>

