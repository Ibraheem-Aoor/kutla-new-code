<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function maancontact()
    {
        $contacts = Contact::latest()->paginate(20);
        return view('admin.contacts.index',compact('contacts'));
    }

    public function acnooFilter(Request $request)
    {
        $contacts = Contact::when(request('search'), function ($q) {
            $q->where(function ($q) {
                $q->where('name', 'like', '%' . request('search') . '%')
                    ->orWhere('email', 'like', '%' . request('search') . '%')
                    ->orWhere('message', 'like', '%' . request('search') . '%');
            });
        })
            ->latest()
            ->paginate($request->per_page ?? 20);

        if ($request->ajax()) {
            return response()->json([
                'data' => view('admin.contacts.datas', compact('contacts'))->render()
            ]);
        }

        return redirect(url()->previous());
    }

    public function maancontactdestroy ($id)
    {
        $contact = Contact::find($id);
        $contact->delete();
        return response()->json([
            'message'   => __('Contact Deleted Successfully.'),
            'redirect'  => route('admin.contact')
        ]);
    }

    public function deleteAll(Request $request)
    {
        Contact::whereIn('id', $request->ids)->delete();
        return response()->json([
            'message' => __('Selected Contact deleted successfully'),
            'redirect' => route('admin.contact')
        ]);
    }
}
