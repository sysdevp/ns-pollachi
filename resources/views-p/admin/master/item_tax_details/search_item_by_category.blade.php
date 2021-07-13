
@if (count($item_dets) >0)
    @foreach ($item_dets as $value)
        <tr>
            <td class="s_no"></td> 
            <td>
                <p> {{ $value->name }} </p>
                <input type="hidden" class="form-control item_id" name="item_id[]" value="{{ $value->id}}">
                <input type="hidden" class="form-control item_name" name="item_name[]" value="{{ $value->name}}">
            </td>
            @foreach($taxes as $key => $value)
            <td>
                <div class="col-sm-12">
                <input type="text" class="form-control {{ $value->name }}_id only_allow_digit_and_dot commons" name="{{$value->name}}_id[]" placeholder="{{ $value->name }}" value="" required>
                <input type="hidden" name="{{$value->name}}[]" id="{{$value->name}}" value="{{$value->id}}">
                  <div class="invalid-feedback">
                    Enter valid IGST
                  </div>
                </div>
              </td>
              @endforeach
              <td>
                      <div class="col-sm-12">
                       <input type="date" class="form-control valid_from" name="valid_from[]" placeholder="dd-mm-yyyy" value="" required>
                        <div class="invalid-feedback">
                          Enter valid Effective From Date
                        </div>
                      </div>
                    </td>
            <!-- <td>
                <div class="col-sm-12">
                <input type="text" class="form-control cgst only_allow_digit_and_dot" name="cgst[]" placeholder="CGST" value="" required>
                  <div class="invalid-feedback">
                    Enter valid CGST
                  </div>
                </div>
              </td>

          <td>
                    <div class="col-sm-12">
                    <input type="text" class="form-control sgst only_allow_digit_and_dot" name="sgst[]" placeholder="SGST" value="" required>
                      <div class="invalid-feedback">
                        Enter valid SGST
                      </div>
                    </div>
                  </td>

                  <td>
                      <div class="col-sm-12">
                       <input type="text" class="form-control valid_from" name="valid_from[]" placeholder="dd-mm-yyyy" value="" required>
                        <div class="invalid-feedback">
                          Enter valid Effective From Date
                        </div>
                      </div>
                    </td> -->
           <!--   <td>
                  <div class="form-group row">
                      <div class="col-sm-3">
                      <label class="btn btn-success add_more">+</label>
                      </div>
                      <div class="col-sm-3 mx-2">
                      <label class="btn btn-danger remove_row">-</label>
                        </div>
                    </div>
              </td> -->

        </tr>
    @endforeach
@else
<tr>
    <td colspan="7" style="text-align:center;font-weight:bold">No Data Found</td>
    
  </tr>
  
@endif







