@extends('dashboard')
@section('content')
    <div class="page-content mx-4">
        <div class="bg-white shadow-md rounded-lg">
            <div class="p-4">
                <h5 class="mb-4 text-lg font-semibold">Edit Permission</h5>
                <form id="myForm" action="{{ route('update.permission') }}" method="POST"
                    class="grid grid-cols-1 md:grid-cols-2 gap-4" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="id" value="{{ $permission->id }}">

                    <div class="form-group">
                        <label for="input1" class="block mb-1 text-sm font-medium text-gray-700">Permission Name</label>
                        <input type="text" name="name" class="border border-gray-300 rounded-md shadow-sm p-2"
                            id="input1" value="{{ $permission->name }}">
                             @error('name')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="input2" class="block mb-1 text-sm font-medium text-gray-700">Group Name</label>
                        <select name="group_name" class="border border-gray-300 rounded-md shadow-sm p-2">
                            <option selected disabled>Open this select menu</option>
                            <option value="All User" {{ $permission->group_name == 'All User' ? 'selected' : '' }}>All User
                            </option>
                            <option value="Pages" {{ $permission->group_name == 'Pages' ? 'selected' : '' }}>Pages</option>
                            <option value="Post" {{ $permission->group_name == 'Post' ? 'selected' : '' }}>Post</option>
                            <option value="Post Category"
                                {{ $permission->group_name == 'Post Category' ? 'selected' : '' }}>Post Category</option>
                            <option value="Setting" {{ $permission->group_name == 'Setting' ? 'selected' : '' }}>Setting
                            </option>
                            <option value="Role and Permission"
                                {{ $permission->group_name == 'Role and Permission' ? 'selected' : '' }}>Role and Permission
                            </option>
                        </select>
                    </div>

                    <div class="col-span-1 md:col-span-2">
                        <div class="flex items-center justify-start gap-3">
                            <button type="submit"
                                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
