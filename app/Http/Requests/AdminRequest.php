<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
        $admin = $this->route('admin');
        $requiredUpdate = $admin ? 'nullable' : 'required';
        $id = $admin ? $admin->id : '';
        return [
            "email" => "required|email|unique:admins,email,".$id,
            "username" => "required|unique:admins,username,".$id,
            "password" => $requiredUpdate."|min:6",
            "role" => "required|in:1,2",
            "status" => "required|in:0,1",
            "tenant_code" => "required",
        ];
    }
}
