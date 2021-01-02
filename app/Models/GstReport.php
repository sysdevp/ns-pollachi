<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GstReport extends Model
{
    //
    public static function gst_report($supplier_mode)
    {




    	        $supp_b2b   = Supplier::leftJoin('purchase_entries', 'suppliers.id', '=', 'purchase_entries.supplier_id')
                                ->leftJoin('purchase_entry_items', 'purchase_entries.p_no', '=', 'purchase_entry_items.p_no')
                                ->where('suppliers.supplier_mode',$supplier_mode)
                                ->select('suppliers.id','purchase_entries.p_no','purchase_entry_items.remaining_qty','purchase_entry_items.rate_inclusive_tax','purchase_entry_items.rate_exclusive_tax')
                                ->get();

//echo "<pre>"; print_r($supp_b2b); exit();
                                $send = array();
                                $sum_taxable_b2b    =   0;
                                $sum_tax_b2b        =   0; 
                                $igst = 0;   
                            foreach($supp_b2b as $supp_b2b_data)
                            {
                                $taxable_b2b = $supp_b2b_data->remaining_qty * $supp_b2b_data->rate_exclusive_tax;
                                $tax_b2b = $supp_b2b_data->remaining_qty * $supp_b2b_data->rate_inclusive_tax;

                                $sum_taxable_b2b = $sum_taxable_b2b + $taxable_b2b;
                                $sum_tax_b2b = $sum_tax_b2b + $tax_b2b;
                                
                            }
                            $data['sum_taxable_b2b'] = $sum_taxable_b2b;
                            $data['sum_tax_b2b'] = $sum_tax_b2b;
                             $data['igst'] = $sum_tax_b2b - $sum_taxable_b2b;
                             $data['c_s_gst'] = ($data['igst']/2);
                             $data['tot_b2b'] = $sum_taxable_b2b + $data['igst'];
                             array_push($send,$data);
        return $send;
    }
}
