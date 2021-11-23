<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Auth;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $title = "Admin Dashboard";
        return view('admin.index', compact('title'));
    }
    public function profile()
    {
        $title = "Admin Profile";
        $users = User::find(Auth::user()->id);
        return view('admin.profile.index', compact('users', 'title'));
    }
    public function profileUpdate(Request $request, $id)
    {
        $validateData = $request->validate([
            'name'=>'required',
            'email'=>'required',
            'address'=>'required',
            'phone'=>'required',
        ]);
        $profile_image = $request->file('image');
        $slug = "profile";
        if (isset($profile_image)) {
            //make unique name for profile image
            $currentDate = Carbon::now()->toDateString();
            $profile_image_name = $slug.'-'.$currentDate.'-'.uniqid().'.'.$profile_image->getClientOriginalExtension();
            $upload_path = 'extrafile/profile/';
            $profile_image_url = $upload_path.$profile_image_name;

            // unlink profile image 
            $image = User::findOrFail($id);
            if ($image->image) {
                unlink($image->image);
            }

            $profile_image->move($upload_path, $profile_image_name);
        }else {
            $image = User::findOrFail($id);
            $profile_image_url = $image->image;
        }
        
        User::findOrFail($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'image' => $profile_image_url,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);
        Toastr::success('Admin Profile Updated successfully :-)','Success');
        return redirect()->back();
    }

    public function updatePass(Request $request, $id)
    {
        $validateData = $request->validate([
            'oldpassword'=>'required',
            'password'=>'required|confirmed',
        ]);

        $hasPassword = User::findOrFail($id)->password;

        if(Hash::check($request->oldpassword, $hasPassword)) {
            $userData = User::findOrFail($id);
            $userData->password = Hash::make($request->password);
            $userData->save();
            Auth::logout();
            
            Toastr::success('Website updated successfully :-)','Success');
            return redirect('/login');
            
        }else {
            Toastr::success('something is worng. Please try agian :-)','warning');
            return redirect()->back();
        }
    }
}
