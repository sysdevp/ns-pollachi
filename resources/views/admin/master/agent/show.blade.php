@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec single_view">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>View Agent</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{url('master/agent/')}}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
      <div class="form-row">
        <div class="col-md-6">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Agent Name :</label>
            <h5 for="validationCustom01" class="col-sm-4 col-form-label"> {{ $agent->salutation }}. {{ $agent->name }}</h5>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Agent Code :</label>
            <h5 for="validationCustom01" class="col-sm-4 col-form-label">{{ $agent->code }} </h5>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Phone No :</label>
            <h5 for="validationCustom01" class="col-sm-4 col-form-label">{{ $agent->phone_no }} </h5>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Email :</label>
            <h5 for="validationCustom01" class="col-sm-4 col-form-label">{{ $agent->email }} </h5>
          </div>
        </div>
        <b></b>
        
    </div>
    
    <div class="form-row">
        <div class="col-md-8">
        <h4> Address Details :</h4>
        </div>
      </div>
      
    @foreach ($agent_address_details as $key=>$values)
    <div class="form-row">
        <div class="col-md-8">
            <h6> Address Details  - {{ ($key+1 )}} </h6>
            </div>
        <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Address Type :</label>
              <h5 for="validationCustom01" class="col-sm-4 col-form-label">{{ $values->address_type->name }} </h5>
            </div>
          </div>
          <div class="col-md-6">
              <div class="form-group row">
                <label for="validationCustom01" class="col-sm-4 col-form-label">Address Line 1:</label>
                <h5 for="validationCustom01" class="col-sm-4 col-form-label">{{ $values->address_line_1 }} </h5>
              </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                  <label for="validationCustom01" class="col-sm-4 col-form-label">Address Line 2 :</label>
                  <h5 for="validationCustom01" class="col-sm-4 col-form-label">{{ $values->address_line_2 }} </h5>
                </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group row">
                    <label for="validationCustom01" class="col-sm-4 col-form-label">Land Mark:</label>
                    <h5 for="validationCustom01" class="col-sm-4 col-form-label">{{ $values->land_mark }} </h5>
                  </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                      <label for="validationCustom01" class="col-sm-4 col-form-label">State :</label>
                      <h5 for="validationCustom01" class="col-sm-4 col-form-label">{{$values->state->name }} </h5>
                    </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group row">
                        <label for="validationCustom01" class="col-sm-4 col-form-label">District :</label>
                        <h5 for="validationCustom01" class="col-sm-4 col-form-label">{{$values->district->name }} </h5>
                      </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                          <label for="validationCustom01" class="col-sm-4 col-form-label">City :</label>
                          <h5 for="validationCustom01" class="col-sm-4 col-form-label">{{ isset($values->city->name) ? $values->city->name : "" }} </h5>
                        </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group row">
                            <label for="validationCustom01" class="col-sm-4 col-form-label">Postal Code :</label>
                            <h5 for="validationCustom01" class="col-sm-4 col-form-label">{{ $values->postal_code }} </h5>
                          </div>
                        </div>
    </div>
    <hr>
    @endforeach
    <div class="form-row">
        <div class="col-md-8">
        <h4 class="mb-4"> Proof Details :</h4>
        </div>
      </div>
    <div class="form-row">
        <table class="table">
            <thead class="bg-green text-white">
              <th> S.no </th>
              <th> Proof Name</th>
              <th> Proof Number</th>
              
              <th> Files </th>
             
            </thead>
            <tbody class="">
              @foreach ($agent_proof_details as $key=>$item)
              <tr>
              <td>{{$key+1}}</td>
              <td>{{$item->name}}</td>
              <td>{{$item->number}}</td>
              <td> <a href="{{asset('storage/agent_proof_details/'.$item->file)}}" download><img src="{{asset('storage/agent_proof_details/'.$item->file)}}" class="img-fluid" style="max-width:60px;" alt="logo" /></a></td>
              </tr>
                  
              @endforeach
             
            </tbody>
        </table>
    </div>
    </div>
    <!-- card body end@ -->
  </div>
</div>
@endsection