@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Edit Language </h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{url('master/language')}}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="{{url('master/language/update/'.$language->id)}}" enctype="multipart/form-data">
      {{csrf_field()}}

        <div class="form-row">
            <div class="col-md-7">
                <div class="form-group row">
                  <label for="validationCustom01" class="col-sm-4 col-form-label">Language 1<span class="mandatory">*</span></label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control language_1 only_allow_alp_num_dot_com_amp" placeholder="Language 1" name="language_1" value="{{old('language_1',$language->language_1)}}" required>
                    <span class="mandatory"> {{ $errors->first('language_1')  }} </span>
                    <div class="invalid-feedback">
                      Enter valid Language 1
                    </div>
                  </div>
                </div>
              </div>
    
              <div class="col-md-7">
                <div class="form-group row">
                  <label for="validationCustom01" class="col-sm-4 col-form-label">Language 2<span class="mandatory">*</span></label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control language_2 only_allow_alp_num_dot_com_amp" placeholder="Language 2" name="language_2" value="{{old('language_2',$language->language_2)}}" required>
                    <span class="mandatory"> {{ $errors->first('language_2')  }} </span>
                    <div class="invalid-feedback">
                      Enter valid Language 2
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-7">
                <div class="form-group row">
                  <label for="validationCustom01" class="col-sm-4 col-form-label">Language 3<span class="mandatory">*</span></label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control language_3 only_allow_alp_num_dot_com_amp" placeholder="Language 3" name="language_3" value="{{old('language_3',$language->language_3)}}" required>
                    <span class="mandatory"> {{ $errors->first('language_3')  }} </span>
                    <div class="invalid-feedback">
                      Enter valid Language 3
                    </div>
                  </div>
                </div>
              </div>
          
         
        </div>
        <div class="col-md-7 text-right">
          <button class="btn btn-success" type="submit">Submit</button>
        </div>
      </form>
    </div>
    <script src="{{asset('assets/js/master/capitalize.js')}}"></script>
    <script>

      $(document).on("click",".submit",function(){
   
    address_details_validation();
  });

  $(document).on('input','.language_1',function(){

    $(this).val($(this).val().replace(/[^a-zA-Z ]/gi, ''));

  });

  $(document).on('input','.language_2',function(){

    $(this).val($(this).val().replace(/[^a-zA-Z ]/gi, ''));

  });

  $(document).on('input','.language_3',function(){

    $(this).val($(this).val().replace(/[^a-zA-Z ]/gi, ''));

  });
 
  function address_details_validation(){
    var error_count=0;
      $(".language").each(function(){
        $(this).removeClass("is-invalid");
           if($(this).val() !=""){
             var name=$(this).attr('name');
             var value=$(this).val();


            $(this).removeClass("is-invalid");
            $(this).addClass("is-valid");


$(".language").each(function(){
  if($(this).attr('name') != name){

    if($(this).val() != value)
    {
     
      $(this).removeClass("is-invalid");
      $(this).addClass("is-valid");

    }else{
      $(this).closest("div").find(".mandatory").html("This Value is already Exist In current Input ");
      $(this).removeClass("is-valid");
      $(this).addClass("is-invalid");
    }
  }

});







            if($(this).attr('input-type') == "phone_no"){
               var phone_no=$(this).val();
                if(phone_no_validation(phone_no) == 0){
                  error_count++;
                $(this).removeClass("is-valid");
                 $(this).addClass("is-invalid");
                 $(this).closest("div").find(".mandatory").html("this field is required");
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

 


  </script>
    <!-- card body end@ -->
  </div>
</div>
@endsection