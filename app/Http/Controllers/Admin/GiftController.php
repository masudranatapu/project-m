<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gift;
use Brian2694\Toastr\Facades\Toastr;

class GiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $title = "Gift Amount";
        $giftamounts = Gift::latest()->get();
        return view('admin.vatandgift.gift', compact('title', 'giftamounts'));
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function giftInactive($id)
    {
        //
        Gift::findOrFail($id)->update(['status' => '0']);
        Toastr::success('Gift amount uccessfully inactive :-)','Success');
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function giftActive($id)
    {
        //
        Gift::findOrFail($id)->update(['status' => '1']);
        Toastr::success('Gift amount uccessfully active :-)','Success');
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
            'gift_amount' => 'required',
        ]);
        Gift::findOrFail($id)->update([
            'gift_amount' => $request->gift_amount,
            'status' => $request->status,
        ]);
        Toastr::success('Gift amount successfully update :-)','Success');
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
    }
}
