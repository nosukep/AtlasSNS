<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileFormRequest;
use Validator;
use App\User;
use App\Follow;
use Auth;

class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }

    public function updateProfile(ProfileFormRequest $request){
        // dd('check');
        if($request->isMethod('post')){
            $request->session()->regenerate(); //セッションを再度設定。

            $data = $request->input(); //フォームからの入力値を連想配列化して$dataに格納。

            $image = $request->file('images'); //フォームからの入力ファイルを連想配列化して$imageに格納。

            // dd($image);
            // DBへ更新依頼
             \DB::table('users')
                ->where(['id' => $data['id']])
                ->update([
                    'username' => $data['username'],
                    'mail' => $data['mail'],
                    'bio' => $data['bio']
                ]);

            // 画像ファイルが選択されていればusersテーブルを更新する。
            if (!empty($image)) {
                // フォームから送信した画像のファイル名取得
                $fileName =request()->file('images')->getClientOriginalName();

                // dd($image);

                // フォームから送信した画像を/storage/imagesに保存
                $image->move('storage/images', $fileName);

                // dd($file);

                // フォームから送信した画像を/storage/imagesに保存
                \DB::table('users')
                ->where(['id' => $data['id']])
                ->update([
                    'images' => '/storage/images/' . $fileName
                ]);

                }


            // パスワードの記入欄が入力されていればハッシュ化して更新する。
            if (!empty($data['password'])) {

                // $request->input('passwords')->validate([
                //  'password' => 'min:4|confirmed'
                //  ],
                // [
                // 'password.min' => 'パスワードは4文字以上で入力してください。',
                // 'password.confirmed' => 'パスワードが一致しません。',
                // ]);

                \DB::table('users')
                ->where(['id' => $data['id']])
                ->update([
                    'password' => bcrypt($data['password'])
                ]);
            }

            // トップ画面へリダイレクト
            return redirect('/top');
        }

    }

    public function searchPage(){

        // ログインユーザーはリストに表示させない
        $list = User::where("id" , "!=" , Auth::user()->id)->get();

        return view('users.search',['lists' => $list]);
    }

    public function search(Request $request){

        $username = $request->input('search');
        // dd($username);
        // dd($word);

        if (!empty($username)) {
            // キーワードのメタ文字をエスケープしてユーザー名を検索
            $pat = '%' . addcslashes($username, '%_\\') . '%';
            $list = User::where('username', 'like', '%' . $pat . '%')->get();

            // dd($list);
        } else {
        }

        return view('users.search',['lists' => $list],compact('username'));
    }

    public function follow(Request $request){
        $follow = Auth::user()->id;
        $follower = $request->input('following_id');
        // dd($follower);

        Follow::firstOrCreate(
            ['following_id' => $follow,
            'followed_id' => $follower,]
        );

        // ログインユーザーはリストに表示させない
        $list = User::where("id" , "!=" , Auth::user()->id)->get();
        return view('users.search',['lists' => $list]);
    }

    public function unfollow(Request $request){
        $follow = Auth::user()->id;
        $follower = $request->input('unfollowing_id');
        // dd($follower);

        $delete = Follow::where('following_id', $follow)
        ->where('followed_id', $follower)
        ->first();

        // dd($delete);

        if($delete) {
            $delete->delete();
            // return false;
        }

        // ログインユーザーはリストに表示させない
        $list = User::where("id" , "!=" , Auth::user()->id)->get();
        return view('users.search',['lists' => $list]);
    }
}
