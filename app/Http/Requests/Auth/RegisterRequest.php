<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
                'name' => 'required|max:15|unique:users',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:4|max:15',
                'password_confirm' => 'required|min:4|max:15|same:password'
        ];
    }

    public function messages()
    {
        return [
                'name.required' => 'Поле имя обязательно',
                'name.unique' => 'Уже существует пользователь с таким именем',
                'email.required' => 'Поле пароль обязательно',
                'email.unique' => 'Уже существует пользователь с таким email',
                'password.required' => 'Поле пароль обязательно',
                'password_confirm.required' => 'Поле подтверждения обязательно',
                'password_confirm.same' => 'Пароль и его подтверждение должны совпадать'
        ];
    }
}
