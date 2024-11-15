@extends('dashboard')
@section('content')
    <div class="page-content mx-4">
        <div class="card bg-white shadow-md rounded-lg">
            <div class="card-body p-4">
                <h5 class="mb-4 text-xl font-semibold">Edit User</h5>
                <form id="myForm" action="{{ route('update.user', $user->id) }}" method="post"
                    class="grid grid-cols-1 gap-4 md:grid-cols-2" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="input1" class="block mb-2 text-sm font-medium"> User Name</label>
                        <input type="text" name="username" class="form-input w-full border rounded-md" id="input1"
                            value="{{ $user->username }}">
                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <span class="text-red-600 text-sm">{{ $message }}</span> </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="input1" class="block mb-2 text-sm font-medium"> Name</label>
                        <input type="text" name="name" class="form-input w-full border rounded-md" id="input1"
                            value="{{ $user->name }}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <span class="text-red-600 text-sm">{{ $message }}</span> </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="input1" class="block mb-2 text-sm font-medium"> Email</label>
                        <input type="email" name="email" class="form-input w-full border rounded-md" id="input1"
                            value="{{ $user->email }}">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <span class="text-red-600 text-sm">{{ $message }}</span> </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="input1" class="block mb-2 text-sm font-medium"> Phone</label>
                        <input type="text" name="phone" class="form-input w-full border rounded-md" id="input1"
                            value="{{ $user->phone }}">
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <span class="text-red-600 text-sm">{{ $message }}</span> </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="input1" class="block mb-2 text-sm font-medium"> Address</label>
                        <input type="text" name="address" class="form-input w-full border rounded-md" id="input1"
                            value="{{ $user->address }}">
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <span class="text-red-600 text-sm">{{ $message }}</span> </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="input1" class="block mb-2 text-sm font-medium">Role Name</label>
                        <select name="roles" class="form-select mb-3 border rounded-md"
                            aria-label="Default select example">
                            <option selected="" disabled>Open this select menu</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                                    {{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-span-full">
                        <div class="flex items-center gap-3">
                            <button type="submit"
                                class="btn btn-primary px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Update
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
