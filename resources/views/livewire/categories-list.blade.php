<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="space-y-6">
                    <div class="flex justify-between">
                        <div class="flex space-x-8 mt-3 px-3">
                            <x-text-input wire:model.live="searchQuery" placeholder="Search..." />
                        </div>
                        <x-primary-link wire:navigate :target="route('categories.create')" class="mt-3 mr-3">
                            {{ __('Add new category') }}
                        </x-primary-link>
                    </div>

                    <div class="text-red-600 px-3" wire:loading>{{ __('Loading...') }}</div>

                    <div class="min-w-full align-middle" wire:loading.class="opacity-50">
                        <table class="min-w-full divide-y divide-gray-200 border">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 bg-gray-50 text-left">
                                        <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Name</span>
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 text-left">
                                        <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"># Products</span>
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 text-left">
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                                @forelse($categories as $category)
                                    <tr class="bg-white">
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                            {{ $category->name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                            {{ $category->products->count() }}
                                        </td>
                                        <td>
                                            <a href="{{ route('categories.edit', $category) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 rounded-md font-semibold text-xs text-white uppercase tracking-widest">
                                                {{ __('Edit') }}
                                            </a>
                                            <a wire:click="deleteCategory({{ $category->id }})" onclick="return confirm('Are you sure?') || event.stopImmediatePropagation()" href="#" class="inline-flex items-center px-4 py-2 bg-red-600 rounded-md font-semibold text-xs text-white uppercase tracking-widest">
                                                {{ __('Delete') }}
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="px-6 py-4 text-sm" colspan="3">
                                            {{ __('No categories found.') }}
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="p-3">
                        {{ $categories->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>


