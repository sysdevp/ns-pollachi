@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Batch Code Print</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            
            <li><button type="button" class="btn btn-success"><a href="{{ url('purchase_entry/index/0') }}">Purchase View</a></button></li>
           
          </ul>
        </div>
      </div>
    </div>
    
    <!-- card header end@ -->
    <div>
      <div class="col-md-12">
                <table class="table">
                  <thead>
          <tr>
            <th>S.No</th>
            <th>Print </th>
            <th>Item Name </th>
            <th>Purchased Qty / UOM</th>
            <th>Printing UOM </th>
            <th>Available Qty </th>
            <th>Printing Qty </th>
          </tr>
        </thead>
        <tbody id="test1">
		@foreach($purchase_entry_items as $key => $value)
             <tr>
			 <td>{{ $key+1 }}</td>
			 <td><input type="checkbox" name="print_id[]" value="{{ $value->id }}"></td>
			 <td>{{ $value->item->name }}</td>
			 <td>{{ $value->qty }} / {{ $value->uom->name }}</td>
			 <td><select class="form-control uom_exclusive" name="uom_exclusive" onchange="uom_details_exclusive()">
			  <option value="">Choose uom</option>
                           @foreach($item_uom as $uom)
                           <option value="{{ $uom->id }}">{{ $uom->name }}</option>
                           @endforeach
                                </select></td>
			 <td>{{ $value->item->name }}</td>
			 <td><input type="number"></td>
			 </tr>
		@endforeach
        </tbody>

      </table>

    </div>
<div class="row col-md-12">
                  
                  <label>Printing Template</label>
				 
                  <div class="col-md-6">
                     
                      <select class="js-example-basic-multiple col-6 form-control custom-select voucher_type" onchange="voucher_types()" name="voucher_type" id="voucher_type">
                           <option value="">Choose Templates</option>
                           <option value="1">1</option>
                           <option value="2">2</option>
                           <option value="3">3</option>
                           <option value="4">4</option>
                        </select>
                     
               </div>
               </div>


    <!-- card body end@ -->
  </div>
</div>
</div>
@endsection