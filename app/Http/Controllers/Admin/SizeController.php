<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Size;
use Brian2694\Toastr\Facades\Toastr;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $title = "Size";
        $sizes = Size::latest()->get();
        return view('admin.unit.indexsize', compact('title', 'sizes'));
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
        Size::insert([
            'name' => $request->name,
            'status' => $request->status,
        ]);
        Toastr::success('Size Successfully Save :-)','Success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function sizeInactive($id)
    {
        //
        Size::findOrFail($id)->update(['status' => '0']);
        Toastr::info('Size Successfully inactive :-)','Success');
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function sizeActive($id)
    {
        //
        Size::findOrFail($id)->update(['status' => '1']);
        Toastr::success('Size Successfully active :-)','Success');
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
        Size::findOrFail($id)->update([
            'name' => $request->name,
            'status' => $request->status,
        ]);
        Toastr::success('Size Successfully update :-)','Success');
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
        // Size::findOrFail($id)->delete();
        // Toastr::info('Size Successfully deleted :-)','Success');
        // return redirect()->back();
    }
}
