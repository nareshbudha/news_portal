@extends('dashboard')
@section('content')
    <div class="page-content mx-4">
        <!-- Breadcrumb -->
        <div class="flex items-center mb-3 hidden sm:flex">
            <div class="pl-3">
                <nav aria-label="breadcrumb">
                    <ol class="flex space-x-2 p-0">
                        <li>
                            <a href="javascript:;" class="text-gray-600 hover:text-gray-800">
                                <i class="bx bx-home-alt"></i>
                            </a>
                        </li>
                        <li aria-current="page" class="text-gray-500">
                            <span>Add User</span>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- End Breadcrumb -->

        <div class="bg-white rounded shadow-md">
            <div class="p-6">
                <h5 class="text-xl font-semibold mb-4">Add User</h5>
                <form id="myForm" action="{{ route('store.user') }}" method="post" class="grid gap-4"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="col-span-6 sm:col-span-3">
                        <label for="input1" class="block text-sm font-medium text-gray-700"> User Name</label>
                        <input type="text" name="username"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                            id="input1">
                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <span class="text-red-600 text-sm">{{ $message }}</span> </span>
                        @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="input2" class="block text-sm font-medium text-gray-700"> Name</label>
                        <input type="text" name="name"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                            id="input2">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <span class="text-red-600 text-sm">{{ $message }}</span> </span>
                        @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="input3" class="block text-sm font-medium text-gray-700"> Email</label>
                        <input type="email" name="email"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                            id="input3">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <span class="text-red-600 text-sm">{{ $message }}</span> </span>
                        @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="input4" class="block text-sm font-medium text-gray-700"> Phone</label>
                        <input type="text" name="phone"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                            id="input4">
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <span class="text-red-600 text-sm">{{ $message }}</span> </span>
                        @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="input5" class="block text-sm font-medium text-gray-700"> Address</label>
                        <input type="text" name="address"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                            id="input5">
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <span class="text-red-600 text-sm">{{ $message }}</span> </span>
                        @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="input6" class="block text-sm font-medium text-gray-700"> Password</label>
                        <input type="password" name="password"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                            id="input6">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <span class="text-red-600 text-sm">{{ $message }}</span> </span>
                        @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="roles" class="block text-sm font-medium text-gray-700">Role Name</label>
                        <select name="roles"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            <option selected disabled>Open this select menu</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-span-12">
                        <div class="flex items-center gap-3">
                            <button type="submit"
                                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
