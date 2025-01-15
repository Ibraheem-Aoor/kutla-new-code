<?php

namespace App\Http\Controllers\Admin;

use App\Models\Option;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GalleryImage;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;

class FilepondController extends Controller
{
    public function process(Request $request)
    {
        if ($request->hasFile('gallery')) {
            $files = $request->file('gallery');
            foreach ($files as $file) {
                $path = $file->store('temp/uploads');
            }

            return response()->json([$path]);
        }

        return response()->json(['error' => 'No file uploaded'], 400);
    }
    public function remove(Request $request)
    {
        $data = $request->toArray();
        foreach($data as $file) {
            GalleryImage::query()->where('image' ,  str_replace( config('app.url') . '/' , '' , $file))->delete();
            if (File::exists($file)) {
                File::delete($file);
            }
        }
        return true;
    }

}
