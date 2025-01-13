<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Maanuser;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function index()
    {
        $subscribers = Maanuser::latest()->paginate(20);
        return view('admin.subscribers.index',compact('subscribers'));
    }

    public function acnooFilter(Request $request)
    {
        $subscribers = Maanuser::when(request('search'), function ($q) {
            $q->where(function ($q) {
                $q->where('email', 'like', '%' . request('search') . '%');
            });
        })
            ->latest()
            ->paginate($request->per_page ?? 20);

        if ($request->ajax()) {
            return response()->json([
                'data' => view('admin.subscribers.datas', compact('subscribers'))->render()
            ]);
        }

        return redirect(url()->previous());
    }

    public function destroy($id)
    {
        Maanuser::destroy($id);

        return response()->json([
            'message' => 'Subscriber deleted successfully',
            'redirect' => route('admin.subscriber')
        ]);
    }

    public function deleteAll(Request $request)
    {
        Maanuser::whereIn('id', $request->ids)->delete();
        return response()->json([
            'message' => __('Selected Subscriber deleted successfully'),
            'redirect' => route('admin.subscriber')
        ]);
    }
}
