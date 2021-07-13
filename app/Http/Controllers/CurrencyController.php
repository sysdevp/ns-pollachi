<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Currency;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currency = Currency::all();
        return view('admin.master.currency.view',compact('currency'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.master.currency.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $currency = new Currency();

        $name_duplicate=Currency::whereRaw("REPLACE(`amount`, ' ' ,'') = '".$request->amount."'")->count();
        if($name_duplicate == 0)
        {
            $currency->amount = $request->amount;
            $currency->remark = $request->remark;

            $currency->save();
            return Redirect::back()->with('Success','Successfully Added');
        }
        else
        {
            return Redirect::back()->with('Success','Already Exist');
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
        $currency = Currency::find($id);
        return view('admin.master.currency.show',compact('currency'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $currency = Currency::find($id);
        return view('admin.master.currency.edit',compact('currency'));
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
        $currency = Currency::find($id);

        $name_duplicate=Currency::whereRaw("REPLACE(`amount`, ' ' ,'') = '".$request->amount."'")->count();
        if($name_duplicate == 0)
        {
            $currency->amount = $request->amount;
            $currency->remark = $request->remark;

            $currency->save();
            return Redirect::back()->with('Success','Successfully Updated');
        }
        else
        {
            return Redirect::back()->with('Success','Already Exist');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $currency = Currency::find($id);

        $currency->delete();

        return Redirect::back()->with('Success','Deleted Successfully');
    }

    public function import()
    {
       return view('admin.master.currency.index');
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
                    
                    $amount = str_replace(' ', '', $amount);
                    $name_duplicate=Currency::whereRaw("REPLACE(`amount`, ' ' ,'') = '".$amount."'")->count();

                    if($name_duplicate == 0)
                    {
                        $currency = new Currency();

                        $currency->amount     = $amount;
                        $currency->remark     = $remark;

                        $currency->save();
                        $total_count++;

                    }

                }
                $i++;


            }



        return Redirect::back()->with('success', $total_count.'     Currencies Imported successfully');    
    }
}
