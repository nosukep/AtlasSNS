<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => 'required|string|min:2|max:12',
            'mail' => 'required|string|email|min:5|max:40',// usersテーブルで同一の値がないか
            'bio' => 'max:150',
            'password' => 'nullable|min:4|confirmed',
            'images' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1024'
        ];
    }

    /**
     *  バリデーション項目名定義
     * @return array
     */
    public function attributes()
    {
        return [
            'username' => 'ユーザー名',
            'mail' => 'メールアドレス',
            'bio' => '自己紹介文',
            'password' => 'パスワード',
            'images' => 'プロフィール画像'
        ];
    }

     /**
     * バリデーションメッセージ
     * @return array
     */
    public function messages()
    {
        return [
            'username.required' => ':attributeは必須です。',
            'username.max' => ':attributeは12字以下で入力してください。',
            'username.min' => ':attributeは2字以上で入力してください。',
            'mail.required' => ':attributeは必須です。',
            'mail.max' => ':attributeは40字以下で入力してください。',
            'mail.min' => ':attributeは5字以上で入力してください。',
            'mail.email' => ':attributeはメールアドレスの形式入力してください。',
            'bio.max' => ':attributeは150字以下で入力してください。',
            'password.min' => ':attributeは4文字以上で入力してください。',
            'password.confirmed' => ':attributeが一致しません。',
            "images.image" => "指定されたファイルが画像ではありません。",
            "mimes" => "プロフィール画像は（PNG/JPG/GIF）形式のファイルを使用してください。",
            "images.max" => "ファイルサイズは１Ｍ以下のものを指定してください。"
        ];
    }
}
