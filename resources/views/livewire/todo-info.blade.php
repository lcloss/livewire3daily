<div class="mt-3 mb-3">
    <div><span class="text-gray-500">Title:</span> {{ $todo->title }}</div>
    <div><span class="text-gray-500">Description:</span> {{ $todo->description ?? '' }}</div>
    <div><span class="text-gray-500">Due at:</span> {{ $todo->due_date->format('d/m/Y') }}</div>
    <div><span class="text-gray-500">Importance:</span> {{ $todo->importance }}</div>
    <div><span class="text-gray-500">Completed:</span> {{ $todo->is_completed ? __('Yes') : __('No') }}</div>
    <button wire:click="$parent.deselect()" class="mt-2 px-4 py-2 bg-gray-800 rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
        Deselect
    </button>
</div>
