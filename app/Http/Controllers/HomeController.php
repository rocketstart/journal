<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application homepage.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $posts = Post::published()->paginate(10);

        return view('home')->with('posts', $posts);
    }
}
