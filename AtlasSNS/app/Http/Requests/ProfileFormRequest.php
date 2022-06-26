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
            'bio' => 'max:150'
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
            'bio' => '自己紹介文'
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
            'username.max' => ':attributeは255字以下で入力してください。',
            'mail.required' => ':attributeは必須です。',
            'mail.max' => ':attributeは255字以下で入力してください。',
            'mail.email' => ':attributeはメールアドレスの形式入力してください。',
            'password.min' => ':attributeは150文字以下で入力してください。',
        ];
    }
}
