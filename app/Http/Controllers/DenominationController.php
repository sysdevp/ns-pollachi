<?php

namespace App\Http\Controllers;

use App\Models\Denomination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class DenominationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $denomination=Denomination::all();
        return view('admin.master.denomination.view',compact('denomination'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.master.denomination.add');
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
            'amount' => 'required|unique:denominations,amount,NULL,id,deleted_at,NULL',
         ])->validate();

        $denomination = new Denomination();
        $denomination->amount       = $request->amount;
        $denomination->remark      =  $request->remark;
        $denomination->created_by = 0;
        $denomination->updated_by = 0;
      if ($denomination->save()) {
            return Redirect::back()->with('success', 'Successfully created');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Denomination  $denomination
     * @return \Illuminate\Http\Response
     */
    public function show(Denomination $denomination,$id)
    {
        $denomination=Denomination::find($id);
        return view('admin.master.denomination.show',compact('denomination'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Denomination  $denomination
     * @return \Illuminate\Http\Response
     */
    public function edit(Denomination $denomination,$id)
    {
        $denomination=Denomination::find($id);
        return view('admin.master.denomination.edit',compact('denomination'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Denomination  $denomination
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Denomination $denomination,$id)
    {
        $validator = Validator::make($request->all(), [
            'amount' => 'required|unique:denominations,amount,'.$id.',id,deleted_at,NULL',
         ])->validate();

        $denomination = Denomination::find($id);
        $denomination->amount       = $request->amount;
        $denomination->remark      =  $request->remark;
        $denomination->created_by = 0;
        $denomination->updated_by = 0;
      if ($denomination->save()) {
            return Redirect::back()->with('success', 'Updated Successfully');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Denomination  $denomination
     * @return \Illuminate\Http\Response
     */
    public function destroy(Denomination $denomination,$id)
    {
        $denomination = Denomination::find($id);
        if ($denomination->delete()) {
            return Redirect::back()->with('success', 'Deleted successfully');
         }else{
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    public function import()
    {
       return view('admin.master.denomination.index');
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

                    $amount=$filesop[1];   echo "</br>";
                    $remark=$filesop[2];   echo "</br>";
                    
                    $denomination = new Denomination();
                    $denomination->amount       = $amount;
                    $denomination->remark      =  $remark;
                    $denomination->created_by = 0;
                    $denomination->updated_by = 0;

                    $denomination->save();
                    $total_count++;

                }
                $i++;


            }



        return Redirect::back()->with('success', $total_count.'     Denominations Imported successfully');    
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
