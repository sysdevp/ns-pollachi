<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        if($request->has('add')){
            return [
                'name' => 'required|unique:states,name,NULL,id,deleted_at,NULL',
                'code' => 'required|unique:states,code,NULL,id,deleted_at,NULL',
            ];
        }else{
            return [
                'name' => 'required|unique:states,name,'.$this->id.',id,deleted_at,NULL',
                'code' => 'required|unique:states,code,'.$this->id.',id,deleted_at,NULL',
            ];
        }
    }
}
