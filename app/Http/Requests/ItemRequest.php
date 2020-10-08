<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ItemRequest extends FormRequest
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
        $rule = [];
     
  
        if ($request->has('add')) {
         $rule = [
                'name' => 'required|unique:items,name,NULL,id,deleted_at,NULL',
                'code' => 'required|unique:items,code,NULL,id,deleted_at,NULL',
                 // 'barcode' => 'required|unique:items,barcode,NULL,id,deleted_at,NULL',
                // 'ptc' => 'required',
                //'ptc' => 'required|unique:items,ptc,NULL,id,deleted_at,NULL',
                'category_id' => 'required',
                'brand_id' => 'required',
                'mrp' => 'required',
                'default_selling_price' => 'required',
                'item_type' => 'required',
                'uom_id' => 'required',
                'is_expiry_date' => 'required',
                'is_minimum_sales_qty_applicable' => 'required',    
            ];

            if ($request->is_expiry_date == 1) {
                $rule['expiry_date'] = 'required';
            }

            if ($request->item_type == "Parent") {
                $rule['child_item_id'] = 'required'; 
                $rule['child_unit'] = 'required';
            }

            

            /* Minimum Sales Qty Details */
            if ($request->is_minimum_sales_qty_applicable == 1) {
                 $rule['minimum_sales_price'] = 'required|numeric';
                $rule['minimum_sales_qty'] = 'required|numeric';
            }

            if ($request->has('igst'))
            {
                $rule['igst.*'] = 'nullable|required';
                if($request->igst !=""){
                    $rule['cgst.*'] = ' required';
                    $rule['sgst.*'] = 'required';
                   $rule['valid_from.*'] = 'required';
                      }
            }

             /* Item Barcode Details Start Here  */
             if ($request->has('barcode'))
             {
                     foreach ($request->barcode as $barcode_key => $barcode_value) {
                         $rule['barcode.' . $barcode_key] = 'required';
                        // $rule['barcode.' . $barcode_key] = 'required|distinct|unique:item_bracode_details,barcode,NULL,id,deleted_at,NULL';
                         $rule['barcode_confirmation.' . $barcode_key] = 'required|same:barcode.'.$barcode_key;
                     }
            }

          
            } else if ($request->has('add_uom_factor')) {
            $rule = [
                'item_id' => 'required',
                'category_id' => 'required',
                'default_uom_id' => 'required',

            ];

            if ($request->has('uom_id')) {
                $rule['uom_id.*'] = 'required|unique:uom_factor_convertion_for_items,uom_id,NULL,id,deleted_at,NULL,item_id,' . $this->item_id;
            }

            if ($request->has('old_uom_id')) {
                foreach ($request->old_uom_id as $key => $value) {

                    $rule['old_uom_id.' . $key] = 'required|unique:uom_factor_convertion_for_items,uom_id,' . $this->uom_factor_convertion_id[$key] . ',id,deleted_at,NULL,item_id,' . $this->item_id;
                }
            }

            if ($request->has('convertion_factor')) {
                foreach ($request->convertion_factor as $key => $value) {
                    $rule['convertion_factor.' . $key] = 'required|unique:uom_factor_convertion_for_items,convertion_factor,NULL,id,deleted_at,NULL,item_id,' . $this->item_id . ',uom_id,' . $this->uom_id[$key];
                }
            }

            if ($request->has('old_convertion_factor')) {
                foreach ($request->old_convertion_factor as $key => $value) {
                    $rule['old_convertion_factor.' . $key] = 'required|unique:uom_factor_convertion_for_items,convertion_factor,' . $this->uom_factor_convertion_id[$key] . ',id,deleted_at,NULL,item_id,' . $this->item_id . ',uom_id,' . $this->old_uom_id[$key];
                }
            }



            //echo "<pre>";print_r($rule);exit;
        } else {
            $rule = [
                'name' => 'required|unique:items,name,' . $this->id . ',id,deleted_at,NULL',
                'code' => 'required|unique:items,code,' . $this->id . ',id,deleted_at,NULL',
                // 'ptc' => 'required',
                //'ptc' => 'required|unique:items,ptc,' . $this->id . ',id,deleted_at,NULL',
                'category_id' => 'required',
                'brand_id' => 'required',
                'mrp' => 'required',
                'item_type' => 'required',
                'default_selling_price' => 'required',
                'uom_id' => 'required',
                'is_expiry_date' => 'required',
                'is_minimum_sales_qty_applicable' => 'required',
            ];

            if ($request->is_expiry_date == 1) {
                $rule['expiry_date'] = 'required';
            }

            if ($request->item_type == "Parent") {
                $rule['child_item_id'] = 'required'; 
                $rule['child_unit'] = 'required';
            }

           /* Minimum Sales Qty Details */
           if ($request->is_minimum_sales_qty_applicable == 1) {
            $rule['minimum_sales_price'] = 'required|numeric';
           $rule['minimum_sales_qty'] = 'required|numeric';
       }

            if ($request->has('igst'))
            {
                $rule['igst.*'] = 'nullable|required';
                if($request->igst !=""){
                    $rule['cgst.*'] = ' required';
                    $rule['sgst.*'] = 'required';
                    $rule['valid_from.*'] = 'required';
                  
                   // $rule['valid_from.*'] = 'required|distinct';
                }
               
            }

              /* Item Barcode Details Start Here  */
              if ($request->has('barcode'))
              {
               // $rule['barcode.*']="distinct";
                      foreach ($request->barcode as $barcode_key => $barcode_value) {
                          //$rule['barcode.' . $barcode_key] = 'required|unique:item_bracode_details,barcode,NULL,id,deleted_at,NULL';
                          $rule['barcode.' . $barcode_key] = 'required';
                          $rule['barcode_confirmation.' . $barcode_key] = 'required|same:barcode.'.$barcode_key;
                      }
             }

             if ($request->has('old_barcode'))
             {
                     foreach ($request->old_barcode as $old_barcode_key => $barcode_value) {
                         $rule['old_barcode.' . $old_barcode_key] = 'required';
                        // $rule['old_barcode.' . $old_barcode_key] = 'required|distinct|unique:item_bracode_details,barcode,'.$request->item_barcode_details_id[$old_barcode_key].',id,deleted_at,NULL';
                         $rule['old_barcode_confirmation.' . $old_barcode_key] = 'required|same:old_barcode.'.$old_barcode_key;
                     }
            }
        }
        return $rule;
    }

    public function messages()
    {
        return [
            'uom_id.*.required' => 'Uom field is required',
            'uom_id.*.unique' => ' The Uom Name has already been taken.',
            'convertion_factor.*.required' => 'Convertion Factor field is required',
            'convertion_factor.*.unique' => 'Convertion Factor field  already exist',
            'old_uom_id.*.required' => 'Uom field is required',
            'old_uom_id.*.unique' => ' The Uom Name has already been taken.',
            'old_convertion_factor.*.required' => 'Convertion Factor field is required',
            'old_convertion_factor.*.unique' => 'Convertion Factor field  already exist',
            'igst.*.required' => 'IGST field is required',
            'sgst.*.required' => 'SGST field is required',
            'cgst.*.required' => 'CGST field is required',
            'valid_from.*.required' => 'Effective From Date  field is required',
            'valid_from.*.distinct' => 'Please Check Duplication Date',
            'valid_from.*.unique' => ' The Effective From Date has already been taken.',
            'barcode.*.required' => 'Barcode field is required',
            'barcode.*.distinct' => 'Please Check Duplication Barcode',
            'barcode.*.unique' => ' The Barcode has already been taken.',
            'barcode_confirmation.*.required' => 'barcode confirmation field is required',
            'barcode_confirmation.*.same' => ' The Barcode and Barcode Confirmation does not match.',
            'old_barcode.*.required' => 'Barcode field is required',
            'old_barcode.*.distinct' => 'Please Check Duplication Barcode',
            'old_barcode.*.unique' => ' The Barcode has already been taken.',
            'old_barcode_confirmation.*.required' => 'barcode confirmation field is required',
            'old_barcode_confirmation.*.same' => ' The Barcode and Barcode Confirmation does not match.',

        ];
    }
}
  