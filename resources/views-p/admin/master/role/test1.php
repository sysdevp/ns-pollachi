<div class="card-header masterbg margintop" id="heading" >
                            
                            <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapsefour"><i class="fa fa-plus addbg"></i></button>	
                        
                                     <input style=" text-align: center;" type="checkbox" id="outstanding" class="menu" value="collapsefour" />
                        <b>Out Standing</b>			
                   </div>		
              
                        
                    <div id="collapsefour" class="collapse" data-parent="#accordionExample">			
                
                    <div id="accordionExample4">
                        
                        <div class="subparent">
                            
                                 <div class="card-header locationbg">
                                    <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapsePurchase1"><i class="fa fa-plus addbg"></i></button>
                                    <input type="checkbox" name="checkAll1" id="Purchase1" class="outstanding submenu"/> Purchase1
                                </div>
                            
                            
                            
                                <div id="collapsePurchase1" class="collapse" data-parent="#accordionExample4">
                                    
                                    <div class="locationdivbg">
                                    
                                        <div class="row" id="Purchase1_div">
                                            
                            <div class="col-lg-2 mastersubheading2">
           <div class="" id="tab34">		
           @foreach($permission as $value)
                        @if($value->label == "Estimation List")
                        <input type="checkbox" name="permission[]" class="all_{{ $value->class }}_master all_classname permission Purchase1"  {{(Role::selectall_check($value->class,$role_id) >= 4) ? "checked" : "" }} value="{{$value->class}}">  
                                <label class="control-label">Select All</label>
                                <br>
                                <label class="control-label">Estimation</label>
                                <br>
                        @endif
                            @if($value->class == "estimation_list")
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="checkbox" name="permission[]" class="{{ $value->class }} permission check Purchase1"  {{ in_array($value->id, $rolePermissions) ? "checked" : "" }} value="{{$value->id}}">  
                            <span class="control-label">{{$value->name1}}</span>
                            <br>
                            @endif
                        @endforeach
           </div>
        </div>
                            
                            <div class="col-lg-2 mastersubheading2">
           <div class="" id="tab35">		
           @foreach($permission as $value)
                        @if($value->label == "Purchase Order List")
                        <input type="checkbox" name="permission[]" class="all_{{ $value->class }}_master all_classname permission Purchase1"  {{(Role::selectall_check($value->class,$role_id) >= 4) ? "checked" : "" }} value="{{$value->class}}">  
                                <label class="control-label">Select All</label>
                                <br>
                                <label class="control-label">Purchase</label>
                                <br>
                        @endif
                            @if($value->class == "purchase_order_list")
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="checkbox" name="permission[]" class="{{ $value->class }} permission check Purchase1"  {{ in_array($value->id, $rolePermissions) ? "checked" : "" }} value="{{$value->id}}">  
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