@extends('admin.layout.app')
@section('content')
<?php
use App\Mandatoryfields;
?>
<style>
.maseterheading{
	background: #e0dddd;
    padding: 13px;
    margin-bottom: 10px;
}
.mastersubheading{
width: 100%;
    background: #efefef;
    padding: 15px;
    margin: 21px;
    margin-top: 0px;
}
.mastersubheading1{
    width: 100%;
    background: #efefef;
    padding: 15px;
    margin: 21px;
    margin-top: 0px;
    margin-left: 15px;
    margin-right: -59px;
}
.mastersubheading2{
background: #fff;
    margin: 15px;
    padding: 15px;
    border-radius: 10px;
    margin-top: 4px;
	
	}
	.close {
    float: right;
    font-size: 1.5rem;
    font-weight: 700;
    line-height: 1;
    color: #000 !important ;
    text-shadow: none !important;
    /* opacity: .5; */
}
	.masterdivleft{margin-left: 8px;}


input:checked + .tab-label {
}
input:checked + .tab-label::after {
  transform: rotate(90deg);
}
input:checked ~ .tab-content {
  max-height: 100vh;
  padding: 3px;
}
  
  .plus{        font-weight: bold;
    font-size: 26px;
    line-height: 47px;
    position: absolute;
   left: 53px;
    margin-top: -15px;}
	
	 .plus1{        font-weight: bold;
    font-size: 26px;
    line-height: 57px;
    position: absolute;
    left: 15px;
    margin-top: -9px;}
	
	
	.accordionWrapper{padding:30px;background:#fff;float:left;width:100%;box-sizing:border-box; }
.accordionItem{
    float:left;
    display:block;
    width:100%;
    box-sizing: border-box;
    font-family:'Open-sans',Arial,sans-serif;
}
.accordionItemHeading{
   cursor: pointer;
    margin: 0px 0px 10px 0px;
    padding: 15px;
    background: #e0dddd;
    color: #000;
    width: 6%;
    box-sizing: border-box;
	    text-align: center; font-size:15px;
}
.close .accordionItemContent{
    height:0px;
    transition:height 1s ease-out;
	transform: scaleY(0);
    float:left;
    display:block;
    
    
}
.open .accordionItemContent{
        padding: 10px;
    background-color: #fff;
    border: 1px solid #ddd;
    width: 100%;
    margin: 0px 0px 10px 0px;
    display:block;
	transform: scaleY(1);
	transform-origin: top;
	transition: transform 0.4s ease;
        box-sizing: border-box;
		    background: #efefef;
}

.open .accordionItemHeading{
  
}
.masterbg{ background: #e3e0e0;
    padding: 10px;
    margin-bottom: 13px;
    margin-top: -40px;}
	
	
	.locationbg{background: #efefef;}
	.locationdivbg {background: #efefef;padding: 18px;}
	.addbg{font-size: 18px; color: #000;}
		.margintop{margin-top:10px !important;}

</style>

<main class="page-content">

<div class="col-12 body-sec">
  <div class="card container-fluid px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Mandatory Fields</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{url('master/role')}}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="{{url('mandatoryfields/store')}}" enctype="multipart/form-data">
      {{csrf_field()}}

        <div class="form-row">
            <span class="mandatory"> {{ $errors->first('permission.*')  }} </span>
         
		  
          </div>

			<div id="accordionExample" style="width: -webkit-fill-available; padding: 5px;">  
			
			<div class="parent" id="masters_div">
     
			<div class="card-header masterbg margintop" id="heading">
                            
					<button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"><i class="fa fa-plus addbg"></i></button>	
				
							 <!-- <input style=" text-align: center;" value="h1" type="checkbox"  class="masters_head" id="masters_head" name="permission[]"/> -->
                              <b>Master</b></h4>
							 
           </div>
				
	   
   		    <div id="collapseOne" class="collapse" data-parent="#accordionExample">			
		
			<div id="accordionExample1">
				
				<div class="subparent">
					
						 <div class="card-header locationbg">
							<button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapselocation"><i class="fa fa-plus addbg"></i></button>
							 <!-- <input type="checkbox" name="checkAll" id="location_head"/> -->
                              Location
						</div>
					
					
						<div id="collapselocation" class="collapse" data-parent="#accordionExample1">
							
							<div class="locationdivbg">
								
				<div class="row" id="location_div">
                    <div class="col-lg-2 mastersubheading2">
                        <div class="" id="tab1">		

                        <label class="control-label">State</label>
                        <br>
                        <input type="checkbox"  c >  
                        <label class="control-label">Select All</label>
                        <br>
                        <input type="checkbox"  name="permission[]" class="state_list" value="state_name" <?php echo Mandatoryfields::checkbox('state_name'); ?>>  
                        <span class="control-label">State Name</span>
                        <br>                                                                                    
                        <input type="checkbox" name="permission[]" class="state_list" value="state_code" <?php echo Mandatoryfields::checkbox('state_code'); ?>>  
                        <span class="control-label">State Code</span>
                        <br>                                                                                        
                        <input type="checkbox" name="permission[]" class="state_list" value="state_remark" <?php echo Mandatoryfields::checkbox('state_remark'); ?>>  
                        <span class="control-label">Remarks</span>
                    </div>	
                </div>
									
									
				<div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab2">
                        <label class="control-label">District</label>
                        <br>                       
                        <input type="checkbox" name="permission[]" class="district_list permission" value="district_name" <?php echo Mandatoryfields::checkbox('district_name'); ?>>   
                        <span class="control-label">District Name</span>
                        <br>                    
                        <input type="checkbox" name="permission[]" class="district_list permission" value="district_state_id" <?php echo Mandatoryfields::checkbox('district_state_id'); ?>>  
                        <span class="control-label">State Name</span>
                        <br>                    
                        <input type="checkbox" name="permission[]" class="district_list permission" value="district_remark" <?php echo Mandatoryfields::checkbox('district_remark'); ?>>  
                        <span class="control-label">Remarks</span>
                    </div>	
                </div>
           							
           
								
				</div>
        </div>
							
						</div>	
					
				</div>
				
				
				
				<div class="subparent">
					
						 <div class="card-header locationbg">
							<button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapsebank"><i class="fa fa-plus addbg"></i></button>
							 <input type="checkbox" name="checkAll8" id="bank_head"/> Bank
						</div>
					
					
						<div id="collapsebank" class="collapse" data-parent="#accordionExample1">
							
							<div class="locationdivbg">
								
				<div class="row masterdivleft" id="bank_div">
                <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab8">		
                       <label class="control-label">Bank</label>
                       <br>

                       <input type="checkbox" name="permission[]" class="bank_list permission" value="27" checked disabled>  
                       <span class="control-label">Bank Name</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="bank_list permission" value="28">  
                       <span class="control-label">Bank Code</span>
                       <br>
                    </div>
                 </div>
                
                
                 <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab11">	

                       <label class="control-label">Bank Branch</label>

                       <br>
                       <input type="checkbox" name="permission[]" class="accounts_type_list permission" value="38" checked disabled>  
                       <span class="control-label">Branch Name</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="accounts_type_list permission" value="39">  
                       <span class="control-label">Bank Name</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="accounts_type_list permission" value="40">  
                       <span class="control-label">IFSC</span>
                       <br>
                    </div>
                 </div>
			</div>
        </div>
							
						</div>	
					
				</div>
				
				
				
				
							
						</div>	
					
				</div>
	
				
				
		
             
          

		  </div>
		  
      
	  
      </div>
				
				
			<div class="card-header masterbg margintop" id="heading" >
                            
					<button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapsetwo"><i class="fa fa-plus addbg"></i></button>	
				
							 <input style=" text-align: center;" type="checkbox" class="employee_head" id="transaction_management"/>
				<b>Transaction Management</b>			
           </div>		
	  
				
		    <div id="collapsetwo" class="collapse" data-parent="#accordionExample">			
		
			<div id="accordionExample2">
				
				<div class="subparent">
					
						 <div class="card-header locationbg">
							<button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapsePurchase"><i class="fa fa-plus addbg"></i></button>
							<input type="checkbox" name="checkAll1" id="purchase_head"/> Payment
						</div>
					
					
					
						<div id="collapsePurchase" class="collapse" data-parent="#accordionExample2">
							
							<div class="locationdivbg">
							
								<div class="row" id="purchase_div">
									
					<div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab41">		
      <label class="control-label">Payment Request</label>

      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="sales_estimation_list permission" value="171" checked disabled>  
      <span class="control-label">Receipt No</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="sales_estimation_list permission" value="172">  
      <span class="control-label">Date</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="sales_estimation_list permission" value="173">  
      <span class="control-label">Bill Amount</span>
      <br>
   </div>
</div>
					
					<div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab41">		
      <label class="control-label">Payment Process</label>

      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="sales_estimation_list permission" value="171" checked disabled>  
      <span class="control-label">Receipt No</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="sales_estimation_list permission" value="172">  
      <span class="control-label">Date</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="sales_estimation_list permission" value="173">  
      <span class="control-label">Bill Amount</span>
      <br>
   </div>
</div>
					
			
									
								
									
								</div>
				
        				</div>
							
						</div>	
					
				</div>
				
				<div class="subparent">
					
						 <div class="card-header locationbg">
							<button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseSales"><i class="fa fa-plus addbg"></i></button>
							<input type="checkbox" name="checkAll" id="Sales_head"/> Receipt
						</div>
					
					
					
						<div id="collapseSales" class="collapse" data-parent="#accordionExample2">
							
							<div class="locationdivbg">
							
								<div class="row" id="Sales_div">
									
				<div class="col-lg-2 mastersubheading2">
   <div class="" id="tab41">		
      <label class="control-label">Receipt Request</label>

      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="sales_estimation_list permission" value="171" checked disabled>  
      <span class="control-label">Receipt No</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="sales_estimation_list permission" value="172">  
      <span class="control-label">Date</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="sales_estimation_list permission" value="173">  
      <span class="control-label">Bill Amount</span>
      <br>
   </div>
</div>
					
					<div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab41">		
      <label class="control-label">Receipt Process</label>

      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="sales_estimation_list permission" value="171" checked disabled>  
      <span class="control-label">Receipt No</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="sales_estimation_list permission" value="172">  
      <span class="control-label">Date</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="sales_estimation_list permission" value="173">  
      <span class="control-label">Bill Amount</span>
      <br>
   </div>
</div>
				
					
					
							
								
									
								</div>
				
        				</div>
							
						</div>	
					
				</div>
				
				
	
							
						</div>	
					
				</div>
				
		  </div>
		  
      
	  
      </div>
				
				
			
		  
		   
		
		  
		  
		  
		  
		  
		  
		  
		  
		  
	
        <div class="col-md-7 text-right">
          <button class="btn btn-success submit"  type="submit">Submit</button>
        </div>
      </form>
    </div>
     <script src="{{asset('assets/js/master/capitalize.js')}}"></script>
    <!-- card body end@ -->
  </div>
</div>
<br/><br/><br/><br/><br/>
<script>
    $(document).ready(function(){
        // Add minus icon for collapse element which is open by default
        $(".collapse.show").each(function(){
        	$(this).prev(".card-header").find(".fa").addClass("fa-minus").removeClass("fa-plus");
        });
        
        // Toggle plus minus icon on show hide of collapse element
        $(".collapse").on('show.bs.collapse', function(){
        	$(this).prev(".card-header").find(".fa").removeClass("fa-plus").addClass("fa-minus");
        }).on('hide.bs.collapse', function(){
        	$(this).prev(".card-header").find(".fa").removeClass("fa-minus").addClass("fa-plus");
        });
    });
    // $(".select_all").click(function (e) {
    //     var get_id = $(this).attr('id');
    //     if($(".select_all").is(':checked'))
    //     {

    //         $("."+get_id).prop("checked",true);

    //     }
    //     else
    //     {
    //       $("."+get_id).prop("checked",false);

    //     }


    // });
//  $(".select_all").click(function (e) {
//   var get_id = $(this).attr('id');
//   var get_class = $(this).attr('class');
//     if($('#'+get_id).is(":checked"))
//     {
//       $("#"+id+" input[type=checkbox]").each(function () {

//       $(this).prop("checked",true);
//     });
//     }

//     alert(get_id);
//  });    
</script>

@endsection

