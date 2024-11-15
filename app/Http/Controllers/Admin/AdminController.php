<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function allUser()
    {
        $user = User::where('role', 'admin')->get();
        return view('home.manageUser.all_user', compact('user'));
    } // End Method

    public function addUser()
    {
        $roles = Role::all();
        return view('home.manageUser.add_user', compact('roles'));
    } // End Method

    public function storeUser(Request $request)
    {
        DB::beginTransaction();
        try {
            $user = new User();
            $user->username = $request->username;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->password = Hash::make($request->password);
            $user->role = 'admin';
            $user->status = '1';
            $user->save();

            if ($request->roles) {
                $roles = is_array($request->roles) ? $request->roles : [$request->roles];
                $roleNames = Role::whereIn('id', $roles)->pluck('name')->toArray();
                if (empty($roleNames)) {
                    DB::rollBack();
                    return response()->json(['error' => 'No valid roles found.'], 400);
                }
                $user->assignRole($roleNames);
            }

            DB::commit();
            return redirect()->route('all.user');
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Failed to create user.'], 500);
        }
    }

    public function editUser($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('home.manageUser.edit_user', compact('user', 'roles'));
    }

    public function updateUser(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $user = User::find($id);
            $user->username = $request->username;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->role = 'admin';
            $user->status = '1';
            $user->save();

            $user->roles()->detach();

            if ($request->roles) {
                $roles = is_array($request->roles) ? $request->roles : [$request->roles];
                $roleNames = Role::whereIn('id', $roles)->pluck('name')->toArray();
                if (empty($roleNames)) {
                    DB::rollBack();
                    return response()->json(['error' => 'No valid roles found.'], 400);
                }
                $user->assignRole($roleNames);
            }

            DB::commit();
            return redirect()->route('all.user');
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Failed to update user.'], 500);
        }
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        if (!is_null($user)) {
            $user->delete();
        }

        return redirect()->back();
    }
}
