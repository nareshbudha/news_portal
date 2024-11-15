@extends('dashboard')
@section('content')
    <div class="page-content mx-4">
        <div class="shadow-lg rounded-lg bg-white p-6">
            <h4 class="block text-base font-bold leading-6 py-6 active text-gray-800">Edit Site Details</h4>
            <form action="{{ route('store.site.setting') }}" method="POST" enctype="multipart/form-data" id="postForm">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-3 gap-x-6 gap-y-6 ">
                    <div class="shadow-lg p-6  border border-indigo-50 rounded">
                        <h4 class="block text-sm font-bold leading-6 py-4 active text-gray-800">Site Details
                        </h4>
                        <div>
                            <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                            <div class="mt-2">
                                <input type="text" name="title" id="title" autocomplete="title"
                                    value="{{ $sitesetting->title }}"
                                    class="block w-full rounded-md border py-2 text-gray-900 shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            @error('title')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mt-4">
                            <label for="url" class="block text-sm font-medium leading-6 text-gray-900">Site URL</label>
                            <div class="mt-2">
                                <input type="text" name="url" id="url" autocomplete="url"
                                    value="{{ $sitesetting->url }}"
                                    class="block w-full rounded-md border py-2 text-gray-900 shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            @error('url')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                            <div class="mt-2">
                                <input type="email" name="email" id="email" autocomplete="email"
                                    value="{{ $sitesetting->email }}"
                                    class="block w-full rounded-md border py-2 text-gray-900 shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            @error('email')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label for="phone" class="block text-sm font-medium leading-6 text-gray-900">Phone</label>
                            <div class="mt-2">
                                <input type="text" name="phone" id="phone" autocomplete="phone"
                                    value="{{ $sitesetting->phone }}"
                                    class="block w-full rounded-md border py-2 text-gray-900 shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            @error('phone')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label for="address" class="block text-sm font-medium leading-6 text-gray-900">Address</label>
                            <div class="mt-2">
                                <input type="text" name="address" id="address" autocomplete="address"
                                    value="{{ $sitesetting->address }}"
                                    class="block w-full rounded-md border py-2 text-gray-900 shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            @error('address')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="description"
                                class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                            <div class="mt-2">
                                <textarea id="description" name="description" rows="5"
                                    class="block w-full rounded-md border py-2 text-gray-900 shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6"> {{ $sitesetting->description }}</textarea>
                            </div>
                            @error('description')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label for="logo" class="block text-sm font-medium leading-6 text-gray-900">Logo</label>
                            <div class="mt-2">
                                <input type="file" name="logo" id="logo"
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-600"
                                    onchange="previewLogoImage(event)">
                            </div>
                            <div id="logoImagePreviewContainer" class="relative mt-2" style="display:block;">
                                <div class="relative inline-block">
                                    <img id="logoImagePreview" src="{{ asset($sitesetting->logo) }}" alt="Logo Preview"
                                        class="rounded-md bg-gray-200 p-1" width="100" style="display:block;">
                                    {{-- <button class="absolute top-1 right-1 bg-red-500 text-white rounded-full p-1"
                                        onclick="removeLogoImage()">&#10006;</button> --}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="shadow-lg p-6  border border-indigo-50 rounded">
                        <h4 class="block text-sm font-bold leading-6 py-4 active text-gray-800">Social Links
                        </h4>

                        <div>
                            <label for="facebook" class="block text-sm font-medium leading-6 text-gray-900">Facebook
                                Link</label>
                            <div class="mt-2">
                                <input type="text" name="facebook" id="facebook" autocomplete="facebook"
                                    value="{{ $sitesetting->facebook }}"
                                    class="block w-full rounded-md border py-2 text-gray-900 shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            @error('facebook')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label for="twitter" class="block text-sm font-medium leading-6 text-gray-900">Twitter
                                Link</label>
                            <div class="mt-2">
                                <input type="text" name="twitter" id="twitter" autocomplete="twitter"
                                    value="{{ $sitesetting->twitter }}"
                                    class="block w-full rounded-md border py-2 text-gray-900 shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            @error('twitter')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label for="instagram" class="block text-sm font-medium leading-6 text-gray-900">Instagram
                                Link</label>
                            <div class="mt-2">
                                <input type="text" name="instagram" id="instagram" autocomplete="instagram"
                                    value="{{ $sitesetting->instagram }}"
                                    class="block w-full rounded-md border py-2 text-gray-900 shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            @error('instagram')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label for="linkedin" class="block text-sm font-medium leading-6 text-gray-900">LinkedIn
                                Link</label>
                            <div class="mt-2">
                                <input type="text" name="linkedin" id="linkedin" autocomplete="linkedin"
                                    value="{{ $sitesetting->linkedin }}"
                                    class="block w-full rounded-md border py-2 text-gray-900 shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            @error('linkedin')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label for="youtube" class="block text-sm font-medium leading-6 text-gray-900">YouTube
                                Link</label>
                            <div class="mt-2">
                                <input type="text" name="youtube" id="youtube" autocomplete="youtube"
                                    value="{{ $sitesetting->youtube }}"
                                    class="block w-full rounded-md border py-2 text-gray-900 shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            @error('youtube')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="shadow-lg p-6  border border-indigo-50 rounded">
                        <h4 class="block text-sm font-bold leading-6 py-4 active text-gray-800">Mail Setup</h4>
                        <div>
                            <label for="mailer" class="block text-sm font-medium leading-6 text-gray-900">Mailer</label>
                            <div class="mt-2">
                                <input type="text" name="mailer" id="mailer" autocomplete="mailer"
                                    value="{{ $sitesetting->mailer }}"
                                    class="block w-full rounded-md border py-2 text-gray-900 shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            @error('mailer')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label for="host" class="block text-sm font-medium leading-6 text-gray-900">Host</label>
                            <div class="mt-2">
                                <input type="text" name="host" id="host" autocomplete="host"
                                    value="{{ $sitesetting->host }}"
                                    class="block w-full rounded-md border py-2 text-gray-900 shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            @error('host')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="port" class="block text-sm font-medium leading-6 text-gray-900">Port</label>
                            <div class="mt-2">
                                <input type="text" name="port" id="instagram" autocomplete="port"
                                    value="{{ $sitesetting->port }}"
                                    class="block w-full rounded-md border py-2 text-gray-900 shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            @error('port')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="username" class="block text-sm font-medium leading-6 text-gray-900">User
                                Name</label>
                            <div class="mt-2">
                                <input type="text" name="username" id="username" autocomplete="username"
                                    value="{{ $sitesetting->username }}"
                                    class="block w-full rounded-md border py-2 text-gray-900 shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            @error('username')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="password"
                                class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                            <div class="mt-2">
                                <input type="text" name="password" id="password" autocomplete="password"
                                    value="{{ $sitesetting->password }}"
                                    class="block w-full rounded-md border py-2 text-gray-900 shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            @error('password')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="encryption"
                                class="block text-sm font-medium leading-6 text-gray-900">Encryption</label>
                            <div class="mt-2">
                                <input type="text" name="encryption" id="encryption" autocomplete="encryption"
                                    value="{{ $sitesetting->encryption }}"
                                    class="block w-full rounded-md border py-2 text-gray-900 shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            @error('encryption')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="from_address" class="block text-sm font-medium leading-6 text-gray-900">Sender
                                Email</label>
                            <div class="mt-2">
                                <input type="email" name="from_address" id="from_address" autocomplete="from_address"
                                    value="{{ $sitesetting->from_address }}"
                                    class="block w-full rounded-md border py-2 text-gray-900 shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            @error('from_address')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <a href="{{ route('all.site.setting') }}"
                        class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">Cancel</a>
                    <button type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
