<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Policy;

class PolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $title = "Policy";
        $policies = Policy::latest()->get();
        return view('admin.policy.index', compact('title', 'policies'));
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
            'details' => 'required',
            'status' => 'required',
        ]);
        Policy::insert([
            'name'=> $request->name,
            'slug' => strtolower(str_replace('', '-', $request->name)),
            'details' => $request->details,
            'status' => $request->status,
            'created_at' => Carbon::now(),
        ]);
        Toastr::success('Policy Successfully Save :-)','Success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function policyInactive($id)
    {
        //
        Policy::findOrFail($id)->update(['status' => '0']);
        Toastr::info('Blog Successfully Inactive :-)','Success');
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function policyActive($id)
    {
        //
        Policy::findOrFail($id)->update(['status' => '1']);
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
        Policy::findOrFail($id)->update([
            'name'=> $request->name,
            'slug' => strtolower(str_replace('', '-', $request->name)),
            'details' => $request->details,
            'status' => $request->status,
            'updated_at' => Carbon::now(),
        ]);
        Toastr::info('Policy Successfully updated :-)','Success');
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
        Policy::findOrFail($id)->delete();
        Toastr::info('Policy Successfully delete :-)','Success');
        return redirect()->back();
    }
}
