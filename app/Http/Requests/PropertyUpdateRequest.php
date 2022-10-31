<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $isOwner = in_array(request()->input("id"), Auth()->user()->properties->pluck("id")->toArray());
        if (Auth()->user()->hasRole("admin") || $isOwner) {
            return true;
        }
        return false;


        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "title" => "required",
            "city" => "required",
            "street" => "required",
            "surface" => "required|integer",
            "price" => "required|integer",
            "status" => "required",
        ];
    }
}
