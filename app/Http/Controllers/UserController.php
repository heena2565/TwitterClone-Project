<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function update(Request $request){
        //upload image
        $profilePic= '';
        $bannerPic= '';
        $request->validate(
            [
                'profile_pic' => 'mimes:png,jpg,jpeg|max:2048',
                'banner' => 'mimes:png,jpg,jpeg|max:2048'
            ]
         );
        if($request->hasFile('profile_pic') && $request->file('profile_pic')->isValid()){
          $profilePic= time(). 'pp.'.$request->profile_pic->extension();
          $request->profile_pic->move(public_path('profilepic'),$profilePic);
        }
        if($request->hasFile('banner') && $request->file('banner')->isValid()){
            $bannerPic = time(). 'bann.'.$request->banner->extension();
            $request->banner->move(public_path('bannerpic'),$bannerPic);
        }
        $user = User::find(auth()->user()->id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone_no = $request->input('phone_no');
        $user->description = $request->input('description');
        if(!empty($profilePic)){
            $user->profile_pic = $profilePic;
        }
        if(!empty($bannerPic)){
            $user->banner = $bannerPic;
        }
        $user->update();
        return back()->withSuccess('Profile updated Successfully.');
    }
}
