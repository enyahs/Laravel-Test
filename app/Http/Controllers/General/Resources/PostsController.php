<?php

namespace App\Http\Controllers\General\Resources;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('web/pages/posts/index', [
            "title" => "View Posts",
            "posts" => Post::with("user")->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('web/pages/posts/create', [
            "title" => "Create Post",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, 
            [
                'title' => 'required|string|min:3|max:255',
                'body' => 'required|string|min:10|max:5000',
            ]
        );
        
        Post::create(
            array_merge($request->all(), [
                "user_id" => Auth::id()
            ])
        );

        return redirect()->route('post.index')->with([
            'status' => 'New post has been created successfully.'
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('web/pages/posts/show', [
            "title" => "Show Post",
            "post" => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        return view('web/pages/posts/edit', [
            "title" => "Edit Post",
            "post" => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);

        $this->validate($request, 
            [
                'title' => 'required|string|min:3|max:255',
                'body' => 'required|string|min:10|max:5000',
            ]
        );

        $post->update($request->all());
 
        return redirect()->route('post.index')->with([
            'status' => 'Post has been updated!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $this->authorize('forceDelete', $post);

        $post->delete();

        return redirect()->route('post.index')->with([
            'status' => 'Post has been deleted!'
        ]);
    }
}
