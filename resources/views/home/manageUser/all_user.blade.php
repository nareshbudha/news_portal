@extends('dashboard')
@section('content')
    <div class="page-content mx-4">
        <div class="page-breadcrumb hidden sm:flex items-center mb-3">
            <div class="pl-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0 flex">
                        <li class="breadcrumb-item">
                            <a href="javascript:;" class="flex items-center">
                                <i class="bx bx-home-alt"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">All User</li>
                    </ol>
                </nav>
            </div>
            <div class="ml-auto">
                <div class="btn-group">
                    <a href="{{ route('add.user') }}" class="btn bg-blue-500 text-white py-2 px-4 rounded">Add User</a>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Sl</th>
                                {{-- <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Image</th> --}}
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Email</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Phone</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Role</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($user as $key => $item)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $key + 1 }}</td>
                                    {{-- <td class="px-6 py-4 whitespace-nowrap">
                                        <img src="{{ !empty($item->photo) ? url('upload/admin_images/' . $item->photo) : '' }}"
                                            alt="no image" class="w-28 h-14 object-cover">
                                    </td> --}}
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $item->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $item->email }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $item->phone }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @foreach ($item->roles as $role)
                                            <span
                                                class="bg-red-500 text-white text-xs font-semibold px-2 py-1 rounded-full">{{ $role->name }}</span>
                                        @endforeach
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="{{ route('edit.user', $item->id) }}"
                                            class="bg-blue-500 text-white px-4 py-2 rounded">Edit</a>
                                        <a href="{{ route('delete.user', $item->id) }}"
                                            class="bg-red-500 text-white px-4 py-2 rounded" id="delete">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
