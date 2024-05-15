<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $user = $this->route('user');
        $requiredUpdate = $user ? 'nullable' : 'required';
        $id = $user ? $user->id : '';
        return [
            "name" => "required",
            "username" => "required|unique:users,username,".$id,
            "password" => $requiredUpdate."|min:6",
            "phone" => "nullable|numeric",
            "phone_zalo" => "nullable|numeric",
            "status" => "required|in:0,1",
        ];
    }
}
