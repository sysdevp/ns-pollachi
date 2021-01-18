<!doctype html>
<html lang="en">
  <head>
  <title>Ns Pollachi</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css'>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.0.13/css/all.css'>    <!-- select 2 -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap.css')); ?>">
    <!-- select 2 -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/select2.min.css')); ?>">
    <!-- data -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/dataTables.bootstrap4.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/buttons.bootstrap4.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/fixedHeader.dataTables.min.css')); ?>">
    <!-- font-awasome -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/font-awesome.min.css')); ?>">
    <!--date picker -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/datepicker/datepicker3.css')); ?>" type="text/css" />
	<link rel="stylesheet" href="<?php echo e(asset('assets/css/dashboardcss.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('assets/css/gijgo.min.css')); ?>">
    <!-- main js -->
<script src="<?php echo e(asset('assets/js/jquery-3.3.1.js')); ?>"></script>

    <script type="text/javascript">
      var APP_URL = <?php echo json_encode(url('/')); ?>

      </script>
	  <style>
    .profileimage{font-size:50px !important;}

.navtopadmin{padding: 8px;}

.changepass {  -
 font-family: Arial;
 color: #fff !important;
 font-size: 12px;
 background: #007bff;
 padding: 8px 10px 8px 10px;
 text-decoration: none;
 margin-right:10px;
}
.changepass:hover {  -
 color: #fff !important;
 font-size: 12px;
 background: #28a745;
}
.logout {
 font-family: Arial;
 color: #fff !important;
 font-size: 12px;
 background: #007bff;
 padding: 8px 10px 8px 10px;
 text-decoration: none;
}

.logout:hover {  -
 color: #fff !important;
 font-size: 12px;
 background: #28a745;
}

.admintext{color: #fff; text-decoration:none;
   font-size: 15px;}

.Adminimage{background: #28a745;
   margin-top: -9px;
   margin-bottom: 7px;
   margin-left: 0px;
   color: #fff; padding: 10px;}
   </style>
    

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
					<i class="fa fa-database" aria-hidden="true"></i>  Masters
				</div>
								<!--sub menu-->
								<ul class="acnav__list acnav__list--level2">	
											<!--1st Add sub menu-->	
									<li class="has-children">
													<div class="acnav__label acnav__label--level2">Location</div>
													<ul class="acnav__list acnav__list--level3">
														
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('state_list')): ?>
                            <li><a class="acnav__link acnav__link--level3" href="<?php echo e(url('master/state')); ?>">State</a></li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('district_list')): ?>
                            <li><a class="acnav__link acnav__link--level3" href="<?php echo e(url('master/district')); ?>">District</a></li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('city_list')): ?>
                            <li><a class="acnav__link acnav__link--level3" href="<?php echo e(url('master/city')); ?>">City</a></li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('location_type_list')): ?>
                            <li><a class="acnav__link acnav__link--level3" href="<?php echo e(url('master/location-type')); ?>">Location Type</a></li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('address_type_list')): ?>
                            <li><a class="acnav__link acnav__link--level3" href="<?php echo e(url('master/address-type')); ?>">Address Type</a></li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('location_list')): ?>
                            <li><a class="acnav__link acnav__link--level3" href="<?php echo e(url('master/location')); ?>">Company Location</a></li>
                            <?php endif; ?>
                            <li><a class="acnav__link acnav__link--level3" href="<?php echo e(url('master/ho_details')); ?>">Head Office Details</a></li>
													</ul>
										</li>
										
										<!--2nd Add sub menu-->	
										<li class="has-children">
													<div class="acnav__label acnav__label--level2">Bank</div>
													<ul class="acnav__list acnav__list--level3">
														
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('bank_list')): ?>
                            <li><a class="acnav__link acnav__link--level3" href="<?php echo e(url('master/bank')); ?>">Bank</a></li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('bank_branch_list')): ?>
                            <li><a class="acnav__link acnav__link--level3" href="<?php echo e(url('master/bank-branch')); ?>">Bank Branch</a></li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('denomination_list')): ?>
                            <li><a class="acnav__link acnav__link--level3" href="<?php echo e(url('master/denomination')); ?>">Denomination</a></li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('accounts_type_list')): ?>
                            <li><a class="acnav__link acnav__link--level3" href="<?php echo e(url('master/accounts-type')); ?>">Accounts Type</a></li>
                            <?php endif; ?>
                            <li><a class="acnav__link acnav__link--level3" href="<?php echo e(route('company-bank.index')); ?>">Company Bank</a></li>
													</ul>
										</li>
											<li class="has-children">
													<div class="acnav__label acnav__label--level2">Employee</div>
													<ul class="acnav__list acnav__list--level3">
														
                              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('department_list')): ?>
                            <li><a class="acnav__link acnav__link--level3" href="<?php echo e(url('master/department')); ?>">Department</a></li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('desigination_list')): ?>
                            <li><a class="acnav__link acnav__link--level3" href="<?php echo e(url('master/designation')); ?>">Role</a></li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('employee_list')): ?>
                            <li><a class="acnav__link acnav__link--level3" href="<?php echo e(url('master/employee')); ?>">Employee</a></li>
                            <?php endif; ?>
													</ul>
										</li>
										<li class="has-children">
													<div class="acnav__label acnav__label--level2">User</div>
													<ul class="acnav__list acnav__list--level3">
														
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_list')): ?>
                          <li><a class="acnav__link acnav__link--level3" href="<?php echo e(url('master/user')); ?>">User Creation</a></li>
                          <?php endif; ?>
                          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role_list')): ?>
                          <li><a class="acnav__link acnav__link--level3" href="<?php echo e(url('master/role')); ?>">User Access</a></li>
                          <?php endif; ?>
													</ul>
										</li>
										<li class="has-children">
													<div class="acnav__label acnav__label--level2">Offers</div>
													<ul class="acnav__list acnav__list--level3">
														
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('gift_voucher_matser_list')): ?>
                            <li><a class="acnav__link acnav__link--level3" href="<?php echo e(url('master/gift-voucher')); ?>">Gift Voucher</a></li>
                            <li><a class="acnav__link acnav__link--level3" href="<?php echo e(url('master/offers')); ?>">Offers</a></li>
                            <?php endif; ?>
                            <li><a class="acnav__link acnav__link--level3" href="<?php echo e(url('master/itemwiseoffer')); ?>">Itemwise Offers</a></li>
                            <li><a class="acnav__link acnav__link--level3" href="<?php echo e(url('master/item_wastage')); ?>">Item Wastage</a></li>

													</ul>
										</li>
										<li class="has-children">
													<div class="acnav__label acnav__label--level2">Category</div>
													<ul class="acnav__list acnav__list--level3">
														
                           <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('category_list')): ?>
                            <li><a class="acnav__link acnav__link--level3" href="<?php echo e(url('master/category')); ?>">Category </a></li>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('brand_list')): ?>
                            <li><a class="acnav__link acnav__link--level3" href="<?php echo e(url('master/brand')); ?>">Brand </a></li>
                            <?php endif; ?>
													</ul>
										</li>
										<li class="has-children">
													<div class="acnav__label acnav__label--level2">Language</div>
													<ul class="acnav__list acnav__list--level3">
														
                           <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('language_master_list')): ?>
                           <li><a class="acnav__link acnav__link--level3" href="<?php echo e(url('master/language')); ?>">Language</a></li>
                           <?php endif; ?>
													</ul>
										</li>
										<li class="has-children">
													<div class="acnav__label acnav__label--level2">Item</div>
													<ul class="acnav__list acnav__list--level3">
														
                           <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('uom_list')): ?>
                          <li><a class="acnav__link acnav__link--level3" href="<?php echo e(url('master/uom')); ?>">Uom</a></li>
                          <?php endif; ?>
                          <li><a class="acnav__link acnav__link--level3" href="<?php echo e(route('tax.index')); ?>">Tax</a></li>
                          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('item_master_list')): ?>
                          <li><a class="acnav__link acnav__link--level3" href="<?php echo e(url('master/item')); ?>">Item</a></li>
                          <?php endif; ?>
                          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('item_tax_details_list')): ?>
                          <li><a class="acnav__link acnav__link--level3" href="<?php echo e(url('master/item-tax-details')); ?>">Item Tax Details</a></li>
                          <?php endif; ?>
													</ul>
										</li>
										
											<li class="has-children">
													<div class="acnav__label acnav__label--level2">Vendor</div>
													<ul class="acnav__list acnav__list--level3">
														
                          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('agent_list')): ?>
                            <li><a class="acnav__link acnav__link--level3" href="<?php echo e(url('master/agent')); ?>">Agent</a></li>
                            <?php endif; ?>
                          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customer_list')): ?>
                            <li><a class="acnav__link acnav__link--level3" href="<?php echo e(url('master/customer')); ?>">Customer</a></li>
                            <?php endif; ?>
                          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('supplier_list')): ?>
                            <li><a class="acnav__link acnav__link--level3" href="<?php echo e(url('master/supplier')); ?>">Supplier</a></li>
                            <?php endif; ?>
                            <li><a class="acnav__link acnav__link--level3" href="<?php echo e(route('sales_man.index')); ?>">Sales Man</a></li>
							
													</ul>
										</li>

                    <li class="has-children">
                          <div class="acnav__label acnav__label--level2">Price Level Settings</div>
                          <ul class="acnav__list acnav__list--level3">
                            
                          <li><a class="acnav__link acnav__link--level3" href="<?php echo e(route('price-level.index')); ?>">Price Levels</a></li>
                          </ul>
                    </li>
										
										<li class="has-children">
													<div class="acnav__label acnav__label--level2">Area</div>
													<ul class="acnav__list acnav__list--level3">
														
                           <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('area_list')): ?>
                          <li><a class="acnav__link acnav__link--level3" href="<?php echo e(url('master/area')); ?>">Area</a></li>
                          <?php endif; ?>
							
													</ul>
										</li>
										
										<li class="has-children">
													<div class="acnav__label acnav__label--level2">Account Group</div>
													<ul class="acnav__list acnav__list--level3">
														
                          <li><a class="acnav__link acnav__link--level3" href="<?php echo e(route('account_group.index')); ?>">Account Group</a></li>
                          <li><a class="acnav__link acnav__link--level3" href="<?php echo e(route('account_head.index')); ?>">Account Head</a></li>
                          <li><a class="acnav__link acnav__link--level3" href="<?php echo e(route('account_group_tax.index')); ?>">Tax For Account Group</a></li>
							
													</ul>
										</li>


                    <li class="has-children">
                          <div class="acnav__label acnav__label--level2">BOM</div>
                          <ul class="acnav__list acnav__list--level3">
                            
                          <li><a class="acnav__link acnav__link--level3" href="<?php echo e(route('bom.index')); ?>">BOM</a></li>
              
                          </ul>
                    </li>
										
										
										
									</li>
								</ul>
								
								<!--sub menu-->
			</li>
			
			<!--2nd li menu-->

			<li class="has-children"><div class="acnav__label"> <i class="fa fa-shopping-cart" aria-hidden="true"></i>   Transactions</div>
			<ul class="acnav__list acnav__list--level2">	
											<!--1st Add sub menu-->	
									<li class="has-children">
													<div class="acnav__label acnav__label--level2">Purchase</div>
													<ul class="acnav__list acnav__list--level3">
														
                           <li><a class="acnav__link acnav__link--level3" href="<?php echo e(url('estimation/index/0')); ?>">Estimation</a></li>
                            <li><a class="acnav__link acnav__link--level3" href="<?php echo e(url('purchase_order/index/0')); ?>">Purchase order</a></li>
                            <li><a class="acnav__link acnav__link--level3" href="<?php echo e(url('receipt_note/index/0')); ?>">Receipt Note</a></li>
                            <li><a class="acnav__link acnav__link--level3" href="<?php echo e(url('purchase_entry/index/0')); ?>">Purchase Entry</a></li>
                            <li><a class="acnav__link acnav__link--level3" href="<?php echo e(url('rejection_out/index/0')); ?>">Rejection Out</a></li>
                            <li><a class="acnav__link acnav__link--level3" href="<?php echo e(url('purchase_gatepass_entry/index/0')); ?>">Purchase Gate Pass Entry</a></li>
                            <li><a class="acnav__link acnav__link--level3" href="<?php echo e(url('debit_note/index/0')); ?>">Debit Note</a></li>
													</ul>
										</li>
										</ul>
										
										<ul class="acnav__list acnav__list--level2">	
											<!--1st Add sub menu-->	
									<li class="has-children">
													<div class="acnav__label acnav__label--level2">Sales</div>
													<ul class="acnav__list acnav__list--level3">
														
                        <li><a class="acnav__link acnav__link--level3" href="<?php echo e(url('sales_estimation/index/0')); ?>">Sales Estimation</a></li>
                        <li><a class="acnav__link acnav__link--level3" href="<?php echo e(url('sale_order/index/0')); ?>">Sales Order</a></li>
                        <li><a class="acnav__link acnav__link--level3" href="<?php echo e(url('delivery_note/index/0')); ?>">Delivery Note</a></li>
                        <li><a class="acnav__link acnav__link--level3" href="<?php echo e(url('sales_entry/index/0')); ?>">Sales Entry</a></li>
                        <li><a class="acnav__link acnav__link--level3" href="<?php echo e(url('rejection_in/index/0')); ?>">Rejection In</a></li>
                        <li><a class="acnav__link acnav__link--level3" href="<?php echo e(url('sales_gatepass_entry/index/0')); ?>">Sales Gate Pass Entry</a></li>
                        <li><a class="acnav__link acnav__link--level3" href="<?php echo e(url('credit_note/index/0')); ?>">Credit Note</a></li>
													</ul>
										</li>
										</ul>
										
											<ul class="acnav__list acnav__list--level2">	
											<!--1st Add sub menu-->	
									<li class="has-children">
													<div class="acnav__label acnav__label--level2">Payment</div>
													<ul class="acnav__list acnav__list--level3">
														
													<li><a  class="acnav__link acnav__link--level3" href="<?php echo e(route('payment_request.index')); ?>">Payment Request</a></li>
                            <li><a class="acnav__link acnav__link--level3" href="<?php echo e(route('payment_process.index')); ?>">Payment Process</a></li>
                            <li><a class="acnav__link acnav__link--level3" href="<?php echo e(route('payment_expense.index')); ?>">Payment Of Expenses</a></li>
								</ul>
										</li>
										</ul>
			
			
										<ul class="acnav__list acnav__list--level2">	
											<!--1st Add sub menu-->	
									<li class="has-children">
													<div class="acnav__label acnav__label--level2">Receipt</div>
													<ul class="acnav__list acnav__list--level3">
														
													<li><a  class="acnav__link acnav__link--level3" href="<?php echo e(route('receipt_request.index')); ?>">Receipt Request</a></li>
                            <li><a class="acnav__link acnav__link--level3" href="<?php echo e(route('receipt_process.index')); ?>">Receipt Process</a></li>
                            <li><a class="acnav__link acnav__link--level3" href="<?php echo e(route('receipt_income.index')); ?>">Receipt Of Income</a></li>	</ul>
										</li>
										</ul>	
										
											<ul class="acnav__list acnav__list--level2">	
											<!--1st Add sub menu-->	
									<li class="has-children">
													<div class="acnav__label acnav__label--level2">Advance Settlement</div>
													<ul class="acnav__list acnav__list--level3">
														
													<li><a class="acnav__link acnav__link--level3" href="<?php echo e(route('advance_settlement_supplier.create')); ?>">Advance to Suppliers</a></li>
                            <li><a class="acnav__link acnav__link--level3" href="<?php echo e(route('advance_settlement_customer.create')); ?>">Advance from Customers</a></li>
                            		</ul>
										</li>
										</ul>	

                      <ul class="acnav__list acnav__list--level2">  
                      <!--1st Add sub menu--> 
                  <li class="has-children">
                          <div class="acnav__label acnav__label--level2">Account Expenses</div>
                          <ul class="acnav__list acnav__list--level3">
                            
                          <li><a class="acnav__link acnav__link--level3"  href="<?php echo e(route('expense.create')); ?>">Account Transaction</a></li>
                        
                                </ul>


                    </li>
                    </ul> 
			
			<ul class="acnav__list acnav__list--level2">  
                      <!--1st Add sub menu--> 
                  <li class="has-children">
                          <div class="acnav__label acnav__label--level2">Production Module</div>
                          <ul class="acnav__list acnav__list--level3">
                            
                          <li><a class="acnav__link acnav__link--level3"  href="<?php echo e(url('production')); ?>">Production</a></li>
                        
                                </ul>

                      
                    </li>
                    </ul> 
			</li>
			
			<!--3rdt li menu-->
			<li class="has-children"><div class="acnav__label"> <i class="fa fa-tag" aria-hidden="true"></i>   Price Updation </div>
					
					<ul class="acnav__list acnav__list--level2">	
											<!--1st Add sub menu-->	
									<li class="has-children">
													
													<li><a class="acnav__link acnav__link--level3" href="<?php echo e(route('price_updation.index')); ?>">Mark Up and Mark Down</a></li>
                            
										</li>
										</ul>
			
			</li>
			
			
			<!--4th li menu-->
			<li class="has-children"><div class="acnav__label">   <i class="fa fa-file" aria-hidden="true"></i>  Registers </div>
			
					<ul class="acnav__list acnav__list--level2">	
											<!--1st Add sub menu-->	
									<li class="has-children">
													<div class="acnav__label acnav__label--level2">Purchase</div>
													<ul class="acnav__list acnav__list--level3">
														
													<li><a class="acnav__link acnav__link--level3" href="<?php echo e(url('estimation/index/1')); ?>">Purchase Estimation</a></li>
                            <li><a class="acnav__link acnav__link--level3" href="<?php echo e(url('purchase_order/index/1')); ?>">Purchase order</a></li>
                            <li><a class="acnav__link acnav__link--level3" href="<?php echo e(url('receipt_note/index/1')); ?>">Receipt Note</a></li>
                            <li><a class="acnav__link acnav__link--level3" href="<?php echo e(url('purchase_entry/index/1')); ?>">Purchase Entry</a></li>
                            <li><a class="acnav__link acnav__link--level3" href="<?php echo e(url('rejection_out/index/1')); ?>">Rejection Out</a></li>
                            <li><a class="acnav__link acnav__link--level3"  href="<?php echo e(url('debit_note/index/1')); ?>">Debit Note</a></li>		</ul>
										</li>
										</ul>
										
										<ul class="acnav__list acnav__list--level2">	
											<!--1st Add sub menu-->	
									<li class="has-children">
													<div class="acnav__label acnav__label--level2">Sales</div>
													<ul class="acnav__list acnav__list--level3">
														
													<li><a class="acnav__link acnav__link--level3" href="<?php echo e(url('sales_estimation/index/1')); ?>">Sales Estimation</a></li>
                        <li><a class="acnav__link acnav__link--level3" href="<?php echo e(url('sale_order/index/1')); ?>">Sales Order</a></li>
                        <li><a class="acnav__link acnav__link--level3" href="<?php echo e(url('delivery_note/index/1')); ?>">Delivery Note</a></li>
                        <li><a class="acnav__link acnav__link--level3" href="<?php echo e(url('sales_entry/index/1')); ?>">Sales Entry</a></li>
                        <li><a class="acnav__link acnav__link--level3" href="<?php echo e(url('rejection_in/index/1')); ?>">Rejection In</a></li>
                        <li><a class="acnav__link acnav__link--level3" href="<?php echo e(url('sales_gatepass_entry/index/1')); ?>">Sales Gate Pass Entry</a></li>
                        <li><a class="acnav__link acnav__link--level3" href="<?php echo e(url('credit_note/index/1')); ?>">Credit Note</a></li>
                     			</ul>
										</li>
										</ul>
			
			</li>
			
			<!--5th li menu-->
			<li class="has-children"><div class="acnav__label">   <i class="fa fa-list-alt" aria-hidden="true"></i>  Outstanding </div> 
			
				<ul class="acnav__list acnav__list--level2">	
											<!--1st Add sub menu-->	
									<li class="has-children">
													<div class="acnav__label acnav__label--level2">Receivables</div>
													<ul class="acnav__list acnav__list--level3">
													<li><a class="acnav__link acnav__link--level3" href="<?php echo e(route('receivable_billwise.index')); ?>">Bill Wise</a></li>
                            <li><a class="acnav__link acnav__link--level3" href="<?php echo e(route('receivable_partywise.index')); ?>">Party Wise</a></li>   						</ul>
										</li>
										</ul>
				
				<ul class="acnav__list acnav__list--level2">	
											<!--1st Add sub menu-->	
									<li class="has-children">
													<div class="acnav__label acnav__label--level2">Payables</div>
													<ul class="acnav__list acnav__list--level3">
													<li><a class="acnav__link acnav__link--level3" href="<?php echo e(route('payable_billwise.index')); ?>">Bill Wise</a></li>
                        <li><a class="acnav__link acnav__link--level3" href="<?php echo e(route('payable_partywise.index')); ?>">Party Wise</a></li>		</ul>
										</li>
										</ul>
				
			</li>
			
			<!--5th li menu-->
			<li class="has-children"><div class="acnav__label">   <i class="fa fa-envelope" aria-hidden="true"></i> Reports </div> 
				
				<ul class="acnav__list acnav__list--level2">	
											<!--1st Add sub menu-->	
									<li class="has-children">
													<div class="acnav__label acnav__label--level2">Day Book</div>
													<ul class="acnav__list acnav__list--level3">
													<li><a  class="acnav__link acnav__link--level3"  href="<?php echo e(route('daybook.index')); ?>">Day Book</a></li>
                            
                                 						</ul>
										</li>
										</ul>
										
				<ul class="acnav__list acnav__list--level2">	
											<!--1st Add sub menu-->	
									<li class="has-children">
													<div class="acnav__label acnav__label--level2">Stock Reports</div>
													<ul class="acnav__list acnav__list--level3">
													<li><a  class="acnav__link acnav__link--level3" href="<?php echo e(route('stock-report.index')); ?>">Stock Report</a></li>
                           <li><a  class="acnav__link acnav__link--level3" href="<?php echo e(route('stock_summary.index')); ?>">Stock Summary</a></li>
                           <li><a  class="acnav__link acnav__link--level3" href="<?php echo e(route('stock_ageing.index')); ?>">Stock Ageing</a></li>
                            
                                 						</ul>
										</li>
										</ul>						
				
				<ul class="acnav__list acnav__list--level2">	
											<!--1st Add sub menu-->	
									<li class="has-children">
													<div class="acnav__label acnav__label--level2">Individual Ledger</div>
													<ul class="acnav__list acnav__list--level3">
													<li><a  class="acnav__link acnav__link--level3" href="<?php echo e(route('individual_ledger.index')); ?>">Individual Ledger</a></li>
                            	</ul>
										</li>
										</ul>	
										
					<ul class="acnav__list acnav__list--level2">	
											<!--1st Add sub menu-->	
									<li class="has-children">
													<div class="acnav__label acnav__label--level2">GST Report</div>
													<ul class="acnav__list acnav__list--level3">
													<li><a class="acnav__link acnav__link--level3" href="<?php echo e(route('gst_report.index')); ?>">GST Report</a></li>
                           	</ul>
										</li>
										</ul>	
				
			</li>
			
			<!--6th li menu-->
			<li class="has-children"><div class="acnav__label">   <i class="fa fa-cog"" aria-hidden="true"></i> Settings </div> 
			
				<ul class="acnav__list acnav__list--level2">	
											<!--1st Add sub menu-->	
									<li class="has-children">
													<div class="acnav__label acnav__label--level2">Selling Price</div>
													<ul class="acnav__list acnav__list--level3">
													<li><a class="acnav__link acnav__link--level3" href="<?php echo e(route('selling-price-setup.index')); ?>">Selling Price Setup</a></li>
                       
                                 						</ul>
										</li>
										</ul>	
				
			</li>
			
			
			<!--7th li menu-->
			<li class="has-children"><div class="acnav__label">   <i class="fa fa-stack-exchange" aria-hidden="true"></i> POS </div> 
				
				<ul class="acnav__list acnav__list--level2">	
											<!--1st Add sub menu-->	
									<li class="has-children">
													<div class="acnav__label acnav__label--level2">POS</div>
													<ul class="acnav__list acnav__list--level3">
														
													<li><a class="acnav__link acnav__link--level3" href="<?php echo e(route('pos.index')); ?>">POS</a></li>
                      
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
  <div class="container-fuild" style="background:#28a745">
<div class="text-right pr-3">
<div class="top_nav">
     <div class="nav_menu">
       <nav>    

         <ul class="nav navbar-nav navbar-right navtopadmin">
           
           <li role="presentation" class="dropdown">
         <a href="javascript:;" class="user-profile dropdown-toggle admintext" data-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-user" aria-hidden="true"></i> Admin</a>
             <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
               <li class="text-center Adminimage">
                 <a>
                   <span><i class="fa fa-user" aria-hidden="true" style="font-size:40px !important; color:#fff"></i>
<br/>
               
                   <span class="message">
                       Admin <br/>
                       </span>
                 </a>
               </li>
             
               <li>
                 <div class="text-center">
                   <a class="changepass" href="<?php echo e(url('master/password_change/index')); ?>">
                     <strong><i class="fa fa-lock" aria-hidden="true"></i> Change Password</strong>
                   </a>

 <a class="logout" href="<?php echo e(url('logout')); ?>">
                     <strong><i class="fa fa-sign-out" aria-hidden="true"></i> Sign Out</strong>
                   </a>
                 </div>
               </li>
             </ul>
           </li>
         </ul>
       </nav>
     </div>
   </div>
</div>
</div>
  <?php /**PATH C:\xampp\htdocs\ns_pollachi\resources\views/admin/layout/header.blade.php ENDPATH**/ ?>