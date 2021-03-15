<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(2);
        // $dt = Carbon::parse($post['cerated_at'],'UTC');
        // $format2 = $dt->isoFormat('YY-M-D');
        return view('posts.index', [
            'posts' => $posts,
        ]);
    }

    public function show($post)
    {
        $post = Post::find($post);
        // $post = Post::where('title', 'Javascript')->first(); //this makes limit 1 and returns first result  select * from posts where title = 'Javascript' limit 1;
        // $postsWithTitle = Post::where('title', 'Javascript')->get(); //this gets all results select * from posts where title = 'Javascript';
        $dt = Carbon::parse($post['cerated_at'],'UTC');
        
        $time_format = $dt->isoFormat('MMMM Do YYYY, h:mm:ss a');
        return view('posts.show', [
            'post' => $post,
            'time_format' => $time_format
        ]);
    }

    public function create()
    {
        return view('posts.create',[
            'users' => User::all()
        ]);
    }

    public function store(Request $myRequestObject)
    {
        $data = $myRequestObject->all();
        //$data = request()->all();
        // request()->title == $data['title']

        Post::create($data);

        // Post::create($myRequestObject->all());

        // Post::create([
        //     'title' => $data['title'],
        //     'description' => $data['description'],
        //     'id' => 1, //those will be ignore cause they aren't in fillable
        //     'ajsnhdoiqwjsd' => 'aikoshdiahsdui' //those will be ignore cause they aren't in fillable
        // ]);

        //with this syntax you don't need fillable
        // $post = new Post;
        // $post->title = $data['title'];
        // $post->description = $data['description'];
        // $post->save();

        return redirect()->route('posts.index');
    }

    public function edit($post)
    {
        $post = Post::find($post);
        return view('posts.edit' , [
            'post' => $post
        ]);
    }

    public function update($post, Request $myRequestObject)
    {
        // $data = $myRequestObject->all();
        //dd($data);
        Post::find($post)->update($myRequestObject->all());
        //logic for saving in db
        // dd("skksks");
        return redirect()->route('posts.index');
        // return view('posts.index');
    }

    public function destroy($post)
    {
        Post::destroy($post);
        return redirect()->route('posts.index');
    }
    
}
