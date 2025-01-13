<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use App\Helpers\HasUploader;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use HasUploader;

    public function maanUserIndex()
    {
        $users = User::whereNotIn('role', ['superadmin'])->latest()->paginate(20);
        return view('admin.users.index', compact('users'));
    }

    public function acnooFilter(Request $request)
    {
        $users = User::whereNotIn('role', ['superadmin'])->when(request('search'), function ($q) {
            $q->where(function ($q) {
                $q->where('first_name', 'like', '%' . request('search') . '%')
                    ->orWhere('last_name', 'like', '%' . request('search') . '%')
                    ->orWhere('email', 'like', '%' . request('search') . '%')
                    ->orWhere('phone', 'like', '%' . request('search') . '%');
            });
        })
            ->latest()
            ->paginate($request->per_page ?? 20);

        if ($request->ajax()) {
            return response()->json([
                'data' => view('admin.users.datas', compact('users'))->render()
            ]);
        }

        return redirect(url()->previous());
    }

    public function maanUserCreate(Request $request)
    {
        $roles = Role::where('name', '!=', 'superadmin')->latest()->get();
        return view('admin.users.create', compact('roles'));
    }

    public function maanUserStore(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'role' => 'required|string',
            'father_name' => 'required|string',
            'mother_name' => 'required|string',
            'present_address' => 'required|string',
            'appointed_date' => 'required',
            'permanent_address' => 'required|string',
            'user_type' => 'required',
            'phone' => 'nullable|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|confirmed',
            'image' => 'nullable|image',
        ]);

        $name = $request->first_name . ' ' . $request->last_name;
        $user_name = ucfirst($request->first_name) . strtolower($request->last_name);

        $user = User::create($request->except('image', 'password') + [
            'name' => $name,
            'user_name' => $user_name,
            'image' => $request->image ? $this->upload($request, 'image') : null,
            'password' => Hash::make($request->password),
        ]);

        $role = Role::where('name', $request->role)->first();
        $user->roles()->sync($role->id);

        // sendNotification($user->id, route('admin.user', ['users' => $request->role]), __(ucfirst($request->role) . ' has been created.'), 'action', null, null, true);

        return response()->json([
            'message' => __(ucfirst($request->role) . ' created successfully'),
            'redirect' => route('admin.user', ['users' => $request->role])
        ]);
    }

    public function maanUserEdit(User $user)
    {
        if ($user->role == 'superadmin') {
            abort(403);
        }
        $roles = Role::latest()->get();

        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function maanUserUpdate(Request $request, User $user)
    {
        if ($user->role == 'superadmin') {
            return response()->json(__('You can not update a superadmin.'), 400);
        }
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'role' => 'required|string',
            'father_name' => 'required|string',
            'mother_name' => 'required|string',
            'present_address' => 'required|string',
            'appointed_date' => 'required',
            'permanent_address' => 'required|string',
            'user_type' => 'required',
            'phone' => 'nullable|string',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'required|string|confirmed',
            'image' => 'nullable|image',
        ]);

        $role = Role::where('name', $request->role)->first();
        $user->roles()->sync($role->id);

        $name = $request->first_name . ' ' . $request->last_name;
        $user_name = ucfirst($request->first_name) . strtolower($request->last_name);

        $user->update($request->except('image', 'password') + [
            'name' => $name,
            'user_name' => $user_name,
            'image' => $request->image ? $this->upload($request, 'image', $user->image) : $user->image,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);

        return response()->json([
            'message'   => __('User updated successfully.'),
            'redirect'  => route('admin.user')
        ]);
    }

    public function maanuserdestroy(User $user)
    {
        if ($user->role == 'superadmin') {
            return response()->json(__('You can not delete a superadmin.'), 400);
        }
        if (File::exists($user->image)) {
            unlink($user->image);
        }
        $user->roles()->detach();
        $user->permissions()->detach();
        $user->delete();

        return response()->json([
            'message' => 'User deleted successfully',
            'redirect' => route('admin.user')
        ]);
    }

    public function maanUserAjax(Request $request)
    {
        if ($request->ajax()) {
            $roles = Role::where('id', $request->role_id)->first();
            $permissions = $roles->permissions;
            return $permissions;
        }
    }

    public function deleteAll(Request $request)
    {
        $users = User::whereIn('id', $request->ids)->get();

        foreach ($users as $user) {

            if ($user->role == 'superadmin') {
                return response()->json(__('You cannot delete a superadmin.'), 400);
            }

            if (File::exists($user->image)) {
                unlink($user->image);
            }

            $user->roles()->detach();
            $user->permissions()->detach();
        }

        User::destroy($request->ids);

        return response()->json([
            'message' => __('Selected users deleted successfully'),
            'redirect' => route('admin.user')
        ]);
    }
}
