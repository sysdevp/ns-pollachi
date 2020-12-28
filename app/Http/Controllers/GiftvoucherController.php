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

        for ($i = 1; $i <= $request->quantity; $i++) {
            $fromDate = date('d',strtotime($request->valid_from));
            $toDate = date('d',strtotime($request->valid_to));

            $generatedGiftVoucherCode = "NSP" . trim($request->code) . $fromDate . $this->generateGiftVouchers(6) . $toDate;

            $giftvoucher = new Giftvoucher();
            $giftvoucher->name = $request->name;
            $giftvoucher->code = $generatedGiftVoucherCode;
            $giftvoucher->value = $request->value;
            $giftvoucher->qty = $request->quantity;
            $giftvoucher->valid_from = date('Y-m-d',strtotime($request->valid_from));
            $giftvoucher->valid_to = date('Y-m-d',strtotime($request->valid_to));
            $giftvoucher->remark =  $request->remark;
            $giftvoucher->created_by = 0;
            $giftvoucher->updated_by = 0;
            $result = $giftvoucher->save();
        }

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
    public function print() {
        $gift_voucher = Giftvoucher::all();

        $imagePath = asset('assets/image/logo.png');
        $base64BrandImage = base64_encode(file_get_contents($imagePath));

        // instantiate and use the dompdf class
        $pdf = \App::make('dompdf.wrapper');

        $html = "";
        $html .= '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">';

        $html .= '<div class="row">
                <div class="col-md-12 text-center">
                    <img src="data:image/png;base64,' . $base64BrandImage . '" style="widht: auto; height: 100px;">
                </div>
                </div>';
        $html .= '<table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" class="text-center">#</th>
                            <th scope="col" class="text-center">Gift Voucher Name</th>
                            <th scope="col" class="text-center">Valid From</th>
                            <th scope="col" class="text-center">Valid To</th>
                            <th scope="col" class="text-center">QrCode</th>
                        </tr>
                    </thead>';
        $html .= '<tbody>';
        
        foreach ($gift_voucher as $key => $value) {
            $qrcode_base64 = base64_encode(\QrCode::format('png')->size(110)->errorCorrection('H')->margin(1)->generate($value->code));
            $qrCode = '<img src="data:image/png;base64,' . $qrcode_base64 . '">';
            $html .= '<tr>
                            <th scope="row" class="mt-5 text-center">1</th>
                            <td class="mt-5 text-center">'.$value->name.'</td>
                            <td class="mt-5 text-center">'.$value->valid_from.'</td>
                            <td class="mt-5 text-center">'.$value->valid_to.'</td>
                            <td class="text-center">'.$qrCode.'</td>
                        </tr>';
        }

        $html .= '</tbody>
                </table>';

        $pdf->loadHTML($html);
        
        // (Optional) Setup the paper size and orientation
        $pdf->setPaper('A4', 'landscape');

        // Output the generated PDF to Browser
        return $pdf->stream();
    }
}
