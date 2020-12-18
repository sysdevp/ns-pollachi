@extends('admin.layout.app')
@section('content')
<div class="col-12 body-sec">
  <div class="card container-fluid px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Add Customer</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{url('master/customer')}}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">

      <form method="post" class="form-horizontal needs-validation" novalidate action="{{url('master/customer/store')}}" enctype="multipart/form-data">
        {{csrf_field()}}



        <div class="form-row">


          <div class="col-md-8">
            <h4>Professional details:</h4>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Company Name<span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control only_allow_alp_num_dot_com_amp company_name required_for_valid caps" error-data="Enter valid Company Name" placeholder="Company Name" name="company_name" value="{{old('company_name')}}">
                <span class="mandatory"> {{ $errors->first('company_name')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Company Name
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Customer Type <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <div class="form-check d-inline">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input customer_type" value="1" {{ old('customer_type') == 1 ? 'checked' : '' }} name="customer_type">Exist
                  </label>
                </div>

                <div class="form-check d-inline mx-4 ">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input customer_type" value="0" {{ old('customer_type') == 0 ? 'checked' : '' }} name="customer_type">New
                  </label>
                </div>

                <span class="mandatory"> {{ $errors->first('customer_type')}} </span>
                <div class="invalid-feedback">
                  Enter valid Customer Type
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 new_customer_div">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Customer Name </label>
              <div class="col-sm-8">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <select class="form-control  salutation" name="salutation" error-data="Enter valid Salutation">
                      <option value="Mr" {{ old('salutation') == 'Mr' ? 'selected' : '' }}>Mr</option>
                      <option value="Mrs" {{ old('salutation') == 'Mrs' ? 'selected' : '' }}>Mrs</option>
                    </select>
                    <span class="mandatory"> {{ $errors->first('salutation')  }} </span>
                  </div>
                  <input type="text" class="form-control only_allow_alp_num_dot_com_amp name caps" name="name" error-data="Customer Name Field is required" onchange="checkname()" aria-label="Text input with dropdown button" value={{old('name')}}>

                  <div class="invalid-feedback">
                    Enter valid Customer Name
                  </div>

                </div>
                <span class="mandatory"> {{ $errors->first('name')  }} </span>
                <span class="mandatory"> {{ $errors->first('salutation')  }} </span>
              </div>
            </div>

          </div>


          <div class="col-md-6 exist_customer_div" style="display:none">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Customer Name<span class="mandatory">*</span></label>
              <div class="col-sm-6">
                <select class="js-example-basic-multiple col-12 form-control exist_customer_name select custom-select" error-data="Enter valid Customer" data-placeholder="Choose Customer" name="exist_customer_name">
                  <option value="">Choose Customer</option>
@foreach ($exist_customer_dets as $value)
                <option value="{{ $value->id }}" {{ old('exist_customer_name') == $value->id ? 'selected' : '' }} >{{ $value->name }}</option>
@endforeach
     </select>

                <span class="mandatory"> {{ $errors->first('exist_customer_name')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Customer Name
                </div>
              </div>
              <a href="{{ url('master/customer/create')}}" target="_blank">
                <button type="button" class="px-2 btn btn-success ml-2 " title="Add Customer"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a>
              <button type="button" class="px-2 btn btn-success mx-2 refresh_customer_id" title="Refresh"><i class="fa fa-refresh" aria-hidden="true"></i></button>
            </div>
          </div>






          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Phone No <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control  phone_no only_allow_digit required_for_valid" input-type="phone_no" pattern="[1-9]{1}[0-9]{9}" error-data="Enter valid Phone No" placeholder="Phone No" name="phone_no" value="{{old('phone_no')}}">
                <span class="mandatory"> {{ $errors->first('phone_no')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Phone No
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Whatsapp No </label>
              <div class="col-sm-8">
                <input type="text" class="form-control whatsapp_no only_allow_digit" input-type="phone_no" pattern="[1-9]{1}[0-9]{9}" error-data="Enter valid Whatsapp No" placeholder="Whatsapp No" name="whatsapp_no" value="{{old('whatsapp_no')}}">
                <span class="mandatory"> {{ $errors->first('whatsapp_no')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Whatsapp No
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Email <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="email" class="form-control email required_for_valid" input-type="email" error_data="Enter valid Email" placeholder="Email" name="email" value="{{old('email')}}">
                <span class="mandatory"> {{ $errors->first('email')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Email
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Pan Card No <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control pan_card required_for_valid" input-type="pan_card" error_data="Enter valid Pancard No" placeholder="Pan Card No" name="pan_card" value="{{old('pan_card')}}">
                <span class="mandatory"> {{ $errors->first('pan_card')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Pan Card
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Gst No <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control gst_no required_for_valid" input-type="gst_no" error_data="Enter valid Gst No" placeholder="Gst No" name="gst_no" value="{{old('gst_no')}}">
                <span class="mandatory"> {{ $errors->first('gst_no')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Gst No
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Maximum Credit Limit <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control max_credit_limit only_allow_digit required_for_valid" error_data="Enter valid Maximum Credit Limit" placeholder="Maximum Credit Limit" name="max_credit_limit" value="{{old('max_credit_limit')}}">
                <span class="mandatory"> {{ $errors->first('max_credit_limit')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Maximum Credit Limit
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Maximum Credit Days <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control max_credit_days only_allow_digit required_for_valid" error_data="Enter valid Maximum Credit Days" placeholder="Maximum Credit Days" name="max_credit_days" value="{{old('max_credit_days')}}">
                <span class="mandatory"> {{ $errors->first('max_credit_days')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Maximum Credit Days
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Opening Balance <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control only_allow_digit required_for_valid" input-type="opening_balance" error_data="Enter valid Opening Balance" placeholder="Opening Balance" name="opening_balance" value="{{old('opening_balance')}}">
                <span class="mandatory"> {{ $errors->first('opening_balance')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Opening Balance
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Remark</label>
              <div class="col-sm-8">
                <input type="text" class="form-control remark" input-type="remark" error_data="Enter valid Remark" placeholder="Remark" name="remark" value="{{old('remark')}}">
                <span class="mandatory"> {{ $errors->first('remark')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Remark
                </div>
              </div>
            </div>
          </div>


          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Price Level <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <select class="js-example-basic-multiple col-12 form-control price_level select custom-select required_for_valid" error-data="Enter valid Price Level" data-placeholder="Choose Price Level " name="price_level">
                  <option value=""></option>
                  <option value="1" {{ old('price_level') == '1' ? 'selected' : '' }}>Price Level 1</option>
                  <option value="2" {{ old('price_level') == '2' ? 'selected' : '' }}>Price Level 2</option>
                  <option value="3" {{ old('price_level') == '3' ? 'selected' : '' }}>Price Level 3</option>
                </select>

                <span class="mandatory"> {{ $errors->first('price_level')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Price Level
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="form-row">
          <div class="col-md-8">
            <div class="form-group row">
              <div class="col-md-4">
                <label for="validationCustom01" class=" col-form-label">Address details : </label>
                <label for="validationCustom01" class="btn-sm btn-success add_address">Add Address</label>
              </div>
            </div>
          </div>

        </div>
        <div class="common_address_div">



          @if (old('address_line_1'))
          @foreach (old('address_line_1') as $key=>$item)
          <div class="form-row address_div">
            <div class="col-md-8">
              <h3 class="address_label"></h3>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label for="validationCustom01" class="col-sm-4 col-form-label">Address Type <span class="mandatory">*</span></label>
                <div class="col-sm-6">
                  <select class="js-example-basic-multiple col-12 form-control custom-select address_type_id required_for_valid required_for_address_valid" error-data="Enter valid Address Type" name="address_type_id[]">
                    <option value="">Choose Address Type</option>
                    @foreach($address_type as $value)
                    <option value="{{ $value->id }}" {{ old('address_type_id.'.$key) == $value->id ? 'selected' : '' }}>{{ $value->name }}</option>
                    @endforeach
                  </select>
                  <span class="mandatory"> {{ $errors->first('address_type_id.'.$key)  }} </span>
                  <div class="invalid-feedback">
                    Enter valid Address Type
                  </div>
                </div>
                <a href="{{ url('master/address_type/create')}}" target="_blank">
                  <button type="button" class="px-2 btn btn-success ml-2 " title="Add Address Type"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a>
                <button type="button" class="px-2 btn btn-success mx-2 refresh_address_type_id" title="Refresh"><i class="fa fa-refresh" aria-hidden="true"></i></button>
              </div>
            </div>
            
           
            <div class="col-md-6">
              <div class="form-group row">
                <label for="validationCustom01" class="col-sm-4 col-form-label">Address Line 1 <span class="mandatory">*</span></label>
                <div class="col-sm-8">
                  <input type="text" class="form-control address_line_1 required_for_valid required_for_address_valid" error-data="Enter valid Address" placeholder="Address Line 1" name="address_line_1[]" value="{{ old('address_line_1.'.$key) }}">
                  <span class="mandatory"> {{ $errors->first('address_line_1.'.$key)  }} </span>
                  <div class="invalid-feedback">
                    Enter valid Address
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label for="validationCustom01" class="col-sm-4 col-form-label">Address Line 2 </label>
                <div class="col-sm-8">
                  <input type="text" class="form-control address_line_2" placeholder="Address Line 2" name="address_line_2[]" value="{{ old('address_line_2.'.$key) }}">
                  <span class="mandatory"> {{ $errors->first('address_line_2.'.$key)  }} </span>
                  <div class="invalid-feedback">
                    Enter valid Address
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label for="land_mark" class="col-sm-4 col-form-label">Land Mark </label>
                <div class="col-sm-8">
                  <input type="text" class="form-control land_mark" placeholder="Land Mark" name="land_mark[]" value="{{ old('land_mark.'.$key) }}">
                  <span class="mandatory"> {{ $errors->first('land_mark.'.$key)  }} </span>
                  <div class="invalid-feedback">
                    Enter valid Land Mark
                  </div>
                </div>
              </div>
            </div>
            <!-- Old Values For Dropdown Start Here  -->
            <input type="hidden" class="form-control old_state_id" value="{{ old('state_id.'.$key)}}">
            <input type="hidden" class="form-control old_district_id" value="{{ old('district_id.'.$key)}}">
            <input type="hidden" class="form-control old_city_id" value="{{ old('city_id.'.$key)}}">
            <!-- Old Values For Dropdown End Here  -->
            <div class="col-md-6">
              <div class="form-group row">
                <label for="validationCustom01" class="col-sm-4 col-form-label">State <span class="mandatory">*</span></label>
                <div class="col-sm-6">
                  <select class="js-example-basic-multiple col-12 form-control custom-select state_id required_for_valid required_for_address_valid" error-data="Enter valid State" name="state_id[]">
                    <option value="">Choose State</option>
                    @foreach($state as $value)
                    <option value="{{ $value->id }}" {{ old('state_id.'.$key) == $value->id ? 'selected' : '' }}>{{ $value->name }}</option>
                    @endforeach
                  </select>
                  <span class="mandatory"> {{ $errors->first('state_id.'.$key)  }} </span>
                  <div class="invalid-feedback">
                    Enter valid State
                  </div>
                </div>
                <a href="{{ url('master/state/create')}}" target="_blank">
                  <button type="button" class="px-2 btn btn-success ml-2 " title="Add State"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a>
                <button type="button" class="px-2 btn btn-success mx-2 refresh_state_id" title="Refresh"><i class="fa fa-refresh" aria-hidden="true"></i></button>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label for="validationCustom01" class="col-sm-4 col-form-label">District </label>
                <div class="col-sm-6">
                  <select class="js-example-basic-multiple col-12 form-control custom-select district_id" name="district_id[]">
                    <option value="">Choose District</option>
                  </select>
                  <span class="mandatory"> {{ $errors->first('district_id.'.$key)  }} </span>
                  <div class="invalid-feedback">
                    Enter valid District
                  </div>
                </div>
                <a href="{{ url('master/district/create')}}" target="_blank">
                  <button type="button" class="px-2 btn btn-success ml-2 " title="Add District"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a>
                <button type="button" class="px-2 btn btn-success mx-2 refresh_district_id" title="Refresh"><i class="fa fa-refresh" aria-hidden="true"></i></button>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label for="validationCustom01" class="col-sm-4 col-form-label">City </label>
                <div class="col-sm-6">
                  <select class="js-example-basic-multiple col-12 form-control custom-select city_id" name="city_id[]">
                    <option value="">Choose City</option>
                  </select>
                  <span class="mandatory"> {{ $errors->first('city_id.'.$key)  }} </span>
                  <div class="invalid-feedback">
                    Enter valid City
                  </div>
                </div>
                <a href="{{ url('master/city/create')}}" target="_blank">
                  <button type="button" class="px-2 btn btn-success ml-2 " title="Add City"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a>
                <button type="button" class="px-2 btn btn-success mx-2 refresh_city_id" title="Refresh"><i class="fa fa-refresh" aria-hidden="true"></i></button>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label for="land_mark" class="col-sm-4 col-form-label">Postal Code <span class="mandatory">*</span></label>
                <div class="col-sm-8">
                  <input type="text" class="form-control postal_code only_allow_digit required_for_valid required_for_address_valid" error-data="Enter valid Postal Code" placeholder="Postal Code" name="postal_code[]" value="{{ old('postal_code.'.$key) }}">
                  <span class="mandatory"> {{ $errors->first('postal_code.'.$key)  }} </span>
                  <div class="invalid-feedback">
                    Enter valid Postal Code
                  </div>
                </div>
              </div>
            </div>
          </div>
          <hr>
          @endforeach
          @endif

        </div>

        <div class="form-row">
          <div class="col-md-8">
            <div class="form-group row">
              <div class="col-md-4">
                <label for="validationCustom01" class=" col-form-label">
                  <h4>Bank Details :</h4>
                </label>

              </div>
            </div>
          </div>














          <div class="col-md-12">
            <table class="table bank_dtails">
              <thead>
                <th>S.no</th>
                <th class="tbl_wd"> Bank Name</th>
                <th class="tbl_wd"> Branch Name</th>
                <th> Ifsc Code </th>
                <th class="tbl_wd">Account Type </th>
                <th>Account Holder Name </th>
                <th>Account No </th>
                <th>Action</th>
              </thead>
              <tbody class="append_bank_details">
                <tr>
                  <td><span class="bank_s_no"> 1 </span>

                    <input type="hidden" class="old_bank_id" value="{{ old('bank_id.0')}}">
                    <input type="hidden" class="old_branch_id" value="{{ old('branch_id.0')}}">
                  </td>

                  <td>
                    <div class="form-group row">
                      <div class="col-sm-8">
                        <select class="js-example-basic-multiple col-12 form-control custom-select bank_id required_for_valid" error-data="Enter valid Bank" name="bank_id[]">
                          <option value="">Choose Bank</option>
                          @foreach($bank as $value)
                          <option value="{{ $value->id }}" {{ old('bank_id.0') == $value->id ? 'selected' : '' }}>{{ $value->name }}</option>
                          @endforeach
                        </select>
                        <span class="mandatory"> {{ $errors->first('bank_id.0')  }} </span>
                        <div class="invalid-feedback">
                          Enter valid Bank Name
                        </div>
                      </div>
                      <a href="{{ url('master/bank/create')}}" target="_blank">
                        <button type="button" class="px-1 btn btn-success ml-3 " title="Add Bank"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a>
                      <button type="button" class="px-1 btn btn-success mx-1 refresh_bank_id" title="Refresh"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                    </div>
                  </td>

                  <td>
                    <div class="form-group row">
                      <div class="col-sm-8">
                        <select class="js-example-basic-multiple col-12 form-control custom-select branch_id required_for_valid" error-data="Enter valid Branch Name" name="branch_id[]">
                          <option value="">Choose Branch Name</option>
                        </select>
                        <span class="mandatory"> {{ $errors->first('branch_id.0')  }} </span>
                        <div class="invalid-feedback">
                          Enter valid Branch Name
                        </div>
                      </div>
                      <a href="{{ url('master/bank-branch/create')}}" target="_blank">
                        <button type="button" class="px-1 btn btn-success ml-3 " title="Add Bank Branch"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a>
                      <button type="button" class="px-1 btn btn-success mx-1 refresh_branch_id" title="Refresh"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                    </div>
                  </td>


                  <td>
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <input type="text" class="form-control ifsc only_allow_digit  required_for_proof_valid" error-data="Enter valid Ifsc Code" readonly placeholder="IFSC Code" name="ifsc[]" value="{{ old('ifsc.0') }}">
                        <span class="mandatory"> {{ $errors->first('ifsc.0')  }} </span>
                        <div class="invalid-feedback">
                          Enter valid IFSC Code
                        </div>
                      </div>
                    </div>
                  </td>

                  <td>
                    <div class="form-group row">
                      <div class="col-sm-8">
                        <select class="js-example-basic-multiple col-12 form-control custom-select account_type_id required_for_valid" error-data="Enter valid Account Type" name="account_type_id[]">
                          <option value="">Choose Account Type</option>
                          @foreach($account_type as $value)
                          <option value="{{ $value->id }}" {{ old('account_type_id.0') == $value->id ? 'selected' : '' }}>{{ $value->name }}</option>
                          @endforeach
                        </select>
                        <span class="mandatory"> {{ $errors->first('account_type_id')  }} </span>
                        <div class="invalid-feedback">
                          Enter valid Account Type
                        </div>
                      </div>
                      <a href="{{ url('master/accounts-type/create')}}" target="_blank">
                        <button type="button" class="px-1 btn btn-success ml-3 " title="Add Accounts Type"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a>
                      <button type="button" class="px-1 btn btn-success mx-1 refresh_accounts_type_id" title="Refresh"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                    </div>
                  </td>

                  <td>
                    <div class="form-group row">
                      <div class="mm">
                        <input type="text" class="form-control account_holder_name required_for_proof_valid" error-data="Enter valid Account Holder Name" placeholder="Account Holder Name" name="account_holder_name[]" value="{{ old('account_holder_name.0') }}">
                        <span class="mandatory"> {{ $errors->first('account_holder_name.0')  }} </span>
                        <div class="invalid-feedback">
                          Enter valid Account Holder Name
                        </div>
                      </div>
                    </div>
                  </td>

                  <td>
                    <div class="form-group row">
                      <div class="mm">
                        <input type="text" class="form-control account_no required_for_proof_valid" error-data="Enter valid Account No" placeholder="Account No" name="account_no[]" value="{{ old('account_no.0') }}">
                        <span class="mandatory"> {{ $errors->first('account_no.0')  }} </span>
                        <div class="invalid-feedback">
                          Enter valid Account No
                        </div>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="form-group row">
                      <div class="col-sm-3 mr-1">
                        <label class="btn btn-success add_bank_details">+</label>
                      </div>
                      <div class="col-sm-3 mx-2">
                        <label class="btn btn-danger remove_bank_details">-</label>
                      </div>
                    </div>
                  </td>

                </tr>

                @if(old('bank_id'))
                @foreach (old('bank_id') as $key=>$value)
                @if($key > 0)

                <tr>
                  <td><span class="bank_s_no"> 1 </span>

                    <input type="hidden" class="old_bank_id" value="{{ old('bank_id.'.$key)}}">
                    <input type="hidden" class="old_branch_id" value="{{ old('branch_id.'.$key)}}"></td>

                  <td>
                    <div class="form-group row">
                      <div class="col-sm-8">
                        <select class="js-example-basic-multiple col-12 form-control custom-select bank_id required_for_valid" error-data="Enter valid Bank" name="bank_id[]">
                          <option value="">Choose Bank</option>
                          @foreach($bank as $value)
                          <option value="{{ $value->id }}" {{ old('bank_id.'.$key) == $value->id ? 'selected' : '' }}>{{ $value->name }}</option>
                          @endforeach
                        </select>
                        <span class="mandatory"> {{ $errors->first('bank_id.'.$key)  }} </span>
                        <div class="invalid-feedback">
                          Enter valid Bank Name
                        </div>
                      </div>
                      <a href="{{ url('master/bank/create')}}" target="_blank">
                        <button type="button" class="px-1 btn btn-success ml-3 " title="Add Bank"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a>
                      <button type="button" class="px-1 btn btn-success mx-1 refresh_bank_id" title="Refresh"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                    </div>
                  </td>

                  <td>
                    <div class="form-group row">
                      <div class="col-sm-8">
                        <select class="js-example-basic-multiple col-12 form-control custom-select branch_id required_for_valid" error-data="Enter valid Branch Name" name="branch_id[]">
                          <option value="">Choose Branch Name</option>
                        </select>
                        <span class="mandatory"> {{ $errors->first('branch_id.'.$key)  }} </span>
                        <div class="invalid-feedback">
                          Enter valid Branch Name
                        </div>
                      </div>
                      <a href="{{ url('master/bank/create')}}" target="_blank">
                        <button type="button" class="px-1 btn btn-success ml-3 " title="Add Bank Branch"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a>
                      <button type="button" class="px-1 btn btn-success mx-1 refresh_branch_id" title="Refresh"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                    </div>
                  </td>


                  <td>
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <input type="text" class="form-control ifsc  required_for_proof_valid" error-data="Enter valid Ifsc Code" readonly placeholder="IFSC Code" name="ifsc[]" value="{{ old('ifsc.'.$key) }}">
                        <span class="mandatory"> {{ $errors->first('ifsc.'.$key)  }} </span>
                        <div class="invalid-feedback">
                          Enter valid IFSC Code
                        </div>
                      </div>
                    </div>
                  </td>

                  <td>
                    <div class="form-group row">
                      <div class="col-sm-8">
                        <select class="js-example-basic-multiple col-12 form-control custom-select account_type_id required_for_valid" error-data="Enter valid Account Type" name="account_type_id[]">
                          <option value="">Choose Account Type</option>
                          @foreach($account_type as $value)
                          <option value="{{ $value->id }}" {{ old('account_type_id.'.$key) == $value->id ? 'selected' : '' }}>{{ $value->name }}</option>
                          @endforeach
                        </select>
                        <span class="mandatory"> {{ $errors->first('account_type_id.'.$key)  }} </span>
                        <div class="invalid-feedback">
                          Enter valid Account Type
                        </div>
                      </div>
                      <a href="{{ url('master/accounts-type/create')}}" target="_blank">
                        <button type="button" class="px-1 btn btn-success ml-3 " title="Add Accounts Type"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a>
                      <button type="button" class="px-1 btn btn-success mx-1 refresh_accounts_type_id" title="Refresh"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                    </div>
                  </td>

                  <td>
                    <div class="form-group row">
                      <div class="mm">
                        <input type="text" class="form-control account_holder_name required_for_proof_valid" error-data="Enter valid Account Holder Name" placeholder="Account Holder Name" name="account_holder_name[]" value="{{ old('account_holder_name.'.$key) }}">
                        <span class="mandatory"> {{ $errors->first('account_holder_name.'.$key)  }} </span>
                        <div class="invalid-feedback">
                          Enter valid Account Holder Name
                        </div>
                      </div>
                    </div>
                  </td>

                  <td>
                    <div class="form-group row">
                      <div class="mm">
                        <input type="text" class="form-control account_no required_for_proof_valid" error-data="Enter valid Account No" placeholder="Account No" name="account_no[]" value="{{ old('account_no.'.$key) }}">
                        <span class="mandatory"> {{ $errors->first('account_no.'.$key)  }} </span>
                        <div class="invalid-feedback">
                          Enter valid Account No
                        </div>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="form-group row">
                      <div class="col-sm-3 mr-1">
                        <label class="btn btn-success add_bank_details">+</label>
                      </div>
                      <div class="col-sm-3 mx-2">
                        <label class="btn btn-danger remove_bank_details">-</label>
                      </div>
                    </div>
                  </td>

                </tr>

                @endif
                @endforeach
                @endif





              </tbody>

            </table>

          </div>
          <div class="state_id_div" style="display:none">
            @foreach ($state as $value)
            <option value="{{ $value->id }}">{{ $value->name }}</option>\
            @endforeach
          </div>

          <div class="address_type_id_div" style="display:none">
            @foreach ($address_type as $value)
            <option value="{{ $value->id }}">{{ $value->name }}</option>\
            @endforeach
          </div>

          <div class="bank_id_div" style="display:none">
            @foreach ($bank as $value)
            <option value="{{ $value->id }}">{{ $value->name }}</option>\
            @endforeach
          </div>

          <div class="account_type_id_div" style="display:none">
            @foreach ($account_type as $value)
            <option value="{{ $value->id }}">{{ $value->name }}</option>\
            @endforeach
          </div>

        </div>
        <div class="col-md-7 text-right">
          <input type="hidden" name="add">
          <button class="btn btn-success submit" type="button">Submit</button>
        </div>
      </form>
    </div>
    <!-- card body end@ -->
  </div>
</div>
<script src="{{asset('assets/js/master/add_more_address_details.js')}}"></script>
<script src="{{asset('assets/js/master/add_more_branch_details.js')}}"></script>
<script src="{{asset('assets/js/validation/common_validation.js')}}"></script>
<script src="{{asset('assets/js/master/capitalize.js')}}"></script>

<script>
  function customer_type(type) {
    /* Type => 0 => New */
    /* Type => 1 => Exist */
    if (type == 0) {
      $(".new_customer_div").css("display", "block");
      $(".exist_customer_div").css("display", "none");
    } else {
      $(".new_customer_div").css("display", "none");
      $(".exist_customer_div").css("display", "block");

    }

  }

  function checkname()
  {
    var name = $('.name').val();
    $.ajax({
        type: "POST",
        url: "{{ url('master/customer/checkname/')}}",
        data: {name: name,},
        success: function(data) {
          if(data == 1)
          {
            alert('Name Already Taken');
            $('.name').val('');
          }
        }
      });
  }

  $(document).ready(function() {
    var type = $(".customer_type:checked").val();
    customer_type(type);
  });

  $(document).on("click", ".customer_type", function() {
    var type = $(this).val();
    customer_type(type);
  });

  $(document).on("click", ".submit", function() {
    var error_count = validation();
    var address_error_count = address_details_validation();
    var common_error_count = parseInt(error_count) + parseInt(address_error_count);
    if (common_error_count == 0) {
      if ($(".required_for_address_valid").length > 0) {

      } else {
        common_error_count++;
        alert("Please Add Atleast One Address ");

      }
      if (common_error_count == 0) {

        $("form").submit();
      }

    }

  });

  $(document).on("click",".refresh_customer_id",function(){
   var customer_dets=refresh_customer_master_details();
   $(".exist_customer_name").html(customer_dets);
});


  function state_based_district() {
$(".state_id").each(function(key, index) {
 var $tr = $(this).closest(".address_div");
      $tr.find(".city_id").html("<option value=''>Choose City</option>");
      var state_id = $tr.find(".old_state_id").val();
      var district_id = $tr.find(".old_district_id").val();
      $.ajax({
        type: "post",
        url: "{{ url('common/get-state-based-district')}}",
        data: {
          state_id: state_id,
          district_id: district_id
        },
        success: function(res) {
          result = JSON.parse(res);
          $tr.find(".district_id").html(result.option);
        }
      });
    });

  }


  function district_based_city() {
    $(".district_id").each(function(key, index) {
      var $tr = $(this).closest(".address_div");
      var district_id = $tr.find(".old_district_id").val();
      var city_id = $tr.find(".old_city_id").val();
      $.ajax({
        type: "post",
        url: "{{ url('common/get-district-based-city')}}",
        data: {
          district_id: district_id,
          city_id: city_id
        },
        success: function(res) {
          result = JSON.parse(res);
          $tr.find(".city_id").html(result.option);
        }
      });
    });

  }

  function bank_based_branch() {
    $(".bank_id").each(function(key, index) {
      var $tr = $(this).closest("tr");
      var branch_id = $tr.find(".old_branch_id").val();
      var bank_id = $tr.find(".old_bank_id").val();
      if (bank_id != "") {


        $.ajax({
          type: "post",
          url: "{{ url('common/get-bank-based-branch')}}",
          data: {
            bank_id: bank_id,
            branch_id: branch_id
          },
          success: function(res) {
            result = JSON.parse(res);
            $tr.find(".branch_id").html(result.option);
          }
        });
      }
    });

  }


  $(document).ready(function() {
    state_based_district();
    district_based_city();
    bank_based_branch();
  });




  $(document).on("change", ".state_id", function() {
    var $tr = $(this).closest(".address_div");
    var state_id = $(this).val();
    $tr.find(".city_id").html("<option value=''>Choose City</option>");
    $.ajax({
      type: "post",
      url: "{{ url('common/get-state-based-district')}}",
      data: {
        state_id: state_id
      },
      success: function(res) {
        result = JSON.parse(res);
        //  alert($tr.find(".state_id").attr("class"));
        $tr.find(".district_id").html(result.option);

      }
    });
  });



  $(document).on("change", ".district_id", function() {
    var $tr = $(this).closest(".address_div");
    var district_id = $(this).val();
    $.ajax({
      type: "post",
      url: "{{ url('common/get-district-based-city')}}",
      data: {
        district_id: district_id
      },
      success: function(res) {
        result = JSON.parse(res);
        $tr.find(".city_id").html(result.option);
      }
    });



  });

  /* Bank based Branch  Details Ajax Start Here */
  $(document).on("change", ".bank_id", function() {
    var $tr = $(this).closest("tr");
    var bank_id = $(this).val();
    $tr.find(".ifsc").val("");
    $.ajax({
      type: "post",
      url: "{{ url('common/get-bank-based-branch')}}",
      data: {
        bank_id: bank_id
      },
      success: function(res) {
        result = JSON.parse(res);
        $tr.find(".branch_id").html(result.option);

      }
    });
  });
  /* Bank based Branch  Details Ajax End Here */

  /* Branch based IFSC  Details Ajax Start Here */
  $(document).on("change", ".branch_id", function() {
    var $tr = $(this).closest("tr");
    var branch_id = $(this).val();
    $.ajax({
      type: "post",
      url: "{{ url('common/get-branch-based-ifsc')}}",
      data: {
        branch_id: branch_id
      },
      success: function(res) {
        result = JSON.parse(res);
        $tr.find(".ifsc").val(result.value);

      }
    });
  });
  /* Branch based IFSC  Details Ajax End Here */
</script>
@endsection