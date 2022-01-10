<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VatAndGift;
use Brian2694\Toastr\Facades\Toastr;

class VatAndGiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $title = "Vat & Gift";
        $vatandgifts = VatAndGift::latest()->get();
        return view('admin.vatandgift.index', compact('title', 'vatandgifts'));
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
    public function vatGiftInactive($id)
    {
        //
        VatAndGift::findOrFail($id)->update(['status' => '0']);
        Toastr::success('Vat & Gift Successfully active :-)','Success');
        return redirect()->back();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function vatGiftActive($id)
    {
        //
        VatAndGift::findOrFail($id)->update(['status' => '1']);
        Toastr::success('Vat & Gift Successfully active :-)','Success');
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
            'vat_amount' => 'required',
            'gift_amount' => 'required',
        ]);
        VatAndGift::findOrFail($id)->update([
            'vat_amount' => $request->vat_amount,
            'gift_amount' => $request->gift_amount,
            'status' => $request->status,
        ]);
        Toastr::success('Vat & Gift Successfully update :-)','Success');
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
