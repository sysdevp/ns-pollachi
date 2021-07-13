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

    public function store(Request $request)
    {

          //   $state = new State;
          //   $state->name       = Input::get('name');
          //   $state->code      = Input::get('code');
          //   $state->remark = Input::get('remark');
          //   $state->country_id = 1; /* Only India's States   */
          //   $state->created_by = 0;
          //   $state->updated_by = 0;
          // if ($state->save()) {
          //       return Redirect::back()->with('success', 'Successfully created');
          //   } else {
          //       return Redirect::back()->with('failure', 'Something Went Wrong..!');
          //   }

        $name = str_replace(' ', '', $request->name);
            $name_duplicate=State::whereRaw("REPLACE(`name`, ' ' ,'') = '".$name."'")->count();

            if($name_duplicate != 1)
            {
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
            else
            {
                return Redirect::back()->with('success', 'Name Already Taken!');
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

    public function update(Request $request, State $state, $id)
    {
        $state = State::find($id);
        // $validator = Validator::make($request->all(), [
        //     'name' => 'required|unique:states,name,' . $id . ',id,deleted_at,NULL',
        //     'code' => 'required|unique:states,code,' . $id . ',id,deleted_at,NULL',
        // ])->validate();


        $name = str_replace(' ', '', $request->name);
            $name_duplicate=State::whereRaw("REPLACE(`name`, ' ' ,'') = '".$name."'")->count();

            if($name_duplicate != 1)
            {
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
            else
            {
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

    public function import()
    {
        // $string = 'Tamil Nadu';
        // $string = str_replace(' ', '', $string);
        // echo $string; exit();
       return view('admin.master.state.index');
    }

    public function importCsv(Request $request)
    {

        $profile_name="";
         $destinationPath = 'storage/file/';
         if ($request->hasFile('profile')) {
            $profile = $request->file('profile');
            $profile_name = date('Y-m-d').time().'.'.$profile->getClientOriginalExtension();
            $profile->move($destinationPath, $profile_name);
           }

        $file = storage_path('file/'.$profile_name);

        $handle = fopen($file, "r");

$i = 0;
$total_count = 0;
        while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
            {
                if($i >0)
                {

                    $code=$filesop[1];   echo "</br>";
                    $name=$filesop[2];   echo "</br>";
                    $remark=$filesop[3];   echo "</br>";
                    
                    $name = str_replace(' ', '', $name);

                    $code_duplicate = State::where('code',$code)->count();
                    $name_duplicate = State::where('name',$name)->count();

                    if($code_duplicate == 0 && $name_duplicate == 0)
                    {
                        $state =new State();

                        $state->code = $code;
                        $state->name = $name;
                        $state->remark = $remark;

                        $state->save();
                        $total_count++;

                    }
                    else if($name_duplicate > 0)
                    {
                        $name = str_replace(' ', '', $name);
                    }

                }
                $i++;

                    }
                    // exit();



        return Redirect::back()->with('success', $total_count.'     States Imported successfully');    
    }

    function csvToArray($filename = '', $delimiter = ',')
    {
        // echo $filename; exit();
        if (!file_exists($filename) || !is_readable($filename))
            return false;

        $header = null;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== false)
        {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false)
            {
                if (!$header)
                    $header = $row;
                else
                    $data[] = array_combine($header, $row);
            }
            fclose($handle);
        }

        return $data;
    }

}
