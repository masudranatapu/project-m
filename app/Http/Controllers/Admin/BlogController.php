<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Blog;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $title = "Blogs";
        $blogs = Blog::latest()->get();
        return view('admin.blog.index', compact('title', 'blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required',
            'details' => 'required',
            'status' => 'required',
        ]);

        $blog_image = $request->file('image');
        $slug = 'blog';
        $blog_image_name = $slug.'-'.uniqid().'.'.$blog_image->getClientOriginalExtension();
        $upload_path = 'media/blog/';
        $blog_image->move($upload_path, $blog_image_name);

        $image_url = $upload_path.$blog_image_name;
        
        Blog::insert([
            'name'=> $request->name,
            'slug' => strtolower(str_replace(' ', '-', $request->name)),
            'details' => $request->details,
            'image' => $image_url,
            'status' => $request->status,
            'created_at' => Carbon::now(),
        ]);
        Toastr::success('Blog Successfully Save :-)','Success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function blogInactive($id)
    {
        //
        Blog::findOrFail($id)->update(['status' => '0']);
        Toastr::info('Blog Successfully Inactive :-)','Success');
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function blogActive($id)
    {
        //
        Blog::findOrFail($id)->update(['status' => '1']);
        Toastr::success('Blog Successfully active :-)','Success');
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'name' => 'required',
            'details' => 'required',
            'status' => 'required',
        ]);

        $blog_image = $request->file('image');
        $slug = 'blog';
        if(isset($blog_image)) {
            $blog_image_name = $slug.'-'.uniqid().'.'.$blog_image->getClientOriginalExtension();
            $upload_path = 'media/blog/';
            $blog_image->move($upload_path, $blog_image_name);

            $blogsimage = Blog::findOrFail($id);
            if ($blogsimage->image) {
                unlink($blogsimage->image);
            }

            $image_url = $upload_path.$blog_image_name;
            
            Blog::findOrFail($id)->update([
                'name'=> $request->name,
                'slug' => strtolower(str_replace(' ', '-', $request->name)),
                'details' => $request->details,
                'image' => $image_url,
                'status' => $request->status,
                'updated_at' => Carbon::now(),
            ]);
            Toastr::success('Blog Successfully Save :-)','Success');
            return redirect()->back();
        }else {
            Blog::findOrFail($id)->update([
                'name'=> $request->name,
                'slug' => strtolower(str_replace(' ', '-', $request->name)),
                'details' => $request->details,
                'status' => $request->status,
                'updated_at' => Carbon::now(),
            ]);
            Toastr::success('Blog Successfully Save without image:-)','Success');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $blogs =Blog::findOrFail($id);
        $deleteImage = $blogs->image;

        if(file_exists($deleteImage)) {
            unlink($deleteImage);
        }

        $blogs->delete();
        Toastr::info('Blog Successfully delete :-)','Success');
        return redirect()->back();
    }
}
