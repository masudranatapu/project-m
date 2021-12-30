<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Clint;
use Carbon\Carbon;

class HappyClintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $title = "Happy Clints";
        $clints = Clint::latest()->get();
        return view('admin.happyclint.index', compact('title', 'clints'));
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
            'clints_say' => 'required',
        ]);

        $clint_image = $request->file('image');
        $slug = 'clint';
        if(isset($clint_image)) {
            $clint_image_name = $slug.'-'.uniqid().'.'.$clint_image->getClientOriginalExtension();
            $upload_path = 'media/clint/';
            $clint_image->move($upload_path, $clint_image_name);
    
            $image_url = $upload_path.$clint_image_name;
        }else {
            $image_url = NULL;
        }

        Clint::insert([
            'name' => $request->name,
            'image' => $image_url,
            'clints_say' => $request->clints_say,
            'created_at' => Carbon::now(),
        ]);
        Toastr::success('Happy Clints Successfully Save :-)','Success');
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
            'clints_say' => 'required',
        ]);

        $clint_image = $request->file('image');
        $slug = 'clint';
        if(isset($clint_image)) {
            $clint_image_name = $slug.'-'.uniqid().'.'.$clint_image->getClientOriginalExtension();
            $upload_path = 'media/clint/';
            $clint_image->move($upload_path, $clint_image_name);
            
            $old_clint_image = Clint::findOrFail($id);
            if($old_clint_image->image){
                unlink($old_clint_image->image);
            }

            $image_url = $upload_path.$clint_image_name;
        
            Clint::findOrFail($id)->update([
                'name' => $request->name,
                'image' => $image_url,
                'clints_say' => $request->clints_say,
                'updated_at' => Carbon::now(),
            ]);
            Toastr::success('Happy Clints Successfully Save :-)','Success');
            return redirect()->back();
        }else {
            Clint::findOrFail($id)->update([
                'name' => $request->name,
                'clints_say' => $request->clints_say,
                'updated_at' => Carbon::now(),
            ]);
            Toastr::success('Happy Clints Successfully Save Without Iamge :-)','Success');
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
        $clints = Clint::findOrFail($id);
        $delteImage = $clints->image;

        if(file_exists($delteImage)) {
            unlink($delteImage);
        }
        
        $clints->delete();
        Toastr::info('Clint Successfully delete :-)','Success');
        return redirect()->back();
    }
}
