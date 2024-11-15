<?php

namespace App\Http\Controllers\Admin;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return view('rolesAndpermission.permission.all_permissions', compact('permissions'));
    }

    public function AddPermission()
    {
        return view('rolesAndpermission.permission.add_permission');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:permissions,name',
        ]);

        DB::beginTransaction();
        try {
            Permission::create([
                'name' => $request->name,
                'group_name' => $request->group_name,
            ]);
            DB::commit();
            return redirect()->route('all.permission')->with('success', 'Permission created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('all.permission')->with('error', 'Failed to create permission.');
        }
    }

    public function edit(string $id)
    {
        $permission = Permission::find($id);
        return view('rolesAndpermission.permission.edit_permission', compact('permission'));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $request->validate([
            'name' => "required|string|max:255|unique:permissions,name,{$id}",
        ]);

        DB::beginTransaction();
        try {
            $permission = Permission::find($id);
            $permission->update([
                'name' => $request->name,
                'group_name' => $request->group_name,
            ]);
            DB::commit();
            return redirect()->route('all.permission')->with('success', 'Permission updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('all.permission')->with('error', 'Failed to update permission.');
        }
    }

    public function destroy(string $id)
    {
        Permission::find($id)->delete();
        return redirect()->route('all.permission');
    }

    public function allRoles()
    {
        $roles = Role::all();
        return view('rolesAndpermission.roles.all_roles', compact('roles'));
    }

    public function AddRole()
    {
        return view('rolesAndpermission.roles.add_roles');
    }

    public function storeRole(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name',
        ]);

        DB::beginTransaction();
        try {
            Role::create(['name' => $request->name]);
            DB::commit();
            return redirect()->route('all.role')->with('success', 'Role created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('all.role')->with('error', 'Failed to create role.');
        }
    }

    public function editRole(string $id)
    {
        $role = Role::find($id);
        return view('rolesAndpermission.roles.edit_roles', compact('role'));
    }

    public function updateRole(Request $request)
    {
        $id = $request->id;
        $request->validate([
            'name' => "required|string|max:255|unique:roles,name,{$id}",
        ]);

        DB::beginTransaction();
        try {
            $role = Role::find($id);
            $role->update(['name' => $request->name]);
            DB::commit();
            return redirect()->route('all.role')->with('success', 'Role updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('all.role')->with('error', 'Failed to update role.');
        }
    }

    public function destroyRole(string $id)
    {
        $role = Role::find($id);
        $role->delete();
        return redirect()->route('all.role');
    }

    public function AddRolesPermission()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        $permission_groups = User::getpermissionGroups();

        return view('rolesAndpermission.roleSetup.add_roles_permission', compact('roles', 'permission_groups', 'permissions'));
    }

    public function RolePermissionStore(Request $request)
    {
        DB::beginTransaction();
        try {
            $data = [];
            $permissions = $request->permission;
            foreach ($permissions as $item) {
                $data[] = [
                    'role_id' => $request->role_id,
                    'permission_id' => $item
                ];
            }
            DB::table('role_has_permissions')->insert($data);
            DB::commit();
            return redirect()->route('all.roles.permission')->with('success', 'Role permissions added successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('all.roles.permission')->with('error', 'Failed to add role permissions.');
        }
    }

    public function AllRolesPermission()
    {
        $roles = Role::all();
        return view('rolesAndpermission.roleSetup.all_roles_permission', compact('roles'));
    }

    public function EditRolesPermission($id)
    {
        $role = Role::find($id);
        $permissions = Permission::all();
        $permission_groups = User::getpermissionGroups();

        return view('rolesAndpermission.roleSetup.edit_roles_permission', compact('role', 'permission_groups', 'permissions'));
    }

    public function UpdateRolesPermission(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $role = Role::find($id);
            $permissions = $request->permission;

            if (!empty($permissions)) {
                $permissionsByName = Permission::whereIn('id', $permissions)->pluck('name')->toArray();
                $role->syncPermissions($permissionsByName);
            }

            DB::commit();
            return redirect()->route('all.roles.permission')->with('success', 'Role permissions updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('all.roles.permission')->with('error', 'Failed to update role permissions.');
        }
    }

    public function DeleteRolesPermission($id)
    {
        $role = Role::find($id);
        if (!is_null($role)) {
            $role->delete();
        }
        return redirect()->back()->with('success', 'Role permissions deleted successfully.');
    }
}
