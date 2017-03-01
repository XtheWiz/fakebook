@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-3">
        <img src="{{Storage::url('avatar/'.Auth::user()->id.'/avatar.jpg')}}" class=""img-responsive" alt="">
        <a href="/profile/change">Change Profile</a>
        <h3>{{Auth::user()->name}} {{Auth::user()->surname}}</h3>
        <p>{{Auth::user()->biography}}</p>
        <p class="list-group-item-text">{{Auth::user()->education}}</p>
        <p class="list-group-item-text">Website: <a href="{{Auth::user()->website}}">{{Auth::user()->website}}"</a></p>
      </div>

      {{-- New Post --}}
        <div class="col-md-8">
          <div class="panel panel-default">
            <div class="panel-heading">New Post</div>
            <div class="panel-body">
              <form class="" action="/post/new" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <textarea name="body" rows="8" cols="80" class="form-control"></textarea>
                </div>
                <div class="form-group pull-right">
                  {{csrf_field()}}
                  <input class="btn btn-success" type="button" name="submit" value="Post">
                </div>
              </form>

            </div>
          </div>

          {{-- Post --}}
          @foreach ($posts->get() as $post)
          <div class="panel panel-default">
            <div class="panel-body">
              <h4>{{$post->owner()->first()->name}} {{$post->owner()->first()->surname}}</h4>
              {{$post->body}}
              <a href="/like/{{$post->id}}"></a> <strong>{{$post->likes}} Likes</strong>
            </div>
          </div>
          @endforeach
        </div>
    </div>
</div>
@endsection
