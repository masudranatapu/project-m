<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
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
        $category = Category::latest()->get();
        $product = Product::latest()->get();
        $order = Order::latest()->get();
        $user = User::where('role_id', 2)->latest()->get();
        return view('admin.index', compact('title', 'category', 'product', 'order', 'user'));
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
            $profile_image_name = $slug.'-'.uniqid().'.'.$profile_image->getClientOriginalExtension();
            $upload_path = 'media/profile/';
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
        Toastr::success('Your Profile Updated successfully :-)','Success');
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
            
            Toastr::success('Your password updated successfully :-)','Success');
            return redirect()->route('login');
            
        }else {
            Toastr::warning('something is worng. Please try agian :-)','warning');
            return redirect()->back();
        }
    }
    public function allUsers()
    {
        $title = "All User";
        $users = User::where('role_id', 2)->latest()->get();
        return view('admin.user.index', compact('title', 'users'));
    }
}
