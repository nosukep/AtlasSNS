<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\User;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        // ログインしていないユーザーがログイン後のページに移動しようとしたとき/loginに移動させる。
    }

    public function index() {
        $list = \DB::table('posts')
        ->join('users', 'posts.user_id', '=', 'users.id') //
        ->get();
        return view('posts.index',['lists' => $list]);
    }

    public function create(Request $request) {
        if ($request->isMethod('post')) {
            $post = $request -> input('newPost');
            //↑投稿フォームの値を$postに格納。
            $user_id = Auth::id();
            // $username = Auth::user()->username;


            \DB::table('posts')
            ->join('users', 'pasts.user_id', '=', 'users.id')
            ->insert([
                'post' => $post,
                'user_id' => $user_id,
                // 'username' => $username,
            ]);

            return redirect('/top');
        }


    }

}
