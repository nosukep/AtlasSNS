<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest
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
            'username' => 'required|string|max:255',
            'mail' => 'required|string|email|max:255|unique:users',// usersテーブルで同一の値がないか
            'password' => 'required|string|min:4|confirmed'
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
            'password' => 'パスワード'
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
            'password.required' => ':attributeは必須です。',
            'password.min' => ':attributeは4文字以上で入力してください。',
            'password.confirmed' => ':attributeが一致しません。'
        ];
    }


}
