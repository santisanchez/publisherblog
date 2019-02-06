<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Post;
use App\User;

use Auth;
use App\Classes\NotifyUser;
use App\Publisher;
use App\Classes\NotifyPublisher;


class PostsController extends Controller
{
  /**
  * Display a listing of the resource.
  * @author Santiago
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $posts = Post::orderBy('created_at','desc')->get();
      return view('posts.index',compact('posts'));
  }

  /**
  * Show the form for creating a new resource.
  * @author Santiago
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    return view('posts.create');
  }

  /**
  * Store a newly created resource in storage.
  *
  * @author Santiago
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  *
  */
  public function store(Request $request)
  {
    request()->validate([
      'title' => 'required',
      'description' => 'required',
      'content' => 'required'
    ]);
    $post = new Post;
    $post->title = $request->title;
    $post->description = $request->description;
    $post->content = $request->content;
    $post->author = Auth::user()->name;
    $post->save();
    $post_id = $post->id;

    // $user = User::first();
    // $user->notify(new NotifyUser("There is a new post",$post_id));

    $publisher = Publisher::first();
    $publisher->notify(new NotifyPublisher("New Post added",$publisher->phone));

    return redirect()->route('posts.index');
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  * @author Santiago
  */
  public function show($id)
  {
    $post = Post::where('id',$id)->first();
    return view('posts.show',compact('post'));
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {
    //
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, $id)
  {
    //
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    //
  }
}
