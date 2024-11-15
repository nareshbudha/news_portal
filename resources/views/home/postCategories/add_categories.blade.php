@extends('dashboard')

@section('content')
    <div class="page-content mx-4">
        <div class="flex items-center mb-3">
            <nav aria-label="breadcrumb">
                <ol class="flex space-x-2 mb-0 p-0">
                    <li class="breadcrumb-item">
                        <a href="javascript:;" class="text-gray-600 hover:text-blue-500">
                            <i class="bx bx-home-alt"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item active text-gray-800" aria-current="page">Add Post Categories</li>
                </ol>
            </nav>
        </div>
        <div class="shadow-lg rounded-lg bg-white p-6">
            <form action="{{ route('store.postcategory') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="space-y-6">
                    <div>
                        <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                        <div class="mt-2">
                            <input type="text" name="name" id="name" autocomplete="name" required
                                class="block w-full rounded-md border py-2 text-gray-900 shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                        @error('name')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="post_category_id" class="block text-sm font-medium leading-6 text-gray-900">Parent
                            Category</label>
                        <div class="mt-2">
                            <select name="post_category_id" id="post_category_id"
                                class="block w-full rounded-md border py-2 text-gray-900 shadow-sm ring-1 ring-gray-300 focus:ring-2 focus:ring-indigo-600">
                                <option selected disabled>Open this select menu</option>
                                @foreach ($postCategories as $category)
                                    @if (is_null($category->post_category_id))
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @foreach ($postCategories as $subCategory)
                                            @if ($subCategory->post_category_id == $category->id)
                                                <option value="{{ $subCategory->id }}">
                                                    &nbsp;&nbsp;&nbsp;{{ $subCategory->name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div>
                        <label for="status" class="block text-sm font-medium leading-6 text-gray-900">Status</label>
                        <div class="mt-2">
                            <select name="status" id="status"
                                class="block w-full rounded-md border py-2 text-gray-900 shadow-sm ring-1 ring-gray-300 focus:ring-2 focus:ring-indigo-600">
                                <option selected disabled>Open this select menu</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label for="description"
                            class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                        <div class="mt-2">
                            <textarea id="description" name="description" rows="5" required
                                class="block w-full rounded-md border py-2 text-gray-900 shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                        </div>
                        @error('description')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="image" class="block text-sm font-medium leading-6 text-gray-900">Image</label>
                        <div class="mt-2 flex items-center space-x-4">
                            <div class="w-full max-w-xs">
                                <input type="file" name="image" id="image"
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-600">
                            </div>
                            <div class="flex-shrink-0">
                                <img id="showImage" src="" alt="Image Preview" class="rounded-full bg-gray-200 p-1"
                                    width="100" style="display:none;">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <a type="button" href="{{ route('all.postcategory') }}"
                        class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">Cancel</a>
                    <button type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Save</button>
                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('image').addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(event) {
                        const img = document.getElementById('showImage');
                        img.src = event.target.result;
                        img.style.display = 'block';
                    }
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
@endsection
