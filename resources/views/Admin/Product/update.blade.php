<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-stone-800 dark:text-stone-200 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-stone-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-between items-center p-6 bg-blue-100 dark:bg-stone-800">
                    <h1 class="text-2xl font-bold text-stone-800 dark:text-stone-100">Edit Product</h1>
                    <a href="{{ route('admin.products') }}" class="text-sm text-white bg-blue-700 hover:bg-blue-800 rounded-md px-3 py-2 shadow transition flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-1">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 9l-3 3m0 0 3 3m-3-3h7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        Go Back
                    </a>
                </div>
                <hr class="border-stone-300 dark:border-stone-700">
                <form action="{{ route('admin.products.update', $products->id) }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-stone-700 dark:text-stone-300">Product Name</label>
                            <input type="text" id="name" name="name" class="block w-full mt-1 text-sm border-stone-300 rounded-md shadow-sm focus:ring-blue-500
                            focus:border-blue-500 dark:bg-stone-700 dark:border-stone-600 dark:text-stone-300" placeholder="Name" value="{{ $products->name }}">
                            @error('name')
                                <span class="text-red-700">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="description" class="block text-sm font-medium text-stone-700 dark:text-stone-300">Description</label>
                            <textarea id="description" name="description" rows="3" class="block w-full mt-1 text-sm border-stone-300 rounded-md shadow-sm focus:ring-blue-500
                            focus:border-blue-500 dark:bg-stone-700 dark:border-stone-600 dark:text-stone-300" placeholder="Description">{{ $products->description }}</textarea>
                            @error('description')
                                <span class="text-red-700">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="ingredients" class="block text-sm font-medium text-stone-700 dark:text-stone-300">Ingredients</label>
                            <input type="text" id="ingredients" name="ingredients" class="block w-full mt-1 text-sm border-stone-300 rounded-md shadow-sm focus:ring-blue-500
                            focus:border-blue-500 dark:bg-stone-700 dark:border-stone-600 dark:text-stone-300" placeholder="Ingredients" value="{{ $products->ingredients }}">
                            @error('ingredients')
                                <span class="text-red-700">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="category_id" class="block text-sm font-medium text-stone-700 dark:text-stone-300">Category</label>
                            <select id="category_id" name="category_id" class="block w-full mt-1 text-sm border-stone-300 rounded-md shadow-sm focus:ring-blue-500
                            focus:border-blue-500 dark:bg-stone-700 dark:border-stone-600 dark:text-stone-300">
                                <option value="" disabled>Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $products->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="text-red-700">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="price" class="block text-sm font-medium text-stone-700 dark:text-stone-300">Price</label>
                            <input type="number" id="price" name="price" step="0.01" min="0" class="block w-full mt-1 text-sm border-stone-300 rounded-md shadow-sm focus:ring-blue-500
                            focus:border-blue-500 dark:bg-stone-700 dark:border-stone-600 dark:text-stone-300" placeholder="Price" value="{{ $products->price }}">
                            @error('price')
                                <span class="text-red-700">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="image" class="block text-sm font-medium text-stone-700 dark:text-stone-300">Product Image</label>
                            <input type="file" id="image" name="image" accept="image/*"
                                   class="block w-full mt-1 text-sm border-stone-300 rounded-md shadow-sm focus:ring-blue-500
                                   focus:border-blue-500 dark:bg-stone-700 dark:border-stone-600 dark:text-stone-300 form-input"
                                   onchange="previewImage(event)">
                            <div id="image-preview" class="mt-4">
                                @if ($products->image)
                                    <div>
                                        <span id="preview-label" class="text-sm text-stone-400">Current Image:</span>
                                        <img id="preview" class="w-32 h-32 object-cover rounded-md shadow-md" src="{{ asset('storage/' . $products->image) }}" alt="Current Image">
                                    </div>
                                @else
                                    <span id="preview-label" class="text-sm text-stone-400">No image selected</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end mt-6">
                        <button type="submit" class="px-6 py-2 text-white bg-blue-700 hover:bg-blue-800 rounded-md shadow transition focus:outline-none focus:ring focus:ring-blue-300">
                            Update Product
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('preview');
            const label = document.getElementById('preview-label');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = (e) => {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                    label.textContent = 'Image Preview:';
                };

                reader.readAsDataURL(input.files[0]);
            } else {
                preview.src = '';
                preview.classList.add('hidden');
                label.textContent = 'No image selected';
            }
        }
    </script>
</x-app-layout>
