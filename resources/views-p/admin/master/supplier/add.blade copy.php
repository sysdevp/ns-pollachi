@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card container-fluid px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Add Supplier</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{url('master/supplier')}}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
     <form  method="post" class="form-horizontal needs-validation" 
      novalidate action="{{url('master/supplier/store')}}" enctype="multipart/form-data">
      {{csrf_field()}}
     <div class="form-row">
         

          <div class="col-md-8">
          <h4>Professional details:</h4>
          </div>
          <div class="col-md-6">
            
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Supplier Name <span class="mandatory">*</span></label>
              <div class="col-sm-8">
            <div class="input-group">
            <div class="input-group-prepend">
              <select class="form-control required_for_valid salutation" name="salutation" error-data="Enter valid Salutation" >
                  <option value="Mr" {{ old('salutation') == 'Mr' ? 'selected' : '' }}>Mr</option>
                  <option value="Mrs" {{ old('salutation') == 'Mrs' ? 'selected' : '' }} >Mrs</option>
              </select>
              <span class="mandatory"> {{ $errors->first('salutation')  }} </span>
            </div>
            <input type="text" class="form-control required_for_valid name" name="name" error-data="Supplier Name Field is required" aria-label="Text input with dropdown button" value={{old('name')}}>
            
            <div class="invalid-feedback">
              Enter valid Supplier Name
            </div>
            
          </div>
          <span class="mandatory"> {{ $errors->first('name')  }} </span>
          <span class="mandatory"> {{ $errors->first('salutation')  }} </span>
          </div>
          </div>

          </div>


          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Phone No <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control  phone_no required_for_valid" input-type="phone_no" pattern="[1-9]{1}[0-9]{9}" error-data="Enter valid Phone No" placeholder="Phone No" name="phone_no" value="{{old('phone_no')}}" >
                <span class="mandatory"> {{ $errors->first('phone_no')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Phone No
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Whatsapp No </label>
              <div class="col-sm-8">
                <input type="text" class="form-control whatsapp_no" input-type="phone_no" pattern="[1-9]{1}[0-9]{9}" error-data="Enter valid Whatsapp No" placeholder="Whatsapp No" name="whatsapp_no" value="{{old('whatsapp_no')}}" >
                <span class="mandatory"> {{ $errors->first('whatsapp_no')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Whatsapp No
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Email <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="email" class="form-control email required_for_valid" input-type="email" error_data="Enter valid Email" placeholder="Email" name="email" value="{{old('email')}}" >
                <span class="mandatory"> {{ $errors->first('email')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Email
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Website </label>
              <div class="col-sm-8">
                <input type="text" class="form-control website" error_data="Enter valid Website" placeholder="Website" name="website" value="{{old('website')}}" >
                <span class="mandatory"> {{ $errors->first('website')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Website
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Gst No <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control gst_no required_for_valid" input-type="gst_no" error_data="Enter valid Gst No" placeholder="Gst No" name="gst_no" value="{{old('gst_no')}}" >
                <span class="mandatory"> {{ $errors->first('gst_no')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Gst No
                </div>
              </div>
            </div>
          </div>

         

          
          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Opening Balance <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control  required_for_valid" input-type="opening_balance" error_data="Enter valid Opening Balance" placeholder="Opening Balance" name="opening_balance" value="{{old('opening_balance')}}" >
                <span class="mandatory"> {{ $errors->first('opening_balance')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Opening Balance
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Remark</label>
              <div class="col-sm-8">
                <input type="text" class="form-control remark" input-type="remark" error_data="Enter valid Remark" placeholder="Remark" name="remark" value="{{old('remark')}}" >
                <span class="mandatory"> {{ $errors->first('remark')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Remark
                </div>
              </div>
            </div>
          </div>
       
</div>
 
 <div class="form-row">
 <div class="col-md-8">
          <div class="form-group row">
          <div class="col-md-4">
          <label for="validationCustom01" class=" col-form-label">Address details : </label>
              <label for="validationCustom01" class="btn-sm btn-success add_address">Add Address</label>  
          </div>
            </div>
 </div>
          
          </div>
          <div class="common_address_div">
            
            
          
              @if (old('address_line_1'))
              @foreach (old('address_line_1') as $key=>$item)
            <div class="form-row address_div">
      <div class="col-md-8">
      <h3 class="address_label"></h3>
      </div>
                <div class="col-md-6">
              <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Address Type <span class="mandatory">*</span></label>
                <div class="col-sm-8">
                <select class="js-example-basic-multiple col-12 form-control custom-select address_type_id required_for_valid required_for_address_valid" error-data="Enter valid Address Type" name="address_type_id[]">
                    <option value="">Choose Address Type</option>
                    @foreach($address_type as $value)
                    <option value="{{ $value->id }}" {{ old('address_type_id.'.$key) == $value->id ? 'selected' : '' }} >{{ $value->name }}</option>
                    @endforeach
                  </select>
                  <span class="mandatory"> {{ $errors->first('address_type_id.'.$key)  }} </span>
                 <div class="invalid-feedback">
                    Enter valid Address Type
                  </div>
                </div>
              </div>
            </div>
      <div class="col-md-6">
              <div class="form-group row">
                <label for="validationCustom01" class="col-sm-4 col-form-label">Address Line 1 <span class="mandatory">*</span></label>
                <div class="col-sm-8">
                <input type="text" class="form-control address_line_1 required_for_valid required_for_address_valid" error-data="Enter valid Address" placeholder="Address Line 1" name="address_line_1[]" value="{{ old('address_line_1.'.$key) }}" >
                  <span class="mandatory"> {{ $errors->first('address_line_1.'.$key)  }} </span>
                  <div class="invalid-feedback">
                  Enter valid Address
                  </div>
                </div>
              </div>
            </div>
  <div class="col-md-6">
              <div class="form-group row">
                <label for="validationCustom01" class="col-sm-4 col-form-label">Address Line 2 </label>
                <div class="col-sm-8">
                  <input type="text" class="form-control address_line_2" placeholder="Address Line 2" name="address_line_2[]" value="{{ old('address_line_2.'.$key) }}">
                  <span class="mandatory"> {{ $errors->first('address_line_2.'.$key)  }} </span>
                  <div class="invalid-feedback">
                  Enter valid Address
                  </div>
                </div>
              </div>
            </div>
    <div class="col-md-6">
              <div class="form-group row">
                <label for="land_mark" class="col-sm-4 col-form-label">Land Mark </label>
                <div class="col-sm-8">
                  <input type="text" class="form-control land_mark" placeholder="Land Mark" name="land_mark[]" value="{{ old('land_mark.'.$key) }}">
                  <span class="mandatory"> {{ $errors->first('land_mark.'.$key)  }} </span>
                  <div class="invalid-feedback">
                  Enter valid Land Mark
                  </div>
                </div>
              </div>
            </div>
            <!-- Old Values For Dropdown Start Here  -->
          <input type="hidden" class="form-control old_state_id" value="{{ old('state_id.'.$key)}}">
          <input type="hidden" class="form-control old_district_id" value="{{ old('district_id.'.$key)}}">
          <input type="hidden" class="form-control old_city_id" value="{{ old('city_id.'.$key)}}">
            <!-- Old Values For Dropdown End Here  -->
  <div class="col-md-6">
              <div class="form-group row">
                <label for="validationCustom01" class="col-sm-4 col-form-label">State <span class="mandatory">*</span></label>
                <div class="col-sm-8">
                  <select class="js-example-basic-multiple col-12 form-control custom-select state_id required_for_valid required_for_address_valid" error-data="Enter valid State" name="state_id[]" >
                    <option value="">Choose State</option>
                    @foreach($state as $value)
                    <option value="{{ $value->id }}" {{ old('state_id.'.$key) == $value->id ? 'selected' : '' }}  >{{ $value->name }}</option>
                    @endforeach
                  </select>
                  <span class="mandatory"> {{ $errors->first('state_id.'.$key)  }} </span>
                <div class="invalid-feedback">
                    Enter valid State 
                  </div>
                </div>
              </div>
            </div>
  <div class="col-md-6">
              <div class="form-group row">
                <label for="validationCustom01" class="col-sm-4 col-form-label">District </label>
                <div class="col-sm-8">
                  <select class="js-example-basic-multiple col-12 form-control custom-select district_id" name="district_id[]">
                    <option value="">Choose District</option>
                    </select>
                   <span class="mandatory"> {{ $errors->first('district_id.'.$key)  }} </span>
                   <div class="invalid-feedback">
                    Enter valid District
                  </div>
                </div>
              </div>
            </div>
             <div class="col-md-6">
              <div class="form-group row">
                <label for="validationCustom01" class="col-sm-4 col-form-label">City </label>
                <div class="col-sm-8">
                  <select class="js-example-basic-multiple col-12 form-control custom-select city_id" name="city_id[]" >
                    <option value="">Choose City</option>
                  </select>
                  <span class="mandatory"> {{ $errors->first('city_id.'.$key)  }} </span>
                 <div class="invalid-feedback">
                    Enter valid City
                  </div>
                </div>
              </div>
            </div>
   <div class="col-md-6">
              <div class="form-group row">
                <label for="land_mark" class="col-sm-4 col-form-label">Postal Code <span class="mandatory">*</span></label>
                <div class="col-sm-8">
                <input type="text" class="form-control postal_code only_allow_digit required_for_valid required_for_address_valid" error-data="Enter valid Postal Code" placeholder="Postal Code" name="postal_code[]" value="{{ old('postal_code.'.$key) }}" >
                  <span class="mandatory"> {{ $errors->first('postal_code.'.$key)  }} </span>
                  <div class="invalid-feedback">
                    Enter valid Postal Code
                  </div>
                </div>
              </div>
            </div>
            </div><hr>
              @endforeach
              @endif

          </div>
          
          <div class="form-row">
              <div class="col-md-8">
                       <div class="form-group row">
                       <div class="col-md-4">
                       <label for="validationCustom01" class=" col-form-label"><h4>Bank Details :</h4> </label>
                           
                       </div>
                         </div>
              </div>


              











              <div class="col-md-12">
                <table class="table">
                  <thead>
                    <th>S.no</th>
                    <th> Bank   Name  &nbsp;&nbsp;</th>
                    <th> Branch Name</th>
                    <th> Ifsc Code </th>
                    <th>Account Type </th>
                    <th>Account Holder Name </th>
                    <th>Account No </th>
                    <th>Action</th>
                  </thead>
                  <tbody class="append_bank_details">
                    <tr>
                      <td><span class="bank_s_no"> 1 </span></td>

                      <td>
                        <div class="form-group row">
                            <div class="col-sm-12">
                              <select class="js-example-basic-multiple col-12 form-control custom-select bank_id required_for_valid" error-data="Enter valid Bank" name="bank_id[]" >
                                <option value="">Choose Bank</option>
                                @foreach($bank as $value)
                                <option value="{{ $value->id }}" {{ old('bank_id') == $value->id ? 'selected' : '' }}  >{{ $value->name }}</option>
                                @endforeach
                              </select>
                              <span class="mandatory"> {{ $errors->first('bank_id')  }} </span>
                            <div class="invalid-feedback">
                                Enter valid Bank Name 
                              </div>
                            </div>
                          </div>
                       </td>

                       <td>
                        <div class="form-group row">
                            <div class="col-sm-12">
                              <select class="js-example-basic-multiple col-12 form-control custom-select branch_id required_for_valid" error-data="Enter valid Branch Name" name="branch_id[]" >
                                <option value="">Choose Branch Name</option>
                                </select>
                              <span class="mandatory"> {{ $errors->first('branch_id')  }} </span>
                            <div class="invalid-feedback">
                                Enter valid Branch Name 
                              </div>
                            </div>
                          </div>
                       </td>

                       
                      <td>
                        <div class="form-group row">
                          <div class="col-sm-12">
                          <input type="text" class="form-control ifsc only_allow_digit  required_for_proof_valid" error-data="Enter valid Ifsc Code" readonly placeholder="IFSC Code" name="ifsc[]" value="{{ old('ifsc.0') }}" >
                            <span class="mandatory"> {{ $errors->first('ifsc.0')  }} </span>
                            <div class="invalid-feedback">
                              Enter valid IFSC Code
                            </div>
                          </div>
                        </div>
                      </td>

                      <td>
                        <div class="form-group row">
                            <div class="col-sm-12">
                              <select class="js-example-basic-multiple col-12 form-control custom-select account_type_id required_for_valid" error-data="Enter valid Account Type" name="account_type_id[]" >
                                <option value="">Choose Account Type</option>
                                @foreach($account_type as $value)
                                <option value="{{ $value->id }}" {{ old('account_type_id') == $value->id ? 'selected' : '' }}  >{{ $value->name }}</option>
                                @endforeach
                              </select>
                              <span class="mandatory"> {{ $errors->first('account_type_id')  }} </span>
                            <div class="invalid-feedback">
                                Enter valid Account Type 
                              </div>
                            </div>
                          </div>
                       </td>

                      <td>
                        <div class="form-group row">
                          <div class="col-sm-12">
                          <input type="text" class="form-control account_holder_name required_for_proof_valid" error-data="Enter valid Account Holder Name" placeholder="Account Holder Name" name="account_holder_name[]" value="{{ old('account_holder_name.0') }}" >
                            <span class="mandatory"> {{ $errors->first('account_holder_name.0')  }} </span>
                            <div class="invalid-feedback">
                              Enter valid Account Holder Name
                            </div>
                          </div>
                        </div>
                      </td>

                      <td>
                        <div class="form-group row">
                          <div class="col-sm-12">
                          <input type="text" class="form-control account_no required_for_proof_valid" error-data="Enter valid Account No"  placeholder="Account No" name="account_no[]" value="{{ old('account_no.0') }}" >
                            <span class="mandatory"> {{ $errors->first('account_no.0')  }} </span>
                            <div class="invalid-feedback">
                              Enter valid Account No
                            </div>
                          </div>
                        </div>
                      </td>
                    <td>
                                <div class="form-group row">
                                    <div class="col-sm-3">
                                    <label class="btn btn-success add_bank_details">+</label>
                                    </div>
                                    <div class="col-sm-3 mx-2">
                                      <label class="btn btn-danger remove_bank_details">-</label>
                                      </div>
                                  </div>
                            </td>

                    </tr>

                   
                  </tbody>

                </table>

              </div>


                       </div>
        <div class="col-md-7 text-right">
          <button class="btn btn-success submit" name="add" type="button">Submit</button>
        </div>
      </form>
    </div>
    <!-- card body end@ -->
  </div>
</div>
<script>

 

function add_bank_details(){
var bank_details='<tr>\
    <td><span class="bank_s_no"> 1 </span></td>\
    <td>\
                        <div class="form-group row">\
                            <div class="col-sm-12">\
                              <select class="js-example-basic-multiple col-12 form-control custom-select bank_id required_for_valid" error-data="Enter valid Bank" name="bank_id[]" >\
                                <option value="">Choose Bank</option>\
                                  @foreach($bank as $value)<option value="{{ $value->id }}">{{ $value->name }}</option> @endforeach\
                              </select>\
                              <div class="invalid-feedback">\
                                Enter valid Bank Name \
                              </div>\
                            </div>\
                          </div>\
                       </td>\
                       <td>\
                        <div class="form-group row">\
                            <div class="col-sm-12">\
                              <select class="js-example-basic-multiple col-12 form-control custom-select branch_id required_for_valid" error-data="Enter valid Branch Name" name="branch_id[]" >\
                                <option value="">Choose Branch Name</option>\
                               </select>\
                            <div class="invalid-feedback">\
                                Enter valid Branch Name \
                              </div>\
                            </div>\
                          </div>\
                       </td>\
                       <td>\
                        <div class="form-group row">\
                          <div class="col-sm-12">\
                          <input type="text" class="form-control ifsc required_for_proof_valid" error-data="Enter valid Ifsc Code" readonly placeholder="IFSC Code" name="ifsc[]" value="" >\
                          <div class="invalid-feedback">\
                              Enter valid IFSC Code\
                            </div>\
                          </div>\
                        </div>\
                      </td>\
                      <td>\
                        <div class="form-group row">\
                            <div class="col-sm-12">\
                              <select class="js-example-basic-multiple col-12 form-control custom-select account_type_id " error-data="Enter valid Account Type" name="account_type_id[]" >\
                                <option value="">Choose Account Type</option>\
                                @foreach($account_type as $value) <option value="{{ $value->id }}">{{ $value->name }}</option> @endforeach\
                              </select>\
                             <div class="invalid-feedback">\
                                Enter valid Account Type \
                              </div>\
                            </div>\
                          </div>\
                       </td>\
                       <td>\
                        <div class="form-group row">\
                          <div class="col-sm-12">\
                          <input type="text" class="form-control account_holder_name required_for_proof_valid" error-data="Enter valid Account Holder Name" placeholder="Account Holder Name" name="account_holder_name[]" value="" >\
                           <div class="invalid-feedback">\
                              Enter valid Account Holder Name\
                            </div>\
                          </div>\
                        </div>\
                      </td>\
                      <td>\
                        <div class="form-group row">\
                          <div class="col-sm-12">\
                          <input type="text" class="form-control account_no required_for_proof_valid" error-data="Enter valid Account No"  placeholder="Account No" name="account_no[]" value="" >\
                             <div class="invalid-feedback">\
                              Enter valid Account No\
                            </div>\
                          </div>\
                        </div>\
                      </td>\
                      <td>\
                                <div class="form-group row">\
                                    <div class="col-sm-3">\
                                    <label class="btn btn-success add_bank_details">+</label>\
                                    </div>\
                                    <div class="col-sm-3 mx-2">\
                                      <label class="btn btn-danger remove_bank_details">-</label>\
                                      </div>\
                                  </div>\
                            </td>\
                       </tr>';
  $(".append_bank_details").append(bank_details);
  $("select").select2();


}

$(document).on("click",".remove_bank_details",function(){
  if($(".remove_bank_details").length > 1){
    $(this).closest("tr").remove();
    bank_details_sno();
  }else{
    alert("Atleast One row present");
  }
});
function bank_details_sno(){
  $(".bank_s_no").each(function(key,index){
      $(this).html((key+1));
    });
}


  $(document).on("click",".add_bank_details",function(){
    var append=add_bank_details();
    bank_details_sno();

  });

  $(document).ready(function(){
  bank_details_sno();
  });

$(document).on("blur change",".required_for_valid",function(){
       $(this).removeClass("is-invalid");
        $(this).removeClass("is-valid");
           if($(this).val() !=""){
            $(this).removeClass("is-invalid");
            $(this).addClass("is-valid");
            if($(this).attr('input-type') == "phone_no"){
               var phone_no=$(this).val();
                if(phone_no_validation(phone_no) == 0){
                 $(this).removeClass("is-valid");
                 $(this).addClass("is-invalid");
                }
                 }

                 if($(this).attr('input-type') == "email"){
               var email=$(this).val();
               
               if(!email_validation(email)){
               
                $(this).removeClass("is-valid");
                 $(this).addClass("is-invalid");
               }
               
                 }
}else{
             $(this).removeClass("is-valid");
            $(this).addClass("is-invalid");
        }
 });

function email_validation(email){
  var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
   return emailPattern.test(email); 
}
function phone_no_validation(phone_no){
  if(phone_no.length != 10){
                return 0
                }else{
                  return 1;
                }
}

function validation(){
  
       var error_count=0;
       $(".required_for_valid").each(function(){
        $(this).removeClass("is-invalid");
           if($(this).val() !=""){
            $(this).removeClass("is-invalid");
            $(this).addClass("is-valid");
            if($(this).attr('input-type') == "phone_no"){
               var phone_no=$(this).val();
                if(phone_no_validation(phone_no) == 0){
                  error_count++;
                $(this).removeClass("is-valid");
                 $(this).addClass("is-invalid");
                }
                 }

                 if($(this).attr('input-type') == "email"){
               var email=$(this).val();
               if(!email_validation(email)){
                error_count++;
                $(this).removeClass("is-valid");
                 $(this).addClass("is-invalid");
               }
               
                 }


        }else{
           error_count++;
           $(this).removeClass("is-valid");
            $(this).addClass("is-invalid");
        }
       });
       return error_count;
   }


   $(document).on("click",".submit",function(){
    var error_count=validation();
    var address_error_count=address_details_validation();
    var common_error_count=parseInt(error_count)+parseInt(address_error_count);
    if(common_error_count == 0){
      if($(".required_for_address_valid").length >0){
      
    }else{
      common_error_count++;
      alert("Please Add Atleast One Address ");
     
    }
    if(common_error_count == 0){

      $("form").submit();
    }

    }

   });


  $(document).on("click",".add_address",function(){
    add_address();
    });
   

  function address_details_validation(){
    var error_count=0;
      $(".required_for_address_valid").each(function(){
        $(this).removeClass("is-invalid");
           if($(this).val() !=""){
             
            $(this).removeClass("is-invalid");
            $(this).addClass("is-valid");
        }else{
           error_count++;
           $(this).removeClass("is-valid");
            $(this).addClass("is-invalid");
        }
       });
       return error_count;
  }


function address_lable_count(){
  $(".address_label").each(function(key,index){
$(this).html("Address Details - " + (key+1));
});
}


  $(document).on("click",".remove_new_address",function(){
   var $tr=$(this).closest(".address_div");
   $(this).closest(".address_div").remove();
   address_lable_count();

  });
  function add_address(id="",text=""){
    var address_details_validation_count=address_details_validation();
    if(address_details_validation_count == 0){

    
  var address='';
    address+='<div class="form-row address_div">\
     <div class="col-md-7">\
                    <div class="form-group row">\
                    <div class="col-md-7">\
                    <h3 class="address_label"></h3>\
                    </div>\
                    <div class="col-md-4">\
                    <h3 class="address_delete_label"><label class="btn btn-danger remove_new_address"> Delete </label></h3>\
                        </div>\
                    </div>\
                    </div>\
              <div class="col-md-6">\
            <div class="form-group row">\
              <label for="validationCustom01" class="col-sm-4 col-form-label">Address Type <span class="mandatory">*</span></label>\
              <div class="col-sm-8">\
                <select class="js-example-basic-multiple col-12 form-control custom-select address_type_id required_for_valid required_for_address_valid" error-data="Enter valid Address Type" name="address_type_id[]">\
                  <option value="">Choose Address Type</option>\
                  @foreach($address_type as $value)\
                  <option value="{{ $value->id }}" >{{ $value->name }}</option>\
                  @endforeach\
                </select>\
               <div class="invalid-feedback">\
                  Enter valid Address Type\
                </div>\
              </div>\
            </div>\
          </div>\
    <div class="col-md-6">\
            <div class="form-group row">\
              <label for="validationCustom01" class="col-sm-4 col-form-label">Address Line 1 <span class="mandatory">*</span></label>\
              <div class="col-sm-8">\
                <input type="text" class="form-control address_line_1 required_for_valid required_for_address_valid" error-data="Enter valid Address" placeholder="Address Line 1" name="address_line_1[]" value="" >\
               <div class="invalid-feedback">\
                Enter valid Address\
                </div>\
              </div>\
            </div>\
          </div>\
<div class="col-md-6">\
            <div class="form-group row">\
              <label for="validationCustom01" class="col-sm-4 col-form-label">Address Line 2 </label>\
              <div class="col-sm-8">\
                <input type="text" class="form-control address_line_2" placeholder="Address Line 2" name="address_line_2[]" value="">\
                <div class="invalid-feedback">\
                Enter valid Address\
                </div>\
              </div>\
            </div>\
          </div>\
  <div class="col-md-6">\
            <div class="form-group row">\
              <label for="land_mark" class="col-sm-4 col-form-label">Land Mark </label>\
              <div class="col-sm-8">\
                <input type="text" class="form-control land_mark" placeholder="Land Mark" name="land_mark[]" value="">\
               <div class="invalid-feedback">\
                Enter valid Land Mark\
                </div>\
              </div>\
            </div>\
          </div>\
<div class="col-md-6">\
            <div class="form-group row">\
              <label for="validationCustom01" class="col-sm-4 col-form-label">State <span class="mandatory">*</span></label>\
              <div class="col-sm-8">\
                <select class="js-example-basic-multiple col-12 form-control custom-select state_id required_for_valid required_for_address_valid" error-data="Enter valid State" name="state_id[]" >\
                  <option value="">Choose State</option>\
                  @foreach($state as $value)\
                  <option value="{{ $value->id }}" >{{ $value->name }}</option>\
                  @endforeach\
                </select>\
              <div class="invalid-feedback">\
                  Enter valid State \
                </div>\
              </div>\
            </div>\
          </div>\
<div class="col-md-6">\
            <div class="form-group row">\
              <label for="validationCustom01" class="col-sm-4 col-form-label">District </label>\
              <div class="col-sm-8">\
                <select class="js-example-basic-multiple col-12 form-control custom-select district_id" name="district_id[]">\
                  <option value="">Choose District</option>\
                 </select>\
                 <div class="invalid-feedback">\
                  Enter valid District\
                </div>\
              </div>\
            </div>\
          </div>\
           <div class="col-md-6">\
            <div class="form-group row">\
              <label for="validationCustom01" class="col-sm-4 col-form-label">City </label>\
              <div class="col-sm-8">\
                <select class="js-example-basic-multiple col-12 form-control custom-select city_id" name="city_id[]" >\
                  <option value="">Choose City</option>\
                </select>\
               <div class="invalid-feedback">\
                  Enter valid City\
                </div>\
              </div>\
            </div>\
          </div>\
 <div class="col-md-6">\
            <div class="form-group row">\
              <label for="land_mark" class="col-sm-4 col-form-label">Postal Code <span class="mandatory">*</span></label>\
              <div class="col-sm-8">\
                <input type="text" class="form-control postal_code required_for_valid required_for_address_valid only_allow_digit" error-data="Enter valid Postal Code" placeholder="Postal Code" name="postal_code[]" value="" >\
              <div class="invalid-feedback">\
                  Enter valid Postal Code\
                </div>\
              </div>\
            </div>\
          </div>\
          </div><hr>';


          $(".common_address_div").append(address);
          address_lable_count();
          $("select").select2();
    }
 }


function state_based_district(){
  
  

$(".state_id").each(function(key,index){
  
    var $tr=$(this).closest(".address_div");
    $tr.find(".city_id").html("<option value=''>Choose City</option>");
   var state_id=$tr.find(".old_state_id").val();
  var district_id=$tr.find(".old_district_id").val();
 $.ajax({
              type: "post",
              url: "{{ url('common/get-state-based-district')}}",
              data: {state_id: state_id,district_id:district_id},
              success: function (res)
              {
                 result = JSON.parse(res);
               $tr.find(".district_id").html(result.option);
               }
          });
});

}


function district_based_city(){
$(".district_id").each(function(key,index){
    var $tr=$(this).closest(".address_div");
    var district_id=$tr.find(".old_district_id").val();
  var city_id=$tr.find(".old_city_id").val();
  $.ajax({
              type: "post",
              url: "{{ url('common/get-district-based-city')}}",
              data: {district_id: district_id,city_id:city_id},
              success: function (res)
              {
                result = JSON.parse(res);
                $tr.find(".city_id").html(result.option);
              }
          });
});

}


$(document).ready(function(){
  state_based_district();
  district_based_city();
});




  $(document).on("change",".state_id",function(){
   var $tr=$(this).closest(".address_div");
   var state_id=$(this).val();
   $tr.find(".city_id").html("<option value=''>Choose City</option>");
    $.ajax({
              type: "post",
              url: "{{ url('common/get-state-based-district')}}",
              data: {state_id: state_id},
              success: function (res)
              {
                result = JSON.parse(res);
              //  alert($tr.find(".state_id").attr("class"));
                $tr.find(".district_id").html(result.option);
                
              }
          });
});



  $(document).on("change",".district_id",function(){
     var $tr=$(this).closest(".address_div");
    var district_id=$(this).val();
    $.ajax({
              type: "post",
              url: "{{ url('common/get-district-based-city')}}",
              data: {district_id: district_id},
              success: function (res)
              {
                result = JSON.parse(res);
                $tr.find(".city_id").html(result.option);
              }
          });
});

</script>
@endsection

