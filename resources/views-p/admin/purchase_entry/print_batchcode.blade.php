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
	 <form  method="post" class="form-horizontal needs-validation" 
      novalidate action="{{url('purchase_entry/print_items/')}}" enctype="multipart/form-data">
      {{csrf_field()}}
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
			 <td><input type="checkbox" class="print_id" name="print_id[]" value="{{ $value->id }}" id="print_id">
       <input type="hidden" name="p_no[]" value="{{ $value->p_no }}">
       </td>
			 <td>{{ $value->item->name }}</td>
			 <td>{{ $value->qty }} / {{ $value->uom->name }}</td>
			 <td><select class="form-control uom_exclusive" name="uom_exclusive[]">
			  <option value="">Choose uom</option>
                           @foreach($item_uom as $uom)
                           <?php $selected = ($value->uom->name==$uom->name)?"selected":""; ?>
                           <option value="{{ $uom->name }}" <?php echo $selected; ?>>{{ $uom->name }}</option>
                           @endforeach
                                </select></td>
			 <td>{{ $value->item->name }}</td>
			 <td ><input type="number" class="printing_qty" name="printing_qty[]"  id="printing_qty">
       
       </td>
			 </tr>
		@endforeach
        </tbody>

      </table>

    </div>
<div class="row col-md-12">
                  
                  <label>Printing Template</label>
				 
                  <div class="col-md-6">
                     
                      <select class="js-example-basic-multiple col-6 form-control custom-select voucher_type" name="printing_template" id="voucher_type">
                           <option value="">Choose Templates</option>
                           <option value="1">1</option>
                           <option value="2">2</option>
                           <option value="3">3</option>
                           <option value="4">4</option>
                        </select>
                     
               </div>
               </div>

<div class="col-md-7 text-right">
          <button class="btn btn-success submit" name="add" type="submit">Submit</button>
        </div>
		</form>
    <!-- card body end@ -->
  </div>
</div>
</div>
<script>

// $(".submit").click(function (e) {
//  // var currentRow=$(this).closest("tr"); 
//  alert("hi");
// });
    // $(".table").on('click','.submit',function(){
    //   alert("hi");
    //      // get the current row
    //      var currentRow=$(this).closest("tr"); 
         
    //      var col1=currentRow.find("td:eq(0)").text(); // get current row 1st TD value
    //      var col2=currentRow.find("td:eq(1)").text(); // get current row 2nd TD
    //      var col3=currentRow.find("td:eq(2)").text(); // get current row 3rd TD
    //      var data=col1+"\n"+col2+"\n"+col3;
         
    //      alert(data);
    // });


// $(document).ready(function() {
// alert("hhh");
// });


$(".submit").click(function (e) {

    $(".print_id").each(function () {
      if($(this).is(':checked'))
      {

        var id = table.row(".table").id();
 
 alert( 'Clicked row id '+id );

      }
    });









  //   var currentRow=$('.table').closest("tr"); 
//   var col1=currentRow.find("td:eq(4)").html();
// alert(col1);
// return false;
      
//     $(".print_id").each(function () {
//       if($(this).is(':checked'))
//       {
        
//           var test = $("input[name='printing_qty']").val();
//           alert(test);


//       var test = $(this).val();
//       var printing_qty = $(".printing_qty").val();
//       alert(printing_qty);
//     }
//     });      

//     $('.table').each(function() {
//     var customerId = $(this).find(".printing_qty:input").val();  
//     alert(customerId);  
//  });

      //   if($(".print_id").is(':checked'))
      // {
      //   $(".print_id").each(function () {

      //   var print_id = $(".print_id").val();
      //   alert(print_id);
      // });
      // } 

    

     });
</script>
@endsection
