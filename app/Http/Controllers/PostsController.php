<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = \App\Post::orderBy('created_at', 'DESC')->paginate(5);
        
        $data = compact('posts');
        //等同$data = ['posts' => $posts];直接將=>前後的名稱取為相同

        return view('posts.index', $data);
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
    public function store(PostRequest $request)
    {
        $post = \App\Post::create($request->all());

        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = \App\Post::find($id);

        if (is_null($post)){
            return redirect()->route('posts.index')->with('message', 'Not Found!');
        }

        $data = compact('post');

        return view('posts.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = \App\Post::find($id);

        $data = compact('post');

        return view('posts.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $post = \App\Post::find($id);

        $post->update($request->all());

        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = \App\Post::find($id);

        $post->delete();

        return redirect()->route('posts.index');

    }
    
    public function hot()
    {
        $posts = \App\Post::orderBy('page_view', 'DESC')->paginate(5);
        $data = compact('posts');
        return view('posts.hot', $data);
    }

    public function random()
    {
        $post = \App\Post::all()->random();
        $data = compact('post');
        return view('posts.random', $data);
    }
}
