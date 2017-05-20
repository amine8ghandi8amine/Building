<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BuildingRequest extends FormRequest
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
            //
        
            'img' => 'mimes:jpg,jpeg,bmp,png',
            
            'name' => 'required|min:3|max:100',

            'price' => 'required',

            'rent' => 'required|integer', 

            'square' => 'required|min:1|max:100', 

            'type'  => 'required|integer',

            'roomNumber'  => 'required|integer',

            'smallDisc' => 'required|min:5|max:160',

            'largDisc' => 'required|min:5|max:200', 

            'tags' => 'required|min:5|max:200',

            'lang' => 'required|integer', 

            'lat'=> 'required|integer',

            'status'=> 'integer',

            'codePostalMaroc'=> 'required|integer'

            
        
        ];

    }
}
