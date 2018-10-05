<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;
use DB;

class PostsController extends Controller
{
    /**
     * @return void
     */

    public function __construct(){
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->hasFile('post_image')){
            $filenameWithExt = $request->file('post_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('post_image')->getClientOriginalExtension();
            $fileNameToStore = $filename. '_'. time(). '.'.$extension;
            $path = $request->file('post_image')->storeAs('public/post_images', $fileNameToStore);
        } else { 
            $fileNameToStore = 'noimage.jpg';
        } 

        $post = new Post;
        $post->title = $request->input('title');
        $post->country = $request->input('country');
        $post->body = $request->input('body');
        $post->author = auth()->user()->name;
        $post->user_id = auth()->user()->id;
        $post->post_image = $fileNameToStore;
        $post->continent = $request->input('continent');

        $post->save();

        return redirect('/destinations');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        if(auth()->user()->id !== $post->user_id){
            return redirect('destinations');
        }


        return view('posts.edit')->with('post', $post);
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
        
        if($request->hasFile('post_image')){
            $filenameWithExt = $request->file('post_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('post_image')->getClientOriginalExtension();
            $fileNameToStore = $filename. '_'. time(). '.'.$extension;
            $path = $request->file('post_image')->storeAs('public/post_images', $fileNameToStore);
        }

        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->country = $request->input('country');
        $post->continent = $request->input('continent');

        if($request->hasFile('post_image')){
            $post->post_image = $fileNameToStore;
        }

        $post->save();
        return redirect('/destinations/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        if(auth()->user()->id !== $post->user_id){
            return redirect('destinations');
        }

        if($post->post_image != 'noimage.jpg'){
            Storage::delete('public/post_images/' . $post->post_image);
        }

        $post->delete();
        return redirect('/destinations');
        
    }
}
