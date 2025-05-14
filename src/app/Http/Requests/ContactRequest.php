<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name' => 'required|min:2',
            'email' => 'required|email',
            'message' => 'required|max:500',

            //
        ];
    }
    public function messages()
    {
        return [
            'name.required' => '名前を入力してください',
            'name.min' => '名前は2文字以上で入力してください',
            'email.required' => 'メールアドレスを入力してください',    
            'email.email' => '正しいメールアドレスを入力してください',
            'message.required' => 'メッセージを入力してください',
            'message.max' => 'メッセージは500文字以内で入力してください',
        ];
    }
}
