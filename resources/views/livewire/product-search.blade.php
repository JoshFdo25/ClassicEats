<div class="relative w-full max-w-lg mx-auto">
    <div class="relative">
        <input 
            id="auto_search"
            type="text" 
            wire:model.live="search" 
            placeholder="Search for products..." 
            class="block w-full px-5 py-2.5 text-base backdrop-blur-md dark:backdrop-blur-md bg-white/40 dark:bg-gray-800/40 text-gray-800 bg-gray-100 border border-gray-300 rounded-full shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 dark:border-gray-600 dark:text-white dark:placeholder-gray-400"
        />

        @if($search)
            <button 
                type="button" 
                wire:click="$set('search', '')" 
                class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200"
                aria-label="Clear search"
            >
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            </button>
        @endif
    </div>

    @if($search)
        @if(count($products))
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
                            <span class="text-sm ml-3 font-semibold {{ $product->status ? 'text-green-500' : 'text-red-500' }}">
                                {{ $product->status ? 'Available' : 'Not available' }}
                            </span>
                        </a>
                    </li>
                @endforeach
            </ul>
        @else
            <ul class="absolute w-full mt-3 border border-gray-200 rounded-2xl shadow-xl backdrop-blur-md bg-white/40 dark:bg-gray-800/40 dark:border-gray-700 overflow-hidden animate-fade-in">
                <li class="px-5 py-3 text-base text-gray-600 dark:text-gray-300">
                    No products found.
                </li>
            </ul>
        @endif
    @endif
</div>
