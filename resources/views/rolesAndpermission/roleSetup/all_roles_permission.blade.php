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
                    <li class="breadcrumb-item active text-gray-800" aria-current="page">All Roles Permission</li>
                </ol>
            </nav>
            <div class="ml-auto">
                <div class="flex space-x-2">
                    <a href="{{ route('add.roles.permission') }}"
                        class="bg-blue-500 text-white px-3 py-2 rounded hover:bg-blue-600">Add Roles Permission</a>
                </div>
            </div>
        </div>

        <div class="card border rounded-lg shadow-lg">
            <div class="card-body p-6">
                <div class="table-responsive">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">Sl</th>
                                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">Roles Name</th>
                                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">Permission</th>
                                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($roles as $key => $item)
                                <tr>
                                    <td class="px-4 py-2 text-sm text-gray-700">{{ $key + 1 }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-700">{{ $item->name }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-700">
                                        @foreach ($item->permissions as $prem)
                                            <span
                                                class="bg-red-500 text-white px-2 py-1 rounded-full text-xs font-medium">{{ $prem->name }}</span>
                                        @endforeach
                                    </td>
                                    <td class="px-4 py-2 flex space-x-3">

                                        <a href="{{ route('edit.roles.permission', $item->id) }}"
                                            class="btn bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Edit</a>

                                        <a href=" {{ route('delete.roles.permission', $item->id) }}"
                                            class="btn bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600"
                                            id="delete">Delete</a>
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
