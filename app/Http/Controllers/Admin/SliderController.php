<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Slider;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $title = "Slider";
        $sliders = Slider::latest()->get();
        return view('admin.slider.index', compact('title', 'sliders'));
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
            'status' => 'required',
        ]);

        $slider_image = $request->file('image');
        $slug = 'slider';
        $slider_image_name = $slug.'-'.uniqid().'.'.$slider_image->getClientOriginalExtension();
        $upload_path = 'media/slider/';
        $slider_image->move($upload_path, $slider_image_name);

        $image_url = $upload_path.$slider_image_name;
        
        Slider::insert([
            'name'=> $request->name,
            'image' => $image_url,
            'status' => $request->status,
            'created_at' => Carbon::now(),
        ]);
        Toastr::success('Slider Successfully Save :-)','Success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function sliderInactive($id)
    {
        //
        Slider::findOrFail($id)->update(['status' => '0']);
        Toastr::info('Slider Successfully Inactive :-)','Success');
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function sliderActive($id)
    {
        //
        Slider::findOrFail($id)->update(['status' => '1']);
        Toastr::success('Slider Successfully Inactive :-)','Success');
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

        $slider_image = $request->file('image');
        $slug = 'slider';
        if(isset($slider_image)) {
            $slider_image_name = $slug.'-'.uniqid().'.'.$slider_image->getClientOriginalExtension();
            $upload_path = 'extrafile/slider/';
            $slider_image->move($upload_path, $slider_image_name);

            $sliderimage = Slider::findOrFail($id);
            if ($sliderimage->image) {
                unlink($sliderimage->image);
            }
            $image_url = $upload_path.$slider_image_name;
            
            Slider::findOrFail($id)->update([
                'name'=> $request->name,
                'image' => $image_url,
                'status' => $request->status,
                'updated_at' => Carbon::now(),
            ]);
            Toastr::success('Slider Successfully Save :-)','Success');
            return redirect()->back();
        }else {
            Slider::findOrFail($id)->update([
                'name'=> $request->name,
                'status' => $request->status,
                'updated_at' => Carbon::now(),
            ]);
            Toastr::success('Slider successfully save without image :-)','Success');
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
        $sliders =Slider::findOrFail($id);
        $deleteImage = $sliders->image;

        if(file_exists($deleteImage)) {
            unlink($deleteImage);
        }

        $sliders->delete();
        Toastr::info('Slider Successfully delete :-)','Success');
        return redirect()->back();
    }
}
