<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vat;
use Brian2694\Toastr\Facades\Toastr;

class VatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $title = "Vat Amount";
        $vatamounts = Vat::latest()->get();
        return view('admin.vats.vat', compact('title', 'vatamounts'));
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
    public function vatInactive($id)
    {
        //
        Vat::findOrFail($id)->update(['status' => '0']);
        Toastr::success('Vat Successfully active :-)','Success');
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function vatActive($id)
    {
        //
        Vat::findOrFail($id)->update(['status' => '1']);
        Toastr::success('Vat Successfully active :-)','Success');
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
        ]);
        Vat::findOrFail($id)->update([
            'vat_amount' => $request->vat_amount,
            'status' => $request->status,
        ]);
        Toastr::success('Vat Successfully update :-)','Success');
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
