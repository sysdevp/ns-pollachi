<?php

namespace App\Http\Controllers;

use App\Models\AddressType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AddressTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $address_type=AddressType::all();
        return view('admin.master.address_type.view',compact('address_type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.master.address_type.add');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:address_types,name,NULL,id,deleted_at,NULL',
         ])->validate();

        $address_type = new AddressType();
        $address_type->name       = $request->name;
        $address_type->remark       = $request->remark;
        $address_type->created_by = 0;
        if ($address_type->save()) {
                return Redirect::back()->with('success', 'Successfully created');
            } else {
                return Redirect::back()->with('failure', 'Something Went Wrong..!');
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AddressType  $addressType
     * @return \Illuminate\Http\Response
     */
    public function show(AddressType $addressType,$id)
    {
        $address_type=AddressType::find($id);
        return view('admin.master.address_type.show',compact('address_type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AddressType  $addressType
     * @return \Illuminate\Http\Response
     */
    public function edit(AddressType $addressType,$id)
    {
         $address_type=AddressType::find($id);
        return view('admin.master.address_type.edit',compact('address_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AddressType  $addressType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AddressType $addressType,$id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:address_types,name,'.$id.',id,deleted_at,NULL',
         ])->validate();

        $address_type = AddressType::find($id);
        $address_type->name       = $request->name;
        $address_type->remark       = $request->remark;
        $address_type->updated_by = 0;
        if ($address_type->save()) {
                return Redirect::back()->with('success', 'Updated Successfully');
            } else {
                return Redirect::back()->with('failure', 'Something Went Wrong..!');
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AddressType  $addressType
     * @return \Illuminate\Http\Response
     */
    public function destroy(AddressType $addressType,$id)
    {
        $address_type = AddressType::find($id);
        if ($address_type->delete()) {
            return Redirect::back()->with('success', 'Deleted Successfully');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }
}
