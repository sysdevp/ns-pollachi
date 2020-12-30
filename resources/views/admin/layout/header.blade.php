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
										
										<li class="has-children">
													<div class="acnav__label acnav__label--level2">Area</div>
													<ul class="acnav__list acnav__list--level3">
														
                           @can('area_list')
                          <li><a class="acnav__link acnav__link--level3" href="{{url('master/area')}}">Area</a></li>
                          @endcan
							
													</ul>
										</li>
										
										<li class="has-children">
													<div class="acnav__label acnav__label--level2">Account Group</div>
													<ul class="acnav__list acnav__list--level3">
														
                          <li><a class="acnav__link acnav__link--level3" href="{{route('account_group.index')}}">Account Group</a></li>
                          <li><a class="acnav__link acnav__link--level3" href="{{route('account_head.index')}}">Account Head</a></li>
                          <li><a class="acnav__link acnav__link--level3" href="{{route('account_group_tax.index')}}">Tax For Account Group</a></li>
							
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
										
										<ul class="acnav__list acnav__list--level2">	
											<!--1st Add sub menu-->	
									<li class="has-children">
													<div class="acnav__label acnav__label--level2">Sales</div>
													<ul class="acnav__list acnav__list--level3">
														
                           <li><a class="acnav__link acnav__link--level3" href="{{ url('estimation/index/0') }}">Sales Estimation</a></li>
                            <li><a class="acnav__link acnav__link--level3" href="{{ url('purchase_order/index/0') }}">Sales Order</a></li>
                            <li><a class="acnav__link acnav__link--level3" href="{{ url('receipt_note/index/0') }}">Delivery Note</a></li>
                            <li><a class="acnav__link acnav__link--level3" href="{{ url('purchase_entry/index/0') }}">Sales Entry</a></li>
                            <li><a class="acnav__link acnav__link--level3" href="{{ url('rejection_out/index/0') }}">Rejection In</a></li>
                            <li><a class="acnav__link acnav__link--level3" href="{{ url('purchase_gatepass_entry/index/0') }}">Sales Gate Pass Entry</a></li>
                            <li><a class="acnav__link acnav__link--level3" href="{{ url('debit_note/index/0') }}">Credit Note</a></li>
													</ul>
										</li>
										</ul>
										
											<ul class="acnav__list acnav__list--level2">	
											<!--1st Add sub menu-->	
									<li class="has-children">
													<div class="acnav__label acnav__label--level2">Payment</div>
													<ul class="acnav__list acnav__list--level3">
														
													<li><a  class="acnav__link acnav__link--level3" href="{{ route('payment_request.index') }}">Payment Request</a></li>
                            <li><a class="acnav__link acnav__link--level3" href="{{ route('payment_process.index') }}">Payment Process</a></li>
                            <li><a class="acnav__link acnav__link--level3" href="{{ route('payment_expense.index') }}">Payment Of Expenses</a></li>
								</ul>
										</li>
										</ul>
			
			
										<ul class="acnav__list acnav__list--level2">	
											<!--1st Add sub menu-->	
									<li class="has-children">
													<div class="acnav__label acnav__label--level2">Receipt</div>
													<ul class="acnav__list acnav__list--level3">
														
													<li><a  class="acnav__link acnav__link--level3" href="{{ route('receipt_request.index') }}">Receipt Request</a></li>
                            <li><a class="acnav__link acnav__link--level3" href="{{ route('receipt_process.index') }}">Receipt Process</a></li>
                            <li><a class="acnav__link acnav__link--level3" href="{{ route('receipt_income.index') }}">Receipt Of Income</a></li>	</ul>
										</li>
										</ul>	
										
											<ul class="acnav__list acnav__list--level2">	
											<!--1st Add sub menu-->	
									<li class="has-children">
													<div class="acnav__label acnav__label--level2">Advance Settlement</div>
													<ul class="acnav__list acnav__list--level3">
														
													<li><a class="acnav__link acnav__link--level3" href="{{ route('advance_settlement_supplier.create') }}">Advance to Suppliers</a></li>
                            <li><a class="acnav__link acnav__link--level3" href="{{ route('advance_settlement_customer.create') }}">Advance from Customers</a></li>
                            		</ul>
										</li>
										</ul>	
			
			
			</li>
			
			<!--3rdt li menu-->
			<li class="has-children"><div class="acnav__label"> <i class="fa fa-leaf" aria-hidden="true"></i>   Price Updation </div>
					
					<ul class="acnav__list acnav__list--level2">	
											<!--1st Add sub menu-->	
									<li class="has-children">
													<div class="acnav__label acnav__label--level2">Mark Up and Mark Down</div>
													<li><a class="acnav__link acnav__link--level3" href="{{ route('price_updation.index') }}">Mark Up and Mark Down</a></li>
                            
										</li>
										</ul>
			
			</li>
			
			
			<!--4th li menu-->
			<li class="has-children"><div class="acnav__label">   <i class="fa fa-leaf" aria-hidden="true"></i>  Registers </div>
			
					<ul class="acnav__list acnav__list--level2">	
											<!--1st Add sub menu-->	
									<li class="has-children">
													<div class="acnav__label acnav__label--level2">Purchase</div>
													<ul class="acnav__list acnav__list--level3">
														
													<li><a href="{{ url('estimation/index/1') }}">Purchase Estimation</a></li>
                            <li><a class="acnav__link acnav__link--level3" href="{{ url('purchase_order/index/1') }}">Purchase order</a></li>
                            <li><a class="acnav__link acnav__link--level3" href="{{ url('receipt_note/index/1') }}">Receipt Note</a></li>
                            <li><a class="acnav__link acnav__link--level3" href="{{ url('purchase_entry/index/1') }}">Purchase Entry</a></li>
                            <li><a class="acnav__link acnav__link--level3" href="{{ url('rejection_out/index/1') }}">Rejection Out</a></li>
                            <li><a class="acnav__link acnav__link--level3"  href="{{ url('debit_note/index/1') }}">Debit Note</a></li>		</ul>
										</li>
										</ul>
										
										<ul class="acnav__list acnav__list--level2">	
											<!--1st Add sub menu-->	
									<li class="has-children">
													<div class="acnav__label acnav__label--level2">Sales</div>
													<ul class="acnav__list acnav__list--level3">
														
													<li><a href="{{ url('sales_estimation/index/1') }}">Sales Estimation</a></li>
                        <li><a class="acnav__link acnav__link--level3" href="{{ url('sale_order/index/1') }}">Sales Order</a></li>
                        <li><a class="acnav__link acnav__link--level3" href="{{ url('delivery_note/index/1') }}">Delivery Note</a></li>
                        <li><a class="acnav__link acnav__link--level3" href="{{ url('sales_entry/index/1') }}">Sales Entry</a></li>
                        <li><a class="acnav__link acnav__link--level3" href="{{ url('rejection_in/index/1') }}">Rejection In</a></li>
                        <li><a class="acnav__link acnav__link--level3" href="{{ url('sales_gatepass_entry/index/1') }}">Sales Gate Pass Entry</a></li>
                        <li><a class="acnav__link acnav__link--level3" href="{{ url('credit_note/index/1') }}">Credit Note</a></li>
                     			</ul>
										</li>
										</ul>
			
			</li>
			
			<!--5th li menu-->
			<li class="has-children"><div class="acnav__label">   <i class="fa fa-leaf" aria-hidden="true"></i>  Outstanding </div> 
			
				<ul class="acnav__list acnav__list--level2">	
											<!--1st Add sub menu-->	
									<li class="has-children">
													<div class="acnav__label acnav__label--level2">Receivables</div>
													<ul class="acnav__list acnav__list--level3">
													<li><a class="acnav__link acnav__link--level3" href="{{ route('receivable_billwise.index') }}">Bill Wise</a></li>
                            <li><a class="acnav__link acnav__link--level3" href="{{ route('receivable_partywise.index') }}">Party Wise</a></li>   						</ul>
										</li>
										</ul>
				
				<ul class="acnav__list acnav__list--level2">	
											<!--1st Add sub menu-->	
									<li class="has-children">
													<div class="acnav__label acnav__label--level2">Payables</div>
													<ul class="acnav__list acnav__list--level3">
													<li><a class="acnav__link acnav__link--level3" href="{{ route('payable_billwise.index') }}">Bill Wise</a></li>
                        <li><a class="acnav__link acnav__link--level3" href="{{ route('payable_partywise.index') }}">Party Wise</a></li>		</ul>
										</li>
										</ul>
				
			</li>
			
			<!--5th li menu-->
			<li class="has-children"><div class="acnav__label">   <i class="fa fa-leaf" aria-hidden="true"></i> Reports </div> 
				
				<ul class="acnav__list acnav__list--level2">	
											<!--1st Add sub menu-->	
									<li class="has-children">
													<div class="acnav__label acnav__label--level2">Day Book</div>
													<ul class="acnav__list acnav__list--level3">
													<li><a  class="acnav__link acnav__link--level3"  href="{{ route('daybook.index') }}">Day Book</a></li>
                            
                                 						</ul>
										</li>
										</ul>
										
				<ul class="acnav__list acnav__list--level2">	
											<!--1st Add sub menu-->	
									<li class="has-children">
													<div class="acnav__label acnav__label--level2">Stock Reports</div>
													<ul class="acnav__list acnav__list--level3">
													<li><a  class="acnav__link acnav__link--level3" href="{{ route('stock-report.index') }}">Stock Report</a></li>
                           <li><a  class="acnav__link acnav__link--level3" href="{{ route('stock_summary.index') }}">Stock Summary</a></li>
                           <li><a  class="acnav__link acnav__link--level3" href="{{ route('stock_ageing.index') }}">Stock Ageing</a></li>
                            
                                 						</ul>
										</li>
										</ul>						
				
				<ul class="acnav__list acnav__list--level2">	
											<!--1st Add sub menu-->	
									<li class="has-children">
													<div class="acnav__label acnav__label--level2">Individual Ledger</div>
													<ul class="acnav__list acnav__list--level3">
													<li><a  class="acnav__link acnav__link--level3" href="{{ route('individual_ledger.index') }}">Individual Ledger</a></li>
                            	</ul>
										</li>
										</ul>	
										
					<ul class="acnav__list acnav__list--level2">	
											<!--1st Add sub menu-->	
									<li class="has-children">
													<div class="acnav__label acnav__label--level2">GST Report</div>
													<ul class="acnav__list acnav__list--level3">
													<li><a class="acnav__link acnav__link--level3" href="{{ route('gst_report.index') }}">GST Report</a></li>
                           	</ul>
										</li>
										</ul>	
				
			</li>
			
			<!--6th li menu-->
			<li class="has-children"><div class="acnav__label">   <i class="fa fa-leaf" aria-hidden="true"></i> Settings </div> 
			
				<ul class="acnav__list acnav__list--level2">	
											<!--1st Add sub menu-->	
									<li class="has-children">
													<div class="acnav__label acnav__label--level2">Selling Price</div>
													<ul class="acnav__list acnav__list--level3">
													<li><a class="acnav__link acnav__link--level3" href="{{ route('selling-price-setup.index') }}">Selling Price Setup</a></li>
                       
                                 						</ul>
										</li>
										</ul>	
				
			</li>
			
			
			<!--7th li menu-->
			<li class="has-children"><div class="acnav__label">   <i class="fa fa-leaf" aria-hidden="true"></i> POS </div> 
				
				<ul class="acnav__list acnav__list--level2">	
											<!--1st Add sub menu-->	
									<li class="has-children">
													<div class="acnav__label acnav__label--level2">POS</div>
													<ul class="acnav__list acnav__list--level3">
														
													<li><a class="acnav__link acnav__link--level3" href="{{ route('pos.index') }}">POS</a></li>
                      
                                 						</ul>
										</li>
										</ul>	
				
				
			</li>
			
			

		</ul>
	</nav>
	
</section>
      </div>
    </div>    
  </nav>