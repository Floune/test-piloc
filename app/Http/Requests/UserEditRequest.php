<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $isOwner = in_array(request()->input("id"), Auth()->user()->id);
        if (Auth()->user()->hasRole("admin") || $isOwner) {
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "firstname" => "required",
            "lastname" => "required",
            "email" => "required|email",
            "id" => "required",
        ];
    }
}
