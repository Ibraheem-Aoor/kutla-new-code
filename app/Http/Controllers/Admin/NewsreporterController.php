<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\HasUploader;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;


class NewsreporterController extends Controller
{
    use HasUploader;

    public function maanReporterIndex()
    {
        $reporters = User::where('user_type', '0')->latest()->paginate(20);
        return view('admin.reporter.index', compact('reporters'));
    }

    public function acnooFilter(Request $request)
    {
        $reporters = User::where('user_type', '0')->when(request('search'), function ($q) {
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
                'data' => view('admin.reporter.datas', compact('reporters'))->render()
            ]);
        }

        return redirect(url()->previous());
    }

    public function maanReporterCreate(Request $request)
    {
        $roles = Role::where('name', 'reporter')->latest()->get();
        return view('admin.reporter.create', compact('roles'));
    }

    public function maanReporterStore(Request $request)
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
            'user_type' => '0',
            'image' => $request->image ? $this->upload($request, 'image') : null,
            'password' => Hash::make($request->password),
        ]);

        $role = Role::where('name', $request->role)->first();
        $user->roles()->sync($role->id);


        return response()->json([
            'message' => __(ucfirst($request->role) . ' created successfully'),
            'redirect' => route('admin.reporter', ['users' => $request->role])
        ]);
    }


    public function maanReporterEdit($reporter)
    {
        $roles = Role::where('name', 'reporter')->latest()->get();
        $reporter = User::where('id', $reporter)->first();

        return view('admin.reporter.edit', compact('reporter', 'roles'));
    }

    public function maanReporterUpdate(Request $request, $reporter)
    {
        $reporter = User::findOrFail($reporter);

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'role' => 'required|string',
            'father_name' => 'required|string',
            'mother_name' => 'required|string',
            'present_address' => 'required|string',
            'appointed_date' => 'required',
            'permanent_address' => 'required|string',
            'phone' => 'nullable|string',
            'email' => 'required|email|unique:users,email,' . $reporter->id,
            'password' => 'required|string|confirmed',
            'image' => 'nullable|image',
        ]);

        $role = Role::where('name', $request->role)->first();
        $reporter->roles()->sync($role->id);

        $name = $request->first_name . ' ' . $request->last_name;
        $user_name = ucfirst($request->first_name) . strtolower($request->last_name);

        $reporter->update($request->except('image', 'password') + [
            'name' => $name,
            'user_name' => $user_name,
            'user_type' => '0',
            'image' => $request->image ? $this->upload($request, 'image', $reporter->image) : $reporter->image,
            'password' => $request->password ? Hash::make($request->password) : $reporter->password,
        ]);

        return response()->json([
            'message'   => __('Reporter updated successfully.'),
            'redirect'  => route('admin.reporter')
        ]);
    }

    public function maanReporterDestroy($reporter)
    {
        $reporterfiend = User::find($reporter);
        if (File::exists($reporterfiend->image)) {
            unlink($reporterfiend->image);
        }
        $reporterfiend->roles()->detach();
        $reporterfiend->permissions()->detach();
        $reporterfiend->delete();

        return response()->json([
            'message' => __('Report Delete successfully'),
            'redirect' => route('admin.reporter')
        ]);
    }

    public function deleteAll(Request $request)
    {
        $reporters = User::whereIn('id', $request->ids)->get();

        foreach ($reporters as $reporter) {
            if (File::exists($reporter->image)) {
                unlink($reporter->image);
            }

            $reporter->roles()->detach();
            $reporter->permissions()->detach();

            $reporter->delete();
        }

        return response()->json([
            'message' => __('Selected reporters deleted successfully'),
            'redirect' => route('admin.reporter')
        ]);
    }
}
