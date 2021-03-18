<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class DistrictController extends Controller
{
    public function index()
    {
        $district = District::all();
        return view('admin.master.district.view', compact('district'));
     }

    public function create()
    {
        $state = State::all();
        return view('admin.master.district.add', compact('state'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'state_id' => 'required',
            'name' => 'required|unique:districts,name,NULL,id,deleted_at,NULL,state_id,'.$request->state_id,
            ])->validate();

            $district = new District();
            $district->name       = $request->name;
            $district->state_id      = $request->state_id;
            $district->remark = $request->remark;
            $district->country_id = 1; /* Only India's States   */
            $district->created_by = 0;
            $district->updated_by = 0;

            if ($district->save()) {
                return Redirect::back()->with('success', 'Successfully created');
            } else {
                return Redirect::back()->with('failure', 'Something Went Wrong..!');
            }
   }

    public function show(District $district,$id)
    {
        $district = District::find($id);
        return view('admin.master.district.show', compact('district'));
    }

    public function edit(District $district,$id)
    {
        $district = District::find($id);
        $state = State::all();
        return view('admin.master.district.edit', compact('district','state'));
    }

    public function update(Request $request, District $district,$id)
    {
        $district = District::find($id);
        $validator = Validator::make($request->all(), [
                'state_id' => 'required',
                'name' => 'required|unique:districts,name,' . $id . ',id,deleted_at,NULL,state_id,'.$request->state_id,
             ])->validate();

             $district->name       = $request->name;
             $district->state_id      = $request->state_id;
             $district->remark = $request->remark;
             $district->country_id = 1; /* Only India's States   */
             $district->created_by = 0;
             $district->updated_by = 0;
                 if ($district->save()) {
                     return Redirect::back()->with('success', 'Updated Successfully');
                 } else {
                     return Redirect::back()->with('failure', 'Something Went Wrong..!');
                 }
        
    }

    public function destroy(District $district,$id)
    {
          $district = District::find($id);
        if ($district->delete()) {
            return Redirect::back()->with('success', 'Deleted successfully');
         }else{
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    public function get_district_based_state(Request $request)
    {
         $city = District::where('id',$request->district_id)->get();
         $state_id      = $city[0]->state_id;
         $data = array('state_id' => $state_id);
         return $data;
    }
}
