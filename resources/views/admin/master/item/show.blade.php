@extends('admin.layout.app')
@section('content')
<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>View Item</h3>
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
      <div class="form-row">
        <div class="col-md-6">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Item Name :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label"> {{ $item->name }}</label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Item Code :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label">{{ $item->code }} </label>
          </div>
        </div>

        

        @php
        $barnd_name="";
        if($item->brand_id > 0 && isset($item->brand->name))
        {
          $barnd_name=$item->brand->name;
        }
        else if($item->brand_id == 0)
        {
          $barnd_name="Not Applicable";
        }
      @endphp

        <div class="col-md-6">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Brand Name :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label">{{ $barnd_name }} </label>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Catgeory :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label">{{ isset($item->category->name) ? $item->category->name : "" }} </label>
          </div>
        </div>

              <div class="col-md-6">
                  <div class="form-group row">
                    <label for="validationCustom01" class="col-sm-4 col-form-label">Item Type :</label>
                    <label for="validationCustom01" class="col-sm-4 col-form-label">{{$item->item_type }} </label>
                  </div>
                </div>




          <div class="col-md-6">
              <div class="form-group row">
                <label for="validationCustom01" class="col-sm-4 col-form-label">Print Name in English:</label>
                <label for="validationCustom01" class="col-sm-4 col-form-label">{{ $item->print_name_in_english }} </label>
              </div>
            </div>

            <div class="col-md-6">
                <div class="form-group row">
                  <label for="validationCustom01" class="col-sm-4 col-form-label">Print Name in {{ $language_1}}:</label>
                  <label for="validationCustom01" class="col-sm-4 col-form-label">{{ $item->print_name_in_language_1 }} </label>
                </div>
              </div>

              <div class="col-md-6">
                  <div class="form-group row">
                    <label for="validationCustom01" class="col-sm-4 col-form-label">Print Name in {{ $language_2}}:</label>
                    <label for="validationCustom01" class="col-sm-4 col-form-label">{{ $item->print_name_in_language_2 }} </label>
                  </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group row">
                      <label for="validationCustom01" class="col-sm-4 col-form-label">Print Name in {{ $language_3}}:</label>
                      <label for="validationCustom01" class="col-sm-4 col-form-label">{{ $item->print_name_in_language_3 }} </label>
                    </div>
                  </div>


            <!-- <div class="col-md-6">
                <div class="form-group row">
                  <label for="validationCustom01" class="col-sm-4 col-form-label">PTC Code :</label>
                  <label for="validationCustom01" class="col-sm-4 col-form-label">{{ $item->ptc }} </label>
                </div>
              </div> -->
              <div class="col-md-6">
                  <div class="form-group row">
                    <label for="validationCustom01" class="col-sm-4 col-form-label">Barcode :</label>
                    <label for="validationCustom01" class="col-sm-4 col-form-label">{{ $item->barcode }} </label>
                  </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                      <label for="validationCustom01" class="col-sm-4 col-form-label">MRP :</label>
                      <label for="validationCustom01" class="col-sm-4 col-form-label">{{ $item->mrp }} </label>
                    </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group row">
                        <label for="validationCustom01" class="col-sm-4 col-form-label">Default Selling Price :</label>
                        <label for="validationCustom01" class="col-sm-4 col-form-label">{{ $item->default_selling_price }} </label>
                      </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                          <label for="validationCustom01" class="col-sm-4 col-form-label">UOM :</label>
                          <label for="validationCustom01" class="col-sm-4 col-form-label">{{ $item->uom->name }} </label>
                        </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group row">
                            <label for="validationCustom01" class="col-sm-4 col-form-label">Is Expiry Date Applicable  :</label>
                            <label for="validationCustom01" class="col-sm-4 col-form-label">{{ $item->is_expiry_date == 1 ? "Yes" :"No" }} </label>
                          </div>
                        </div>
                      @if( $item->is_expiry_date == 1)
                        <div class="col-md-6">
                            <div class="form-group row">
                              <label for="validationCustom01" class="col-sm-4 col-form-label">Expiry Date :</label>
                              <label for="validationCustom01" class="col-sm-4 col-form-label">{{ !empty($item->expiry_date) ? date('d-m-Y',strtotime($item->expiry_date)) : "" }} </label>
                            </div>
                          </div>
                          @endif

                          <div class="col-md-6">
                      <div class="form-group row">
                        <label for="validationCustom01" class="col-sm-4 col-form-label">Opening Quantity :</label>
                        <label for="validationCustom01" class="col-sm-4 col-form-label">{{ $item->opening_stock }} </label>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group row">
                        <label for="validationCustom01" class="col-sm-4 col-form-label">Rate :</label>
                        <label for="validationCustom01" class="col-sm-4 col-form-label">{{ $item->rate }} </label>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group row">
                        <label for="validationCustom01" class="col-sm-4 col-form-label">Amount :</label>
                        <label for="validationCustom01" class="col-sm-4 col-form-label">{{ $item->amount }} </label>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group row">
                        <label for="validationCustom01" class="col-sm-4 col-form-label">Applicable Date :</label>
                        <label for="validationCustom01" class="col-sm-4 col-form-label">{{ $item->applicable_date }} </label>
                      </div>
                    </div>

                          <div class="col-md-6">
                              <div class="form-group row">
                                <label for="validationCustom01" class="col-sm-4 col-form-label">Item Image :</label>
                                <label for="validationCustom01" class="col-sm-4 col-form-label"> </label>
                              </div>
                            </div>
                          

        
      </div>
    </div>
    <!-- card body end@ -->
  </div>
</div>
@endsection