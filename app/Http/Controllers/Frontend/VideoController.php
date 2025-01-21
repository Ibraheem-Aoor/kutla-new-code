<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Photogallery;
use App\Models\Socialshare;
use App\Models\Videogallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VideoController extends Controller
{
    public function index()
    {
        $data['videos'] = Videogallery::query()->select(['title', 'image', 'video'])->paginate(20);
       
        return view('frontend.pages.videogallery', $data);
    }
}
