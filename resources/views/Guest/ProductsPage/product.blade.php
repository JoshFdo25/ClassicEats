<x-app-layout>
    <div class="container mx-auto p-6">
        <div class="max-w-5xl mx-auto bg-white dark:bg-stone-800 shadow-lg rounded-lg overflow-hidden">
            <div class="flex flex-col md:flex-row">
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full md:w-1/2 object-cover">
                <div class="p-6 md:w-1/2 text-black dark:text-white">
                    <div class="flex justify-between items-center">
                        <h1 class="text-black dark:text-white text-3xl font-bold">{{ $product->name }}</h1>
                        <div>
                            <a href="{{ route('products.index') }}" class="flex text-white bg-[#003199] hover:bg-[#001979] p-1 rounded-full items-center justify-center group transition-all duration-500">
                                <div class="rounded-full overflow-hidden bg-transparent flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-7">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 9-3 3m0 0 3 3m-3-3h7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                </div>
                                <span class="hidden group-hover:inline-block text-white pr-4 transition-opacity duration-300 opacity-0 group-hover:opacity-100 transform group-hover:translate-x-2">
                                    Back to Products
                                </span>
                            </a>
                        </div>
                    </div>
                    <p class="text-gray-400 mb-4">{{ $product->description }}</p>
                    <p class="mb-2"><strong>Ingredients:</strong> {{ $product->ingredients }}</p>
                    <p class="mb-2"><strong>Category:</strong> {{ $product->category->name }}</p>
                    <p class="mb-2"><strong>Price:</strong> Rs. {{ number_format($product->price, 2) }}</p>
                    <!-- Availability Badge -->
                    <span class="text-sm 
                        {{ $product->status ? 'text-green-500' : 'text-red-500' }} 
                        font-semibold">
                        {{ $product->status ? 'Available' : 'Not available' }}
                    </span>
                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                        @csrf
                        <!-- Disable button if out of stock -->
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded 
                            {{ $product->status > 0 ? '' : 'cursor-not-allowed opacity-50' }}" 
                            {{ $product->status < 1 ? 'disabled' : '' }}>
                            Add to Cart
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
