<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Todos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-primary-link :target="route('todos.create')" class="mb-4">
                        {{ __('Add Todo') }}
                    </x-primary-link>

                    <div class="overflow-hidden overflow-x-auto mb-4 min-w-full align-middle sm:rounded-md">

                        @if($selected)
                            <livewire:todo-info :todo="$selected" />
                        @endif

                        <input type="text" wire:model.live="search" class="block mb-3 mt-2 w-full border-gray-300 rounded-md shadow-sm" />

                        @forelse($todos as $todo)
                            <div wire:click="select({{ $todo->id }})" @class(['bg-slate-100 mb-1 px-3 py-2 flex ', 'border border-slate-800 w-full' => $todo == $selected])>
                                <div class="mr-2">
                                    <input type="checkbox" />
                                </div>
                                <div class="w-4/5">
                                    {{ $todo->title }}
                                </div>
                                <div>
                                    {{ $todo->due_date->format('d/m/Y') }}
                                </div>
                            </div>
                        @empty
                            <div>
                                No todos found.
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
