<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Mandatoryfields;
use Illuminate\Support\Facades\Redirect;

class MandatoryFieldsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        DB::table('mandatoryfields')
        ->where('defaultfields',0)
        ->update(['mandatory' => 0]);



        $validation = [];
        $where_check = [];
   
        for($i= 0; $i < count($request->permission); $i++){
         $explode =  explode("_",$request->permission[$i]);
         $name[] = $explode[0];
         $validator[] = $explode[1];
         $validation = [
             'name' => $explode[0],
             'validator' => $explode[1],
             'check'     => $request->permission[$i],

         ];
           
           
         $where_check = Mandatoryfields::where('check',$request->permission[$i])->get();
            if(count($where_check) > 0)
            {
                    foreach($where_check as $data)
                    {
                        if($data->check != $request->permission[$i])
                        {
                            DB::table('mandatoryfields')->insert($validation);
                        }
                        else
                        {
                            DB::table('mandatoryfields')->where('check',$data->check)->update(['mandatory' => 1]);
                        }
                    }
            }
            else
            {
                DB::table('mandatoryfields')->insert($validation);
            }
        }

        // $where_check = Mandatoryfields::where('check',$request->permission[$i])->get();
        // //  print_r(count($where_check));exit;
        //   if(count($where_check) > 0)
        //   {
        //   foreach($where_check as $data)
        //   {
        //       if($data->check == $request->permission[$i])
        //       {
        //           DB::table('mandatoryfields')
        //             ->where('check',$data->check)
        //               ->update(['mandatory' => 1]);
        //       }
        //       else
        //       {
                  
        //           DB::table('mandatoryfields')->insert($validation);
        //       }
        //       }

        //   //    print_r($data->check); 
        //   }
        //   else
        //   {
        //       //print_r($validation);
        //       DB::table('mandatoryfields')->insert($validation);

        //   }
         return Redirect::back()->with('success','Updated Successfully');

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
        //
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
        //
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
