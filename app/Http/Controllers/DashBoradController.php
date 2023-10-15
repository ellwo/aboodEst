<?php

namespace App\Http\Controllers;

use App\Models\Counter;
use App\Models\Post;
use Illuminate\Http\Request;

class DashBoradController extends Controller
{
    //


    function index() {
        $counters=Counter::all();
        $post=Post::orderBy('id','asc')->first();
        return view('backend.pages.dashborad',[
            'counters'=>$counters,
            'post'=>$post
        ]);
    }
}
