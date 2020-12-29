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
													</ul>
										</li>
											<li class="has-children">
													<div class="acnav__label acnav__label--level2">Employee</div>
													<ul class="acnav__list acnav__list--level3">
														
                              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('department_list')): ?>
                            <li><a class="acnav__link acnav__link--level3" href="<?php echo e(url('master/department')); ?>">Department</a></li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('desigination_list')): ?>
                            <li><a class="acnav__link acnav__link--level3" href="<?php echo e(url('master/designation')); ?>">Desigination</a></li>
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
                          <li><a class="acnav__link acnav__link--level3" href="<?php echo e(url('master/user')); ?>">User</a></li>
                          <?php endif; ?>
                          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role_list')): ?>
                          <li><a class="acnav__link acnav__link--level3" href="<?php echo e(url('master/role')); ?>">Role</a></li>
                          <?php endif; ?>
													</ul>
										</li>
										<li class="has-children">
													<div class="acnav__label acnav__label--level2">Accounts</div>
													<ul class="acnav__list acnav__list--level3">
														
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('gift_voucher_matser_list')): ?>
                            <li><a class="acnav__link acnav__link--level3" href="<?php echo e(url('master/gift-voucher')); ?>">Gift Voucher</a></li>
                            <li><a class="acnav__link acnav__link--level3" href="<?php echo e(url('master/offers')); ?>">Offers</a></li>
                            <?php endif; ?>
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
  </nav><?php /**PATH C:\xampp\htdocs\ns_pollachi\resources\views/admin/layout/header.blade.php ENDPATH**/ ?>