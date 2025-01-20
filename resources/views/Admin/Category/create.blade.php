<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-stone-800 dark:text-stone-200 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-stone-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-between items-center p-6 bg-white dark:bg-stone-800">
                    <h1 class="text-2xl font-bold text-stone-800 dark:text-stone-100">Add Categories</h1>
                    <x-custom-button-1 href="{{ route('admin.categories') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-1">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 9-3 3m0 0 3 3m-3-3h7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        Go Back
                    </x-custom-button-1>
                </div>
                <hr class="border-stone-300 dark:border-stone-700">

                <form action="{{ route('admin.categories.save') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
                    @csrf

                    <div>
                        <label for="name" class="block text-sm font-medium text-stone-700 dark:text-stone-300">
                            Name
                        </label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}"
                               class="mt-1 block w-full text-sm border-stone-300 rounded-md shadow-sm
                                      focus:ring-blue-500 focus:border-blue-500 dark:bg-stone-700
                                      dark:border-stone-600 dark:text-stone-300">
                        @error('name')
                            <span class="text-red-700">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="image" class="block text-sm font-medium text-stone-700 dark:text-stone-300">
                            Category Image
                        </label>
                        <input type="file" id="image" name="image" accept="image/*"
                               class="mt-1 block w-full text-sm border-stone-300 rounded-md shadow-sm
                                      focus:ring-blue-500 focus:border-blue-500 dark:bg-stone-700
                                      dark:border-stone-600 dark:text-stone-300 form-input"
                               onchange="previewImage(event)">
                        <div id="image-preview" class="mt-4">
                            <span id="preview-label" class="text-sm text-stone-400">No image selected</span>
                            <img id="preview" class="w-32 h-32 object-cover rounded-md shadow-md hidden mt-2" alt="Image Preview">
                        </div>
                        @error('image')
                            <span class="text-red-700">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex justify-end mt-6">
                        <button type="submit" class="px-6 py-2 text-white bg-[#003199] hover:bg-[#001979] rounded-md shadow transition focus:outline-none focus:ring-2 focus:ring-blue-300">
                            Submit
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
