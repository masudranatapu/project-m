<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Brand;
use Carbon\Carbon;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $title = "Brand";
        $brands = Brand::latest()->get();
        return view('admin.brand.index', compact('title', 'brands'));
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
        ]);

        $brand_image = $request->file('image');
        $slug = 'brand';
        $brand_image_name = $slug.'-'.uniqid().'.'.$brand_image->getClientOriginalExtension();
        $upload_path = 'media/brand/';
        $brand_image->move($upload_path, $brand_image_name);

        $image_url = $upload_path.$brand_image_name;
        
        Brand::insert([
            'name'=> $request->name,
            'slug' => strtolower(str_replace(' ', '-', $request->name)),
            'image' => $image_url,
            'link' => $request->link,
            'status' => "1",
            'created_at' => Carbon::now(),
        ]);
        Toastr::success('Brand Successfully Save :-)','Success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function brandsActive($id)
    {
        //
        
        Brand::findOrFail($id)->update(['status' => '1']);
        Toastr::info('Brand Successfully Active :-)','Success');
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function brandsInactive($id)
    {
        //
        Brand::findOrFail($id)->update(['status' => '0']);
        Toastr::info('Brand Successfully Inactive :-)','Success');
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
        ]);

        $brand_image = $request->file('image');
        $slug = 'brand';
        if(isset($brand_image)) {
            $brand_image_name = $slug.'-'.uniqid().'.'.$brand_image->getClientOriginalExtension();
            $upload_path = 'media/brand/';
            $brand_image->move($upload_path, $brand_image_name);

            $brandimage = Brand::findOrFail($id);
            if ($brandimage->image) {
                unlink($brandimage->image);
            }

            $image_url = $upload_path.$brand_image_name;
            
            Brand::findOrFail($id)->update([
                'name'=> $request->name,
                'slug' => strtolower(str_replace(' ', '-', $request->name)),
                'image' => $image_url,
                'link' => $request->link,
                'updated_at' => Carbon::now(),
            ]);
            Toastr::success('Brand Successfully Save :-)','Success');
            return redirect()->back();
        }else {
            Brand::findOrFail($id)->update([
                'name'=> $request->name,
                'slug' => strtolower(str_replace(' ', '-', $request->name)),
                'link' => $request->link,
                'updated_at' => Carbon::now(),
            ]);
            Toastr::success('Brand Successfully Save without image:-)','Success');
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
