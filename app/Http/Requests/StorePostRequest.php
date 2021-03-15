<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class StorePostRequest extends FormRequest
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
            'title' => 'required|min:5|unique:App\Models\Post,title'.$this->post,
            'description' => 'min:10',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'A title is required',
        ];
    }
}
