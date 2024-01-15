<div class="space-y-6">
    <div class="flex justify-between">
        <div class="flex space-x-8 mt-3 px-3">
            <x-text-input wire:model.live="searchQuery" placeholder="Search..." />

            <x-select wire:model.live="searchCategory" name="category">
                <option value="0">-- Choose a category -- </option>
                @foreach($categories as $id => $category)
                    <option value="{{ $id }}">{{ $category }}</option>
                @endforeach
            </x-select>
        </div>
        <a wire:navigate href="{{ route('products.create') }}" class="inline-flex items-center mt-3 mr-3 px-4 py-2 bg-gray-800 rounded-md font-semibold text-xs text-white uppercase tracking-widest">
            Add new product
        </a>
    </div>

    <div class="text-red-600 px-3" wire:loading>Loading...</div>

    <div class="min-w-full align-middle" wire:loading.class="opacity-50">
        <table class="min-w-full divide-y divide-gray-200 border">
            <thead>
                <tr>
                    <th class="px-6 py-3 bg-gray-50 text-left">
                    </th>
                    <th class="px-6 py-3 bg-gray-50 text-left">
                        <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Name</span>
                    </th>
                    <th class="px-6 py-3 bg-gray-50 text-left">
                        <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Category</span>
                    </th>
                    <th class="px-6 py-3 bg-gray-50 text-left">
                        <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">In stock</span>
                    </th>
                    <th class="px-6 py-3 bg-gray-50 text-left">
                        <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Price</span>
                    </th>
                    <th class="px-6 py-3 bg-gray-50 text-left">
                    </th>
                </tr>
            </thead>

            <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                @forelse($products as $product)
                    <tr class="bg-white">
                        <td class="px-6 py-4">
                            @if($product->photo)
                                <img src="/storage/{{ $product->photo }}" class="w-20 h-20" />
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                            {{ $product->name }}
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                            @foreach($product->categories as $category)
                                <div>{{ $category->name }}</div>
                            @endforeach
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                            {{ $product->in_stock ? 'Yes' : 'No' }}
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                            {{ $product->price ? number_format($product->price, 2, ',', '.') . ' €' : 'N/A' }}
                        </td>
                        <td>
                            <a href="{{ route('products.edit', $product) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 rounded-md font-semibold text-xs text-white uppercase tracking-widest">
                                Edit
                            </a>
                            <a wire:click="deleteProduct({{ $product->id }})" onclick="return confirm('Are you sure?') || event.stopImmediatePropagation()" href="#" class="inline-flex items-center px-4 py-2 bg-red-600 rounded-md font-semibold text-xs text-white uppercase tracking-widest">
                                Delete
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="px-6 py-4 text-sm" colspan="3">
                            No products were found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="p-3">
        {{ $products->links() }}
    </div>

</div>
