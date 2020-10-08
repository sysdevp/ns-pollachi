
function state_based_district_for_edit(){
    $(".old_state_id").each(function(key,index){
        var $tr=$(this).closest(".address_div");
        $tr.find(".city_id").html("<option value=''>Choose City</option>");
       var state_id=$tr.find(".exist_old_state_id").val();
      var district_id=$tr.find(".exist_old_district_id").val();
     $.ajax({
                  type: "post",
                  url: "{{ url('common/get-state-based-district')}}",
                  data: {state_id: state_id,district_id:district_id},
                  success: function (res)
                  {
                     result = JSON.parse(res);
                   $tr.find(".old_district_id").html(result.option);
                   }
              });
    });
    
    }

    function district_based_city_for_edit(){
        $(".old_district_id").each(function(key,index){
            var $tr=$(this).closest(".address_div");
            var district_id=$tr.find(".exist_old_district_id").val();
          var city_id=$tr.find(".exist_old_city_id").val();
          $.ajax({
                      type: "post",
                      url: "{{ url('common/get-district-based-city')}}",
                      data: {district_id: district_id,city_id:city_id},
                      success: function (res)
                      {
                        result = JSON.parse(res);
                        $tr.find(".old_city_id").html(result.option);
                      }
                  });
        });
        
        }