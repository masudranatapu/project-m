<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Color;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $title = "Color";
        $colors = Color::latest()->get();
        return view('admin.unit.indexcolor', compact('title', 'colors'));
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
        Color::insert([
            'name' => $request->name,
            'status' => $request->status,
            'created_at' => Carbon::now(),
        ]);
        Toastr::success('Color Successfully Save :-)','Success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function colorActive($id)
    {
        //
        Color::findOrFail($id)->update(['status' => '1']);
        Toastr::success('Color Successfully active :-)','Success');
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function colorInactive($id)
    {
        //
        Color::findOrFail($id)->update(['status' => '0']);
        Toastr::success('Color Successfully inactive :-)','Success');
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
        Color::findOrFail($id)->update([
            'name' => $request->name,
            'status' => $request->status,
            'updated_at' => Carbon::now(),
        ]);
        Toastr::success('Color Successfully update :-)','Success');
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
        // Color::findOrFail($id)->delete();
        // Toastr::info('Color Successfully deleted :-)','Success');
        // return redirect()->back();
    }
}
