<div class="card-header masterbg margintop" id="heading" >
                            
					<button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapsethree"><i class="fa fa-plus addbg"></i></button>	
				
							 <input style=" text-align: center;" type="checkbox" id="price_updation" class="menu" value="collapsethree" />
				<b>Price Updation</b>			
           </div>		
	  
				
		    <div id="collapsethree" class="collapse" data-parent="#accordionExample">			
		
			<div id="accordionExample3">
				
				<div class="subparent">
					
						 <div class="card-header locationbg">
							<button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseMarkupdown"><i class="fa fa-plus addbg"></i></button>
							<input type="checkbox" name="checkAll1" id="Purchase" class="price_updation submenu"/> Mark Up Mark Down
						</div>
					
					
					
						<div id="collapseMarkupdown" class="collapse" data-parent="#accordionExample3">
							
							<div class="locationdivbg">
							
								<div class="row" id="priceupdation_div">
									
					<div class="col-lg-2 mastersubheading2">
   <div class="" id="tab57">		
   @foreach($permission as $value)
                @if($value->label == "Price Updation List")
                <input type="checkbox" name="permission[]" class="all_{{ $value->class }}_master all_classname permission Markupdown"  {{(Role::selectall_check($value->class,$role_id) >= 4) ? "checked" : "" }} value="{{$value->class}}">  
                        <label class="control-label">Select All</label>
                        <br>
                        <!-- <label class="control-label">Estimation</label>
                        <br> -->
                @endif
                    @if($value->class == "price_updation_list")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="permission[]" class="{{ $value->class }} permission check Markupdown"  {{ in_array($value->id, $rolePermissions) ? "checked" : "" }} value="{{$value->id}}">  
					<span class="control-label">{{$value->name1}}</span>
					<br>
                    @endif
                @endforeach
   </div>
</div>
					
								</div>
				
        				</div>
							
						</div>	
					
				</div>
				
		  </div>
      </div>
				