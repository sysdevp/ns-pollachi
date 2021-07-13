@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Sale entry Report</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
          @if($from!="" && $to!="")
          <li><button type="button" class="btn"><a href="{{url('salesentry_report')}}">  Back</a></button></li>
          @endif
          </ul>
        </div>
      </div>
    </div>


    <!-- card header end@ -->
    <div class="card-body">
    <form  method="post" class="form-horizontal needs-validation" novalidate action="{{url('salesentry_search')}}" enctype="multipart/form-data">
      {{csrf_field()}}

        <div class="form-row mb-3">

        

          <div class="col-md-12 form-row mb-3">

          

            <div class="col-md-2">
              <label>From</label>
            <input type="date" class="form-control from" name="from" id="from" value="{{$from}}" required>
            </div>

            <div class="col-md-2">
              <label>To</label>
            <input type="date" class="form-control to" name="to" id="to" value="{{$to}}" required>
            </div>
            <div class="col-md-2">
              <label>Location</label>
              <select class="js-example-basic-multiple col-12 form-control custom-select location" name="location" id="location">
                           <option value="">Choose Location</option>
                           @foreach($location as $data)
                           <option value="{{ $data->id }}"@if(isset($cond['location'])){{($suppliers->id==$cond['location']) ? 'selected' : '' }}@endif >{{ $data->name}}</option>
                           @endforeach
                            </select>

          </div>
          </div>


          </div>
          <div class="col-md-12 mb-3">
            <div class="col-md-2">
            <input type="submit" class="btn btn-success" value="Submit">
            </div>
          </div>
      <table id="master" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>S.No</th>
            <!-- <th>Salesman Name </th> -->
            <th>Bill No </th>
            <th>Bill Date </th>
            <th>Amount</th>
            <th>Location</th>
            <th>Action</th>

          </tr>
        </thead>
        <tbody id="test1">
         @foreach($sales_report as $key => $data)
        <tr>
         <td>{{$key+1 }}</td>
         <!-- <td>{{@$data->name}}</td> -->
         <td>{{@$data->s_no}}</td>
         <td>{{@$data->so_date}}</td>
         <td>{{@$data->total_net_value}}</td>
         <td>{{@$data->locations->name }}</td>
         <td><a href="{{ route('sales_entry.show',$data->s_no) }}"  class="px-2 py-1 bg-info text-white rounded" title="View">
				<i class="fa fa-eye" aria-hidden="true"></i></a>
</td>
</tr>
         @endforeach
         
        </tbody>


      </table>

    </div>

   
    <!-- card body end@ -->
  </div>
  </form>
</div>
@endsection