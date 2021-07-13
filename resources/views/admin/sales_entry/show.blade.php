@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>View Sale Entry Details</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{url('sales_entry/index/0')}}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body" id="DivIdToPrint">
      <div class="row col-md-12">

            <div class="col-md-6">
              <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Voucher No :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label"> {{ $sale_entry->s_no }}</label>
          </div>
              </div>
                                 

          <div class="col-md-6">
            <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Voucher Date :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label"> {{ $sale_entry->s_date }}</label>
          </div>
              </div>
            </div>

            <div class="row col-md-12">

            <div class="col-md-6">
              <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Sales Order No :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label"> {{ $sale_entry->so_no }}</label>
          </div>
              </div>
                                 

          <div class="col-md-6">
            <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Sales Order Date :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label"> {{ $sale_entry->so_date }}</label>
          </div>
              </div>
            </div>


            <div class="row col-md-12">

            <div class="col-md-6">
              <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Customer Name :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label"> 
              @if(isset($sale_entry->customer->name) && !empty($sale_entry->customer->name))
              {{ $sale_entry->customer->name }}
              @else
               N/A 
              @endif
            </label>
          </div>
              </div>
                                 

          <div class="col-md-6">
            <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Customer Address :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label"> {{ $address }}</label>
          </div>
              </div>
            </div>

            <div class="row col-md-12">
            <div class="col-md-6">
              <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Sales Man Name :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label"> 
              @if(isset($sale_entry->salesman->name) && !empty($sale_entry->salesman->name))
              {{ $sale_entry->salesman->name }}
              @else
               N/A 
              @endif
            </label>
          </div>
        </div>

            <!-- <div class="row col-md-12">

            <div class="col-md-6">
              <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Purchase Type :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label"> 
              @if($sale_entry->purchase_type == 1)
              Cash Purchase
              @else
               Credit purchase
              @endif
            </label>
          </div>
              </div>
              
            </div> -->
                              
                              <br>
    
      <div class="col-md-8">
       <div class="form-group row">
       <div class="col-md-4">
       <label for="validationCustom01" class=" col-form-label"><h4>Item Details:</h4> </label><br>           
           </div>
             </div>
              </div>



<div class="form-row">
             
              <div>
                
                <table class="table table-bordered table-responsive" style="max-width: 93%; height: 100%;">
                  <thead>
                    <th> S.no </th>
                    <th> Item S.no </th>
                    <th> Item Code</th>
                    <th> Item Name</th>
                    <th> HSN</th>
                    <th> MRP</th>
                    <th> Unit Price</th>
                    <th> Quantity</th>
                    <th> UOM</th>
                    <th> Amount</th>
                    <th> Item Discount</th>
                    <th> Overall Discount</th>
                    <th> Expense</th>
                    <th> GST Rs</th>
                    <th> Net Value</th>
                    <th style="background-color: #FAF860;"> Last Purchase Rate(LPR)</th>
                    
                  </thead>
                  <tbody>
                   @foreach($sale_entry_items as $key => $value)
                    <tr id="row{{ $key }}" class="{{ $key }} tables"><td><span class="item_s_no"> {{ $key+1 }} </span></td><td><div class="form-group row"><div class="col-sm-12"><input class="invoice_no{{ $key }}" type="hidden" id="invoice{{ $key }}" value="{{ $value->item_sno }}" name="invoice_sno[]"><font class="item_no{{ $key }}">{{ $value->item_sno }}</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="item_code{{ $key }}" value="{{ $value->item_id }}" name="item_code[]"><font class="items{{ $key }}">{{ $value->item->code }}</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input class="item_name{{ $key }}" type="hidden" value="{{ $value->item->name }}" name="item_name[]"><font class="font_item_name{{ $key }}">{{ $value->item->name }}</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input class="hsn{{ $key }}" type="hidden" value="{{ $value->item->hsn }}" name="hsn[]"><font class="font_hsn{{ $key }}">{{ $value->item->hsn }}</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="mrp{{ $key }}" value="{{ $value->mrp }}" name="mrp[]"><font class="font_mrp{{ $key }}">{{ $value->mrp }}</font></div></div></td><td><div class="form-group row"><div class="col-sm-12" id="unit_price"><input type="hidden" class="exclusive{{ $key }}" value="{{ $value->rate_exclusive_tax }}" name="exclusive[]"><font class="font_exclusive{{ $key }}">{{ $value->rate_exclusive_tax }}</font><input type="hidden" class="inclusive{{ $key }}" value="{{ $value->rate_inclusive_tax }}" name="inclusive[]"></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="quantity{{ $key }}" value="{{ $value->qty }}" name="quantity[]"><font class="font_quantity{{ $key }}">{{ $value->qty }}</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="uom{{ $key }}" value="{{ $value->uom->id }}" name="uom[]"><font class="font_uom{{ $key }}">{{ $value->uom->name }}</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="table_amount" id="amnt{{ $key }}" value="{{ $item_amount[$key] }}" name="amount[]"><font class="font_amount{{ $key }}"> {{$item_amount[$key]}} </font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="input_discounts" value="{{ $value->discount }}" id="input_discount{{ $key }}" ><input class="discount_val{{ $key }}" type="hidden" value="{{ $value->discount }}" name="discount[]"><font class="font_discount" id="font_discount{{ $key }}">{{ $value->discount }}</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="overall_disc" id="overall_disc{{$key}}" value="{{$value->overall_disc}}" name="overall_disc[]"><font class="font_overall_disc{{$key}}">{{$value->overall_disc}}</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="expenses {{$key}}" id="expenses{{$key}}" value="{{$value->expenses}}" name="expenses[]"><font class="font_expenses{{$key}}">{{$value->expenses}}</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="table_gst" id="tax{{ $key }}" value="{{$item_gst_rs[$key]}}" name="gst[]"><input type="hidden" class="tax_gst{{ $key }}"  value="{{ $value->gst }}" name="tax_rate[]"><font class="font_gst{{ $key }}"> {{$item_gst_rs[$key]}} </font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="table_net_price" id="net_price{{ $key }}" value="{{ $item_net_value[$key] }}" name="net_price[]"><font class="font_net_price{{ $key }}">{{ $item_net_value[$key] }}</font></div></div></td><td style="background-color: #FAF860;"><div class="form-group row"><div class="col-sm-12"><center><font class="last_purchase{{ $key }}">{{ $net_value[$key] }}</font></center></div></div></td></tr>
                  
                    @endforeach
                  </tbody>

                </table>
                
                       </div>
                     </div><br>


            <div class="row col-md-12">

            <div class="col-md-6">
              <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Discount(-) :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label"> {{ $item_discount_sum }}</label>
          </div>
              </div>
                                 

          <div class="col-md-6">
            <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Overall Discount :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label"> {{ $sale_entry->overall_discount }}</label>
          </div>
              </div>
            </div>


          <div class="form-row">
             
              <div>  
        
        <table class="table table-bordered table-responsive" style="width: 100%; height: 100%;">
          <thead>
            <th> S.no </th>
            <th> Expense Type </th>
            <th> Expense Amount</th>
            
          </thead>
              <tbody>
               @foreach($sale_entry_expense as $key => $value)
                <tr>
                  <td>{{ $key+1 }}</td>
                <td>@if(isset($value->expense_types->type) && !empty($value->expense_types->type))
                {{ $value->expense_types->type }}
              @endif</td>
              <td>{{ $value->expense_amount }}</td>
                    </tr>
                  
            @endforeach
          </tbody>

        </table>
                
          </div></div><br>


            <div class="row col-md-12">

            <div class="col-md-6">
              <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Round Off(+/-) :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label"> {{ $sale_entry->round_off }}</label>
          </div>
              </div>
                                 

          @foreach($tax as $value)
          <div class="col-md-6">
            <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">{{@$value->taxes->name}} :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label"> {{@$value->value}}</label>
          </div>
              </div>
              @endforeach
            </div>

            <div class="row col-md-12">

              <table class="table table-bordered table-responsive" style="width: 100%; height: 100%;">
          <thead>
            <th> S.no </th>
            <th> Name Of Document </th>
            <th> Uploaded Document</th>
            
          </thead>
              <tbody>
               @foreach($upload as $key => $value)
                <tr>
                  <td>{{ $key+1 }}</td>
                <td>@if(isset($value->document_name) && !empty($value->document_name))
                {{ $value->document_name }}
              @endif</td>
              <td><a href="{{ asset('/storage/documents/'.$value->document) }}" download><img src="{{ asset('/storage/documents/'.$value->document) }}" height="30px" width="30px" /></a></td>
                    </tr>
                  
            @endforeach
          </tbody>

        </table>

            </div>

            <div class="row col-md-12">

            <div class="col-md-6">
              <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Net Value :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label"> {{$sale_entry->total_net_value}}</label>
          </div>
              </div>
            </div>
                       
    </div>
    <input type='button' id='btn' value='Print' onclick='printDiv();'>
    <!-- card body end@ -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </div>
</div>
<script type="text/javascript">
function printDiv() 
{

  var divToPrint=document.getElementById('DivIdToPrint');

  var newWin=window.open('','Print-Window');

  newWin.document.open();

  newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

  newWin.document.close();

  setTimeout(function(){newWin.close();},10);

}
</script>
@endsection