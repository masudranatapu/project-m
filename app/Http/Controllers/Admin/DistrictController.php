<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\District;
use App\Models\Division;
use Carbon\Carbon;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $title = "District";
        $districts = District::latest()->get();
        $divisions = Division::latest()->get();
        return view('admin.location.indexdis', compact('title', 'districts', 'divisions'));
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
            'division_id' => 'required',
        ]);
        District::insert([
            'name' => $request->name,
            'charge' => $request->charge,
            'division_id' => $request->division_id,
            'created_at' => Carbon::now(),
        ]);
        
        Toastr::success('District Successfully Save :-)','Success');
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
            'division_id' => 'required',
        ]);
        
        District::findOrFail($id)->update([
            'name' => $request->name,
            'charge' => $request->charge,
            'division_id' => $request->division_id,
            'updated_at' => Carbon::now(),
        ]);

        Toastr::info('District Successfully updated :-)','Success');
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
        District::findOrFail($id)->delete();
        
        Toastr::info('District Successfully delete :-)','Success');
        return redirect()->back();
    }
}
