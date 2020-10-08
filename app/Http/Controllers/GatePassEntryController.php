<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GatePassEntry;
use App\Cart;
use App\Models\Supplier;

class GatePassEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gatepassentry=GatePassEntry::
                        join('suppliers','suppliers.id','=','gate_pass_entries.supplier_name')
                        ->select('*','gate_pass_entries.id as gatepass_id')
                        ->get();

                                    
        return view('admin.gate_pass_entry.view',compact('gatepassentry'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $date=date('Y-m-d');

        $supplier=Supplier::all();

        $gatepassentry=GatePassEntry::all();

        // $gate_pass_no=GatePassEntry::orderBy('gate_pass_no','DESC')
        //                   ->select('gate_pass_no')
        //                   ->first();

                        
        // if ($gate_pass_no == null) 
        // {
        //     $gatepass=1;

        //     return view('admin.gate_pass_entry.add',compact('gatepassentry','gatepass','date','supplier'));                 
        // }                  
        // else
        // {
        //     $current_gate_pass_no=$gate_pass_no->gate_pass_no;
        //     $gatepass=$current_gate_pass_no+1;
        
        // return view('admin.gate_pass_entry.add',compact('gatepassentry','gatepass','date','supplier'));
        // }
          
        return view('admin.gate_pass_entry.add',compact('gatepassentry','date','supplier'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->cart)

        {
            $cart=new Cart;

            $cart->date=$request->date;
            $cart->supplier_name=$request->supplier_name;
            $cart->type=$request->type;
            $cart->supplier_invoice_number=$request->supplier_invoice_number;
            $cart->supplier_delivery_number=$request->supplier_delivery_number;
            $cart->taxable_value=$request->taxable_value;
            $cart->tax_value=$request->tax_value;
            $cart->total_invoice_value=$request->total_invoice_value;
            $cart->load_bill=$request->load_bill;
            $cart->load_live=$request->load_live;
            $cart->unload_bill=$request->unload_bill;
            $cart->unload_live=$request->unload_live;
            $cart->status=0;
            $cart->save();

            return redirect('/gate_pass_entry');
        }

        else

        {
            $gate_pass_no=GatePassEntry::orderBy('gate_pass_no','DESC')
                           ->select('gate_pass_no')
                           ->first();

         if ($gate_pass_no == null) 
         {
             $gatepass=1;

                             
         }                  
         else
         {
             $current_gate_pass_no=$gate_pass_no->gate_pass_no;
             $gatepass=$current_gate_pass_no+1;
        
         
         }             



            $gate_pass=new GatePassEntry;

        $gate_pass->gate_pass_no=$gatepass;
        $gate_pass->date=$request->date;
        $gate_pass->supplier_name=$request->supplier_name;
        $gate_pass->type=$request->type;
        $gate_pass->supplier_invoice_number=$request->supplier_invoice_number;
        $gate_pass->supplier_delivery_number=$request->supplier_delivery_number;
        $gate_pass->taxable_value=$request->taxable_value;
        $gate_pass->tax_value=$request->tax_value;
        $gate_pass->total_invoice_value=$request->total_invoice_value;
        $gate_pass->load_bill=$request->load_bill;
        $gate_pass->load_live=$request->load_live;
        $gate_pass->unload_bill=$request->unload_bill;
        $gate_pass->unload_live=$request->unload_live;

        $gate_pass->save();

        return redirect('/gate_pass_entry');

        }
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$gatepass=GatePassEntry::find($id);

        $suppliers = Supplier::all();

        $gatepass= GatePassEntry::
                        join('suppliers','suppliers.id','=','gate_pass_entries.supplier_name')
                        ->where('gate_pass_entries.id','=',$id)
                        ->select('*','gate_pass_entries.id as pass_id','suppliers.id as suppliers_id')
                        ->first();

          $type_value= $gatepass->type;             
                        


        return view('admin.gate_pass_entry.show',compact('gatepass','suppliers','type_value'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        

        if($request->value == 1 && $request->type==0)
        {
          
             $update_gatepass=GatePassEntry::find($id);


        $update_gatepass->supplier_invoice_number=null;
        $update_gatepass->gate_pass_no=$request->num;
        $update_gatepass->date=$request->date;
        $update_gatepass->supplier_name=$request->supplier_name;
        $update_gatepass->type=$request->type;
        $update_gatepass->supplier_delivery_number=$request->supplier_delivery_number;
        $update_gatepass->taxable_value=$request->taxable_value;
        $update_gatepass->tax_value=$request->tax_value;
        $update_gatepass->total_invoice_value=$request->total_invoice_value;
        $update_gatepass->load_bill=$request->load_bill;
        $update_gatepass->load_live=$request->load_live;
        $update_gatepass->unload_bill=$request->unload_bill;
        $update_gatepass->unload_live=$request->unload_live;

        $update_gatepass->save();                              
        }
        else if($request->value == 0 && $request->type==1)
        {

             $update_gatepass=GatePassEntry::find($id);

        $update_gatepass->supplier_delivery_number=null;     
        $update_gatepass->gate_pass_no=$request->num;
        $update_gatepass->date=$request->date;
        $update_gatepass->supplier_name=$request->supplier_name;
        $update_gatepass->type=$request->type;
        $update_gatepass->supplier_invoice_number=$request->supplier_invoice_number;
        $update_gatepass->taxable_value=$request->taxable_value;
        $update_gatepass->tax_value=$request->tax_value;
        $update_gatepass->total_invoice_value=$request->total_invoice_value;
        $update_gatepass->load_bill=$request->load_bill;
        $update_gatepass->load_live=$request->load_live;
        $update_gatepass->unload_bill=$request->unload_bill;
        $update_gatepass->unload_live=$request->unload_live;

        $update_gatepass->save();                              
        }
        else
        {
            $update_gatepass=GatePassEntry::find($id);

       $update_gatepass->gate_pass_no=$request->num;
        $update_gatepass->date=$request->date;
        $update_gatepass->supplier_name=$request->supplier_name;
        $update_gatepass->type=$request->type;
        $update_gatepass->supplier_invoice_number=$request->supplier_invoice_number;
        $update_gatepass->supplier_delivery_number=$request->supplier_delivery_number;
        $update_gatepass->taxable_value=$request->taxable_value;
        $update_gatepass->tax_value=$request->tax_value;
        $update_gatepass->total_invoice_value=$request->total_invoice_value;
        $update_gatepass->load_bill=$request->load_bill;
        $update_gatepass->load_live=$request->load_live;
        $update_gatepass->unload_bill=$request->unload_bill;
        $update_gatepass->unload_live=$request->unload_live;

        $update_gatepass->save();
        }

       

        return redirect('/gate_pass_entry');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
