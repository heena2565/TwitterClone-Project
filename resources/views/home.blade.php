@extends('layouts.app')
@section('content')
@if($message= Session::get('success'))
<div class="alert alert-success alert-block">
  <strong>{{ $message }}</strong>
</div>
@endif
<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\UserController;
$profilePic = 'https://images.unsplash.com/photo-1511367461989-f85a21fda167?auto=format&fit=crop&q=80&w=1000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8cHJvZmlsZXxlbnwwfHwwfHx8MA%3D%3D';
if(auth()->user()->profile_pic){
  $profilePic = "profilepic/".auth()->user()->profile_pic;
}
$bannerPic = 'https://static.vecteezy.com/system/resources/thumbnails/006/965/779/small/empty-top-wooden-table-and-sakura-flower-with-fog-and-morning-light-background-photo.jpg';
if(auth()->user()->banner){
  $bannerPic = "bannerpic/".auth()->user()->banner;
}
?>
<div class="container">
  <div class="row">
    <div class="col">
      <div class="left-side">
        <div class="card" style="background:url({{$bannerPic}}) no-repeat; background-size:100% 30%;">
          <div class="profile-pic"><img style=" border-radius:50%; width:90px; height:90px; margin-left:60px; margin-top:70px" src="{{$profilePic}}"></div>
          <div class="card-body">
            <h5 class="card-title" style=" margin-left:40px;">{{auth()->user()->name}}</h5>
            <p class="card-title" style="font-size:14px">Theres so much we can do.</p>
            <hr>
            <div class="p-1 text-black" style="background-color: #f8f9fa;font-size:14px;">
              <div class="d-flex justify-content-end text-center py-1" style="font-size:14px;">
                <div>
                  <p class="mb-1 h6">253</p>
                  <p class="small text-muted mb-0">Tweets</p>
                </div>
                <div class="px-3">
                  <p class="mb-1 h6">1026</p>
                  <p class="small text-muted mb-0">Followers</p>
                </div>
                <div>
                  <p class="mb-1 h6">478</p>
                  <p class="small text-muted mb-0">Following</p>
                </div>
              </div>
            </div>
            <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="width: 98%;">Edit Profile</button>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                  <div class="modal-body">
                    <!-- Modal content goes here -->
                      @csrf
                      <div class="row">
                        <div class="col">
                          <label class="profile-label">Name</label>
                          <div class="form-group">
                            <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->name }}" placeholder="Name">
                          </div>
                        </div>
                        <div class="col">
                          <label class="profile-label">Email</label>
                          <div class="form-group">
                            <input type="text" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" placeholder="email">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                          <label class="profile-label">Phone number</label>
                          <div class="form-group">
                            <input type="number" class="form-control" id="phoneno" name="phone_no" value="{{ auth()->user()->phone_no }}" placeholder="Phone Number">
                          </div>
                        </div>
                        <div class="col">
                          <label class="profile-label">Bio</label>
                          <div class="form-group">
                            <input type="text" class="form-control" name="description" value="{{ auth()->user()->description }}" placeholder="Bio">
                          </div>
                        </div>
                      </div>
                      <?php
                          $profilePic = '';
                        if(auth()->user()->profile_pic){
                          $profilePic = "profilepic/".auth()->user()->profile_pic;
                        }
                        $bannerPic = '';
                        if(auth()->user()->banner){
                          $bannerPic = "bannerpic/".auth()->user()->banner;
                        }
                      ?>
                      <div class="row">
                        <div class="col">
                          <label class="profile-label">Profile</label>
                          <div class="form-group">
                            <input type="file" name="profile_pic"  class="form-control">
                          </div>
                          <img src="{{$profilePic}}" alt="" width="20" height="20" srcset="">
                        </div>
                        <div class="col">
                          <label class="profile-label">Cover Photo</label>
                          <div class="form-group">
                            <input type="file" name="banner"  class="form-control">
                          </div>
                          <img src="{{$bannerPic}}" alt="" width="20" height="20" srcset="">
                        </div>
                      </div>
                    </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- center here -->
    <div class="col-6  no-gutters">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
      <div class="center">
        <div class="card" style="border-radius: 10px;height:120px;">
          <div class="d-flex flex-start w-100 pt-3">
            <img class="rounded-circle shadow-1-strong me-3" src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(19).webp" alt="avatar" width="40" height="40" style="margin:4px;" />
            <form method="post" action="/store" enctype="multipart/form-data">
              @csrf
              <div class="d-flex flex-start ">
                <textarea class="form-control" name="content" id="textAreaExample" required rows="1" cols="35" style="background: #fff;" placeholder="Write here."></textarea>
                <button type="submit" class=" btn btn-primary" style="color:white;height:70%; margin-left:7px;margin-top:4px;">Tweet</button><br>
              </div>
              <div class="d-flex flex-start mt-2">
                <input type="file" name="image">
              </div>
            </form>
          </div>
        </div>
        <div class="card mt-3">
          <div class="card-header">
            <h5 style="color:blue;">Tweets & Replies</h5>
          </div>
          @foreach($tweets as $tweet)
          <div class="card-body">
            <div class="d-flex flex-start w-100">
              <img class="rounded-circle shadow-1-strong me-3" src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(19).webp" alt="avatar" width="60" height="50" />
              <h5 class="card-title" style="margin-top: 10px;">{{ auth()->user()->name}}</h5>
            </div>
            <p class="card-text">
            <p> {{ $tweet->content }}</p>
            @if(!empty($tweet->image))
            <?php $ext = explode(".",$tweet->image);
                if(isset($ext[1]) && $ext[1] == 'mp4'){
            ?>
              <video  src="{{URL::asset('tweets/')}}/{{$tweet->image}}" width="300px" height="150px"  controls>
            </video>
            <?php } else { ?>
            <img src="tweets/{{$tweet->image}}" class="border-0" width="200px" height="150px">
            <?php }?>
            @endif
            <hr>
            <div class="d-flex flex-start w-100">
            <form method="POST" action="{{ route('like.save') }}">
                <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                <input name="tweet_id" type="hidden" value="{{ $tweet->id }}" />
              &emsp;
              <button type="submit" class="comment-submit-button"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="45" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
              </svg>
              </button>
              <div class="likes-count">{{LikeController::getCount($tweet->id)}}</div>
            </form>
              <form method="POST" action="{{ route('comment.save') }}">

                <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                <input name="tweet_id" type="hidden" value="{{ $tweet->id }}" />
                &emsp;
                <input type="text" name="comment" placeholder="comment" required class="comment-class" style="border-radius:15px; border:1px solid grey;" />&emsp;
                <button type="submit" class="comment-submit-button"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                    <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z" />
                  </svg></button>

              </form>
            </div>
            <div class="container">
              <?php $comments = CommentController::get($tweet->id); ?>
              @foreach($comments as $comment)
              <div class="dialogbox">
                <div class="body">
                  <span class="tip tip-up"></span>
                  <div class="message">
                    <span>{{$comment->comments}}</span>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
          <div class="hr-class"></div>
          @endforeach
          &emsp;
        </div>

      </div>
    </div>
    <div class="col">
      <div class="right-side ">
        <div class="card border-0 bg-primary" style="width: 18rem;">
          <div class="card-header">
            Notifications
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Notification 1</li>
            <li class="list-group-item">Notification 2</li>
            <li class="list-group-item">Notification 3</li>
          </ul>
        </div>
      </div>

    </div>
  </div>
  <div class="card-body">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
      {{ session('status') }}
    </div>
    @endif

  </div>
</div>
</div>
</div>
</div>
@endsection
