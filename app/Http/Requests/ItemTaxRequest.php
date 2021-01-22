<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ItemTaxRequest extends FormRequest
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
    public function rules(Request $request)
    {
        if($request->has('add'))
        {
            return [
                'category_1' => 'required',
                'item_id' => 'required',
                'cgst.*' => 'required',
                'igst.*' => 'required',
                'sgst.*' => 'required',
                'effective_from.*' => 'required|date_format:Y-m-d|distinct|unique:item_tax_details,valid_from,NULL,id,deleted_at,NULL,item_id,'.$request->item_id,
            ];
        }
       
    }

    public function messages()
    {
        return [
            'cgst.*.required' => 'CGST field is required',
            'igst.*.required' => 'IGST field is required',
            'sgst.*.required' => 'SGST field is required',
            'effective_from.*.required' => 'Effective From Date  field is required',
            'effective_from.*.distinct' => 'Please Check Duplication Date',
            'effective_from.*.unique' => ' The Effective From Date has already been taken.',
            ];
    }
}
