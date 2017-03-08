@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-3">
        <img src="/profile/image" class="img-responsive" alt=""/>
        <a href="/profile/change">Change Profile</a>
        <h3>{{Auth::user()->name}} {{Auth::user()->surname}}</h3>
        <p>{{Auth::user()->biography}}</p>
        <p class="list-group-item-text">{{Auth::user()->education}}</p>
        <p class="list-group-item-text">Website: <a href="{{Auth::user()->website}}">{{Auth::user()->website}}"</a></p>
      </div>

      {{-- New Post --}}
        <div class="col-md-8">
          <div class="panel panel-default">
            <div class="panel-heading primary">New Post</div>
            <div class="panel-body">
              <form class="" action="/post/new" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <textarea name="body" rows="8" cols="80" class="form-control"></textarea>
                </div>
                <div class="form-group pull-right">
                  {{csrf_field()}}
                  <input class="btn btn-success" type="submit" value="Post">
                </div>
              </form>

            </div>
          </div>

          {{-- Post --}}
          @foreach ($posts->get() as $post)
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4>{{$post->owner->name}} {{$post->owner->surname}}<br><small>{{date_format(date_create($post->created_at), "Y/m/d")}}</small></h4>

              <p>{{$post->body}}</p>
              <a href = "/like/{{$post->id}}"><strong>{{$post->likes}} Like(s)</strong></a>
            </div>

            {{-- Comment --}}
            @foreach ($post->comments()->get() as $comment)
            <div class="panel-body">
              <h5>{{$comment->owner->name}} {{$comment->owner->surname}} said on {{date_format(date_create($comment->created_at), "Y/m/d h:i:s")}}</h5>
              <p>{{$comment->body}}</p>
              <a href = "/comment/like/{{$comment->id}}"><strong>{{$comment->likes}} Like(s)</strong></a>
            </div>
            @endforeach

            {{-- Comment Box --}}
            <form class="form-inline" action="/comment/new/{{$post->id}}" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <input size="93" type="text" class="form-control col-sm-10" id="comment" placeholder="Say something" name="commentbox">
              </div>
              {{csrf_field()}}
              <button type="submit" class="btn btn-primary pull-right">Say</button>
            </form>
          </div>
          @endforeach
        </div>
    </div>
</div>
@endsection
