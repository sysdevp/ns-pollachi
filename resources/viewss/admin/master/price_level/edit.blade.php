@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Edit Price Level</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{route('price-level.index')}}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">

      <form method="post" class="form-horizontal needs-validation" novalidate action="{{route('price-level.update',$price_level->id)}}" enctype="multipart/form-data">
        {{csrf_field()}}
        @method('PATCH')

        <div class="col-md-12 row mb-3">
            <div class="col-md-2">
              <font>Name:</font>
            </div>
            <div class="col-md-3">
              <input type="text" class="form-control" placeholder="Level Name" id="level" name="level" value="{{ $price_level->level }}">

            </div>
            
          </div>

          <div class="col-md-12 row mb-3">
            <div class="col-md-2">
              <font>Type:</font>
            </div>
            <div class="col-md-2">
              <font>Percentage:</font>
              @if($price_level->type == 1)
              <input type="radio" class="" id="type1" checked="" name="type" value="1">
              @else
              <input type="radio" class="" id="type1" name="type" value="1">
              @endif
            </div>

            <div class="col-md-2">
              <font>Rs:</font>
              @if($price_level->type == 0)
              <input type="radio" class="" id="type2" checked="" name="type" value="0">
              @else
              <input type="radio" class="" id="type2" name="type" value="0">
              @endif
            </div>
           
          </div>

          <div class="col-md-12 row mb-3">
            <div class="col-md-2">
              <font>Value:</font>
            </div>
            <div class="col-md-3">
              <input type="text" class="form-control" placeholder="Value" id="value" name="value" value="{{ $price_level->value }}">
            </div>
  
          </div> 
        <div class="col-md-7 text-right">
          <button class="btn btn-success" name="add" type="submit">Submit</button>
        </div>
      </form>
    </div>
    <!-- <script src="{{asset('assets/js/master/capitalize.js')}}"></script> -->
    <!-- card body end@ -->
  </div>
</div>
<script>

     $(document).on('keyup','#rs1',function(){

      $('#percent1').val('');
      $('#rs_or_percent1').val(0);

     });

     $(document).on('keyup','#percent1',function(){

      $('#rs1').val('');
      $('#rs_or_percent1').val(1);

     });

     $(document).on('keyup','#rs2',function(){

      $('#percent2').val('');
      $('#rs_or_percent2').val(0);

     });

     $(document).on('keyup','#percent2',function(){

      $('#rs2').val('');
      $('#rs_or_percent2').val(1);

     });

     $(document).on('keyup','#rs3',function(){

      $('#percent3').val('');
      $('#rs_or_percent3').val(0);

     });

     $(document).on('keyup','#percent3',function(){

      $('#rs3').val('');
      $('#rs_or_percent3').val(1);

     });
</script>
@endsection