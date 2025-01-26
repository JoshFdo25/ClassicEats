<div class="relative w-full max-w-lg mx-auto">
    <!-- Search Input -->
    <input 
        id="auto_search"
        type="text" 
        wire:model.live="search" 
        placeholder="Search for products..." 
        class="block w-full px-4 py-3 text-sm text-gray-800 bg-gray-100 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:text-white dark:placeholder-gray-400"
    />

    <!-- Autocomplete Dropdown -->
    @if(!empty($products))
        <ul class="absolute w-full mt-2 bg-white border border-gray-300 divide-y divide-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-600">
            @foreach ($products as $product)
                <li>
                    <a 
                        href="{{ route('products.show', $product->id) }}" 
                        class="block px-4 py-2 text-sm text-gray-800 hover:bg-blue-50 hover:text-blue-600 dark:text-gray-300 dark:hover:bg-gray-700 dark:hover:text-white transition duration-150 ease-in-out"
                    >
                        {{ $product->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    @endif
</div>
