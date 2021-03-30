<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\TermsAndCondition;
use App\Http\Controllers\Controller;

class TermsAndConditionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $terms = TermsAndCondition::all();
        return view('admin.master.terms-and-condition.view',compact('terms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.master.terms-and-condition.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $terms = new TermsAndCondition();

        $terms->type = $request->types;
        $terms->name = $request->name;
        $terms->terms = $request->terms;

        $terms->save();

        return Redirect::back()->with('success', 'Successfully Created');
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
        $terms = TermsAndCondition::find($id);

        return view('admin.master.terms-and-condition.edit',compact('terms'));
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
        $terms = TermsAndCondition::find($id);

        $terms->type = $request->types;
        $terms->name = $request->name;
        $terms->terms = $request->terms;

        $terms->save();

        return Redirect::back()->with('success', 'Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $terms = TermsAndCondition::find($id);
        $terms->delete();
        return Redirect::back()->with('success', 'Deleted Successfully');
    }
}
