@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card container-fluid px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Add Role</h3>
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
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="{{url('master/role/store')}}" enctype="multipart/form-data">
      {{csrf_field()}}

        <div class="form-row">
            <span class="mandatory"> {{ $errors->first('permission.*')  }} </span>
          <div class="col-md-12">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-2 col-form-label">Role Name <span class="mandatory">*</span></label>
              <div class="col-sm-8">
              <input type="text" class="form-control name only_allow_alp_num_dot_com_amp caps" placeholder="Role Name" name="name" value="{{old('name')}}" required>
                <span class="mandatory"> {{ $errors->first('name')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Role Name
                </div>
              </div>
            </div>
          </div>

         

          <div class="col-12 col-sm-12 col-md-12">
              <div class="form-group row">
                  <p class="col-md-2">Permission:</p>
                  <label class="col-md-offset-0 col-sm-4 "> 
                      <input type="checkbox" name="all_permission" class="permission"  value="all_permission">  
                     ALL
                </label>
                  <br/>
                  <div class="col-md-12 r_pmission">
                      <div class="row mx-0">
                          <?php $class=""; ?>
                  @foreach($permission as $value)
                 
                  @if($class != $value->class)
                  <label class="w-20"> 
                      <input type="checkbox" name="permission[]" class="all_{{ $value->class }}_master all_classname permission"  value="{{$value->class}}">  
                     ALL
                </label>
              @endif 
            
                
               <label class="w-20"> 
                      <input type="checkbox" name="permission[]" class="{{ $value->class }} permission"  value="{{$value->id}}">  
                      {{ $value->label }}
              </label>
              <?php  $class=$value->class; ?>
             
                  @endforeach
                </div>
              </div>
              </div>
          </div>


         
          
        </div>
        <div class="col-md-7 text-right">
          <button class="btn btn-success submit" name="add" type="button">Submit</button>
        </div>
      </form>
    </div>
     <script src="{{asset('assets/js/master/capitalize.js')}}"></script>
    <!-- card body end@ -->
  </div>
</div>

<script>


$(".permission").click(function (e) {
        var id = $(this).val();
        if (id == "all_permission")
        {
            if ($(this).prop('checked') != true) {
                $('.permission').prop('checked', false);
            } else
            {
                $('.permission').prop('checked', true);
            }
        } else
        {
            var id_new = "all_" + $(this).val() + "_master";
            var id_newest = $(this).val();
            if ($(this).hasClass(id_new) == true)
            {
                if ($(this).prop('checked') != true) {
                    $("." + id_newest).prop('checked', false);
                } else
                {
                    $("." + id_newest).prop('checked', true);
                }
            } else
            {
                var classname = "." + $(this).attr("class").split(' ')[0];
                var all_classname = ".all_" + $(this).attr("class").split(' ')[0]+"_master";
                var counter = 0;
                $(classname).each(function () {
                    if ($(this).prop('checked') != true && $(all_classname).attr("class") != $(this).attr("class")) {
                        counter++;
                    }
                });
                if (counter > 0)
                {
                    $(all_classname).prop('checked', false);
                } else
                {
                    $(all_classname).prop('checked', true);
                }
            }
        }
    });

function checked_count()
{
  var checked_count=0;
  $(".permission").each(function(){
    if($(this). prop("checked") == true)
    {
      checked_count++;

    }
  });

  return checked_count;

}

$(document).on("click",".submit",function(){
  var checked_count_value=checked_count();
  var error_count=0;
  if($(".name").val() !="")
  {
    $(".name").removeClass("is-invalid");
     $(".name").addClass("is-valid");
  }else{
    error_count++;  
    $(".name").removeClass("is-valid");
     $(".name").addClass("is-invalid");
  }

  if(checked_count_value == 0){
    error_count++; 
    alert("Please Choose Atleast One Permission");
  }

  if(error_count == 0){
$("form").submit();
  }
});
</script>
@endsection

