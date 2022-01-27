<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Website;
use Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;

class WebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $website = Website::latest()->first();
        $title = "Website Update";
        return view('admin.website.index', compact('title', 'website'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addRemoveRow(Request $request)
    {
        //
        $website_row = $request->id;

        $data = NULL;
        $data .=    '<tr id="website_remove_row_'.$website_row.'">';
        $data .=        '<th>
                            <input type="text" name="icon[]" class="form-control" placeholder="Icon form frontawsome">
                        </th>';
        $data .=        '<td>
                            <input type="text" name="link[]" class="form-control" placeholder="Website link like https://... ">
                        </td>';
        $data .=        '<td class="text-center">
                            <button type="button" onclick="websiteRemovieRow(this)" id="'.$website_row.'" class="btn btn-sm btn-danger">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>';
        $data .=    '</tr>';
        return $data;
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
            'email' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);

        // for logo
        $logo = $request->file('logo');
        $slug_1 = 'logo';
        if (isset($logo)) {
            // make unique name for image
            $logo_image = $slug_1.'-'.uniqid().'.'.$logo->getClientOriginalExtension();
            $upload_path = 'media/logo/';
            $logo_image_url = $upload_path.$logo_image;
            $website = Website::findOrFail($id);
            if ($website->logo) {
                unlink($website->logo);
            }
            $logo->move($upload_path, $logo_image);
        } else {
            $website = Website::findOrFail($id);
            $logo_image_url = $website->logo;
        }

        // for favcion 
        $favicon = $request->file('favicon');
        $slug = 'favicon';
        if (isset($favicon)) {
            //make unique name for favicon
            $fav_icon = $slug.'-'.uniqid().'.'.$favicon->getClientOriginalExtension();
            $upload_path = 'media/logo/';
            $fav_icon_url = $upload_path.$fav_icon;
            $website = Website::findOrFail($id);
            if ($website->favicon) {
                unlink($website->favicon);
            }
            $favicon->move($upload_path, $fav_icon);
        } else {
            $website = Website::findOrFail($id);
            $fav_icon_url = $website->favicon;
        }
        if($request->icon) {
            $icon = trim(implode('|', $request->icon), '|');
        }else {
            $icon = NULL;
        }
        if($request->link) {
            $link = trim(implode('|', $request->link), '|');
        }else {
            $link = NULL;
        }
        Website::findOrFail($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'fax' => $request->fax,
            'tel' => $request->tel,
            'address' => $request->address,
            'icon' => $icon,
            'link' => $link,
            'logo' => $logo_image_url,
            'favicon' => $fav_icon_url,
            'updated_at' => Carbon::now(),
        ]);
        
        Toastr::success('Website updated successfully :-)','Success');
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
