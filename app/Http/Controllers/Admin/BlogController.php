<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\Blogcategory;
use Illuminate\Http\Request;
use App\Models\Blogsubcategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    public function maanBlogIndex()
    {
       $blogs = Blog::latest()->paginate(20);
       return view('admin.blog.blog.index',compact('blogs'));
    }

    public function acnooFilter(Request $request)
    {
        $blogs = Blog::orderByDesc('id')->when(request('search'), function ($q) {
            $q->where(function ($q) {
                $q->where('title', 'like', '%' . request('search') . '%')
                    ->orWhere('summary', 'like', '%' . request('search') . '%');
            });
        })
            ->latest()
            ->paginate($request->per_page ?? 20);

        if ($request->ajax()) {
            return response()->json([
                'data' => view('admin.blog.blog.datas', compact('blogs'))->render()
            ]);
        }

        return redirect(url()->previous());
    }

    public function maanBlogCreate(Request $request)
    {
        if ($request->ajax()){
            $blogsubcategory = Blogsubcategory::where('category_id',$request->blogcategory_id)->get();
            return response()->json($blogsubcategory);
        }
        $blogcategories = Blogcategory::all();

        return view('admin.blog.blog.create',compact('blogcategories'));
    }

    public function maanBlogStore(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'summary'=>'required',
            'description'=>'required',
            'category_id'=>'required',
            'subcategory_id'=>'required',
            'date'=>'required',
            'tags'=>'required',
            'image' => 'nullable'

        ]);
        if ($request->hasFile('image')){
            foreach ($request->file('image') as $image) {
                $blog_imagename = $image->getClientOriginalName();
                $blog_image = 'maanblogimage' . date('dmY_His') . '_' . $blog_imagename;
                $blog_image_url[] = 'uploads/images/blogimages/' . $blog_image;
                $blog_destinationPath = public_path() . '/uploads/images/blogimages/';
                $blog_success = $image->move($blog_destinationPath, $blog_image);
            }
            if ($blog_success){
                $blog_image_urls = $blog_image_url ;

            }
        }else{
            $blog_image_urls = '' ;
        }
        $data['title']          = $request->title;
        $data['summary']        = $request->summary;
        $data['description']    = $request->description;
        $data['blogsubcategory_id'] = $request->subcategory_id;
        $data['date']           = date('Y-m-d', strtotime($request->date));
        $data['tags']           = $request->tags;

        if($request->status){
            $data['status']     = 1 ;
        }else{
            $data['status']       = 0 ;
        }

        $data['image']          = json_encode($blog_image_urls);
        $data['user_id']        = Auth::user()->id;
        Blog::create($data);

        return response()->json([
            'message' => 'Blog Created successfully',
            'redirect' => route('admin.blog')
        ]);
    }
    public function maanBlogEdit(Request $request, Blog $blog)
    {
        $blogcategories = Blogcategory::all();
        $blogsubcategories = Blogsubcategory::all();
        $blogcategoryid = Blogsubcategory::where('id',$blog->blogsubcategory_id)->value('category_id');
        if ($request->ajax()){
            $blogsubcategory = Blogsubcategory::where('category_id',$request->blogcategory_id)->get();
            return response()->json($blogsubcategory);
        }

        return view('admin.blog.blog.edit',compact('blog','blogcategories','blogsubcategories','blogcategoryid'));
    }
    public function maanBlogUpdate(Request $request, Blog $blog)
    {
        $request->validate([
            'title'=>'required',
            'summary'=>'required',
            'description'=>'required',
            'subcategory_id'=>'required',
            'date'=>'required',
            'tags'=>'required',
        ]);
        if ($request->hasFile('image')){
            $getimages = json_decode($blog->image);
            if ($getimages){
                foreach ($getimages as $image){
                    if (File::exists($image)){
                        unlink($image);
                    }
                }
            }

            foreach ($request->file('image') as $image) {
                $blog_imagename = $image->getClientOriginalName();
                $blog_image = 'maanblogimage' . date('dmY_His') . '_' . $blog_imagename;
                $blog_image_url[] = 'uploads/images/blogimages/' . $blog_image;
                $blog_destinationPath = public_path() . '/uploads/images/blogimages/';
                $blog_success = $image->move($blog_destinationPath, $blog_image);
            }
            if ($blog_success){
                $blog_image_urls = json_encode($blog_image_url); ;

            }
        }else{
            $blog_image_urls = $blog->image ;
        }
        $data['title']          = $request->title;
        $data['summary']        = $request->summary;
        $data['description']    = $request->description;
        $data['blogsubcategory_id'] = $request->subcategory_id;
        $data['date']           = date('Y-m-d', strtotime($request->date));
        $data['tags']           = $request->tags;
        if($request->status){
            $data['status']     = 1 ;
        }else{
            $data['status']     = 0 ;
        }

        $data['image']          = $blog_image_urls;
        $data['user_id']        = Auth::user()->id;
        Blog::where('id',$blog->id)->update($data);

        return response()->json([
            'message' => 'Blog updated successfully',
            'redirect' => route('admin.blog')
        ]);
    }
    public function maanBlogDestroy(Blog $blog)
    {
        $images = json_decode($blog->image);

        foreach ($images as $image){
            if (File::exists($image)){
                unlink($image);
            }
        }

        $blog->delete();

        return response()->json([
            'message' => 'Blog deleted successfully',
            'redirect' => route('admin.blog')
        ]);
    }

    public function deleteAll(Request $request)
    {
        $blogs = Blog::whereIn('id', $request->ids)->get();

        foreach ($blogs as $blog) {
            $images = json_decode($blog->image);

            if (is_array($images) || is_object($images)) {
                foreach ($images as $image) {
                    if (File::exists($image)) {
                        unlink($image);
                    }
                }
            }

            $blog->delete();
        }

        return response()->json([
            'message' => __('Selected Blogs deleted successfully'),
            'redirect' => route('admin.blog')
        ]);
    }

    public function status(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);
        $blog->update(['status' => $request->status]);

        return response()->json(['message' => 'Blog']);
    }
}
