<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $tweets = Tweet::get()->sortDesc();
        return view('home',['tweets'=>$tweets]);
    }

    public function create(){
        return view('home');
    }

    public function store(Request $request){
        //upload image
        $validated = $request->validate([
            'content' => 'required',
            'image' => 'mimes:png,jpg,jpeg,mp4'
        ]);

       $imageName= '';
       if($request->hasFile('image') && $request->file('image')->isValid()){
           $file = $request->file('image');
           $imageName= time().'.'.$request->image->extension();
           $file->move('tweets', $imageName);
       }

        $tweet = new Tweet;
        $tweet->image= $imageName;
        $tweet->content= $request->content;
        $tweet->user_id= auth()->user()->id;
        $tweet->save();
        return back()->withSuccess('Tweeted Successfully.');
    }


}
