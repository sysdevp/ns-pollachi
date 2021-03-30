@extends('admin.layout.app')



@section('content')
<main class="page-content">

<div class="col-12 body-sec">
<div class="col-lg-12">
					<!-- Content Header (Page header) -->
					<section class="content-header">
					  <h2>
						Dashboard
					  </h2>
					</section>
				</div>
<img src="{{ url('assets/image/dashboard1.png') }}">
<div class="col-lg-12">
					<!-- Content Header (Page header) -->
					<section class="content-header">
					  <h4>
						Fast Moving Items
					  </h4>
					</section>
				</div>
				</br>
 <div class="card-body">
      <table id="master" class="table table-striped table-bordered" style="width:100%">
        <thead>
          <tr>
            <th>S.No</th>
            <th>Location Name</th>
            <th>Category</th>
            <th>Item Name</th>
            <th>Sold Quantity</th>
            <th>Sold Quantity</th>
          </tr>
        </thead>
        <tbody>
		
		</tbody>
		
		</table>
		</div>
		


</div>
@endsection

