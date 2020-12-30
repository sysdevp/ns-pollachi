<?php

namespace App\Http\Controllers;

use App\Models\Giftvoucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class GiftvoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gift_voucher=Giftvoucher::all();
        return view('admin.master.gift_voucher.view',compact('gift_voucher'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.master.gift_voucher.add');
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
            'name' => 'required|unique:giftvouchers,name,NULL,id,deleted_at,NULL',
            'code' => 'required',
            'value' => 'required',
            'quantity' => 'required',
            'valid_from' => 'required',
            'valid_to' => 'required',
            
         ])->validate();

        $count = $request->quantity;;
        $generatedGiftVoucherCode = array();
        $prefix = $request->code;
        $fromDate = date('d',strtotime($request->valid_from));
        $toDate = date('d',strtotime($request->valid_to));

        for ($i=1; $i <= $count; $i++) {
          $generatedGiftVoucherCode[] = "NSP" . trim($prefix) . $fromDate . $this->generateGiftVouchers(6) . $toDate;
        }

        $out = array_values($generatedGiftVoucherCode);
        $myJSON = json_encode($out);

        $giftvoucher = new Giftvoucher();
        $giftvoucher->name = $request->name;
        $giftvoucher->code = $myJSON;
        $giftvoucher->value = $request->value;
        $giftvoucher->qty = $request->quantity;
        $giftvoucher->valid_from = date('Y-m-d',strtotime($request->valid_from));
        $giftvoucher->valid_to = date('Y-m-d',strtotime($request->valid_to));
        $giftvoucher->remark =  $request->remark;
        $giftvoucher->created_by = 0;
        $giftvoucher->updated_by = 0;
        $result = $giftvoucher->save();

        if ($result == true) {
            return Redirect::back()->with('success', 'Successfully created');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Giftvoucher  $giftvoucher
     * @return \Illuminate\Http\Response
     */
    public function show(Giftvoucher $giftvoucher,$id)
    {
        $giftvoucher=Giftvoucher::find($id);
        return view('admin.master.gift_voucher.show',compact('giftvoucher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Giftvoucher  $giftvoucher
     * @return \Illuminate\Http\Response
     */
    public function edit(Giftvoucher $giftvoucher,$id)
    {
        $giftvoucher=Giftvoucher::find($id);
        return view('admin.master.gift_voucher.edit',compact('giftvoucher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Giftvoucher  $giftvoucher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Giftvoucher $giftvoucher,$id)
    {
        $giftvoucher = Giftvoucher::find($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:giftvouchers,name,'.$id.',id,deleted_at,NULL',
            'code' => 'required|unique:giftvouchers,code,'.$id.',id,deleted_at,NULL',
            'value' => 'required',
            'valid_from' => 'required',
            'valid_to' => 'required',
            
         ])->validate();
        $giftvoucher->name       = $request->name;
        $giftvoucher->code       = $request->code;
        $giftvoucher->value       = $request->value;
        $giftvoucher->valid_from       = date('Y-m-d',strtotime($request->valid_from));
        $giftvoucher->valid_to       = date('Y-m-d',strtotime($request->valid_to));
        $giftvoucher->remark      =  $request->remark;
        $giftvoucher->created_by = 0;
        $giftvoucher->updated_by = 0;
      if ($giftvoucher->save()) {
            return Redirect::back()->with('success', 'Updated Successfully');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Giftvoucher  $giftvoucher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Giftvoucher $giftvoucher,$id)
    {
        $giftvoucher = Giftvoucher::find($id);
        if ($giftvoucher->delete()) {
            return Redirect::back()->with('success', 'Deleted Successfully');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    /* Generate random Gift Vouchers */
    public function generateGiftVouchers($length = 20) {
        $allowedCharacters = '23456789abcdefghijklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($allowedCharacters);
        $giftVoucherCode = '';
        for ($i = 0; $i < $length; $i++) {
            $giftVoucherCode .= $allowedCharacters[mt_rand(0, $charactersLength - 1)];

        }
        return $giftVoucherCode;
    }

    /* Generate random Gift Vouchers */
    /*public function generateGiftVouchers($limit) {
        return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $limit);
    }*/

    /* Print all Gift Vouchers PDF */
    public function print($id) {
        $gift_voucher = Giftvoucher::find($id);

        /* Uncomment below to get brand logo - ns pollachi */
        /*$imagePath = asset('assets/image/logo.png');
        $base64BrandImage = base64_encode(file_get_contents($imagePath));*/

        // instantiate and use the dompdf class
        $pdf = \App::make('dompdf.wrapper');

        $html = "";
        $html .= '<html><head>';
        $html .= '<title>Gift Voucher | NS Pollachi - ' . $gift_voucher["name"] . '</title>';
        $html .= '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">';
        $html .= '<style type="text/css">
                  .wrapper-page {
                      page-break-after: auto;
                  }
                </style></head><body>';

        /* Uncomment below to get brand logo rendered in pdf - ns pollachi */
        /*$html .= '<div class="row">
                <div class="col-md-12 text-center">
                    <img src="data:image/png;base64,' . $base64BrandImage . '" style="widht: auto; height: 100px;">
                </div>
                </div>';*/

        /* Uncomment foreach to get get all gift vouchers */
        /*foreach ($gift_voucher as $key => $value) {*/
            $obj = json_decode($gift_voucher->code);
            for($i = 0, $l = count($obj); $i < $l; ++$i) {
              $qrcode_base64 = base64_encode(\QrCode::backgroundColor(163, 208, 114)->format('png')->size(140)->errorCorrection('H')->margin(1)->generate($obj[$i]));
              $qrCode = '<img src="data:image/png;base64,' . $qrcode_base64 . '">';
              $html .= '<div class="wrapper-page" style="page-break-inside:avoid; clear:both; position:relative; background: #a3d072; height: 290px;">
                            <div style="position:absolute; left: 10rem; width: 192pt;">
                              <h3 class="pt-5" style="font-size: 35px; margin-left: -15px;">NS Pollachi</h3>
                              <p>'.$qrCode.'</p>
                            </div>
                            <div style="margin-left: 30rem;">
                              <h3 class="pt-5" style="margin-left: 14rem;">'.$gift_voucher->value.'</h3>
                              <p style="margin-left: 5.5rem;">Voucher valid from '.$gift_voucher->valid_from.' to '.$gift_voucher->valid_to.'</p>
                              <p class="pr-5" style="text-align: justify;">'.$gift_voucher->remark.'</p>
                              <p style="margin-left: 11.5rem;">www.nspollachi.com</p>
                            </div>
                      </div>';
              $html .= '<br /><br />';
            }
        /*}*/

        $html .= '</body></html>';

        $pdf->loadHTML($html);
        
        // (Optional) Setup the paper size and orientation
        $pdf->setPaper('A4', 'landscape');

        // Output the generated PDF to Browser
        //return $pdf->stream();
        return $pdf->stream("NS-Pollachi-".$gift_voucher["name"]."-"."GiftVoucher-"."-.pdf");
    }
}
