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
            'post_title' => 'required|unique:posts,title',
            'post_content' => 'required',
            'file' => 'required|mimes:jpeg,png,jpg',
        ];
    }
    public function messages()
    {
        return [
            'post_title.required' => 'Title is required',
            'post_title.unique' => 'Title is used. Choose different title',
            'post_content.required' => 'Content is required!',
            'file.required' => 'File is required',
        ];
    }
}
