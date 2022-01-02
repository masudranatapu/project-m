<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Auth;

class InformationController extends Controller
{
    //
    
    public function information()
    {
        $title = "My Profile";
        return view('customer.index', compact('title'));
    }
    
    public function profile()
    {
        $title = "Profile Setting";
        $users = User::find(Auth::user()->id);
        return view('customer.setting', compact('users', 'title'));
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
        $slug = "customer";
        if (isset($profile_image)) {
            //make unique name for profile image
            $profile_image_name = $slug.'-'.uniqid().'.'.$profile_image->getClientOriginalExtension();
            $upload_path = 'media/customer/';
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
            'updated_at' => Carbon::now(),
        ]);
        Toastr::success('Your profile update successfully :-)','Success');
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
            
            Toastr::success('Your Password update successfully :-)','Success');
            return redirect()->route('login');
            
        }else {
            Toastr::warning('Something is worng. Please try agian :-)','warning');
            return redirect()->back();
        }
    }
}
