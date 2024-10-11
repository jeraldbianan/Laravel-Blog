<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('custom-auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $posts = Post::with(['comments', 'user'])->orderBy('id', 'desc')->paginate(10);

        return view('home', compact('posts'));
    }

    public function post(Request $request, Post $post) {
        // $post = Post::find($post);
        return view('post', compact('post'));
    }

    public function about() {
        return view('about');
    }

    public function contact() {
        return view('contact');
    }
}
