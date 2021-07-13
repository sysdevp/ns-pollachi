<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $language=Language::all();
        return view('admin.master.language.view',compact('language'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.master.language.add');
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
            'language_1' => 'required|unique:languages,language_1,NULL,id,deleted_at,NULL,language_2,'.$request->language2.',language_3,'.$request->language_3,
            'language_2' => 'required|unique:languages,language_2,NULL,id,deleted_at,NULL,language_1,'.$request->language1.',language_3,'.$request->language_3,
            'language_3' => 'required|unique:languages,language_3,NULL,id,deleted_at,NULL,language_2,'.$request->language2.',language_1,'.$request->language_1,
            ])->validate();

        $language = new Language();
        $language->language_1       = $request->language_1;
        $language->language_2       = $request->language_2;
        $language->language_3       = $request->language_3;
         $language->created_by = 0;
        $language->updated_by = 0;
      if ($language->save()) {
            return Redirect::to('master/language')->with('success', 'Successfully created');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function show(Language $language,$id)
    {
        $language=Language::find($id);
        return view('admin.master.language.show',compact('language'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function edit(Language $language,$id)
    {
        $language=Language::find($id);
        return view('admin.master.language.edit',compact('language'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Language $language,$id)
    {
        $validator = Validator::make($request->all(), [
            'language_1' => 'required|unique:languages,language_1,'.$id.',id,deleted_at,NULL,language_2,'.$request->language2.',language_3,'.$request->language_3,
            'language_2' => 'required|unique:languages,language_2,'.$id.',id,deleted_at,NULL,language_1,'.$request->language1.',language_3,'.$request->language_3,
            'language_3' => 'required|unique:languages,language_3,'.$id.',id,deleted_at,NULL,language_2,'.$request->language2.',language_1,'.$request->language_1,
            ])->validate();

        $language = Language::find($id);
        $language->language_1       = $request->language_1;
        $language->language_2       = $request->language_2;
        $language->language_3       = $request->language_3;
         $language->created_by = 0;
        $language->updated_by = 0;
      if ($language->save()) {
            return Redirect::to('master/language')->with('success', 'Updated Successfully');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function destroy(Language $language)
    {
        //
    }
}
