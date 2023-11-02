<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
   
    public function save(Request $request){
    
        $comment = new Comment;
        $comment->tweet_id= $request->tweet_id;
        $comment->comments= $request->comment;
        $comment->user_id= auth()->user()->id;
        $comment->save();
        return back()->withSuccess('Commented Successfully.');
    }

    public static function get($tweetId){
        $comment =  Comment::where('user_id', auth()->user()->id)
                            ->where('tweet_id', $tweetId)->get();
        return $comment;
    }
}
