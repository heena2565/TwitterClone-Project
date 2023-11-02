<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use DB;

class LikeController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function save(Request $request)
    {
        if (Like::where('tweet_id', $request->tweet_id)->where('user_id', auth()->user()->id)->count() > 0) {
            $like = DB::table('likes')->where('tweet_id', $request->tweet_id)->where('user_id', auth()->user()->id)->delete();
           $msg = "You unlike the comment successfully";
        } else {
            $msg = "You like the comment successfully";
            $like = new Like;
            $like->tweet_id= $request->tweet_id;
            $like->user_id= auth()->user()->id;
            $like->save();
        }
        return back()->withSuccess($msg);
    }
    public static function getCount($tweetId){
        $likeCount =  Like::where('tweet_id', $tweetId)->count();
        return $likeCount > 0 ? $likeCount.' like':'';
    }

}
