<div class="relative w-full max-w-lg mx-auto">
    <!-- Search Input -->
    <input 
        id="auto_search"
        type="text" 
        wire:model.live="search" 
        placeholder="Search for products..." 
        class="block w-full px-5 py-2.5 text-base backdrop-blur-md bg-white/40 dark:bg-gray-800/40 text-gray-800 bg-gray-100 border border-gray-300 rounded-full shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 dark:bg-stone-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400"
    />

    <!-- Autocomplete Dropdown -->
    @if(!empty($products))
        <ul class="absolute w-full mt-3 border border-gray-200 rounded-2xl shadow-xl backdrop-blur-md bg-white/40 dark:bg-gray-800/40 dark:border-gray-700 overflow-hidden animate-fade-in">
            @foreach ($products as $product)
                <li>
                    <a 
                        href="{{ route('products.show', $product->id) }}" 
                        class="flex items-center px-5 py-3 text-base text-gray-800 transition-all duration-150 ease-in-out hover:bg-blue-100 hover:text-blue-600 dark:text-gray-300 dark:hover:bg-gray-700 dark:hover:text-white"
                    >
                        {{ $product->name }}
                        <span class="ml-3 text-xs text-gray-900 dark:text-gray-400">
                            Rs. {{ number_format($product->price, 2) }}
                        </span>
                        <span class="text-sm ml-3
                            {{ $product->status ? 'text-green-500' : 'text-red-500' }} 
                            font-semibold">
                            {{ $product->status ? 'Available' : 'Not available' }}
                        </span>
                    </a>
                </li>
            @endforeach
        </ul>
    @endif
</div>
