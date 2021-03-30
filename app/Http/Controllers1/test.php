<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Mandatoryfields;
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
   
        $validation = [];
        $name = [];
        $validator = [];
   
        for($i= 0; $i < count($request->permission); $i++){
         $explode =  explode("_",$request->permission[$i]);
            // $validation[] = [
            //     'menu' => $explode[0],
            //     'fields' => $explode[1],

            // ];
            $name[] = $explode[0];
            $validator[] = $explode[1];
            $validation[] = [
                'name' => $explode[0],
                'validator' => $explode[1],

            ];

        }

        $where = DB::table('mandatory_fields')->where('name',$name);
        $count = $where->count();
        $get_data = $where->get();
        $dbdata = [];
        for($i= 0; $i < $count; $i++){
            
            $dbdata[] = [
                'name' => $get_data[$i]->name,
                'validator' => $get_data[$i]->validator,

            ];
        }
       print_r($dbdata);
       
      // DB::table('mandatory_fields')->insert($validation);

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
