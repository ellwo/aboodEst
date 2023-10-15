<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $posts=Post::all();
        return view('backend.pages.posts.index',[
            'posts'=>$posts
        ]);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('backend.pages.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $this->validate($request,[
            'titel'=>'required',
            'content'=>'required',
            'img'=>'required',

        ]);

        Post::create([
            'titel'=>$request['titel'],
            'content'=>$request['content'],
            'img'=>$request['img'],
            'user_id'=>auth()->user()->id
        ]);


        return redirect()->route('posts')->with('status','تم اضافة الخبر بنجاح ');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
        return view('backend.pages.posts.edit',['p'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //

        $this->validate($request,[
            'titel'=>'required',
            'content'=>'required',
            'img'=>'required',

        ]);

        $post->update([
            'titel'=>$request['titel'],
            'content'=>$request['content'],
            'img'=>$request['img'],
            'user_id'=>auth()->user()->id
        ]);


        return redirect()->route('posts')->with('status','تم تعديل الخبر بنجاح ');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //

        $post->delete();
        return redirect()->route('posts')->with('status','تم حذف الخبر بنجاح ');

    }
}
