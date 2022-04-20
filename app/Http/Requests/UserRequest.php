<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UserRequest extends FormRequest
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
        'name' => ['required', 'string', 'max:40'],
        'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore(Auth::id())],
        'password' => ['required', 'string', 'min:8'],
      ];
    }

    public function attributes()
    {
      return [
        'name' => '名前',
        'email' => 'メールアドレス',
        'password' => 'パスワード',
      ];
    }

    public function messages()
    {
      return [
        'name.required' => '名前を入力してください',
        'name.max' => '名前は40文字を超えてはいけません',
        'email.required' => 'メールアドレスを入力してください',
        'email.max' => 'メールアドレスは255文字を超えてはいけません',
        'email.unique' => 'このメールアドレスは既に登録されています',
        'password.required' => 'パスワードを入力してください',
        'password.min' => 'パスワードは8文字以上で入力してください',
      ];
    }
}
