<!doctype html>
<html lang="en">
  <head>
  <title>Ns Pollachi</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css'>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.0.13/css/all.css'>    <!-- select 2 -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
    <!-- select 2 -->
    <link rel="stylesheet" href="{{asset('assets/css/select2.min.css')}}">
    <!-- data -->
    <link rel="stylesheet" href="{{asset('assets/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/buttons.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/fixedHeader.dataTables.min.css')}}">
    <!-- font-awasome -->
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
    <!--date picker -->
    <link rel="stylesheet" href="{{asset('assets/datepicker/datepicker3.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('assets/css/dashboardcss.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/gijgo.min.css')}}">
    <!-- main js -->
    <script src="{{asset('assets/js/jquery-3.3.1.js')}}"></script>

    <script type="text/javascript">
      var APP_URL = {!! json_encode(url('/')) !!}
      </script>
    
    

  </head>
  <body>

<div class="page-wrapper chiller-theme toggled">
  <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
    <i class="fas fa-bars"></i>
  </a>
  
  <nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
      <div class="sidebar-brand">
        <a href="#">
			<img src="http://15.206.73.49/nspollachi/new/assets/image/logo.png" class="img-fluid dashboardlog" alt="logo">
		</a>
        <div id="close-sidebar">
          <i class="fas fa-times"></i>
        </div>
      </div>
      
      
      <div class="sidebar-menu">
			<section class="nav-wrap">
	
	<nav class="acnav" role="navigation">
		<ul class="acnav__list acnav__list--level1">
		
		<!--1st li menu-->
			<li class="has-children">
				<div class="acnav__label">
					<i class="fa fa-leaf" aria-hidden="true"></i>  Masters
				</div>
								<!--sub menu-->
								<ul class="acnav__list acnav__list--level2">	
											<!--1st Add sub menu-->	
									<li class="has-children">
													<div class="acnav__label acnav__label--level2">Location</div>
													<ul class="acnav__list acnav__list--level3">
														
                            @can('state_list')
                            <li><a class="acnav__link acnav__link--level3" href="{{url('master/state')}}">State</a></li>
                            @endcan
                            @can('district_list')
                            <li><a class="acnav__link acnav__link--level3" href="{{url('master/district')}}">District</a></li>
                            @endcan
                            @can('city_list')
                            <li><a class="acnav__link acnav__link--level3" href="{{url('master/city')}}">City</a></li>
                            @endcan
                            @can('location_type_list')
                            <li><a class="acnav__link acnav__link--level3" href="{{url('master/location-type')}}">Location Type</a></li>
                            @endcan
                            @can('address_type_list')
                            <li><a class="acnav__link acnav__link--level3" href="{{url('master/address-type')}}">Address Type</a></li>
                            @endcan
                            @can('location_list')
                            <li><a class="acnav__link acnav__link--level3" href="{{url('master/location')}}">Company Location</a></li>
                            @endcan
                            <li><a class="acnav__link acnav__link--level3" href="{{ url('master/ho_details')}}">Head Office Details</a></li>
													</ul>
										</li>
										
										<!--2nd Add sub menu-->	
										<li class="has-children">
													<div class="acnav__label acnav__label--level2">Bank</div>
													<ul class="acnav__list acnav__list--level3">
														
                            @can('bank_list')
                            <li><a class="acnav__link acnav__link--level3" href="{{url('master/bank')}}">Bank</a></li>
                            @endcan
                            @can('bank_branch_list')
                            <li><a class="acnav__link acnav__link--level3" href="{{url('master/bank-branch')}}">Bank Branch</a></li>
                            @endcan
                            @can('denomination_list')
                            <li><a class="acnav__link acnav__link--level3" href="{{url('master/denomination')}}">Denomination</a></li>
                            @endcan
                            @can('accounts_type_list')
                            <li><a class="acnav__link acnav__link--level3" href="{{url('master/accounts-type')}}">Accounts Type</a></li>
                            @endcan
													</ul>
										</li>
											<li class="has-children">
													<div class="acnav__label acnav__label--level2">Employee</div>
													<ul class="acnav__list acnav__list--level3">
														
                              @can('department_list')
                            <li><a class="acnav__link acnav__link--level3" href="{{url('master/department')}}">Department</a></li>
                            @endcan
                            @can('desigination_list')
                            <li><a class="acnav__link acnav__link--level3" href="{{url('master/designation')}}">Desigination</a></li>
                            @endcan
                            @can('employee_list')
                            <li><a class="acnav__link acnav__link--level3" href="{{url('master/employee')}}">Employee</a></li>
                            @endcan
													</ul>
										</li>
										<li class="has-children">
													<div class="acnav__label acnav__label--level2">User</div>
													<ul class="acnav__list acnav__list--level3">
														
                            @can('user_list')
                          <li><a class="acnav__link acnav__link--level3" href="{{url('master/user')}}">User</a></li>
                          @endcan
                          @can('role_list')
                          <li><a class="acnav__link acnav__link--level3" href="{{url('master/role')}}">Role</a></li>
                          @endcan
													</ul>
										</li>
										<li class="has-children">
													<div class="acnav__label acnav__label--level2">Accounts</div>
													<ul class="acnav__list acnav__list--level3">
														
                            @can('gift_voucher_matser_list')
                            <li><a class="acnav__link acnav__link--level3" href="{{url('master/gift-voucher')}}">Gift Voucher</a></li>
                            <li><a class="acnav__link acnav__link--level3" href="{{url('master/offers')}}">Offers</a></li>
                            @endcan
													</ul>
										</li>
										<li class="has-children">
													<div class="acnav__label acnav__label--level2">Category</div>
													<ul class="acnav__list acnav__list--level3">
														
                           @can('category_list')
                            <li><a class="acnav__link acnav__link--level3" href="{{url('master/category')}}">Category </a></li>
                            @endcan

                            @can('brand_list')
                            <li><a class="acnav__link acnav__link--level3" href="{{url('master/brand')}}">Brand </a></li>
                            @endcan
													</ul>
										</li>
										<li class="has-children">
													<div class="acnav__label acnav__label--level2">Language</div>
													<ul class="acnav__list acnav__list--level3">
														
                           @can('language_master_list')
                           <li><a class="acnav__link acnav__link--level3" href="{{url('master/language')}}">Language</a></li>
                           @endcan
													</ul>
										</li>
										<li class="has-children">
													<div class="acnav__label acnav__label--level2">Item</div>
													<ul class="acnav__list acnav__list--level3">
														
                           @can('uom_list')
                          <li><a class="acnav__link acnav__link--level3" href="{{url('master/uom')}}">Uom</a></li>
                          @endcan
                          <li><a class="acnav__link acnav__link--level3" href="{{route('tax.index')}}">Tax</a></li>
                          @can('item_master_list')
                          <li><a class="acnav__link acnav__link--level3" href="{{url('master/item')}}">Item</a></li>
                          @endcan
                          @can('item_tax_details_list')
                          <li><a class="acnav__link acnav__link--level3" href="{{url('master/item-tax-details')}}">Item Tax Details</a></li>
                          @endcan
													</ul>
										</li>
										
											<li class="has-children">
													<div class="acnav__label acnav__label--level2">Vendor</div>
													<ul class="acnav__list acnav__list--level3">
														
                          @can('agent_list')
                            <li><a class="acnav__link acnav__link--level3" href="{{url('master/agent')}}">Agent</a></li>
                            @endcan
                          @can('customer_list')
                            <li><a class="acnav__link acnav__link--level3" href="{{url('master/customer')}}">Customer</a></li>
                            @endcan
                          @can('supplier_list')
                            <li><a class="acnav__link acnav__link--level3" href="{{url('master/supplier')}}">Supplier</a></li>
                            @endcan
                            <li><a class="acnav__link acnav__link--level3" href="{{route('sales_man.index')}}">Sales Man</a></li>
													</ul>
										</li>
										
									</li>
								</ul>
								
								<!--sub menu-->
			</li>
			
			<!--2nd li menu-->

			<li class="has-children"><div class="acnav__label"> <i class="fa fa-leaf" aria-hidden="true"></i>   Transactions</div>
			<ul class="acnav__list acnav__list--level2">	
											<!--1st Add sub menu-->	
									<li class="has-children">
													<div class="acnav__label acnav__label--level2">Purchase</div>
													<ul class="acnav__list acnav__list--level3">
														
                           <li><a class="acnav__link acnav__link--level3" href="{{ url('estimation/index/0') }}">Estimation</a></li>
                            <li><a class="acnav__link acnav__link--level3" href="{{ url('purchase_order/index/0') }}">Purchase order</a></li>
                            <li><a class="acnav__link acnav__link--level3" href="{{ url('receipt_note/index/0') }}">Receipt Note</a></li>
                            <li><a class="acnav__link acnav__link--level3" href="{{ url('purchase_entry/index/0') }}">Purchase Entry</a></li>
                            <li><a class="acnav__link acnav__link--level3" href="{{ url('rejection_out/index/0') }}">Rejection Out</a></li>
                            <li><a class="acnav__link acnav__link--level3" href="{{ url('purchase_gatepass_entry/index/0') }}">Purchase Gate Pass Entry</a></li>
                            <li><a class="acnav__link acnav__link--level3" href="{{ url('debit_note/index/0') }}">Debit Note</a></li>
													</ul>
										</li>
										</ul>
			
			
			
			</li>
			
			<!--3rdt li menu-->
			<li class="has-children"><div class="acnav__label"> <i class="fa fa-leaf" aria-hidden="true"></i>   Price Updation </div>
			
			
			
			</li>
			
			
			<!--3rdt li menu-->
			<li class="has-children"><div class="acnav__label">   <i class="fa fa-leaf" aria-hidden="true"></i>   Updation </div>
			
			
			
			</li>
			
			

		</ul>
	</nav>
	
</section>
      </div>
    </div>    
  </nav>