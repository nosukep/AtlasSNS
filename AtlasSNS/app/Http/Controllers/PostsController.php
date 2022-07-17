<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Requests\PostFormRequest;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Post;
use App\User;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        // ログインしていないユーザーがログイン後のページに移動しようとしたとき/loginに移動させる。
    }

    public function index() {
        // クエリ文で取得する場合。直接deにアクセスする手法になるので非推奨。
        // $list = \DB::table('posts')
        // ->select('posts.id as id', 'user_id', 'post', 'posts.created_at as created_at', 'username', 'images')
        // ->join('users', 'posts.user_id', '=', 'users.id') //
        // ->get();

        // Post.phpのuserメソッドを使ってusersテーブルが紐づいた状態のpostsテーブルの情報を取得。
        $list = Post::with('user')->get();

        return view('posts.index',['lists' => $list]);
    }

    public function create(PostFormRequest $request) {
        if ($request->isMethod('post')) {
            $post = $request -> input('newPost');
            //↑投稿フォームの値を$postに格納。
            $user_id = Auth::id();
            // $username = Auth::user()->username;

            \DB::table('posts')
            ->insert([
                'post' => $post,
                'user_id' => $user_id,
                // 'username' => $username,
            ]);

            return redirect('/top');
        }
    }

    public function delete($id) {
        \DB::table('posts')
            ->where('id', $id)
            ->delete();
        return redirect('/top');
    }

}
