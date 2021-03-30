<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\GatePassEntry;
use App\Models\Supplier;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart=Cart::join('suppliers','suppliers.id','=','carts.supplier_name')
                    ->where('carts.status','=','0')
                    ->select('*','suppliers.id as suppliers_id','carts.id as cart_id')
                    ->get();

                

        return view('admin.cart.view',compact('cart'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $supplier=Supplier::all();
        $gate_pass_no=GatePassEntry::orderBy('gate_pass_no','DESC')
                          ->select('gate_pass_no')
                          ->first();

        $gatepss_no   =  $gate_pass_no->gate_pass_no+1; 

        $cart=Cart::join('suppliers','suppliers.id','=','carts.supplier_name')
                    ->where('carts.id','=',$id)
                    ->select('*','suppliers.id as suppliers_id','carts.id as cart_id')
                    ->first();

                    $type_value=$cart->type;


        return view('admin.cart.add',compact('cart','gatepss_no','type_value','supplier'));
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
        $gate_pass_no=GatePassEntry::orderBy('gate_pass_no','DESC')
                          ->select('gate_pass_no')
                          ->first();

        if ($gate_pass_no == null) 
        {
            $gatepss_no=1;          
        }    
        else
        {
            $gatepss   =  $gate_pass_no->gate_pass_no; 
             $gatepss_no = $gatepss+1; 
            
        }     


       if($request->value == 1 && $request->type==0)
       {

            $gate_pass=new GatePassEntry;

        $gate_pass->gate_pass_no=$gatepss_no;
        $gate_pass->date=$request->date;
        $gate_pass->supplier_name=$request->supplier_name;
        $gate_pass->type=$request->type;
        $gate_pass->supplier_delivery_number=$request->supplier_delivery_number;
        $gate_pass->taxable_value=$request->taxable_value;
        $gate_pass->tax_value=$request->tax_value;
        $gate_pass->total_invoice_value=$request->total_invoice_value;
        $gate_pass->load_bill=$request->load_bill;
        $gate_pass->load_live=$request->load_live;
        $gate_pass->unload_bill=$request->unload_bill;
        $gate_pass->unload_live=$request->unload_live;
        $gate_pass->save();

        $cart=Cart::find($id);

        $cart->status=1;
        $cart->supplier_invoice_number=null;
        $cart->supplier_delivery_number=$request->supplier_delivery_number;
        $cart->save();
       }

       else if($request->value == 0 && $request->type==1)
       {
            $gate_pass=new GatePassEntry;

        $gate_pass->gate_pass_no=$gatepss_no;
        $gate_pass->date=$request->date;
        $gate_pass->supplier_name=$request->supplier_name;
        $gate_pass->type=$request->type;
        $gate_pass->supplier_invoice_number=$request->supplier_invoice_number;
        $gate_pass->taxable_value=$request->taxable_value;
        $gate_pass->tax_value=$request->tax_value;
        $gate_pass->total_invoice_value=$request->total_invoice_value;
        $gate_pass->load_bill=$request->load_bill;
        $gate_pass->load_live=$request->load_live;
        $gate_pass->unload_bill=$request->unload_bill;
        $gate_pass->unload_live=$request->unload_live;
        $gate_pass->save();

        $cart=Cart::find($id);

        $cart->status=1;
        $cart->supplier_delivery_number=null;
        $cart->supplier_invoice_number=$request->supplier_invoice_number;
        $cart->save();
       }
       else
       {
            $gate_pass=new GatePassEntry;

        $gate_pass->gate_pass_no=$gatepss_no;
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

        $cart=Cart::find($id);

        $cart->status=1;
        $cart->save();
       }
        

        return redirect('/cart');
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
