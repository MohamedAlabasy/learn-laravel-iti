<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; //not use in many problems
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'min:3', 'max:100', 'unique:posts,title'
//                'not_regex:<\s*a[^>]*>(.*?)<\s*/\s*a>'
            ],
            'description' => ['required', 'min:10', 'max:200'],
//            'user_id' => ['required']
        ];
    }

//    /**
//     * Get the error messages for the defined validation rules.
//     *
//     * @return array
//     */
//    public function messages()
//    {
//        return [
//            'title.required' => 'gggg', //custom error
//            'title.min' => 'minman' //custom error
//
//        ];
//    }
}
