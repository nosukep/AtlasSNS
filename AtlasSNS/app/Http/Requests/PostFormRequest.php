<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostFormRequest extends FormRequest
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
            'newPost' => 'required|string|min:1|max:200'
        ];
    }

     /**
     * バリデーションメッセージ
     * @return array
     */
    public function messages()
    {
        return [
            'newPost.required' => '投稿内容を入力してください。',
            'newPost.min' => '投稿は1文字以上で入力してください。',
            'newPost.max' => '投稿は200文字以下で入力してください。'
        ];
    }

}
