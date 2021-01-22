@extends('admin.layout.app1')



@section('content')
<!--<div class="col-12 body-sec"><div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
      <a href="{{url('emptydash')}}" >
      <h1 class="card-title">ADMINfsfs</h1>
        </a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
      <a href="{{route('pos.index')}}" >
        <h1 class="card-title">POS</h1>
        </a>
      </div>
    </div>
  </div>
</div></div>-->

<style>
.textlink{font-size: 18px; font-weight: bold; color: #000000; text-decoration:none !important;}
.textlink a{font-size: 18px; font-weight: bold; color: #000000; text-decoration:none !important;}
.textlink a:hover{font-size: 18px; font-weight: bold; color: #000000; text-decoration:none !important;}
</style>

<div class="col-12 body-sec">
  <div class="row">
<div class="col-md-12">
    <div class="row my-3 mx-auto d-flex justify-content-center">
   <div class="card col-md-4" style="border: none;">
      <a href="{{url('emptydash')}}" class="textlink" style="background: #8bc34a;
    padding: 15px; border: 3px solid rgb(40 167 69); border-radius: 0px 60px;">   <h1>ADMIN</h1>
        <p>Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p></a>
		<br/>
        <a href="{{route('pos.index')}}" class="textlink"  style="background: #8bc34a;
    padding: 15px; border: 3px solid rgb(40 167 69); border-radius: 0px 60px;">  <h1>POS</h1>
       <p>Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p> </a>

      </div>
      



   <div class="col-md-4"  style="margin:20px;  padding:15px;">
        <img src="assets/image/inventory.png" style="width:100%"/>
    </div>

    
    
    
    </div>

    
         </div>


         


    


@endsection

