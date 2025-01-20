<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-stone-800 overflow-hidden shadow-lg sm:rounded-lg">
                <div class="flex items-center justify-between p-6 text-gray-900 dark:text-gray-100 border-b border-gray-200 dark:border-gray-700">
                    <h1 class="text-2xl font-semibold">Category List</h1>
                    <x-custom-button-1 href="{{ route('admin.categories.create') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 mr-1">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        Add Category
                    </x-custom-button-1>
                </div>
                <div class="p-4 space-y-4">
                    @if($categories->isEmpty())
                        <div class="text-center text-gray-600 dark:text-gray-300 py-6">
                            <p class="text-lg font-semibold">No categories found</p>
                            <p class="text-sm">Start by adding new categories to the list.</p>
                        </div>
                    @else
                        <div class="max-h-128 overflow-auto sm:rounded-lg mt-4">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="sticky top-0 text-xs text-gray-700 uppercase shadow-md dark:shadow-stone-800
                                bg-gray-200 dark:bg-gray-900 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">#</th>
                                        <th scope="col" class="px-6 py-3">Image</th>
                                        <th scope="col" class="px-6 py-3">Name</th>
                                        <th colspan="2" class="px-6 py-3">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr class="bg-white border-b dark:bg-stone-700 hover:bg-gray-100 dark:hover:bg-stone-600">
                                            <td class="px-6 py-4">{{ $loop->iteration }}</td>
                                            <td class="px-6 py-4">
                                                <img src="{{ Storage::url($category->image) }}" alt="{{ $category->name }}"
                                                    class="w-20 h-20 object-cover rounded shadow-md">
                                            </td>
                                            <td class="px-6 py-4 font-medium text-gray-900 dark:text-gray-100">
                                                {{ $category->name }}
                                            </td>
                                            <td class="px-6 py-4 flex">
                                                <div class="flex mt-6 space-x-4">
                                                    <a href="{{ route('admin.categories.edit', ['id'=>$category->id]) }}" class="px-3 py-2 text-white bg-blue-700 hover:bg-blue-800 rounded-md shadow transition duration-200">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                        </svg>
                                                    </a>
                                                    <button @click="showDeleteModal = true" class="px-3 py-2 text-white bg-red-700 hover:bg-red-800 rounded-md shadow transition duration-200">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                        </svg>
                                                    </button>
                                                    <!-- Delete Confirmation Modal -->
                                                    <div
                                                        x-show="showDeleteModal"
                                                        x-cloak
                                                        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50"
                                                        style="top: 0; left: 0; right: 0; bottom: 0; margin: 0;">
                                                        <div class="bg-white rounded-lg p-6 shadow-lg w-96">
                                                            <h2 class="text-xl font-semibold text-gray-800">Confirm Delete</h2>
                                                            <p class="text-sm text-gray-600 mt-4">Are you sure you want to delete this category? This action cannot be undone.</p>
                                                            <div class="flex justify-end mt-6">
                                                                <button
                                                                    @click="showDeleteModal = false"
                                                                    class="px-4 py-2 text-sm bg-gray-300 hover:bg-gray-500 text-gray-700 hover:text-white rounded-md mr-2 transition duration-400">
                                                                    Cancel
                                                                </button>
                                                                <form action="{{ route('admin.categories.delete', ['id' => $category->id]) }}">
                                                                    <button
                                                                        type="submit"
                                                                        class="px-4 py-2 text-sm bg-red-600 hover:bg-red-800 transition duration-400 text-white rounded-md">
                                                                        Delete
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Modal -->
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
