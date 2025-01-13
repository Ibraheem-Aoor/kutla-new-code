<?php

namespace App\Http\Controllers\Admin;

use App\Models\Option;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class CompanyController extends Controller
{
    public function maanCompanyIndex()
    {
        $companies = Option::where('key', 'company-info')->latest()->paginate(20);
        return view('admin.settings.company.index',compact('companies'));
    }

    public function acnooFilter(Request $request)
    {
        $companies = Option::where('key', 'company-info')->when(request('search'), function ($q) {
            $q->where(function ($q) {
                $q->where('name', 'like', '%' . request('search') . '%')
                    ->orWhere('address_line1', 'like', '%' . request('search') . '%')
                    ->orWhere('address_line2', 'like', '%' . request('search') . '%')
                    ->orWhere('phone', 'like', '%' . request('search') . '%')
                    ->orWhere('email', 'like', '%' . request('search') . '%')
                    ->orWhere('message', 'like', '%' . request('search') . '%');
            });
        })
            ->latest()
            ->paginate($request->per_page ?? 20);

        if ($request->ajax()) {
            return response()->json([
                'data' => view('admin.settings.company.datas', compact('companies'))->render()
            ]);
        }

        return redirect(url()->previous());
    }

    public function maanCompanyStore(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'address_line1'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'message'=>'required',
            'copyright'=>'required',
            'version'=>'required',

        ]);
        Option::create([
            'key' => 'company-info',
            'value' => $request->except('_token','_method'),
        ]);

        return response()->json([
            'message'   => __('Company Info saved successfully'),
            'redirect'  => route('admin.company.index')
        ]);

    }

    public function maanCompanyUpdate(Request $request, string $id)
    {
        $request->validate([
            'name'=>'required',
            'address_line1'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'message'=>'required',
            'copyright'=>'required',
            'version'=>'required',

        ]);

        $company = Option::findOrFail($id);
        Cache::forget($company->key);
        $company->update([
            'key' => 'company-info',
            'value' => $request->except('_token', '_method'),
        ]);

        return response()->json([
            'message'   => __('Company Info Updated successfully'),
            'redirect'  => route('admin.company.index')
        ]);
    }

    public function maanCompanyDestroy(string $id)
    {
        $company = Option::findOrFail($id);
        $company->delete();

        return response()->json([
            'message' => 'Company deleted successfully',
            'redirect' => route('admin.company.index')
        ]);

    }

    public function deleteAll(Request $request)
    {
        Option::whereIn('id', $request->ids)->delete();
        return response()->json([
            'message' => __('Selected Company deleted successfully'),
            'redirect' => route('admin.company.index')
        ]);
    }

    public function status(Request $request, $id)
    {
        $status = Option::findOrFail($id);
        $status->update(['status' => $request->status]);
        return response()->json(['message' => 'Company']);
    }
}
