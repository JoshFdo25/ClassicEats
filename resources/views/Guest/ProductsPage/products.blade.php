<x-app-layout>
    <div class="flex fixed w-full z-50 p-2 items-center justify-center">
        <livewire:product-search>
    </div>

    <div class="container mx-auto pt-20 p-6">
        @forelse ($categories as $category)
            <section class="mb-10">
                <header>
                    <h2 class="text-xl font-semibold text-blue-600 mb-4">{{ $category->name }}</h2>
                </header>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                    @forelse ($category->products as $product)
                        <article class="block border border-gray-200 dark:border-gray-700 bg-white dark:bg-stone-800 
                                        rounded-lg shadow-md hover:shadow-lg dark:shadow-md hover:dark:shadow-lg 
                                        transition-shadow group">
                            <a href="{{ route('products.show', $product->id) }}" class="focus:outline-none">
                                <div class="overflow-hidden rounded-t-lg">
                                    <img 
                                        src="{{ asset('storage/' . $product->image) }}" 
                                        alt="Image of {{ $product->name }}" 
                                        class="w-full h-40 object-cover transition-transform group-hover:scale-105">
                                </div>
                                <div class="p-4">
                                    <h3 class="text-lg font-bold text-gray-900 dark:text-gray-100">{{ $product->name }}</h3>
                                    <p class="text-gray-600 dark:text-gray-300">{{ Str::limit($product->description, 50) }}</p>
                                    <p class="mt-2 text-gray-800 dark:text-gray-200">
                                        <strong>Price:</strong> Rs. {{ number_format($product->price, 2) }}
                                    </p>
                                    <!-- Availability Badge -->
                                    <span class="text-sm 
                                        {{ $product->status ? 'text-green-500' : 'text-red-500' }} 
                                        font-semibold">
                                        {{ $product->status ? 'Available' : 'Not available' }}
                                    </span>
                                </div>
                            </a>
                        </article>
                    @empty
                        <p class="text-gray-500 dark:text-gray-400 col-span-full">No products available in this category.</p>
                    @endforelse
                </div>
            </section>
        @empty
            <p class="text-center text-gray-500 dark:text-gray-400">No categories or products found.</p>
        @endforelse
    </div>
</x-app-layout>
