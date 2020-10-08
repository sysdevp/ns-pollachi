@extends('admin.layout.app')
@section('content')
<div class="col-12 body-sec">
  <div class="card container-fluid px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Purchase</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{url('master/accounts-type')}}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <style>
    .table{
      font-size: 13px;
    }
    </style>
    <!-- card header end@ -->
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="{{url('master/accounts-type/store')}}" enctype="multipart/form-data">
      {{csrf_field()}}

        <div class="form-row">
          <div class="col-md-3">
            <div class="form-group row">
              <label for="voucher_no" class="col-sm-5 col-form-label">Voucher No </label>
              <div class="col-sm-7">
                <input type="text" class="form-control voucher_no only_allow_alp_num_dot_com_amp" placeholder="Voucher No" name="voucher_no" value="{{old('voucher_no')}}" required>
                <span class="mandatory"> {{ $errors->first('voucher_no')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Voucher No
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group row">
              <label for="voucher_no" class="col-sm-5 col-form-label">Voucher Date </label>
              <div class="col-sm-7">
                <input type="text" class="form-control voucher_no only_allow_alp_num_dot_com_amp" placeholder="Voucher Date" name="voucher_no" value="{{old('voucher_no')}}" required>
                <span class="mandatory"> {{ $errors->first('voucher_no')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Voucher No
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group row">
              <label for="voucher_no" class="col-sm-5 col-form-label">Gatepass No </label>
              <div class="col-sm-7">
                <input type="text" class="form-control voucher_no only_allow_alp_num_dot_com_amp" placeholder="Gatepass No" name="voucher_no" value="{{old('voucher_no')}}" required>
                <span class="mandatory"> {{ $errors->first('voucher_no')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Voucher No
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group row">
              <label for="voucher_no" class="col-sm-5 col-form-label">Receipt Note No.</label>
              <div class="col-sm-7">
                <input type="text" class="form-control voucher_no only_allow_alp_num_dot_com_amp" placeholder="Receipt Note No." name="voucher_no" value="{{old('voucher_no')}}" required>
                <span class="mandatory"> {{ $errors->first('voucher_no')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Voucher No
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group row">
              <label for="voucher_no" class="col-sm-5 col-form-label">Supplier Invoice No</label>
              <div class="col-sm-7">
                <input type="text" class="form-control voucher_no only_allow_alp_num_dot_com_amp" placeholder="Supplier Invoice No" name="voucher_no" value="{{old('voucher_no')}}" required>
                <span class="mandatory"> {{ $errors->first('voucher_no')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Voucher No
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group row">
              <label for="voucher_no" class="col-sm-5 col-form-label">Supplier Invoice Date</label>
              <div class="col-sm-7">
                <input type="text" class="form-control voucher_no only_allow_alp_num_dot_com_amp" placeholder="Supplier Invoice Date" name="voucher_no" value="{{old('voucher_no')}}" required>
                <span class="mandatory"> {{ $errors->first('voucher_no')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Voucher No
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group row">
              <label for="voucher_no" class="col-sm-5 col-form-label">Supplier Details</label>
              <div class="col-sm-7">
                <select class="js-example-basic-multiple col-12 custom-select bank_id" name="bank_id" required>
                  <option value="">Choose Supplier</option>
                </select>
                <span class="mandatory"> {{ $errors->first('voucher_no')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Voucher No
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group row">
              <label for="voucher_no" class="col-sm-5 col-form-label">Order Details</label>
              <div class="col-sm-7">
                <input type="text" class="form-control voucher_no only_allow_alp_num_dot_com_amp" placeholder="Order Details" name="voucher_no" value="{{old('voucher_no')}}" required>
                <span class="mandatory"> {{ $errors->first('voucher_no')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Voucher No
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group row">
              <label for="voucher_no" class="col-sm-5 col-form-label">Transport Details</label>
              <div class="col-sm-7">
                <input type="text" class="form-control voucher_no only_allow_alp_num_dot_com_amp" placeholder="Transport Details" name="voucher_no" value="{{old('voucher_no')}}" required>
                <span class="mandatory"> {{ $errors->first('voucher_no')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Voucher No
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group row">
              <label for="voucher_no" class="col-sm-5 col-form-label">Supplier Invoice Value</label>
              <div class="col-sm-7">
                <input type="text" class="form-control voucher_no only_allow_alp_num_dot_com_amp" placeholder="Supplier Invoice Value" name="voucher_no" value="{{old('voucher_no')}}" required>
                <span class="mandatory"> {{ $errors->first('voucher_no')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Voucher No
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group row">
              <label for="voucher_no" class="col-sm-5 col-form-label">Remarks</label>
              <div class="col-sm-7">
                <input type="text" class="form-control voucher_no only_allow_alp_num_dot_com_amp" placeholder="Remarks" name="voucher_no" value="{{old('voucher_no')}}" required>
                <span class="mandatory"> {{ $errors->first('voucher_no')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Voucher No
                </div>
              </div>
            </div>
          </div>
</div>
<h3 class="py-2 font-weight-bold h3-i">Item Details</h3>
<div class="form-row">
  <div class="col-md-3">
    <div class="form-group row">
      <label for="voucher_no" class="col-sm-5 col-form-label">Item Code </label>
      <div class="col-sm-7">
        <input type="text" class="form-control voucher_no only_allow_alp_num_dot_com_amp" placeholder="item Code" name="voucher_no" value="{{old('voucher_no')}}" required>
        <span class="mandatory"> {{ $errors->first('voucher_no')  }} </span>
        <div class="invalid-feedback">
          Enter valid Voucher No
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-3">
    <div class="form-group row">
      <label for="voucher_no" class="col-sm-5 col-form-label">Item Name </label>
      <div class="col-sm-7">
        <input type="text" class="form-control voucher_no only_allow_alp_num_dot_com_amp" placeholder="Item Name" name="voucher_no" value="{{old('voucher_no')}}" required>
        <span class="mandatory"> {{ $errors->first('voucher_no')  }} </span>
        <div class="invalid-feedback">
          Enter valid Voucher No
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-3">
    <div class="form-group row">
      <label for="voucher_no" class="col-sm-5 col-form-label">Mrp </label>
      <div class="col-sm-7">
        <input type="text" class="form-control voucher_no only_allow_alp_num_dot_com_amp" placeholder="MRP" name="voucher_no" value="{{old('voucher_no')}}" required>
        <span class="mandatory"> {{ $errors->first('voucher_no')  }} </span>
        <div class="invalid-feedback">
          Enter valid Voucher No
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-3">
    <div class="form-group row">
      <label for="voucher_no" class="col-sm-5 col-form-label">Qty</label>
      <div class="col-sm-7">
        <input type="text" class="form-control voucher_no only_allow_alp_num_dot_com_amp" placeholder="Qty" name="voucher_no" value="{{old('voucher_no')}}" required>
        <span class="mandatory"> {{ $errors->first('voucher_no')  }} </span>
        <div class="invalid-feedback">
          Enter valid Voucher No
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-3">
    <div class="form-group row">
      <label for="voucher_no" class="col-sm-5 col-form-label">Tax Rate % </label>
      <div class="col-sm-7">
        <input type="text" class="form-control voucher_no only_allow_alp_num_dot_com_amp" placeholder="Tax Rate % " name="voucher_no" value="{{old('voucher_no')}}" required>
        <span class="mandatory"> {{ $errors->first('voucher_no')  }} </span>
        <div class="invalid-feedback">
          Enter valid Voucher No
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-3">
    <div class="form-group row">
      <label for="voucher_no" class="col-sm-5 col-form-label">Rate (Inclusive Tax)</label>
      <div class="col-sm-7">
        <input type="text" class="form-control voucher_no only_allow_alp_num_dot_com_amp" placeholder="Rate (Inclusive Tax)" name="voucher_no" value="{{old('voucher_no')}}" required>
        <span class="mandatory"> {{ $errors->first('voucher_no')  }} </span>
        <div class="invalid-feedback">
          Enter valid Voucher No
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-3">
    <div class="form-group row">
      <label for="voucher_no" class="col-sm-5 col-form-label">Rate (Exclusive Tax)</label>
      <div class="col-sm-7">
        <input type="text" class="form-control voucher_no only_allow_alp_num_dot_com_amp" placeholder="Rate (Exclusive Tax)" name="voucher_no" value="{{old('voucher_no')}}" required>
        <span class="mandatory"> {{ $errors->first('voucher_no')  }} </span>
        <div class="invalid-feedback">
          Enter valid Voucher No
        </div>
      </div>
    </div>
  </div>


  <div class="col-md-3">
    <div class="form-group row">
      <label for="voucher_no" class="col-sm-5 col-form-label">Discount</label>
      <div class="col-sm-7">
        <input type="text" class="form-control voucher_no only_allow_alp_num_dot_com_amp" placeholder="Discount" name="voucher_no" value="{{old('voucher_no')}}" required>
        <span class="mandatory"> {{ $errors->first('voucher_no')  }} </span>
        <div class="invalid-feedback">
          Enter valid Voucher No
        </div>
      </div>
    </div>
  </div>

  
  <div class="col-md-3">
    <div class="form-group row">
      <label for="voucher_no" class="col-sm-5 col-form-label">Amount</label>
      <div class="col-sm-7">
        <input type="text" class="form-control voucher_no only_allow_alp_num_dot_com_amp" placeholder="Amount" name="voucher_no" value="{{old('voucher_no')}}" required>
        <span class="mandatory"> {{ $errors->first('voucher_no')  }} </span>
        <div class="invalid-feedback">
          Enter valid Voucher No
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-3 text-left">
    <button class="btn btn-success" name="add" type="submit">Add</button>
  </div>
</div>

<div class="row">
    <div class="col-md-7">
<div class="form-row custom-table">
               <table class="table table-bordered ">
                  <thead class="thead-gray">
                  <tr>
                        <th class="text-center" rowspan="1" colspan="10">Common</th>
                     </tr>
                     <tr>
                        <th class="text-center">S.No</th>
                        <th class="text-center">Item Code</th>
                        <th class="text-center">Item Name</th>
                        <th class="text-center">MRP</th>
                        <th class="text-center">Qty</th>
                        <th class="text-center">UOM</th>
                        <th class="text-center">Rate </th>
                        <th class="text-center">Discount</th>
                        <th class="text-center">Amount</th>
                        <th class="text-center">Action</th>
                     </tr>
                  </thead>

                  <tfoot class="thead-gray">
                    <tr>
                      <th class="text-right" colspan="6">Total</th>
                      <th class="text-center"></th>
                      <th class="text-center"></th>
                      <th class="text-center"></th>
                      <th class="text-center" colspan="2"></th>
                    
                   </tr>
                    </tfoot>
                  <tbody class="append_barcode_dets">
                    <?php for($i=0;$i<10;$i++) {?>
                     <tr>
                     <td> {{$i+1}} </td>
                       <td></td>
                       <td></td>
                       <td></td>
                       <td></td>
                       <td></td>
                       <td></td>
                       <td></td>
                       <td></td>
                       <td></td>
                     </tr>
                    <?php } ?>
                
                     
                  </tbody>
                 
               </table>
            </div>
            </div>

            <div class="col-md-5">
              <div class="form-row custom-table price-tbl">
                <table class="table table-bordered table-responsive">
                    <tr class="thead-gray">
                      <th rowspan="1" colspan="6">Price Level</th>
                      <th rowspan="1" colspan="2">%</th>
                      <th rowspan="1" colspan="2">Rate</th>
                    </tr>
                    <tr>
                      <th>S.No</th>
                      <th class="cus-wd">Item Name</th>
                      <th class="cus-wd">Purchase Cost</th>
                      <th>MRP</th>
                      <th class="cus-wd">Last Purchase Rate(LPR)</th>
                      <th class="cus-wd">Updated Sales Price</th>
                      <th>Markup</th>
                      <th>MarkDown</th>
                      <th>Markup</th>
                      <th>MarkDown</th>
                    </tr>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>3</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>4</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>5</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                    </tbody>

                  </table>
              </div>      
            </div>
</div>


        <div class="col-md-7 text-right">
          <button class="btn btn-success" name="add" type="submit">Submit</button>
        </div>
      </form>
    </div>
    <!-- card body end@ -->
  </div>
</div>
@endsection

