
  $(document).on("blur change",".required_for_valid",function()
  {
    $(this).removeClass("is-invalid");
    $(this).removeClass("is-valid");
          if($(this).val() !="")
          {
          $(this).removeClass("is-invalid");
          $(this).addClass("is-valid");
          if($(this).attr('input-type') == "phone_no")
            {
              var phone_no=$(this).val();
              if(phone_no_validation(phone_no) == 0)
              {
                $(this).removeClass("is-valid");
                $(this).addClass("is-invalid");
              }
            }

            if($(this).attr('input-type') == "email")
            {
              var email=$(this).val();
              if(!email_validation(email))
              {
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
    if(phone_no.length != 10)
    {
       return 0
    }else
    {
      return 1;
    }
  }


  function address_details_validation(){
    var error_count=0;
      $(".required_for_address_valid").each(function(){
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