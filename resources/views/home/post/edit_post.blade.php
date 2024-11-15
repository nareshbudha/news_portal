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
                    <li class="breadcrumb-item active text-gray-800" aria-current="page">Edit Post</li>
                </ol>
            </nav>
        </div>
        <div class="shadow-lg rounded-lg bg-white p-6">
            <form action="{{ route('update.post') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $post->id }}">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-x-6 gap-y-6">
                    <div>
                        <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                        <div class="mt-2">
                            <input type="text" name="title" id="title" autocomplete="title"
                                value="{{ $post->title }}" required
                                class="block w-full rounded-md border py-2 text-gray-900 shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                        @error('title')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Slug</label>
                        <div class="mt-2">
                            <input type="text" name="slug" id="slug" autocomplete="slug"
                                value="{{ $post->slug }}" required
                                class="block w-full rounded-md border py-2 text-gray-900 shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                        @error('slug')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="author" class="block text-sm font-medium leading-6 text-gray-900">Author Name</label>
                        <div class="mt-2">
                            <select name="author_id" id="author_id"
                                class="block w-full rounded-md border py-2 text-gray-900 shadow-sm ring-1 ring-gray-300 focus:ring-2 focus:ring-indigo-600">
                                <option selected disabled>Open this select menu</option>
                                @foreach ($authors as $auth)
                                    <option value="{{ $auth->id }}"
                                        {{ $auth->id == $post->author_id ? 'selected' : '' }}>
                                        {{ $auth->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div>
                        <label for="post_category_id" class="block text-sm font-medium leading-6 text-gray-900">Post
                            Category</label>
                        <div class="mt-2">
                            <select name="post_category_id" id="post_category_id"
                                class="block w-full rounded-md border py-2 text-gray-900 shadow-sm ring-1 ring-gray-300 focus:ring-2 focus:ring-indigo-600">
                                <option selected disabled>Open this select menu</option>
                                @foreach ($post_category as $pc)
                                    <option value="{{ $pc->id }}"
                                        {{ $pc->id = $post->post_category_id ? 'selected' : '' }}>{{ $pc->name }}
                                    </option>
                                @endforeach

                            </select>
                        </div>
                    </div>

                    <div>
                        <label for="status" class="block text-sm font-medium leading-6 text-gray-900">Status</label>
                        <div class="mt-2">
                            <select name="status" id="status"
                                class="block w-full rounded-md border py-2 text-gray-900 shadow-sm ring-1 ring-gray-300 focus:ring-2 focus:ring-indigo-600">
                                <option disabled>Open this select menu</option>
                                <option value="draft" {{ isset($post) && $post->status == 'draft' ? 'selected' : '' }}>
                                    Draft
                                </option>
                                <option value="published"
                                    {{ isset($post) && $post->status == 'published' ? 'selected' : '' }}>
                                    Published</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label for="is_featured" class="block text-sm font-medium leading-6 text-gray-900">
                            Is Featured
                        </label>
                        <div class="mt-2 flex items-center space-x-2">
                            <input type="hidden" name="is_featured" value="0">
                            <input type="checkbox" name="is_featured" id="is_featured" value="1"
                                autocomplete="is_featured" class="h-4 w-4 border-gray-300 rounded"
                                {{ $post->is_featured == 1 ? 'checked' : '' }}>
                            <span class="text-sm text-gray-900">Mark as featured</span>
                        </div>
                    </div>
                    <div>
                        <label for="content" class="block text-sm font-medium leading-6 text-gray-900">Content</label>
                        <div class="mt-2">
                            <textarea id="content" name="content" rows="5" required
                                class="block w-full rounded-md border py-2 text-gray-900 shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ $post->content }}</textarea>
                        </div>
                        @error('content')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="summary" class="block text-sm font-medium leading-6 text-gray-900">Summary</label>
                        <div class="mt-2">
                            <textarea id="summary" name="summary" rows="5" required
                                class="block w-full rounded-md border py-2 text-gray-900 shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ $post->summary }}</textarea>
                        </div>
                        @error('summary')
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
                        <div id="featuredImagePreviewContainer" class="relative mt-2" style="display:block;">
                            <div class="relative inline-block">
                                <img id="featuredImagePreview" src="{{ asset($post->featured_image) }}"
                                    alt="Featured Image Preview" class="rounded-md bg-gray-200 p-1" width="100"
                                    style="display:block;">
                                {{-- <button class="absolute top-1 right-1 bg-red-500 text-white rounded-full p-1"
                                    onclick="removeFeaturedImage()">&#10006;</button> --}}
                            </div>
                        </div>
                    </div>

                    <div>
                        <label for="images" class="block text-sm font-medium leading-6 text-gray-900">Images</label>
                        <div class="mt-2">
                            <input type="file" name="images[]" id="images" multiple
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-600"
                                onchange="previewImages(event)">
                        </div>
                        <div id="imagePreviewContainer" class="flex mt-2 space-x-4 overflow-x-auto">
                            @if (isset($post) && $post->images)
                                @php
                                    $images = json_decode($post->images, true);
                                @endphp
                                @foreach ($images as $image)
                                    <div class="relative inline-block">
                                        <img src="{{ asset($image) }}" alt="Image Preview"
                                            class="rounded-md bg-gray-200 p-1" width="100">
                                    </div>
                                @endforeach
                            @else
                                <p>No images uploaded.</p>
                            @endif
                        </div>
                    </div>


                </div>
                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <a type="button" href="{{ route('all.post') }}"
                        class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">Cancel</a>
                    <button type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
