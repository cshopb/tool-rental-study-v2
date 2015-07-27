<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ToolRequest extends Request {

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
     * The rules have to be set like this because the image might be an array
     * and in that case the validation wont work. Like this the validator
     * will be scalable depending on the size of the array.
     *
     * https://laracasts.com/discuss/channels/general-discussion/l5-validating-multiple-file-input
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name'        => 'required|min:3',
            'description' => 'required',
        ];

        $nbr = count($this->input('image'));
        for ($i = 0; $i < $nbr; $i ++)
        {
            $rules['image.' . $i] = 'mimes:jpeg,bmp,png';
        }

        return $rules;
    }
}
