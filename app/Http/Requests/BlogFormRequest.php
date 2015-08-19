<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Auth;

class BlogFormRequest extends Request
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
        return [
            //
            'title' => 'required',
            'excerpt' => 'required',
            'content' => 'required|min:30',
            'published_at' => 'required'
        ];
    }
}
