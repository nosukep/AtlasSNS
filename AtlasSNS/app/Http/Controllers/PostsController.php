<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Requests\PostFormRequest;
use App\Http\Requests\PostUpdateRequest;
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
        ->select('posts.id as id', 'user_id', 'post', 'posts.created_at as created_at', 'username', 'images')
        ->join('users', 'posts.user_id', '=', 'users.id') //
        ->get();
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
        //dd($id); ボタンを押した投稿のpost_idが取得できているか確認
        \DB::table('posts')
            ->where('id', $id)
            ->delete();
        return redirect('/top');
    }

    public function update(PostUpdateRequest $request)
    {
        $id = $request->input('id');
        $up_post = $request->input('upPost');
        \DB::table('posts')
            ->where('id', $id)
            ->update(
                ['post' => $up_post]
            );

        return redirect('/top');
    }

}
