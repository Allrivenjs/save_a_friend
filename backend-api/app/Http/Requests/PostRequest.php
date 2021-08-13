<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $post=$this->route()->parameters('post');
        $rules= [
             'name' => 'required|max:255',
             'slug' => "required|unique:posts",
             'text'=> 'required',
             'PostImage' => 'required|mimes:jpg,png,bmp,tif,jpeg',
             'type_post_id' => 'required',
             'category_id' => 'required',
             'tags' => 'required'
        ];
        if ($post){
            $rules['slug'] = 'required|unique:posts,slug,'.$post->id;
        }

        return $rules;
    }

}
