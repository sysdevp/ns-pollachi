@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>List Head Office Details</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn"><a target="_blank" href="{{url('master/ho_details/import-data')}}"><i class="fa fa-plus"></i> Bulk Import</a></button></li>
            <li><button type="button" class="btn btn-success"><a href="{{url('master/ho_details/create')}}">Add HO Details</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
      <table id="master" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>S.No</th>
            <th>Location Name</th>
            <th>GST Number</th>
            <th>Address</th>
           <th>Action </th>
          </tr>
        </thead>
        <tbody>
          
          @foreach($location as $key=>$value)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $value->name}}</td>
              <td>{{ $value->gst_number}}</td>
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
              <td class="icon">
	<span class="tdshow">
                <a href="{{url('master/ho_details/show/'.$value->id )}}" class="px-1 py-0 text-white rounded" title="View"><i class="fa fa-eye" aria-hidden="true"></i></a>
                <a href="{{url('master/ho_details/edit/'.$value->id )}}" class="px-1 py-0  text-white rounded" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a onclick="return confirm('Are you sure ?')" href="{{url('master/ho_details/delete/'.$value->id )}}" class="px-1 py-0  text-white rounded" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
				</span>
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