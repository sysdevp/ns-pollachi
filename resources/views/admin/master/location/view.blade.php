@extends('admin.layout.app')
@section('content')
<main class="page-content">
<div class="container-fuild" style="background:#28a745">
				<div class="text-right pr-3">sdfjsdfjl</div>
		</div>
<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>List Location</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{url('master/location/create')}}">Add Location</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
      <table id="master" class="table table-striped table-bordered" style="width:100%">
        <thead>
          <tr>
            <th>S.No</th>
            <th>Location Name</th>
            <th>Location Type</th>
            <th>Address</th>
           <th>Action </th>
          </tr>
        </thead>
        <tbody>
          
          @foreach($location as $key=>$value)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $value->name}}</td>
              <td>{{ isset($value->location_type->name) && !empty($value->location_type->name) ? $value->location_type->name : ""}}</td>
              <td>
                  @if($value->address_line_1 != "")
                  {{ $value->address_line_1 }},</br>
                  @endif
                  @if($value->address_line_2 != "")
                  {{ $value->address_line_2 }},</br>
                  @endif
                  
                
                  @if($value->land_mark != "")
                  {{ $value->land_mark }},
                  @endif
                  @if(isset($value->city->name) && $value->city->name != "")
                  {{ $value->city->name }},
                  @endif

                  @if(isset($value->district->name) && $value->district->name != "")
                  {{ $value->district->name }},
                  @endif
</br>

                  @if(isset($value->state->name) && $value->state->name != "")
                  {{ $value->state->name }}
                  @endif
                  @if($value->postal_code != "")
                 - {{ $value->postal_code }},</br>
                  @endif

                


            
             </td>
              <td> 
                <a href="{{url('master/location/show/'.$value->id )}}" class="px-2 py-1 bg-info text-white rounded"><i class="fa fa-eye" aria-hidden="true"></i></a>
                <a href="{{url('master/location/edit/'.$value->id )}}" class="px-2 py-1 bg-success text-white rounded"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a onclick="return confirm('Are you sure ?')" href="{{url('master/location/delete/'.$value->id )}}" class="px-2 py-1 bg-danger text-white rounded"><i class="fa fa-trash" aria-hidden="true"></i></a>
              </td>
            </tr>
          @endforeach
         
        </tbody>
      </table>

    </div>
    <!-- card body end@ -->
  </div>
</div>
@endsection