<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        // ログインしていないユーザーがログイン後のページに移動しようとしたとき/loginに移動させる。
    }

    public function index(){
        return view('posts.index');
    }
}
