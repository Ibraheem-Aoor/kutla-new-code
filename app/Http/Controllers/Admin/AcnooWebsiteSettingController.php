<?php

namespace App\Http\Controllers\Admin;

use App\Models\Option;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class AcnooWebsiteSettingController extends Controller
{
    public function index()
    {
        $page_data = get_option('manage-pages');
        return view('admin.website-setting.manage-pages', compact('page_data'));
    }

    public function update(Request $request, $key)
    {
        $option = Option::where('key', 'manage-pages')->first();
        Option::updateOrCreate(
            ['key' => 'manage-pages'],
            ['value' => [
                'headings' => $request->except('_token', '_method', 'slider_image', 'card_icons'),

                'slider_image' => $request->slider_image ? $this->upload($request, 'slider_image') : $option->value['slider_image'] ?? null,
                'card_icons' => $request->card_icons ? $this->multipleUpload($request, 'card_icons') : $option->value['card_icons'] ?? null,

            ]
        ]);

        Cache::forget('manage-pages');
       
        return response()->json([
            'message'   => __('Data Insert successfully.'),
            'redirect'  => route('admin.website-settings.index')
        ]);

    }
}
