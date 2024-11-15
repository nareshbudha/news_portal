@extends('dashboard')
@section('content')
    <div class="page-content mx-4">
        <div class="bg-white rounded shadow-md">
            <div class="p-6">
                <h5 class="text-xl font-semibold mb-4">Add Advertisement</h5>
                <form id="myForm" action="{{ route('update.advertisement') }}" method="POST" class="grid gap-4"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $ad->id }}">
                    <div class="col-span-6 sm:col-span-3">
                        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                        <input type="text" name="title" value="{{ $ad->title }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                            id="title">
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <span class="text-red-600 text-sm">{{ $message }}</span> </span>
                        @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="link" class="block text-sm font-medium text-gray-700">Link</label>
                        <input type="text" name="link" value="{{ $ad->link }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                            id="link">
                        @error('link')
                            <span class="invalid-feedback" role="alert">
                                <span class="text-red-600 text-sm">{{ $message }}</span> </span>
                        @enderror
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="position" class="block text-sm font-medium text-gray-700">Position</label>
                        <input type="number" name="position" value="{{ $ad->position }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                            id="position">
                        @error('position')
                            <span class="invalid-feedback" role="alert">
                                <span class="text-red-600 text-sm">{{ $message }}</span> </span>
                        @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                        <div class="mt-2">
                            <select name="status" id="status"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                <option selected disabled>Open this select menu</option>
                                <option value="1" {{ $ad->status == '1' ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ $ad->status == '0' ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label for="image" class="block text-sm font-medium leading-6 text-gray-900">Image</label>
                        <div class="mt-2 flex items-center space-x-4">
                            <div class="w-full max-w-xs">
                                <input type="file" name="image" id="image"
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-600">
                            </div>
                            <div class="flex-shrink-0">
                                <img id="showImage" src="{{ asset($ad->image) }}" alt="Image Preview"
                                    class="rounded-full bg-gray-200 p-1" width="100">
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12">
                        <div class="flex items-center gap-3">
                            <button type="submit"
                                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                Update
                            </button>
                        </div>
                    </div>
                </form>
            </div>
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
