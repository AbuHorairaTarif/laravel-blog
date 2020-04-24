<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
class CommentController extends Controller
{
    public function newComment(Request $request)
    {
        $comment = new Comment();
        $comment->visitor_id                             = $request->visitor_id;
        $comment->blog_id                                = $request->blog_id;
        $comment->comment                             = $request->comment;
        $comment->save();
        
        return redirect('/blog-details/'.$request->blog_id)
                                    ->with('message','Comment is posted');
    }
}
