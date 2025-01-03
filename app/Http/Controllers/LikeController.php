<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    /**
     * Create a new like on a post 
     */
    public function store(Request $request)
    {
        $id = $request->input('post_id');

        $user = Auth::user();
        $post = Post::find($id);

        $like = Like::where('user_id', $user->id)->where('post_id', $post->id)->first();

        if (!$like) {
            $like = new Like();
            $like->user_id = $user->id;
            $like->post_id = $post->id;

            $like->save();
        }

        return redirect('/post');
    }

    /**
     * Remove a like on a post 
     */
    public function destroy(Request $request)
    {
        $id = $request->input('post_id');

        $user = Auth::user();
        $post = Post::find($id);

        Like::where('user_id', $user->id)->where('post_id', $post->id)->delete();

        return redirect('/post');
    }
}
