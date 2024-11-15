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
                    <li class="breadcrumb-item active text-gray-800" aria-current="page">Form Data</li>
                </ol>
            </nav>
            <div class="ml-auto">
                <div class="flex space-x-2">
                    <a href="{{ route('add.form') }}" class="bg-blue-500 text-white px-3 py-2 rounded hover:bg-blue-600">
                        Add Form
                    </a>
                </div>
            </div>
        </div>
        <form id="search-form" action="{{ route('all.form') }}" method="GET" class="flex items-center mb-4 space-x-4">
            <div class="flex items-center space-x-2">
                <label for="search-name" class="text-gray-700">Name:</label>
                <input type="text" name="search_name" id="search-name" placeholder="Search by name"
                    class="px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 w-50"
                    value="{{ request()->input('search_name') }}" />
            </div>
            <div class="flex items-center space-x-2">
                <label for="search-email" class="text-gray-700">Email:</label>
                <input type="text" name="search_email" id="search-email" placeholder="Search by email"
                    class="px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 w-50"
                    value="{{ request()->input('search_email') }}" />
            </div>
            <div class="flex items-center space-x-2">
                <label for="search-description" class="text-gray-700">Description:</label>
                <input type="text" name="search_description" id="search-description" placeholder="Search by description"
                    class="px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 w-50"
                    value="{{ request()->input('search_description') }}" />
            </div>
            <div class="flex items-center space-x-2">
                <label for="search-status" class="text-gray-700">Status:</label>
                <select name="search_status" id="search-status"
                    class="px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 w-40"
                    aria-label="Status selection">
                    <option selected disabled>Choose status</option>
                    <option value="all">All</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
        </form>
        <div id="search-results" class="mt-4"></div>
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="p-4">
                <table class="min-w-full divide-y divide-gray-200" id="results-table">
                    <thead>
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Sl</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Name</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Email</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Image</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Description</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#results-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('all.form') }}",
                    data: function(d) {
                        d.search_name = $('#search-name').val();
                        d.search_email = $('#search-email').val();
                        d.search_description = $('#search-description').val();
                        d.search_status = $('#search-status').val();
                    }
                },
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'image',
                        name: 'image',
                        render: function(data) {
                            return `<img src="${data}" style="width: 70px; height:40px;">`;
                        }
                    },
                    {
                        data: 'description',
                        name: 'description'
                    },
                    {
                        data: 'status',
                        name: 'status',
                        render: function(data) {
                            return data === 1 ? '<span class="text-green-500">Active</span>' :
                                '<span class="text-gray-500">Inactive</span>';
                        }
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });

            // Trigger DataTables reload on input change
            $('#search-name, #search-email, #search-description, #search-status').on('input change', function() {
                $('#results-table').DataTable().ajax.reload();
            });
        });
    </script>
@endsection
