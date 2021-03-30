<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use File;

class UploadLogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.upload_logo.add');
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

        $this->validate($request, [
        'profile' => 'mimes:jpeg,png,bmp,tiff',
    ],
        $messages = [
            'required' => 'The :attribute field is required.',
            'mimes' => 'Only jpeg, png, bmp,tiff are allowed.'
        ]
    );

        $image_path = "assets/image/logo.png";  // Value is not URL but directory file path
        if(File::exists($image_path)) {
            File::delete($image_path);
        }

        $profile_name="";
         $destinationPath = 'assets/image/';
         if ($request->hasFile('profile')) {
            $profile = $request->file('profile');
            $profile_name = 'logo.png';
            $profile->move($destinationPath, $profile_name);
           }

           return Redirect::back()->with('success','Uploaded successfully, This May Take A While');
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
