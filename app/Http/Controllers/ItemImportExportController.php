<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\ItemsImport;
use Maatwebsite\Excel\Facades\Excel;

class ItemImportExportController extends Controller
{
    public function importExportView()
    {
       return view('admin.excel_import_export.item_import_export');
    }

    public function import(Request $request) 
    {
        $path1 = $request->file('file')->store('temp'); 
        $path=storage_path('app').'/'.$path1;  
        $data = Excel::import(new ItemsImport,$path);
        return back();
    }
}
