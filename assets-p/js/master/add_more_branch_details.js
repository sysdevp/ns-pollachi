


/* Add More Fileds For Bank Details Start Here */
function add_bank_details(){
 var bank_details='<tr>\
      <td><span class="bank_s_no"> 1 </span></td>\
      <td>\
                          <div class="form-group row">\
                              <div class="col-sm-8">\
                                <select class="js-example-basic-multiple col-12 form-control custom-select bank_id required_for_valid" error-data="Enter valid Bank" name="bank_id[]" >\
                                  <option value="">Choose Bank</option>\
                                  '+ $(".bank_id_div").html() +'</select>\
                                <div class="invalid-feedback">\
                                  Enter valid Bank Name \
                                </div>\
                              </div>\
                              <a href="'+ APP_URL +'/master/bank/create" target="_blank">\
                              <button type="button"  class="px-1 btn btn-success ml-3 " title="Add Bank"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a>\
                             <button type="button"  class="px-1 btn btn-success mx-1 refresh_bank_id" title="Refresh"><i class="fa fa-refresh" aria-hidden="true"></i></button>\
                            </div>\
                         </td>\
                         <td>\
                          <div class="form-group row">\
                              <div class="col-sm-8">\
                                <select class="js-example-basic-multiple col-12 form-control custom-select branch_id required_for_valid" error-data="Enter valid Branch Name" name="branch_id[]" >\
                                  <option value="">Choose Branch Name</option>\
                                 </select>\
                              <div class="invalid-feedback">\
                                  Enter valid Branch Name \
                                </div>\
                              </div>\
                           <a href="'+ APP_URL +'/master/bank/create" target="_blank">\
                              <button type="button"  class="px-1 btn btn-success ml-3 " title="Add Bank Branch"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a>\
                             <button type="button"  class="px-1 btn btn-success mx-1 refresh_branch_id" title="Refresh"><i class="fa fa-refresh" aria-hidden="true"></i></button>\
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
                              <div class="col-sm-8">\
                                <select class="js-example-basic-multiple col-12 form-control custom-select account_type_id " error-data="Enter valid Account Type" name="account_type_id[]" >\
                                  <option value="">Choose Account Type</option>\
                                  '+ $(".account_type_id_div").html() +'</select>\
                              <div class="invalid-feedback">\
                                  Enter valid Account Type \
                                </div>\
                              </div>\
                               <a href="'+ APP_URL +'/master/accounts-type/create" target="_blank">\
                              <button type="button"  class="px-1 btn btn-success ml-3 " title="Add Accounts Type"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a>\
                             <button type="button"  class="px-1 btn btn-success mx-1 refresh_accounts_type_id" title="Refresh"><i class="fa fa-refresh" aria-hidden="true"></i></button>\
                            </div>\
                         </td>\
                         <td>\
                          <div class="form-group row">\
                            <div class="mm">\
                            <input type="text" class="form-control account_holder_name required_for_proof_valid" error-data="Enter valid Account Holder Name" placeholder="Account Holder Name" name="account_holder_name[]" value="" >\
                             <div class="invalid-feedback">\
                                Enter valid Account Holder Name\
                              </div>\
                            </div>\
                          </div>\
                        </td>\
                        <td>\
                          <div class="form-group row">\
                            <div class="mm">\
                            <input type="text" class="form-control account_no required_for_proof_valid" error-data="Enter valid Account No"  placeholder="Account No" name="account_no[]" value="" >\
                               <div class="invalid-feedback">\
                                Enter valid Account No\
                              </div>\
                            </div>\
                          </div>\
                        </td>\
                        <td>\
                                  <div class="form-group row">\
                                      <div class="col-sm-3 mr-1">\
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

 
  function bank_details_sno(){
    $(".bank_s_no").each(function(key,index){
        $(this).html((key+1));
      });
  }

  $(document).on("click",".add_bank_details",function(){
    var append=add_bank_details();
    bank_details_sno();
});

$(document).on("click",".remove_bank_details",function(){
  if($(".remove_bank_details").length > 1){
    $(this).closest("tr").remove();
    bank_details_sno();
  }else{
    alert("Atleast One row present");
  }
});
/* Add More Fileds For Bank Details End Here */

$(document).on("click",".refresh_branch_id",function(){
  var bank_id=$(this).closest("tr").find(".bank_id").val();
  if(bank_id !="")
  {
    var bank_branch_dets=refresh_bank_branch_master_details(bank_id);
    $(this).closest("tr").find(".branch_id").html(bank_branch_dets);
    $(this).closest("tr").find(".ifsc").val("");
  }
  
});

$(document).on("click",".refresh_bank_id",function(){
  var bank_dets=refresh_bank_master_details();
  $(this).closest("tr").find(".bank_id").html(bank_dets);
  $(this).closest("tr").find(".branch_id").html("<option value=''>Choose Branch</option>");
  $(this).closest("tr").find(".ifsc").val("");
  
});

$(document).on("click",".refresh_accounts_type_id",function(){
  var accounts_type_dets=refresh_accounts_type_master_details();
  $(this).closest("tr").find(".account_type_id").html(accounts_type_dets);
  
});





