<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $posts = Post::with('likes')->with(relations: 'comments')->get();
        $likedPosts = Like::where('user_id', $user->id)->pluck('post_id');

        return view('post.index')->with(['posts' => $posts, 'likedPosts' => $likedPosts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $post = new Post();

        $post->user_id = $user->id;
        $blogTitle = $request->input('blog_title');

        //error handling for if the blog_title is empty 
        if (!$blogTitle) {
            return redirect('post/create');
        }

        $blogContent = $request->input('blog_content');

        //error handling for if the blog_title is empty 
        if (!$blogContent) {
            return redirect('post/create');
        }

        $post->blog_title = $blogTitle;
        $post->blog_content = $blogContent;

        $post->save();
        return redirect('post/create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        return view('post.edit')->with(['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::find($id);
        $post->blog_title = $request->input('blog_title');
        $post->blog_content = $request->input('blog_content');

        $post->save();
        return redirect('profile');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Auth::user()->id;
        $post = Post::find($id);

        if ($user == $post->user->id) {
            $post->delete();
        }

        return redirect('/profile');
    }
}
