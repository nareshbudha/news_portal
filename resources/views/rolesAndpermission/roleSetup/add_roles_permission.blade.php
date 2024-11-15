@extends('dashboard')
@section('content')
    <div class="page-content mx-4">
        <div class="flex items-center mb-3">
            <div class="pl-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb p-0 m-0 flex items-center space-x-2 text-gray-500">
                        <li><a href="javascript:;" class="text-gray-400 hover:text-gray-600"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li><span class="breadcrumb-item active text-gray-800">Add Role In
                                Permission</span></li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="card border rounded-lg shadow-lg">
            <div class="card-body p-6">
                <form id="myForm" action="{{ route('store.role.permission') }}" method="post" class="space-y-4"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="form-group col-span-6">
                        <label for="input1" class="form-label font-semibold text-gray-700">Roles Name</label>
                        <select name="role_id" class="form-select mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                            aria-label="Default select example">
                            <option selected disabled>Open Roles</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-check flex items-center">
                        <input class="form-check-input mr-2" type="checkbox" id="flexCheckMain">
                        <label class="form-check-label capitalize-label" for="flexCheckMain">Permission All</label>
                    </div>

                    <hr class="my-4 border-gray-200">

                    @foreach ($permission_groups as $group)
                        <div class="grid grid-cols-3 gap-4">
                            <div class="col-span-1">
                                <div class="form-check flex items-center">
                                    <input class="form-check-input mr-2" type="checkbox" id="flexCheckDefault">
                                    <label class="form-check-label capitalize-label"
                                        for="flexCheckDefault">{{ $group->group_name }}</label>
                                </div>
                            </div>

                            <div class="col-span-2">
                                @php
                                    $permissions = App\Models\User::getpermissionByGroupName($group->group_name);
                                @endphp

                                @foreach ($permissions as $permission)
                                    <div class="form-check flex items-center">
                                        <input class="form-check-input mr-2" type="checkbox" name="permission[]"
                                            value="{{ $permission->id }}" id="checkDefault{{ $permission->id }}">
                                        <label class="form-check-label capitalize-label"
                                            for="checkDefault{{ $permission->id }}">{{ $permission->name }}</label>
                                    </div>
                                @endforeach
                                <br>
                            </div>
                        </div>
                    @endforeach

                    <div class="col-span-12 mt-4">
                        <div class="flex items-center gap-3">
                            <button type="submit"
                                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('flexCheckMain').addEventListener('click', function() {
            const isChecked = this.checked;
            document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
                checkbox.checked = isChecked;
            });
        });
    </script>
@endsection
