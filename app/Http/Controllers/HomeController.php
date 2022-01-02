<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Slider;
use App\Models\Category;
use App\Models\About;
use App\Models\Contact;
use App\Models\Blog;
use App\Models\Policy;

class HomeController extends Controller
{
    public function welcome()
    {
        $title = "Home";
        $sliders = Slider::where('status', 1)->latest()->get();
        $caegories = Category::where('parent_id', NULL)->where('child_id', NULL)->latest()->limit(8)->get();
        return view('welcome', compact('title', 'sliders', 'caegories'));
    }
    public function aboutUs()
    {
        $title = "About Us";
        $about = About::latest()->first();
        return view('pages.aboutus', compact('title', 'about'));
    }
    public function blogs()
    {
        $title = "Blogs";
        $blogs = Blog::where('status', 1)->latest()->get();
        return view('pages.blog', compact('title', 'blogs'));
    }
    public function blogDetails($slug)
    {
        $blog = Blog::where('slug', $slug)->latest()->first();
        $title = $blog->name;
        return view('pages.blogdetails', compact('title', 'blog'));
    }
    public function contactUs()
    {
        $title = "Contact Us";
        return view('pages.contactus', compact('title',));
    }
    public function contact(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'message' => 'required',
        ]);
        Contact::insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'message' => $request->message,
        ]);
        Toastr::success('Your message successfully received :-)','Success');
        return redirect()->back();
        
    }
    public function allCategory()
    {
        $title = "All Category";
        $caegories = Category::where('parent_id', NULL)->where('child_id', NULL)->latest()->get();
        $subcaegories = Category::where('parent_id', '!=', NULL)->where('child_id', NULL)->latest()->get();
        $subsubcaegories = Category::where('parent_id', '!=', NULL)->where('child_id', '!=', NULL)->latest()->get();
        
        return view('pages.categories', compact('title', 'caegories', 'subcaegories', 'subsubcaegories'));
    }
    public function policy($slug)
    {
        $policy = Policy::where('slug', $slug)->latest()->first();
        $title = $policy->name;
        return view('pages.policy', compact('title', 'policy'));
    }
}
