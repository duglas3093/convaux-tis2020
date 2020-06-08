<?php

namespace ConvAux\Http\Requests;

use ConvAux\Http\Requests\Request;

class StoreNoticeRequest extends Request
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
            'name'=>'required|max: 100',
            'image'=>'required|image',
            'description'=>'required',
            'slug'=>'required',
            'url'=>'required'
        ];
    }
}
