<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PagesController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->simplePaginate(2);
        return view('front.index', compact('posts'));
    }

    public function single($slug)
    {
        $post = Post::where('slug', $slug)->first();
        return view('front.single', compact('post'));
    }

    public function about()
    {
        return view('front.about');
    }

    public function contact()
    {
        return view('front.contact');
    }

    public function contactSubmit(Request $request)
    {

        Mail::to('admin@admin.com')->send(new ContactMail($request->except('_token')));

        return redirect()->back();
    }
}
