@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Expense Details</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{ url('receipt_note/index/0') }}">Back</a></button></li>
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
           <th>Expense type</th>
           <th>Expense Amount</th>
           <!-- <th>Action</th> -->
          </tr>
        </thead>
        <tbody>
          
          @foreach($expense_details as $key => $value)
            <tr>
              <td>{{ $key+1 }}</td>
              @if(isset($value->expense_types->name) && !empty($value->expense_types->name))
              <td>{{ $value->expense_types->name }}</td>
              @else
              <td></td>
              @endif
              
              <td>{{ $value->expense_amount }}</td>
              <!-- <td> 
                <a href="" class="px-1 py-0 text-white rounded" title="View">><i class="fa fa-eye" aria-hidden="true"></i></a>
                <a href="" class="px-1 py-0  text-white rounded" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a onclick="return confirm('Are you sure ?')" href="" class="px-1 py-0  text-white rounded" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
              </td> -->
            </tr>
            @endforeach
        </tbody>
      </table>

    </div>
    <!-- card body end@ -->
  </div>
</div>
@endsection