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
                    <li class="breadcrumb-item active text-gray-800" aria-current="page">Edit Page</li>
                </ol>
            </nav>
        </div>
        <div class="shadow-lg rounded-lg bg-white p-6">
            <form action="{{ route('update.page') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $page->id }}">
                <div class="space-y-6">
                    <div>
                        <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                        <div class="mt-2">
                            <input type="text" name="title" id="title" autocomplete="title"
                                value="{{ $page->title }}" required
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
                                <option disabled>Open this select menu</option>
                                <option value="draft" {{ isset($page) && $page->status == 'draft' ? 'selected' : '' }}>
                                    Draft
                                </option>
                                <option value="published"
                                    {{ isset($page) && $page->status == 'published' ? 'selected' : '' }}>
                                    Published</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label for="slug" class="block text-sm font-medium leading-6 text-gray-900">Slug</label>
                        <div class="mt-2">
                            <input type="text" name="slug" id="slug" autocomplete="slug"
                                value="{{ $page->slug }}" required
                                class="block w-full rounded-md border py-2 text-gray-900 shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                        @error('slug')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="color" class="block text-sm font-medium leading-6 text-gray-900">Color</label>
                        <div class="mt-2">
                            <input type="text" name="color" id="color" autocomplete="color"
                                value="{{ $page->color }}" required
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
                                class="block w-full rounded-md border py-2 text-gray-900 shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ $page->content }}</textarea>
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
                        <div id="featuredImagePreviewContainer" class="relative mt-2">
                            <div class="relative inline-block">
                                <img id="featuredImagePreview" src="{{ asset($page->featured_image) }}"
                                    alt="Featured Image Preview" class="rounded-md bg-gray-200 p-1" width="100"
                                    style="display:block;">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex items-center justify-end gap-x-2">
                    <a type="button" href="{{ route('all.page') }}"
                        class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">Cancel</a>
                    <button type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Update</button>
                </div>
            </form>
        </div>
    </div>

    {{-- <script type="text/javascript">
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
    </script> --}}
@endsection
