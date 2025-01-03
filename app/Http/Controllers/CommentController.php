<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Create a new comment on a post 
     */
    public function store(Request $request)
    {
        $id = $request->input('post_id');

        $user = Auth::user();
        $post = Post::find($id);
        $commentBody = $request->input('comment_body');

        //error handling for if the comment_body is empty 
        if (!$commentBody) {
            return redirect('/post');
        }

        $comment = new Comment();
        $comment->user_id = $user->id;
        $comment->post_id = $post->id;

        $comment->comment_body = $commentBody;

        $comment->save();

        return redirect('/post');
    }

    /**
     * Remove a comment on a post 
     */
    public function destroy()
    {
        //
    }
}
