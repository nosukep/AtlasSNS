<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileFormRequest;
use Validator;

class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }

    public function updateProfile(ProfileFormRequest $request){
        if($request->isMethod('post')){

            $request->session()->regenerate(); //セッションを再度設定。

            $data = $request->input(); //フォームからの入力値を連想配列化して$dataに格納。
            // DBへ更新依頼
             \DB::table('users')
                ->where(['id' => $data['id']])
                ->update([
                    'username' => $data['username'],
                    'mail' => $data['mail'],
                    'bio' => $data['bio']
                ]);

            // パスワードの記入欄が入力されていればハッシュ化して更新する。
            if (!empty($data['password'])) {

                $request->validate([
                 'password' => 'min:4|confirmed'
                 ],
                [
                'password.min' => 'パスワードは4文字以上で入力してください。',
                'password.confirmed' => 'パスワードが一致しません。',
                ]);

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

    public function search(){
        return view('users.search');
    }
}
