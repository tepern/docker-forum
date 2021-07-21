<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
* @property string $title
* @property string $slug
* @property string $description
*/

class ForumTopicCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
        //return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:5|max:200|unique:topics',
            'slug' => 'max:200|unique:topics',
            'description' => 'string|max:500|min:3',
        ];
    }
}
