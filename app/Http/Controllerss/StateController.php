<?php

namespace App\Http\Controllers;

use App\Http\Requests\StateRequest;
use App\Models\State;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Redirect;
use Illuminate\Support\Facades\Input;
use Session;

class StateController extends Controller
{

    
        function __construct()
    {
        //   $this->middleware('permission:state_list',['only' => ['index']]);
        //   $this->middleware('permission:state_create', ['only' => ['create','store']]);
        //   $this->middleware('permission:state_edit', ['only' => ['edit','update']]);
        //   $this->middleware('permission:state_delete', ['only' => ['destroy']]);
    }
    

    public function index()
    {
        $state = State::all();
        return view('admin.master.state.view', compact('state'));
    }

    public function create()
    {
        return view('admin.master.state.add');
    }

    public function store(StateRequest $request)
    {
            // $validator = Validator::make($request->all(), [
            //     'name' => 'required|unique:states,name,NULL,id,deleted_at,NULL',
            //     'code' => 'required|unique:states,code,NULL,id,deleted_at,NULL',
            // ]);

            $state = new State;
            $state->name       = Input::get('name');
            $state->code      = Input::get('code');
            $state->remark = Input::get('remark');
            $state->country_id = 1; /* Only India's States   */
            $state->created_by = 0;
            $state->updated_by = 0;
          if ($state->save()) {
                return Redirect::back()->with('success', 'Successfully created');
            } else {
                return Redirect::back()->with('failure', 'Something Went Wrong..!');
            }
    }

    public function show(State $state, $id)
    {
        $state = State::find($id);
        return view('admin.master.state.show', compact('state'));
    }

    public function edit(State $state, $id)
    {
        $state = State::find($id);
        return view('admin.master.state.edit', compact('state'));
    }

    public function update(StateRequest $request, State $state, $id)
    {
        $state = State::find($id);
        // $validator = Validator::make($request->all(), [
        //     'name' => 'required|unique:states,name,' . $id . ',id,deleted_at,NULL',
        //     'code' => 'required|unique:states,code,' . $id . ',id,deleted_at,NULL',
        // ])->validate();

            $state->name       = $request->name;
            $state->code      = $request->code;
            $state->remark = $request->remark;
            $state->country_id = 1; /* Only India's States   */
            $state->created_by = 0;
            $state->updated_by = 0;
            if ($state->save()) {
                return Redirect::back()->with('success', 'Updated Successfully');
            } else {
                return Redirect::back()->with('failure', 'Something Went Wrong..!');
            }
    }

    public function destroy(State $state, $id)
    {
        $state = State::find($id);
        if ($state->delete()) {
            return Redirect::back()->with('success', 'Deleted successfully');
         }else{
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }
}
