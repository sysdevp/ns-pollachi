@extends('admin.layout.app')
@section('content')
<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Add Uom Factor Convertion For Item</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{url('master/item')}}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="{{url('master/item/store-uom-factor-convertion-for-item')}}" enctype="multipart/form-data">
      {{csrf_field()}}

        <div class="form-row">

        <div class="col-md-4">
        <div class="form-group row">
        <label  class="col-sm-5 col-form-label">{{ $category_1}} </label>
        <label  class="col-sm-7 col-form-label">: {{ isset($item->category_one->name) ? $item->category_one->name : ""}} </label>
        </div>
        </div>

        <div class="col-md-4">
            <div class="form-group row">
            <label  class="col-sm-5 col-form-label">{{ $category_2}} </label>
            <label  class="col-sm-7 col-form-label">: {{ isset($item->category_two->name) ? $item->category_two->name : ""}} </label>
            </div>
            </div>

            <div class="col-md-4">
                <div class="form-group row">
                <label  class="col-sm-5 col-form-label">{{ $category_3}} </label>
                <label  class="col-sm-7 col-form-label">: {{ isset($item->category_three->name) ? $item->category_three->name : ""}} </label>
                </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group row">
                    <label  class="col-sm-5 col-form-label">Item Code </label>
                    <label  class="col-sm-7 col-form-label">:{{ isset($item->code) ? $item->code : ""}} </label>
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="form-group row">
                    <label  class="col-sm-5 col-form-label">Item Name </label>
                    <label  class="col-sm-7 col-form-label">: {{ isset($item->name) ? $item->name : ""}}  </label>
                    </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group row">
                        <label  class="col-sm-5 col-form-label"> Default Uom Name </label>
                        <label  class="col-sm-7 col-form-label">: {{ isset($item->uom->name) ? $item->uom->name : ""}}  </label>
                        </div>
                        </div>

                      <input type="hidden" name="category_1" class="category_1" value="{{ $item->category_1}}">
                      <input type="hidden" name="category_2" class="category_2" value="{{ $item->category_2}}">
                      <input type="hidden" name="category_3" class="category_3" value="{{ $item->category_3}}">
                      <input type="hidden" name="item_id" class="item_id" value="{{ $item->id }}">
                      <input type="hidden" name="default_uom_id" class="default_uom_id" value="{{ $item->uom_id}}">
</div>

<div class="form-row">
    <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col" style="width:10%">S.no</th>
            <th scope="col" style="width:30%">Uom</th>
            <th scope="col" style="width:30%">Convertion Factor</th>
            <th scope="col" style="width:10%">Action</th>
          </tr>
        </thead>
        <tbody class="append_row">

          @if(count($uom_factor_convertion_for_item)>0)
          @foreach ($uom_factor_convertion_for_item as $uom_factor_key=>$uom_factor_value)
          <tr>
            <th scope="row" class="s_no">1</th>
            <td>
            <input type="hidden" class="" name="uom_factor_convertion_id[]" value="{{ $uom_factor_value->id }}">
                <div class="col-sm-10">
                    <select class="js-example-basic-multiple col-12 form-control custom-select old_uom_id" name="old_uom_id[]" required>
                      <option value=""> Choose Uom</option>
                      @foreach ($uom as $value)
                    <option value="{{$value->id}}" {{ old('old_uom_id.'.$uom_factor_key,$uom_factor_value->uom_id) == $value->id ? 'selected' : '' }}>{{$value->name}}</option>
                      @endforeach
                    </select>
                 <span class="mandatory"> {{ $errors->first('old_uom_id.'.$uom_factor_key)  }} </span>
                  <div class="invalid-feedback">
                    Enter valid Uom
                  </div>
                </div>
              </td>
            <td>
              <div class="col-sm-10">
                <input type="text" class="form-control convertion_factor only_allow_alp_num_dot_com_amp" placeholder="Convertion Factor" name="old_convertion_factor[]" value="{{old('old_convertion_factor.'.$uom_factor_key,$uom_factor_value->convertion_factor)}}" required>
                <span class="mandatory"> {{ $errors->first('old_convertion_factor.'.$uom_factor_key)  }} </span>
                <div class="invalid-feedback">
                  Enter valid Convertion Factor
                </div>
              </div>
            </td>
              <td>
                  <div class="form-group row">
                      <div class="col-sm-3">
                      <label class="btn btn-success add_more">+</label>
                      </div>
                      <div class="col-sm-3 mx-2">
                      <label class="btn btn-danger remove_existing_row" attr-id="{{ $uom_factor_value->id}}">-</label>
                        </div>
                    </div>
              </td>
          </tr>
          @endforeach
          @elseif(count($uom_factor_convertion_for_item)== 0 && empty(old('uom_id')))

          <tr>
              <th scope="row" class="s_no">1</th>
              <td>
                  <div class="col-sm-10">
                      <select class="js-example-basic-multiple col-12 form-control custom-select item_id" name="item_id[]" required>
                        <option value=""> Choose Item </option>
                        @foreach ($item_dets as $value)
                      <option value="{{$value->id}}">{{$value->name}}</option>
                            
                        @endforeach
                      </select>
                   <span class="mandatory"> {{ $errors->first('item_id.0')  }} </span>
                    <div class="invalid-feedback">
                      Enter valid Item
                    </div>
                  </div>
                </td>
              <td>
                <div class="col-sm-10">
                  <input type="text" class="form-control convertion_factor only_allow_alp_num_dot_com_amp" placeholder="Convertion Factor" name="convertion_factor[]" value="{{old('convertion_factor.0')}}" required>
                  <span class="mandatory"> {{ $errors->first('convertion_factor.0')  }} </span>
                  <div class="invalid-feedback">
                    Enter valid Convertion Factor
                  </div>
                </div>
              </td>
                <td>
                    <div class="form-group row">
                        <div class="col-sm-3">
                        <label class="btn btn-success add_more">+</label>
                        </div>
                        <div class="col-sm-3 mx-2">
                        <label class="btn btn-danger remove_row">-</label>
                          </div>
                      </div>
                </td>
            </tr>

          @endif

          @if(!empty(old('uom_id')))
          @foreach (old('uom_id') as $old_value_key=>$old_value)

          <tr>
              <th scope="row" class="s_no">1</th>
              <td>
                  <div class="col-sm-10">
                      <select class="js-example-basic-multiple col-12 form-control custom-select uom_id" name="uom_id[]" required>
                        <option value=""> Choose Uom </option>
                        @foreach ($uom as $value)
                      <option value="{{$value->id}}"  {{ old('uom_id.'.$old_value_key) == $value->id ? 'selected' : '' }}  >{{$value->name}}</option>
                            
                        @endforeach
                      </select>
                   <span class="mandatory"> {{ $errors->first('uom_id.'.$old_value_key)  }} </span>
                    <div class="invalid-feedback">
                      Enter valid Uom
                    </div>
                  </div>
                </td>
              <td>
                <div class="col-sm-10">
                  <input type="text" class="form-control convertion_factor only_allow_alp_num_dot_com_amp" placeholder="Convertion Factor" name="convertion_factor[]" value="{{old('convertion_factor.'.$old_value_key)}}" required>
                  <span class="mandatory"> {{ $errors->first('convertion_factor.'.$old_value_key)  }} </span>
                  <div class="invalid-feedback">
                    Enter valid Convertion Factor
                  </div>
                </div>
              </td>
                <td>
                    <div class="form-group row">
                        <div class="col-sm-3">
                        <label class="btn btn-success add_more">+</label>
                        </div>
                        <div class="col-sm-3 mx-2">
                        <label class="btn btn-danger remove_row">-</label>
                          </div>
                      </div>
                </td>
            </tr>
              
          @endforeach
          @endif


         
          
         
        </tbody>
      </table>
</div>


        <div class="col-md-7 text-right">
          <button class="btn btn-success" name="add_uom_factor" type="submit">Submit</button>
        </div>
      </form>
    </div>
    <!-- card body end@ -->
  </div>
</div>


<script>

  function add_new_row()
  {
    var append=' <tr>\
            <th scope="row" class="s_no">1</th>\
            <td>\
                <div class="col-sm-10">\
                    <select class="js-example-basic-multiple col-12 form-control custom-select uom_id" name="uom_id[]" required>\
                      <option value=""> Choose Uom </option>\
                      @foreach ($uom as $value)\
                    <option value="{{$value->id}}">{{$value->name}}</option>\
                       @endforeach\
                    </select>\
                 <div class="invalid-feedback">\
                    Enter valid Uom\
                  </div>\
                </div>\
              </td>\
            <td>\
              <div class="col-sm-10">\
                <input type="text" class="form-control convertion_factor only_allow_alp_num_dot_com_amp" placeholder="Convertion Factor" name="convertion_factor[]" value="" required>\
                <div class="invalid-feedback">\
                  Enter valid Convertion Factor\
                </div>\
              </div>\
            </td>\
              <td>\
                  <div class="form-group row">\
                      <div class="col-sm-3">\
                      <label class="btn btn-success add_more">+</label>\
                      </div>\
                      <div class="col-sm-3 mx-2">\
                      <label class="btn btn-danger remove_row">-</label>\
                        </div>\
                    </div>\
              </td>\
          </tr>';

          $(".append_row").append(append);
    
  }

  function set_serial_no()
  {
    $(".s_no").each(function(key,index){
      $(this).html(key+1);
    });

  }

$(document).on("click",".add_more",function(){
  add_new_row();
  set_serial_no();
  $("select").select2();
});

$(document).ready(function(){
  set_serial_no();
});

$(document).on("click",".remove_row",function(){
  if($(".remove_row").length > 1 || $(".remove_existing_row").length > 0)
  {
    $(this).closest("tr").remove();
    set_serial_no();
  }else
  {
    alert("Atleast One Row Present");
  }

});


$(document).on("click",".remove_existing_row",function(){
   var $tr=$(this).closest("tr");

  var uom_factor_convertion_id=$(this).attr("attr-id");
  if(confirm('Are You Sure Want to Delete this ?')){
 $.ajax({
                      type: "post",
                      url: "{{ url('master/item/delete-uom-factor-convertion-for-item')}}",
                      data: {uom_factor_convertion_id: uom_factor_convertion_id},
                      success: function (res)
                      {
                       if(res == 1){
                         $tr.remove();
                          alert("Deleted Successfully ");

                       }else{
alert("Something Went Worng");
                       }
                      }
                  });
                  set_serial_no();


  }

  

 });


</script>


@endsection

