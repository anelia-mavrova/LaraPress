<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AdminCreatePostRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (\Auth::user())
            return true;
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'       => 'required',
            'category_id' => 'required',
            'status'      => 'required',
            'content'     => 'required'
        ];
    }
}
