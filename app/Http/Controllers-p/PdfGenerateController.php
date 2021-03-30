<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use PDF;

class PdfGenerateController extends Controller
{
    //

 public function pdfview(Request $request)
    {
        // $users = DB::table("users")->get();
        // view()->share('users',$users);

        	// Set extra option
        	PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        	// pass view file
            $pdf = PDF::loadView('mail');
            // download pdf
            return $pdf->download('mail.pdf');
//        return view('pdfview');
    }
}
