@extends('layouts.app')

@section('content')
<div class="container">
  <div class="d-flex">
    <a href="{{route('posts.create')}}" class="mx-auto btn btn-success">Create Post</a>
  </div>

  <table class="table mt-5">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">title</th>
        <th scope="col">posted by</th>
        <th scope="col">created at</th>
        <th scope="col">actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($posts as $post)
      <tr>
        <th scope="row">{{$post->id}}</th>
        <td>{{$post->title}}</td>
        <td>{{$post->user ? $post->user->name : 'user not found'}}</td>
        <td>{{$post->created_at->format('Y-m-d')}}</td>
        <td class="col" style="display: flex;">
          <a href="{{ route('posts.show', [ 'post' => $post['id'] ]) }}" class="btn btn-info" style="margin-right: 5px;">View</a>
          <a href="{{route('posts.edit', ['post' => $post['id'] ])}}" class="btn btn-primary">Edit</a>
          <!-- <a href="#" class="btn btn-danger">Delete</a> -->
          <form method="post" action="{{route('posts.destroy' , ['post'=>$post['id']])}}">
            @csrf
            {{ method_field('DELETE') }}‏
            <input type="submit" value="Delete" class="btn btn-danger" onclick="return confirm('Are you sure ?')">
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{$posts->links('posts.pagination')}}
</div>
@endsection