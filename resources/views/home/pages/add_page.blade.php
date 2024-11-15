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
                    <li class="breadcrumb-item active text-gray-800" aria-current="page">Add Page</li>
                </ol>
            </nav>
        </div>
        <div class="shadow-lg rounded-lg bg-white p-6">
            <form action="{{ route('store.page') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-3 gap-x-6 gap-y-6">
                    <div>
                        <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                        <div class="mt-2">
                            <input type="text" name="title" id="title" autocomplete="title" required
                                class="block w-full rounded-md border py-2 text-gray-900 shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                        @error('title')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="status" class="block text-sm font-medium leading-6 text-gray-900">Status</label>
                        <div class="mt-2">
                            <select name="status" id="status"
                                class="block w-full rounded-md border py-2 text-gray-900 shadow-sm ring-1 ring-gray-300 focus:ring-2 focus:ring-indigo-600">
                                <option selected disabled>Open this select menu</option>
                                <option value="draft">Draft</option>
                                <option value="published">Published</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label for="color" class="block text-sm font-medium leading-6 text-gray-900">Color</label>
                        <div class="mt-2">
                            <input type="text" name="color" id="color" autocomplete="color" required
                                class="block w-full rounded-md border py-2 text-gray-900 shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                        @error('color')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="content" class="block text-sm font-medium leading-6 text-gray-900">Content</label>
                        <div class="mt-2">
                            <textarea id="content" name="content" rows="5" required
                                class="block w-full rounded-md border py-2 text-gray-900 shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                        </div>
                        @error('content')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="featured_image" class="block text-sm font-medium leading-6 text-gray-900">Featured
                            Image</label>
                        <div class="mt-2">
                            <input type="file" name="featured_image" id="featured_image"
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-600"
                                onchange="previewFeaturedImage(event)">
                        </div>
                        <div id="featuredImagePreviewContainer" class="relative mt-2" style="display:none;">
                            <div class="relative inline-block">
                                <img id="featuredImagePreview" src="" alt="Featured Image Preview"
                                    class="rounded-md bg-gray-200 p-1" width="100" style="display:none;">
                                <button class="absolute top-1 right-1 bg-red-500 text-white rounded-full p-1"
                                    onclick="removeFeaturedImage()">&#10006;</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <a type="button" href="{{ route('all.page') }}"
                        class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">Cancel</a>
                    <button type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
