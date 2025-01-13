<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SettingsController extends Controller
{
    public function maanSettingsIndex(){

        $settings = Settings::all();
        return view('admin.settings.application.index',compact('settings'));
    }
    public function maanSettingsStore(Request $request){

        if ($request->title||$request->name||$request->short_name){
            $request->validate([
                'title'=> 'required',
                'name'=> 'required',
                'short_name'=> 'required',
            ]);
        }

        if ($request->favicon!=''){
            $request->validate([
                'favicon'=> 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);

        }
        //icon validation..
        if ($request->icon!=''){
            $request->validate([
                'icon'=> 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);
        }

        if ($request->frontend_logo!=''){
            $request->validate([
                'frontend_logo'=> 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);
        }


        //logo validation..
        if ($request->logo!=''){
            $request->validate([
                'logo'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024|',
            ]);
        }
        //logo footer validation..
        if ($request->logo_footer!=''){
            $request->validate([
                'logo_footer'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024|',
            ]);
        }
        // favicon..
        if (Settings::exists()){
            $settings = Settings::first() ;
        }else{
            $settings = new Settings();
        }

        // favicon..
        if ($request->hasFile('favicon')){

            if ($request->favicon!=''){

                if (File::exists($settings->favicon)){
                    unlink($settings->favicon);
                }

                $favicon            = 'favicon.'.$request->favicon->getClientOriginalExtension();

                // image path
                $favicon_url          = 'uploads/images/logo/' . $favicon;
                //image base path
                $destinationPath    = public_path() . '/uploads/images/logo/';
                $success            = $request->favicon->move($destinationPath, $favicon);
                if ($success){
                    $favicon_urls     = $favicon_url ;
                }
            }else{
                $favicon_urls         = '' ;
            }
        }
        //icon..
        if ($request->hasFile('icon')){
            if ($request->icon!=''){

                if (File::exists($settings->icon)){
                    unlink($settings->icon);
                }

                $icon            = 'icon.'.$request->icon->getClientOriginalExtension();

                // icon path
                $icon_url          = 'uploads/images/logo/' . $icon;
                //icon base path
                $destinationPath    = public_path() . '/uploads/images/logo/';
                $success            = $request->icon->move($destinationPath, $icon);
                if ($success){
                    $icon_urls     = $icon_url ;
                }
            }else{
                $icon_urls         = '' ;
            }
        }


        //frontend_logo
         if ($request->hasFile('frontend_logo')){

            if ($request->frontend_logo!=''){

                if (File::exists($settings->frontend_logo)){
                    unlink($settings->frontend_logo);
                }

                $frontend_logo            = 'frontend_logo.'.$request->frontend_logo->getClientOriginalExtension();

                // image path
                $frontend_logo_url          = 'uploads/images/logo/' . $frontend_logo;
                //image base path
                $destinationPath    = public_path() . '/uploads/images/logo/';
                $success            = $request->frontend_logo->move($destinationPath, $frontend_logo);
                if ($success){
                    $frontend_logo_urls     = $frontend_logo_url ;
                }
            }else{
                $frontend_logo_urls         = '' ;
            }
        }

        // logo..
        if ($request->hasFile('logo')){

            if ($request->logo!=''){

                if (File::exists($settings->logo)){
                    unlink($settings->logo);
                }

                $logo            = 'logo.'.$request->logo->getClientOriginalExtension();
                // logo path
                $logo_url          = 'uploads/images/logo/' . $logo;
                //logo base path
                $destinationPath    = public_path() . '/uploads/images/logo/';
                $success            = $request->logo->move($destinationPath, $logo);
                if ($success){
                    $logo_urls     = $logo_url ;
                }
            }else{
                $logo_urls         = '' ;
            }
        }
        //footer logo..
        if ($request->hasFile('logo_footer')){
            if ($request->logo_footer!=''){
                if (File::exists($settings->logo_footer)){
                    unlink($settings->logo_footer);
                }
                $logo_footer            = 'logo_footer.'.$request->logo_footer->getClientOriginalExtension();
                // image path
                $logo_footer_url          = 'uploads/images/logo/' . $logo_footer;
                //image base path
                $destinationPath    = public_path() . '/uploads/images/logo/';
                $success            = $request->logo_footer->move($destinationPath, $logo_footer);
                if ($success){
                    $logo_footer_urls     = $logo_footer_url ;
                }
            }else{
                $logo_footer_urls         = '' ;
            }
        }
        if ($request->name!=''){
            $settings->name = $request->name ;
        }
        if ($request->short_name!=''){
            $settings->short_name = $request->short_name ;
        }
        if ($request->title!=''){
            $settings->title = $request->title ;
        }
        if ($request->footer_content!=''){
            $settings->footer_content = $request->footer_content ;
        }
        if ($request->play_store_url!=''){
            $settings->play_store_url = $request->play_store_url ;
        }
        if ($request->app_store_url!=''){
            $settings->app_store_url = $request->app_store_url ;
        }
        if ($request->favicon!=''){
            $settings->favicon = $favicon_urls ;
        }
        if ($request->icon!=''){
            $settings->icon = $icon_urls ;
        }
        if ($request->frontend_logo!=''){
            $settings->favicon = $frontend_logo_urls ;
        }
        if ($request->logo!=''){
            $settings->logo = $logo_urls ;
        }
        if ($request->logo_footer!=''){
            $settings->logo_footer = $logo_footer_urls ;
        }
        $settings->save();

        return response()->json([
            'message'   => __('Inserted'),
            'redirect'  => route('admin.settings.index')
        ]);
    }

    public function maanSettingsUpdate(Request $request,Settings $settings)
    {

        //title ,name, short name validation..
        if ($request->title||$request->name||$request->short_name){
            $request->validate([
                'title'=> 'required',
                'name'=> 'required',
                'short_name'=> 'required',
            ]);
        }
        //favicon validation..
        if ($request->favicon!=''){
            $request->validate([
                'favicon'=> 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);

        }
        //icon validation..
        if ($request->icon!=''){
            $request->validate([
                'icon'=> 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);
        }
        //logo validation..
        if ($request->logo!=''){
            $request->validate([
                'logo'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            ]);
        }
        // Frontend Logo

        if ($request->frontend_logo!=''){
            $request->validate([
                'frontend_logo'=> 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);
        }

        //logo footer validation..
        if ($request->logo_footer!=''){
            $request->validate([
                'logo_footer'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            ]);
        }
        // favicon..
        if ($request->hasFile('favicon')){

            if ($request->favicon!=''){

                if (File::exists($settings->favicon)){
                    unlink($settings->favicon);
                }

                $favicon            = 'favicon.'.$request->favicon->getClientOriginalExtension();
                // image path
                $favicon_url          = 'uploads/images/logo/' . $favicon;
                //image base path
                $destinationPath    = public_path() . '/uploads/images/logo/';
                $success            = $request->favicon->move($destinationPath, $favicon);
                if ($success){
                    $favicon_urls     = $favicon_url ;
                }
            }else{
                $favicon_urls         = $settings->favicon ;
            }
        }
        //icon..
        if ($request->hasFile('icon')){
            if ($request->icon!=''){
                if (File::exists($settings->icon)){
                    unlink($settings->icon);
                }
                $icon            = 'icon.'.$request->icon->getClientOriginalExtension();
                // icon path
                $icon_url          = 'uploads/images/logo/' . $icon;
                //icon base path
                $destinationPath    = public_path() . '/uploads/images/logo/';
                $success            = $request->icon->move($destinationPath, $icon);
                if ($success){
                    $icon_urls     = $icon_url ;
                }
            }else{
                $icon_urls         = $settings->icon ;
            }
        }

        // Frontend Logo
        if ($request->hasFile('frontend_logo')){

            if ($request->frontend_logo!=''){

                if (File::exists($settings->frontend_logo)){
                    unlink($settings->frontend_logo);
                }

                $frontend_logo            = 'frontend_logo.'.$request->frontend_logo->getClientOriginalExtension();
                // image path
                $frontend_logo_url          = 'uploads/images/logo/' . $frontend_logo;
                //image base path
                $destinationPath    = public_path() . '/uploads/images/logo/';
                $success            = $request->frontend_logo->move($destinationPath, $frontend_logo);
                if ($success){
                    $frontend_logo_urls     = $frontend_logo_url ;
                }
            }else{
                $frontend_logo_urls         = $settings->frontend_logo ;
            }
        }

        // logo..
        if ($request->hasFile('logo')){
            if ($request->logo!=''){
                if (File::exists($settings->logo)){
                    unlink($settings->logo);
                }
                $logo            = 'logo.'.$request->logo->getClientOriginalExtension();
                // logo path
                $logo_url          = 'uploads/images/logo/' . $logo;
                //logo base path
                $destinationPath    = public_path() . '/uploads/images/logo/';
                $success            = $request->logo->move($destinationPath, $logo);
                if ($success){
                    $logo_urls     = $logo_url ;
                }
            }else{
                $logo_urls         = $settings->logo ;
            }
        }
        //footer logo..
        if ($request->hasFile('logo_footer')){
            if ($request->logo_footer!=''){
                if (File::exists($settings->logo_footer)){
                    unlink($settings->logo_footer);
                }
                $logo_footer            = 'logo_footer.'.$request->logo_footer->getClientOriginalExtension();
                // image path
                $logo_footer_url          = 'uploads/images/logo/' . $logo_footer;
                //image base path
                $destinationPath    = public_path() . '/uploads/images/logo/';
                $success            = $request->logo_footer->move($destinationPath, $logo_footer);
                if ($success){
                    $logo_footer_urls     = $logo_footer_url ;
                }
            }else{
                $logo_footer_urls         = $settings->logo_footer ;
            }
        }
        if ($request->title){
            $settings->title = $request->title;
        }
        if ($request->name){
            $settings->name = $request->name;
        }
        if ($request->short_name){
            $settings->short_name = $request->short_name;
        }
        if ($request->footer_content){
            $settings->footer_content = $request->footer_content;
        }

        $settings->play_store_url = $request->play_store_url;

        $settings->app_store_url = $request->app_store_url;

        if ($request->favicon!=''){
            $settings->favicon = $favicon_urls ;
        }
        if ($request->icon!=''){
            $settings->icon = $icon_urls ;
        }

        if ($request->frontend_logo!=''){
            $settings->favicon = $frontend_logo_urls ;
        }
        if ($request->logo!=''){
            $settings->logo = $logo_urls ;
        }
        if ($request->logo_footer!=''){
            $settings->logo_footer = $logo_footer_urls ;
        }

        $settings->save();

        return response()->json([
            'message'   => __('Updated'),
            'redirect'  => route('admin.settings.index')
        ]);

    }

    public function maanSettingsDestroy(Settings $settings)
    {
        if (File::exists($settings->favicon)){
            unlink($settings->favicon);
        }
        if (File::exists($settings->icon)){
            unlink($settings->icon);
        }
        if (File::exists($settings->logo)){
            unlink($settings->logo);
        } if (File::exists($settings->logo_footer)){
        unlink($settings->logo_footer);
    }
        $settings->delete();

        return response()->json([
            'message'   => __('Deleted'),
            'redirect'  => route('admin.settings.index')
        ]);
    }
}
