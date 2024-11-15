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
                    <li class="breadcrumb-item active text-gray-800" aria-current="page">All Page</li>
                </ol>
            </nav>
            <div class="ml-auto">
                <div class="flex space-x-2">
                    <a href="{{ route('add.page') }}" class="bg-blue-500 text-white px-3 py-2 rounded hover:bg-blue-600">
                        Add Page
                    </a>
                </div>
            </div>
        </div>

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="p-4">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Sl</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Title</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Slug</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Featured Image</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Color</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($page as $key => $item)
                                <tr>
                                    <td class="px-4 py-4 whitespace-nowrap">{{ $key + 1 }}</td>
                                    <td class="px-4 py-4 whitespace-nowrap">{{ $item->title }}</td>
                                    <td class="px-4 py-4 whitespace-nowrap">{{ $item->slug }}</td>
                                    <td class="px-4 py-4 whitespace-nowrap">
                                        <img src="{{ asset($item->featured_image) }}" alt=""
                                            style="width: 70px; height:40px;">
                                    </td>
                                    <td class="px-4 py-4 whitespace-nowrap">{{ $item->color }}</td>
                                    <td class="px-4 py-4 whitespace-nowrap">{{ $item->status }}</td>
                                    <td class="px-4 py-4 whitespace-nowrap">
                                        <a href="{{ route('edit.page', $item->id) }}"
                                            class="bg-blue-500 text-white px-3 py-2 rounded hover:bg-blue-600">Edit</a>
                                        <a href="{{ route('delete.page', $item->id) }}"
                                            class="bg-red-500 text-white px-3 py-2 rounded hover:bg-red-600"
                                            id="delete">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="p-4">
            </div>
        </div>
    </div>
@endsection
