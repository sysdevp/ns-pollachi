@extends('admin.layout.app')
@section('content')
<main class="page-content">
<div class="container-fuild" style="background:#28a745">
				<div class="text-right pr-3">sdfjsdfjl</div>
		</div>
<div class="col-12 body-sec">
  <div class="card px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Stock Report</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{route('stock-report.index')}}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->

    <style>
table, th, td {
  border: 1px solid #E1E1E1;
}

</style>
    <div class="card-body">
    
        <div class="form-row">
          <table class="table table-striped table-bordered" id="master">
                  <thead>
                    <th> S.no </th>
                    <th id="rate"> Location</th>
                    <th id="items"> Name Of Item </th>
                    <th id="qty">Quantity</th>
                  </thead>
                  <tbody>
                    @for($i = 0; $i < $count; $i++)
                      <tr>
                      <td><?php echo $i+1; ?></td>
                      <td>{{ $array_details[$i]['location'] }}</td>
                      <td>{{ $array_details[$i]['item'] }}</td>
                      <td>{{ $array_details[$i]['total_qty'] }}</td>
                      </tr>
                    @endfor
                  </tbody>
                  
                </table>
          
        </div>
    </div>
    <script src="{{asset('assets/js/master/capitalize.js')}}"></script>
    <script src="{{asset('assets/js/ageing_analysis/ageing.js')}}"></script>

    
    <!-- card body end@ -->
  </div>
</div>
@endsection

