@extends('layouts.app')

@section('content')
  <div class="card mt-5">
    <div class="card-header">
      Post Info
    </div>
    <div class="card-body">
      <h5 class="card-title"><b>Title :-</b> {{$post['title']}}</h5>
      <p class="card-text"><b>Description :-</b><br>{{$post['description']}}</p>
    </div>
  </div>

  <div class="card mt-5">
    <div class="card-header">
      Post Creator Info
    </div>
    <div class="card-body">
      <h5 class="card-title"><b>Name :-</b> {{$post->user->name}}</h5>
      <h5 class="card-title"><b>Email :-</b> {{$post->user->email}}</h5>
      <h5 class="card-title"><b>Created At :-</b> {{$time_format}}</h5>
    </div>
  </div>
@endsection
