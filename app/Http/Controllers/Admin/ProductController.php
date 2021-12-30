<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Size;
use App\Models\Color;
use App\Models\Product;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Auth;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $title = "Product";
        $products = Product::latest()->get();
        return view('admin.product.index', compact('title', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::where('parent_id', NULL)->where('child_id', NULL)->latest()->get();
        $brands = Brand::where('status', 1)->latest()->get();
        $colors = Color::where('status', 1)->latest()->get();
        $sizes = Size::where('status', 1)->latest()->get();
        $title = "Create Product";
        return view('admin.product.create', compact('title', 'categories','brands', 'colors','sizes'));
    }

    public function productCategory($parent_id)
    {
        $subcategory = Category::where('parent_id', $parent_id)->where('child_id', NULL)->get();
        return json_encode($subcategory);
    }
    public function productSubcategory($subcategory_id)
    {
        $subsubcategory = Category::where('child_id', $subcategory_id)->get();
        return json_encode($subsubcategory);
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
            'category_id' => 'required',
            'brand_id' => 'required',
            'name' => 'required|max:150',
            'sell_price' => 'required',
            'availability' => 'required',
            'product_type' => 'required',
            'status' => 'required',
            'thambnail' => 'NULLable|mimes:jpeg,webp,gif,png,jpg',
        ]);
        
        // for cover photo
        $product_thambnail = $request->file('thambnail');
        $slug1 = "product";
        if (isset($product_thambnail)) {
            //make unique name for cover_photo
            $thambnail_name = $slug1.'-'.uniqid().'.'.$product_thambnail->getClientOriginalExtension();

            $upload_path = 'media/product/';
            $image_url = $upload_path.$thambnail_name;
            $product_thambnail->move($upload_path, $thambnail_name);
            $thambnail_name = $image_url;
        } else {
            $thambnail_name = NULL;
        }

        // others photo
        $multiThambnail = $request->file('multi_thambnail');
        $slug2 = "multiproduct";
        if (isset($multiThambnail)) {
            foreach ($multiThambnail as $key => $multiThamb) {
                // make unique name for image
                $multiThamb_name = $slug2.'-'.uniqid().'.'.$multiThamb->getClientOriginalExtension();
                $upload_path = 'media/multiproduct/';
                $multiThamb_image_url = $upload_path.$multiThamb_name;
                $multiThamb->move($upload_path, $multiThamb_name);
                $img_arr[$key] = $multiThamb_image_url;
            }

            $multiThamb__photo = trim(implode('|', $img_arr), '|');
        } else {
            $multiThamb__photo = NULL;
        }

        // for size 
        if ($request->size_id) {
            $size_id = trim(implode(',', $request->size_id), ',');
        } else {
            $size_id = NULL;
        }
        // for color 
        if ($request->color_id) {
            $color_id = trim(implode(',', $request->color_id), ',');
        } else {
            $color_id = NULL;
        }

        // uniq product code setup 
        $product_last = Product::select('id')->latest()->first();

        if (isset($product_last)) {
            $product_code = 'PP'.sprintf('%03d', $product_last->id + 1);
        } else {
            $product_code = 'PP'.sprintf('%03d', 1);
        }

        Product::insert([
            'name' => $request->name,
            'slug' => strtolower(str_replace(' ', '-', $request->name)),
            'regular_price' => $request->regular_price,
            'discount' => $request->discount,
            'sell_price' => $request->sell_price,
            'color_id' => $color_id,
            'size_id' => $size_id,
            'thambnail' => $thambnail_name,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'multi_thambnail' => $multiThamb__photo,
            'product_type' => $request->product_type,
            'availability' => $request->availability,
            'status' => $request->status,
            'meta_description' => $request->meta_description,
            'meta_keyword' => $request->meta_keyword,
            'product_code' => $product_code,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);
        Toastr::success('Product Successfully Save :-)','Success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::latest()->get();
        $brands = Brand::where('status', 1)->latest()->get();
        $colorses = Color::where('status', 1)->latest()->get();
        $sizes = Size:: where('status', 1)->latest()->get();
        $title = "Edit Product";
        $products = Product::where('id', $id)->first();
        return view('admin.product.edit', compact('title', 'category','brands', 'colorses','sizes', 'products'));
        
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
            'category_id' => 'required',
            'brand_id' => 'required',
            'name' => 'required|max:150',
            'sell_price' => 'required',
            'availability' => 'required',
            'product_type' => 'required',
            'status' => 'required',
            'thambnail' => 'NULLable|mimes:jpeg,webp,gif,png,jpg',
        ]);
        
        // for cover photo
        $product_thambnail = $request->file('thambnail');
        $slug1 = "product";
        if (isset($product_thambnail)) {
            //make unique name for cover_photo
            $thambnail_name = $slug1.'-'.uniqid().'.'.$product_thambnail->getClientOriginalExtension();
            $upload_path = 'media/product/';
            $image_url = $upload_path.$thambnail_name;

            // thambnail shhould be deleted if selected another thambnail 
            $old_product_thamb = Product::findOrFail($id);
            $delete_thamb = $old_product_thamb->thambnail;
            if(file_exists($delete_thamb)) {
                unlink($delete_thamb);
            }

            $product_thambnail->move($upload_path, $thambnail_name);
            $thambnail_name = $image_url;

        } else {
            $old_product_thamb = Product::findOrFail($id);
            $thambnail_name = $old_product_thamb->thambnail;
        }

        // others photo
        $multiThambnail = $request->file('multi_thambnail');
        $slug2 = "multiproduct";
        if (isset($multiThambnail)) {
            // if multi_thambnails selected then old multi thambnaills will be deleted 
            $old_multi_thamb = Product::findOrFail($id);
            $del_multi_thamb = explode('|', $old_multi_thamb->multi_thambnail) ;
            foreach($del_multi_thamb as $key => $multi_thamb_del) {
                if(file_exists($multi_thamb_del)) {
                    unlink($multi_thamb_del);
                }
            }

            foreach ($multiThambnail as $key => $multiThamb) {
                // make unique name for image
                $multiThamb_name = $slug2.'-'.uniqid().'.'.$multiThamb->getClientOriginalExtension();
                $upload_path = 'media/multiproduct/';
                $multiThamb_image_url = $upload_path.$multiThamb_name;
                $multiThamb->move($upload_path, $multiThamb_name);
                $img_arr[$key] = $multiThamb_image_url;
            }

            $multiThamb__photo = trim(implode('|', $img_arr), '|');
        } else {
            $old_multi_thamb = Product::findOrFail($id);
            $multiThamb__photo = $old_multi_thamb->multi_thambnail;
        }

        // for size 
        if ($request->size_id) {
            $size_id = trim(implode(',', $request->size_id), ',');
        }else {
            $size_id = NULL;
        }
        // for color
        if ($request->color_id) {
            $color_id = trim(implode(',', $request->color_id), ',');
        } else {
            $color_id = NULL;
        }

        // product code should not be updated 

        // uniq product code setup 
        // $product_last = Product::select('id')->latest()->first();

        // if (isset($product_last)) {
        //     $product_code = 'PP'.sprintf('%03d', $product_last->id + 1);
        // } else {
        //     $product_code = 'PP'.sprintf('%03d', 1);
        // } 

        Product::findOrFail($id)->update([
            'name' => $request->name,
            'slug' => strtolower(str_replace(' ', '-', $request->name)),
            'regular_price' => $request->regular_price,
            'discount' => $request->discount,
            'sell_price' => $request->sell_price,
            'color_id' => $color_id,
            'size_id' => $size_id,
            'thambnail' => $thambnail_name,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'multi_thambnail' => $multiThamb__photo,
            'product_type' => $request->product_type,
            'availability' => $request->availability,
            'status' => $request->status,
            'meta_description' => $request->meta_description,
            'meta_keyword' => $request->meta_keyword,
            'updated_at' => Carbon::now(),

            // user id and product code should not be update coz product can updated anyone editor 
            // 'product_code' => $product_code,
            // 'user_id' => Auth::user()->id,
        ]);
        Toastr::success('Product Successfully Save :-)','Success');
        return redirect()->back();
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
        $destroy = Product::findOrFail($id);

        $delete_thamb = $destroy->thambnail;
        if(file_exists($delete_thamb)) {
            unlink($delete_thamb);
        }

        $del_multi_thamb = explode('|', $destroy->multi_thambnail) ;
        foreach($del_multi_thamb as $multi_thamb_del) {
            if(file_exists($multi_thamb_del)) {
                unlink($multi_thamb_del);
            }
        }

        $destroy->delete();

        Toastr::warning('Product Successfully Delete :)', 'Warning');
        return redirect()->back();
    }
}