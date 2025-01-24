<x-app-layout>
    <div class="sm:px-10 px-4 sm:py-8 py-5">
        <div class="max-w-5xl mx-auto p-6 bg-white dark:bg-stone-800 rounded-lg shadow-md">
            <h1 class="text-3xl font-bold mb-6 text-center dark:text-white text-stone-800">Shopping Cart</h1>

            @if ($cart && $cart->items->count())
                <!-- Desktop View -->
                <div class="max-h-128 overflow-auto hidden md:block rounded-lg mt-4">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="sticky top-0 bg-gray-200 dark:bg-gray-900 dark:text-gray-400 text-xs uppercase">
                            <tr>
                                <th class="px-4 py-3 text-left">Product</th>
                                <th class="px-4 py-3 text-center">Quantity</th>
                                <th class="px-4 py-3 text-right">Price</th>
                                <th class="px-4 py-3 text-right">Total</th>
                                <th class="px-4 py-3 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cart->items as $item)
                                <tr class="bg-white border-b dark:bg-stone-700 dark:text-white">
                                    <td class="py-3 px-4 flex items-center">
                                        <img src="{{ Storage::url($item->product->image) }}" alt="{{ $item->product->name }}" 
                                             class="w-16 h-16 object-cover rounded shadow-md mr-4">
                                        <span class="text-sm font-medium">{{ $item->product->name }}</span>
                                    </td>
                                    <td class="py-3 px-4 text-center">
                                        <input 
                                            type="number" 
                                            name="quantity" 
                                            value="{{ $item->quantity }}" 
                                            min="1" 
                                            max="{{ $item->product->quantity }}" 
                                            class="w-16 p-1 border dark:border-gray-500 dark:bg-stone-700 rounded-full text-center"
                                            x-data
                                            x-on:change="$dispatch('update-quantity', { id: '{{ $item->id }}', quantity: $event.target.value })">
                                    </td>
                                    <td class="py-3 px-4 text-right">Rs. {{ number_format($item->product->price, 2) }}</td>
                                    <td class="py-3 px-4 text-right">Rs. {{ number_format($item->product->price * $item->quantity, 2) }}</td>
                                    <td class="px-6 py-4 text-right">
                                        <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="px-3 py-2 bg-red-700 hover:bg-red-800 text-white rounded-md shadow transition duration-200">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Mobile View -->
                <div class="max-h-128 w-full overflow-auto block md:hidden">
                    @foreach ($cart->items as $item)
                        <div class="bg-white dark:bg-stone-700 text-black dark:text-white mb-4 p-4 rounded-lg shadow-md">
                            <div class="flex items-center mb-4">
                                <img src="{{ Storage::url($item->product->image) }}" alt="{{ $item->product->name }}" 
                                     class="w-16 h-16 object-cover rounded shadow-md mr-4">
                                <div>
                                    <h2 class="text-sm font-medium">{{ $item->product->name }}</h2>
                                    <p class="text-sm text-gray-500">Price: Rs. {{ number_format($item->product->price, 2) }}</p>
                                </div>
                            </div>
                            <div class="flex justify-between items-center">
                                <input 
                                    type="number" 
                                    name="quantity" 
                                    value="{{ $item->quantity }}" 
                                    min="1" 
                                    max="{{ $item->product->quantity }}" 
                                    class="w-16 p-1 border dark:border-gray-500 dark:bg-stone-700 rounded-full text-center"
                                    x-data
                                    x-on:change="$dispatch('update-quantity', { id: '{{ $item->id }}', quantity: $event.target.value })">
                                <p class="text-sm">Total: Rs. {{ number_format($item->product->price * $item->quantity, 2) }}</p>
                                <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="px-3 py-2 bg-red-700 hover:bg-red-800 text-white rounded-md shadow transition duration-200">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="size-5">
                                                <path strokeLinecap="round" strokeLinejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Checkout Section -->
                <div class="mt-6 flex justify-between items-center">
                    <span class="text-lg font-semibold dark:text-white">
                        Total: Rs. {{ number_format($cart->items->sum(fn($item) => $item->product->price * $item->quantity), 2) }}
                    </span>
                    <form action="{{ route('cart.stripeCheckout') }}" method="POST">
                        @csrf
                        <button type="submit" 
                                class="px-6 py-2 bg-blue-600 hover:bg-blue-500 text-white font-semibold rounded-md">
                            Proceed to Checkout
                        </button>
                    </form>
                </div>
            @else
                <p class="text-center text-gray-500">Your cart is empty.</p>
            @endif
        </div>
    </div>
</x-app-layout>
