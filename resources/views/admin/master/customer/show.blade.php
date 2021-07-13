@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card container-fluid px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row ">
        <div class="col-4">
          <h3>View Customer</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{url('master/customer/')}}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
      <div class="form-row">

          <div class="col-md-6">
              <div class="form-group row">
                <label for="validationCustom01" class="col-sm-4 col-form-label">Company Name :</label>
                <label for="validationCustom01" class="col-sm-4 col-form-label"> {{ $customer->company_name }}</label>
              </div>
            </div>

        <div class="col-md-6">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Customer Name :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label"> {{ $customer->salutation }}. {{ $customer->name }}</label>
          </div>
        </div>
       

        <div class="col-md-6">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Phone No :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label">{{ $customer->phone_no }} </label>
          </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Whatsapp No :</label>
              <label for="validationCustom01" class="col-sm-4 col-form-label">{{ $customer->whatsapp_no }} </label>
            </div>
          </div>

        <div class="col-md-6">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Email :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label">{{ $customer->email }} </label>
          </div>
        </div>

        <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Pancard :</label>
              <label for="validationCustom01" class="col-sm-4 col-form-label">{{ $customer->pan_card }} </label>
            </div>
          </div>

          <div class="col-md-6">
              <div class="form-group row">
                <label for="validationCustom01" class="col-sm-4 col-form-label">Gst :</label>
                <label for="validationCustom01" class="col-sm-4 col-form-label">{{ $customer->gst_no }} </label>
              </div>
            </div>

            <div class="col-md-6">
                <div class="form-group row">
                  <label for="validationCustom01" class="col-sm-4 col-form-label">Maximum Credit Limit :</label>
                  <label for="validationCustom01" class="col-sm-4 col-form-label">{{ $customer->max_credit_limit }} </label>
                </div>
              </div>

              <div class="col-md-6">
                  <div class="form-group row">
                    <label for="validationCustom01" class="col-sm-4 col-form-label">Maximum Credit Days :</label>
                    <label for="validationCustom01" class="col-sm-4 col-form-label">{{ $customer->max_credit_days }} </label>
                  </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group row">
                      <label for="validationCustom01" class="col-sm-4 col-form-label">Opening Balance :</label>
                      <label for="validationCustom01" class="col-sm-4 col-form-label">{{ $customer->opening_balance }} </label>
                    </div>
                  </div>
                  
                    <div class="col-md-6">
                        <div class="form-group row">
                          <label for="validationCustom01" class="col-sm-4 col-form-label">Price Level :</label>
                          <label for="validationCustom01" class="col-sm-4 col-form-label">{{ $customer->price_level }} </label>
                        </div>
                      </div>

                      <div class="col-md-6">
                          <div class="form-group row">
                            <label for="validationCustom01" class="col-sm-4 col-form-label">Sales Man :</label>
                            <label for="validationCustom01" class="col-sm-4 col-form-label">{{ $customer->sales_man->name }} </label>
                          </div>
                        </div>

                      <div class="col-md-6">
                          <div class="form-group row">
                            <label for="validationCustom01" class="col-sm-4 col-form-label">Remark :</label>
                            <label for="validationCustom01" class="col-sm-4 col-form-label">{{ $customer->remark }} </label>
                          </div>
                        </div>
                     

        
    </div>
    
    <div class="form-row">
        <div class="col-md-8">
        <h4> Address Details :</h4>
        </div>
      </div>
      <hr>
    @foreach ($customer_address_details as $key=>$values)
    <div class="form-row">
        <div class="col-md-8">
            <h4> Address Details  - {{ ($key+1 )}} </h4>
            </div>
        <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Address Type :</label>
              <label for="validationCustom01" class="col-sm-4 col-form-label">{{ isset($values->address_type->name) && !empty($values->address_type->name) ? $values->address_type->name : "" }} </label>
            </div>
          </div>
          <div class="col-md-6">
              <div class="form-group row">
                <label for="validationCustom01" class="col-sm-4 col-form-label">Address Line 1:</label>
                <label for="validationCustom01" class="col-sm-4 col-form-label">{{ $values->address_line_1 }} </label>
              </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                  <label for="validationCustom01" class="col-sm-4 col-form-label">Address Line 2 :</label>
                  <label for="validationCustom01" class="col-sm-4 col-form-label">{{ $values->address_line_2 }} </label>
                </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group row">
                    <label for="validationCustom01" class="col-sm-4 col-form-label">Land Mark:</label>
                    <label for="validationCustom01" class="col-sm-4 col-form-label">{{ $values->land_mark }} </label>
                  </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                      <label for="validationCustom01" class="col-sm-4 col-form-label">State :</label>
                      <label for="validationCustom01" class="col-sm-4 col-form-label">{{ isset($values->state->name) && !empty($values->state->name) ? $values->state->name : "" }} </label>
                    </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group row">
                        <label for="validationCustom01" class="col-sm-4 col-form-label">District :</label>
                        <label for="validationCustom01" class="col-sm-4 col-form-label">{{ isset($values->district->name) && !empty($values->district->name) ? $values->district->name : "" }} </label>
                      </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                          <label for="validationCustom01" class="col-sm-4 col-form-label">City :</label>
                          <label for="validationCustom01" class="col-sm-4 col-form-label">{{ isset($values->city->name) && !empty($values->city->name) ? $values->city->name : "" }} </label>
                        </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group row">
                            <label for="validationCustom01" class="col-sm-4 col-form-label">Postal Code :</label>
                            <label for="validationCustom01" class="col-sm-4 col-form-label">{{ $values->postal_code }} </label>
                          </div>
                        </div>
    </div>
    <hr>
    @endforeach
    <div class="form-row">
        <div class="col-md-8">
        <h4> Bank Details :</h4>
        </div>
      </div>
    <div class="form-row">
        <table class="table">
            <thead>
              <th>S.no</th>
              <th> Bank   Name  &nbsp;&nbsp;</th>
              <th> Branch Name</th>
              <th> Ifsc Code </th>
              <th>Account Type </th>
              <th>Account Holder Name </th>
              <th>Account No </th>
              
            </thead>
            <tbody>
              @foreach ($customer_bank_details as $key=>$value)
              <tr>
                <td>{{$key+1}}</td>
              <td>{{$value->bank->name}}</td>
              <td>{{$value->branch->branch}}</td>
              <td>{{$value->ifsc}}</td>
              <td>{{$value->account_type->name}}</td>
              <td>{{$value->account_holder_name}}</td>
              <td>{{$value->account_no}}</td>
            
             </tr>
              @endforeach
              
            </tbody>

             
             
            </tbody>
        </table>
    </div>
    </div>
    <!-- card body end@ -->
  </div>
</div>
@endsection