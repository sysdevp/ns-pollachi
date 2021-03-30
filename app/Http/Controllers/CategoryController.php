<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category=Category::all();
        return view('admin.master.category.view',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=Category::all();
        return view('admin.master.category.add',compact('category'));
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
            'name' => 'required|unique:categories,name,NULL,id,deleted_at,NULL',
            'parent_id' => 'required',
        ])->validate();

        $category = new Category();
        $category->name       = $request->name;
        $category->parent_id  = $request->parent_id;
        $category->hsn        = $request->hsn;
        $category->gst_no     = $request->gst_no;
        $category->remark     = $request->remark;
        $category->created_by = 0;
        $category->updated_by = 0;
      if ($category->save()) {
            return Redirect::back()->with('success', 'Successfully created');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category,$id)
    {
        $category=Category::find($id);
        return view('admin.master.category.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category,$id)
    {
        $category_all=Category::all();
        $category=Category::find($id);
        return view('admin.master.category.edit',compact('category','category_all'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category,$id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:categories,name,'.$id.',id,deleted_at,NULL',
            'parent_id' => 'required',
        ])->validate();

        $category = Category::find($id);
        $category->name       = $request->name;
        $category->parent_id  = $request->parent_id;
        $category->hsn        = $request->hsn;
        $category->gst_no     = $request->gst_no;
        $category->remark     = $request->remark;
       if ($category->save()) {
            return Redirect::back()->with('success', 'Updated Successfully');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category,$id)
    {
        $category = Category::find($id);
       
       if ($category->delete()) {
            return Redirect::back()->with('success', 'Deleted Successfully');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    public function import()
    {
       return view('admin.master.category.index');
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

                    $name=$filesop[1];   echo "</br>";
                    $parent_name=$filesop[2];   echo "</br>";
                    $hsn=$filesop[3];   echo "</br>";
                    $gst_no=$filesop[4];   echo "</br>";
                    $remark=$filesop[5];   echo "</br>";

                    $parent_name = str_replace(' ', '', $parent_name);
                    $categories=Category::whereRaw("REPLACE(`name`, ' ' ,'') = '".$parent_name."'")->first();

                    $parent_id = @$categories->id;
                    
                    $name = str_replace(' ', '', $name);
                    $name_duplicate=Category::whereRaw("REPLACE(`name`, ' ' ,'') = '".$name."'")->count();

                    if($name_duplicate == 0 && $categories != '')
                    {
                        $category = new Category();
                        $category->name       = $name;
                        $category->parent_id  = $parent_id;
                        $category->hsn        = $hsn;
                        $category->gst_no     = $gst_no;
                        $category->remark     = $remark;
                        $category->created_by = 0;
                        $category->updated_by = 0;

                        $category->save();
                        $total_count++;

                    }

                }
                $i++;


            }



        return Redirect::back()->with('success', $total_count.'     Categories Imported successfully');    
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
