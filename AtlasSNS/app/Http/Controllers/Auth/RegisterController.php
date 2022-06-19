<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterFormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    // /**
    //  * Get a validator for an incoming registration request.
    //  *
    //  * @param  array  $data
    //  * @return \Illuminate\Contracts\Validation\Validator
    //  */
    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'username' => 'required|string|max:255',
    //         'mail' => 'required|string|email|max:255|unique:users',// usersテーブルで同一の値がないか
    //         'password' => 'required|string|min:4|confirmed'
    //     ],
    //     [
    //         'username.required' => 'ユーザー名は必須です。',
    //         'username.max' => 'ユーザー名は255字以下で入力してください。',
    //         'mail.required' => 'メールアドレスは必須です。',
    //         'mail.max' => 'メールアドレスは255字以下で入力してください。',
    //         'password.required' => 'パスワードは必須です。',
    //         'password.min' => 'パスワードは4文字以上で入力してください。',
    //         'password.confirmed' => 'パスワードが一致しません。'
    //     ]);

    //     if ($data->fails()) {
    //         return redirect('/register')
    //                     ->withErrors($data) //エラーメッセージをセッションに一時保持保存。
    //                     ->withInput();
    //     }
    // }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'mail' => $data['mail'],
            'password' => bcrypt($data['password']),
        ]);
    }


    // public function registerForm(){
    //     return view("auth.register");
    // }

    public function register(RegisterFormRequest $request){
        if($request->isMethod('post')){

            $request->session()->regenerate(); //セッションを再度設定。

            $data = $request->input(); //フォームからの入力値を連想配列化して$dataに格納。

            $this->create($data); //配列化したデータをusersテーブルにinsert。
            return redirect('added')->with('username', $data['username']); //usernameセッションを持たせて/addedページを表示させる。
        }
        return view('auth.register');
    }

    public function added(){
        return view('auth.added');
    }
}
