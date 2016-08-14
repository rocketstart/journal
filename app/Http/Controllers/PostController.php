<?php

namespace App\Http\Controllers;

use App\Models\CoverImage;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;

class PostController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $image = CoverImage::all()->random();

        return view('posts.create')->with('image', $image);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Create and publish new post
        if ($request->exists('publish')) {
            try {
                $post = Post::create($request->all());
                $post->published = true;
                $post->published_at = Carbon::now();
                $post->save();

                return redirect()->route('home');

            } catch (\Exception $e) {

                return response($e);

            }
        }

        // Save new post (without publishing it)
        $post = (new Post([
            'title'       => $request->title,
            'body'        => $request->body,
            'cover_image' => $request->cover_image,
        ]))->save();

        return redirect()->back()->with('post', $post);

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::destroy($id);

        return redirect()->route('home');
    }

    /**
     * Find Post by date and permalink
     * Return show post view
     *
     * @param $date
     * @param $permalink
     *
     * @return $this
     */
    public function showPost($date, $permalink)
    {
        $post = Post::show($date, $permalink)->firstOrFail();

        return view('posts.show')->with('post', $post);
    }
}
