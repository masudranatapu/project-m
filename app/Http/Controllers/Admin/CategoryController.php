<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $title = "Category";
        $categories = Category::where('parent_id', NULL)->where('child_id', NULL)->latest()->get();
        $allcategory = Category::latest()->get();
        return view('admin.category.index', compact('title', 'categories', 'allcategory'));
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
        ]);

        $category_image = $request->file('image');
        $slug = 'category';
        if(isset($category_image)) {
            $category_image_name = $slug.'-'.uniqid().'.'.$category_image->getClientOriginalExtension();
            $upload_path = 'media/category/';
            $category_image->move($upload_path, $category_image_name);
    
            $image_url = $upload_path.$category_image_name;
        }else {
            $image_url = "";
        }

        Category::insert([
            'name'=> $request->name,
            'parent_id'=> $request->parent_id,
            'child_id'=> $request->child_id,
            'slug' => strtolower(str_replace(' ', '-', $request->name)),
            'image' => $image_url,
            'icon' => $request->icon,
            'created_at' => Carbon::now(),
        ]);
        Toastr::success('Category Successfully Save :-)','Success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function parentChild($cate_id)
    {
        //
        $parentCategory = Category::where('parent_id', $cate_id)->latest()->get();
        return json_encode($parentCategory);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        ]);

        $category_image = $request->file('image');
        $slug = 'category';
        if(isset($category_image)) {
            $category_image_name = $slug.'-'.uniqid().'.'.$category_image->getClientOriginalExtension();
            $upload_path = 'media/category/';
            $category_image->move($upload_path, $category_image_name);

            $category_old_image = Category::findOrFail($id);
            if ($category_old_image->image) {
                unlink($category_old_image->image);
            }
    
            $image_url = $upload_path.$category_image_name;
            Category::findOrFail($id)->update([
                'name'=> $request->name,
                'parent_id'=> $request->parent_id,
                'child_id'=> $request->child_id,
                'slug' => strtolower(str_replace(' ', '-', $request->name)),
                'image' => $image_url,
                'icon' => $request->icon,
                'updated_at' => Carbon::now(),
            ]);
            Toastr::success('Category Successfully Save :-)','Success');
            return redirect()->back();
        }else {
            Category::findOrFail($id)->update([
                'name'=> $request->name,
                'parent_id'=> $request->parent_id,
                'child_id'=> $request->child_id,
                'slug' => strtolower(str_replace(' ', '-', $request->name)),
                'icon' => $request->icon,
                'updated_at' => Carbon::now(),
            ]);
            Toastr::success('Category Successfully save without image :-)','Success');
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
    }
}
