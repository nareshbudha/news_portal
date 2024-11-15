@extends('dashboard')
@section('content')
    <div class="page-content">
        <!-- Breadcrumb -->
        <div class="page-breadcrumb hidden sm:flex items-center mb-3">
            <div class="pl-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb flex items-center p-0 mb-0">
                        <li class="breadcrumb-item">
                            <a href="javascript:;" class="text-gray-600 hover:text-gray-800"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item text-gray-500" aria-current="page">Edit Role In Permission</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- End Breadcrumb -->

        <div class="card bg-white shadow-md rounded-lg">
            <div class="card-body p-6">

                <form id="myForm" action="{{ route('update.roles.permission', $role->id) }}" method="post"
                    class="gap-4" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group col-span-6 md:col-span-3">
                        <label for="input1" class="form-label text-gray-700">Roles Name</label>
                        <h4 class="text-lg font-semibold text-gray-900">{{ $role->name }}</h4>
                    </div>

                    <div class="form-check mb-4">
                        <input class="form-check-input rounded text-blue-600 focus:ring-2 focus:ring-blue-400"
                            type="checkbox" id="flexCheckMain">
                        <label class="form-check-label text-gray-700 ml-2" for="flexCheckMain">Permission All</label>
                    </div>

                    <hr class="border-t border-gray-200 my-4">

                    @foreach ($permission_groups as $group)
                        <div class="row grid grid-cols-12 gap-4">
                            <div class="col-span-12 md:col-span-3">
                                @php
                                    $permissions = App\Models\User::getpermissionByGroupName($group->group_name);
                                @endphp

                                <div class="form-check">
                                    <input class="form-check-input rounded text-blue-600 focus:ring-2 focus:ring-blue-400"
                                        type="checkbox" id="flexCheckDefault"
                                        {{ App\Models\User::roleHasPermissions($role, $permissions) ? 'checked' : '' }}>
                                    <label class="form-check-label text-gray-700 ml-2"
                                        for="flexCheckDefault">{{ $group->group_name }}</label>
                                </div>
                            </div>

                            <div class="col-span-12 md:col-span-9">
                                @foreach ($permissions as $permission)
                                    <div class="form-check">
                                        <input
                                            class="form-check-input rounded text-blue-600 focus:ring-2 focus:ring-blue-400"
                                            type="checkbox" name="permission[]" value="{{ $permission->id }}"
                                            id="checkDefault{{ $permission->id }}"
                                            {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                                        <label class="form-check-label text-gray-700 ml-2"
                                            for="checkDefault{{ $permission->id }}">{{ $permission->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <br>
                    @endforeach

                    <div class="col-span-12 flex items-center gap-3 mt-4">
                        <button type="submit"
                            class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('flexCheckMain').addEventListener('click', function() {
            const checkboxes = document.querySelectorAll('input[type=checkbox]');
            checkboxes.forEach(checkbox => checkbox.checked = this.checked);
        });
    </script>
@endsection
