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

   .headercloseicons{color: #fff;
    background: green;
    padding: 6px;
    border-radius: 5px; margin-right: 10px;}
    .headercloseicons:hover{color: #fff;
    background: #000;
    text-decoration: none;
   }
   </style>
    

  </head>
  <body>

  
<div class="page-wrapper chiller-theme toggled">
  <nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
      <div class="sidebar-brand">
        <a href="{{ url('/') }}">
      <img src="{{asset('assets/image/logo.png')}}" class="img-fluid dashboardlog" alt="logo">
    </a>
  
   <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
    <i class="fas fa-bars"></i>
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
    <a href="{{url('/')}}">
    <div class="acnav__label">
           Home <i class="fa fa-tachometer fonticonright" aria-hidden="true"></i> 
        </div>
        </a>
      <li class="has-children">
        <div class="acnav__label">
         Masters     <i class="fa fa-database fonticonright" aria-hidden="true"></i> 
        </div>
                <!--sub menu-->
                <ul class="acnav__list acnav__list--level2">  
                      <!--1st Add sub menu--> 
                  <li class="has-children">
                          <div class="acnav__label acnav__label--level2">Location  <i class="fa fa-globe fonticonright" aria-hidden="true"></i> </div>
                          <ul class="acnav__list acnav__list--level3">
                            
                            @can('state_list')
                            <li><a class="acnav__link acnav__link--level3" href="{{url('master/state')}}">State   <i class="fa fa-map-marker fonticonright sublisticon" aria-hidden="true"></i> </a> </li>
                            @endcan
                            @can('district_list')
                            <li><a class="acnav__link acnav__link--level3" href="{{url('master/district')}}">District   <i class="fa fa-location-arrow fonticonright sublisticon" aria-hidden="true"></i></a></li>
                            @endcan
                            @can('city_list')
                            <li><a class="acnav__link acnav__link--level3" href="{{url('master/city')}}">City<i class="fa fa-building-o fonticonright sublisticon" aria-hidden="true"></i></a></li>
                            @endcan
                            @can('location_type_list')
                            <li><a class="acnav__link acnav__link--level3" href="{{url('master/location-type')}}">Location Type<i class="fa fa-compass fonticonright sublisticon" aria-hidden="true"></i></a></li>
                            @endcan
                            @can('address_type_list')
                            <li><a class="acnav__link acnav__link--level3" href="{{url('master/address-type')}}">Address Type<i class="fa fa-address-card fonticonright sublisticon" aria-hidden="true"></i></a></li>
                            @endcan
                            @can('company_location_list')
                            <li><a class="acnav__link acnav__link--level3" href="{{url('master/location')}}">Company Location<i class="fa fa-building-o fonticonright sublisticon" aria-hidden="true"></i></a></li>
                            @endcan
                            <li><a class="acnav__link acnav__link--level3" href="{{ url('master/ho_details')}}">Head Office Details<i class="fa fa-briefcase fonticonright sublisticon" aria-hidden="true"></i></a></li>
                          </ul>
                    </li>
                    
                    <!--2nd Add sub menu--> 
                    <li class="has-children">
                          <div class="acnav__label acnav__label--level2">Bank<i class="fa fa-university fonticonright" aria-hidden="true"></i></div>
                          <ul class="acnav__list acnav__list--level3">
                            
                            @can('bank_list')
                            <li><a class="acnav__link acnav__link--level3" href="{{url('master/bank')}}">Bank<i class="fa fa-university fonticonright sublisticon" aria-hidden="true"></i></a></li>
                            @endcan
                            @can('bank_branch_list')
                            <li><a class="acnav__link acnav__link--level3" href="{{url('master/bank-branch')}}">Bank Branch<i class="fa fa-building-o fonticonright sublisticon" aria-hidden="true"></i></a></li>
                            @endcan
                            @can('denomination_list')
                            <li><a class="acnav__link acnav__link--level3" href="{{url('master/denomination')}}">Denomination<i class="fa fa-object-group fonticonright sublisticon" aria-hidden="true"></i></a></li>
                            @endcan
                            @can('accounts_type_list')
                            <li><a class="acnav__link acnav__link--level3" href="{{url('master/accounts-type')}}">Accounts Type<i class="fa fa-file-text-o fonticonright sublisticon" aria-hidden="true"></i></a></li>
                            @endcan
                            <li><a class="acnav__link acnav__link--level3" href="{{route('company-bank.index')}}">Company Bank<i class="fa fa-university fonticonright sublisticon" aria-hidden="true"></i></a></li>
                          </ul>
                    </li>
                      <li class="has-children">
                          <div class="acnav__label acnav__label--level2">Employee<i class="fa fa-male fonticonright" aria-hidden="true"></i></div>
                          <ul class="acnav__list acnav__list--level3">
                            
                              @can('department_list')
                            <li><a class="acnav__link acnav__link--level3" href="{{url('master/department')}}">Department<i class="fa fa-puzzle-piece fonticonright sublisticon" aria-hidden="true"></i></a></li>
                            @endcan
                            @can('desigination_list')
                            <li><a class="acnav__link acnav__link--level3" href="{{url('master/designation')}}">Role<i class="fa fa-play fonticonright sublisticon" aria-hidden="true"></i></a></li>
                            @endcan
                            @can('employee_list')
                            <li><a class="acnav__link acnav__link--level3" href="{{url('master/employee')}}">Employee<i class="fa fa-male fonticonright sublisticon" aria-hidden="true"></i></a></li>
                            @endcan
                          </ul>
                    </li>
                    <li class="has-children">
                          <div class="acnav__label acnav__label--level2">User<i class="fa fa-users fonticonright" aria-hidden="true"></i></div>
                          <ul class="acnav__list acnav__list--level3">
                            
                            @can('user_list')
                          <li><a class="acnav__link acnav__link--level3" href="{{url('master/user')}}">User Creation<i class="fa fa-user-plus fonticonright sublisticon" aria-hidden="true"></i></a></li>
                          @endcan
                          @can('role_list')
                          <li><a class="acnav__link acnav__link--level3" href="{{url('master/role')}}">User Access<i class="fa fa-universal-access fonticonright sublisticon" aria-hidden="true"></i></a></li>
                          @endcan
                          </ul>
                    </li>
                    <li class="has-children">
                          <div class="acnav__label acnav__label--level2">Offers<i class="fa fa-gift fonticonright" aria-hidden="true"></i></div>
                          <ul class="acnav__list acnav__list--level3">
                            
                            @can('gift_voucher_matser_list')
                            <li><a class="acnav__link acnav__link--level3" href="{{url('master/gift-voucher')}}">Gift Voucher<i class="fa fa-sticky-note fonticonright sublisticon" aria-hidden="true"></i></a></li>
                            <li><a class="acnav__link acnav__link--level3" href="{{url('master/offers')}}">Offers<i class="fa fa-gift fonticonright sublisticon" aria-hidden="true"></i></a></li>
                            @endcan
                            <li><a class="acnav__link acnav__link--level3" href="{{url('master/itemwiseoffer')}}">Itemwise Offers<i class="fa fa-archive fonticonright sublisticon" aria-hidden="true"></i></a></li>
                            <li><a class="acnav__link acnav__link--level3" href="{{url('master/item_wastage')}}">Item Wastage<i class="fa fa-trash fonticonright sublisticon" aria-hidden="true"></i></a></li>

                          </ul>
                    </li>
                    <li class="has-children">
                          <div class="acnav__label acnav__label--level2">Category<i class="fa fa-th-large fonticonright" aria-hidden="true"></i></div>
                          <ul class="acnav__list acnav__list--level3">
                            
                           @can('category_name_master_list')
                            <li><a class="acnav__link acnav__link--level3" href="{{url('master/category')}}">Category <i class="fa fa-th-large fonticonright sublisticon" aria-hidden="true"></i></a></li>
                            @endcan

                            @can('brand_list')
                            <li><a class="acnav__link acnav__link--level3" href="{{url('master/brand')}}">Brand <i class="fa fa-tag fonticonright sublisticon" aria-hidden="true"></i></a></li>
                            @endcan
                          </ul>
                    </li>
                    <li class="has-children">
                          <div class="acnav__label acnav__label--level2">Language<i class="fa fa-language fonticonright" aria-hidden="true"></i></div>
                          <ul class="acnav__list acnav__list--level3">
                            
                           @can('language_master_list')
                           <li><a class="acnav__link acnav__link--level3" href="{{url('master/language')}}">Language<i class="fa fa-language fonticonright sublisticon" aria-hidden="true"></i></a></li>
                           @endcan
                          </ul>
                    </li>
                    <li class="has-children">
                          <div class="acnav__label acnav__label--level2">Item<i class="fa fa-shopping-cart fonticonright" aria-hidden="true"></i></div>
                          <ul class="acnav__list acnav__list--level3">
                            
                           @can('uom_list')
                          <li><a class="acnav__link acnav__link--level3" href="{{url('master/uom')}}">Uom<i class="fa fa-balance-scale fonticonright sublisticon" aria-hidden="true"></i></a></li>
                          @endcan
                          <li><a class="acnav__link acnav__link--level3" href="{{route('tax.index')}}">Tax<i class="fa fa-percent fonticonright sublisticon" aria-hidden="true"></i></a></li>
                          @can('item_master_list')
                          <li><a class="acnav__link acnav__link--level3" href="{{url('master/item')}}">Item<i class="fa fa-shopping-cart fonticonright sublisticon" aria-hidden="true"></i></a></li>
                          @endcan
                          @can('item_tax_details_list')
                          <li><a class="acnav__link acnav__link--level3" href="{{url('master/item-tax-details')}}">Item Tax Details<i class="fa fa-info fonticonright sublisticon" aria-hidden="true"></i></a></li>
                          @endcan
                          </ul>
                    </li>
                    
                      <li class="has-children">
                          <div class="acnav__label acnav__label--level2">Vendor<i class="fa fa-venus-double fonticonright" aria-hidden="true"></i></div>
                          <ul class="acnav__list acnav__list--level3">
                            
                          @can('agent_list')
                            <li><a class="acnav__link acnav__link--level3" href="{{url('master/agent')}}">Agent<i class="fa fa-venus fonticonright sublisticon" aria-hidden="true"></i></a></li>
                            @endcan
                          @can('customer_list')
                            <li><a class="acnav__link acnav__link--level3" href="{{url('master/customer')}}">Customer<i class="fa fa-male fonticonright sublisticon" aria-hidden="true"></i></a></li>
                            @endcan
                          @can('supplier_list')
                            <li><a class="acnav__link acnav__link--level3" href="{{url('master/supplier')}}">Supplier<i class="fa fa-user fonticonright sublisticon" aria-hidden="true"></i></a></li>
                            @endcan
                            <li><a class="acnav__link acnav__link--level3" href="{{route('sales_man.index')}}">Sales Man<i class="fa fa-venus-mars fonticonright sublisticon" aria-hidden="true"></i></a></li>
              
                          </ul>
                    </li>

                    <li class="has-children">
                          <div class="acnav__label acnav__label--level2">Price Level Settings<i class="fa fa-arrows-v fonticonright" aria-hidden="true"></i></div>
                          <ul class="acnav__list acnav__list--level3">
                            
                          <li><a class="acnav__link acnav__link--level3" href="{{route('price-level.index')}}">Price Levels<i class="fa fa-arrows-v fonticonright sublisticon" aria-hidden="true"></i></a></li>
                          </ul>
                    </li>
                    
                    <li class="has-children">
                          <div class="acnav__label acnav__label--level2">Area<i class="fa fa-map-marker fonticonright" aria-hidden="true"></i></div>
                          <ul class="acnav__list acnav__list--level3">
                            
                           @can('area_list')
                          <li><a class="acnav__link acnav__link--level3" href="{{url('master/area')}}">Area<i class="fa fa-map-marker fonticonright sublisticon" aria-hidden="true"></i></a></li>
                          @endcan
              
                          </ul>
                    </li>
                    
                    <li class="has-children">
                          <div class="acnav__label acnav__label--level2">Account Group<i class="fa fa-book fonticonright" aria-hidden="true"></i></div>
                          <ul class="acnav__list acnav__list--level3">
                            
                          <li><a class="acnav__link acnav__link--level3" href="{{route('account_group.index')}}">Account Group<i class="fa fa-book fonticonright sublisticon" aria-hidden="true"></i></a></li>
                          <li><a class="acnav__link acnav__link--level3" href="{{route('account_head.index')}}">Account Head</a></li>
                          <li><a class="acnav__link acnav__link--level3" href="{{route('account_group_tax.index')}}">Tax For Account Group</a></li>
              
                          </ul>
                    </li>
                    
                    <li class="has-children">
                          <div class="acnav__label acnav__label--level2">BOM<i class="fa fa-file-text-o fonticonright" aria-hidden="true"></i></div>
                          <ul class="acnav__list acnav__list--level3">
                            
                          <li><a class="acnav__link acnav__link--level3" href="{{route('bom.index')}}">BOM<i class="fa fa-file-text-o fonticonright sublisticon" aria-hidden="true"></i></a></li>
              
                          </ul>
                    </li>
                    
                    <li class="has-children">
                          <div class="acnav__label acnav__label--level2">Voucher Types<i class="fa fa-list-ol fonticonright" aria-hidden="true"></i></div>
                          <ul class="acnav__list acnav__list--level3">
                            
                          <li><a class="acnav__link acnav__link--level3" href="{{route('purchase-voucher-type.index')}}">Purchase Voucher Types<i class="fa fa-list fonticonright sublisticon" aria-hidden="true"></i></a></li>

                          <li><a class="acnav__link acnav__link--level3" href="{{route('sales-voucher-type.index')}}">Sales Voucher Types<i class="fa fa-list-alt fonticonright sublisticon" aria-hidden="true"></i></a></li>

                          <li><a class="acnav__link acnav__link--level3" href="{{route('payment-voucher-type.index')}}">Payment Voucher Types<i class="fa fa-bars fonticonright sublisticon" aria-hidden="true"></i></a></li>

                          <li><a class="acnav__link acnav__link--level3" href="{{route('receipt-voucher-type.index')}}">Receipt Voucher Types<i class="fa fa-list-ul fonticonright sublisticon" aria-hidden="true"></i></a></li>
                          </ul>
                    </li>
                    
                  </li>
                </ul>
                
                <!--sub menu-->
      </li>
      
      <!--2nd li menu-->

      <li class="has-children"><div class="acnav__label">  Transactions   <i class="fa fa-shopping-cart fonticonright" aria-hidden="true"></i> </div>
      <ul class="acnav__list acnav__list--level2">  
                      <!--1st Add sub menu--> 
                  <li class="has-children">
                          <div class="acnav__label acnav__label--level2">Purchase<i class="fa fa-credit-card-alt fonticonright" aria-hidden="true"></i></div>
                          <ul class="acnav__list acnav__list--level3">
                            
                           <li><a class="acnav__link acnav__link--level3" href="{{ url('estimation/index/0') }}">Estimation<i class="fa fa-calculator fonticonright sublisticon" aria-hidden="true"></i></a></li>
                            <li><a class="acnav__link acnav__link--level3" href="{{ url('purchase_order/index/0') }}">Purchase order<i class="fa fa-file-word-o fonticonright sublisticon" aria-hidden="true"></i></a></li>
                            <li><a class="acnav__link acnav__link--level3" href="{{ url('receipt_note/index/0') }}">Receipt Note<i class="fa fa-file-text-o fonticonright sublisticon" aria-hidden="true"></i></a></li>
                            <li><a class="acnav__link acnav__link--level3" href="{{ url('purchase_entry/index/0') }}">Purchase Entry<i class="fa fa-pencil-square-o fonticonright sublisticon" aria-hidden="true"></i></a></li>
                            <li><a class="acnav__link acnav__link--level3" href="{{ url('rejection_out/index/0') }}">Rejection Out<i class="fa fa-times fonticonright sublisticon" aria-hidden="true"></i></a></li>
                            <li><a class="acnav__link acnav__link--level3" href="{{ url('purchase_gatepass_entry/index/0') }}">Purchase Gate Pass Entry<i class="fa fa-ticket fonticonright sublisticon" aria-hidden="true"></i></a></li>
                            <li><a class="acnav__link acnav__link--level3" href="{{ url('debit_note/index/0') }}">Debit Note<i class="fa fa-ban fonticonright sublisticon" aria-hidden="true"></i></a></li>
                          </ul>
                    </li>
                    </ul>
                    
                    <ul class="acnav__list acnav__list--level2">  
                      <!--1st Add sub menu--> 
                  <li class="has-children">
                          <div class="acnav__label acnav__label--level2">Sales<i class="fa fa-line-chart fonticonright" aria-hidden="true"></i></div>
                          <ul class="acnav__list acnav__list--level3">
                            
                        <li><a class="acnav__link acnav__link--level3" href="{{ url('sales_estimation/index/0') }}">Sales Estimation<i class="fa fa-calculator fonticonright sublisticon" aria-hidden="true"></i></a></li>
                        <li><a class="acnav__link acnav__link--level3" href="{{ url('sale_order/index/0') }}">Sales Order<i class="fa fa-file-word-o fonticonright sublisticon" aria-hidden="true"></i></a></li>
                        <li><a class="acnav__link acnav__link--level3" href="{{ url('delivery_note/index/0') }}">Delivery Note<i class="fa fa-file-text-o fonticonright sublisticon" aria-hidden="true"></i></a></li>
                        <li><a class="acnav__link acnav__link--level3" href="{{ url('sales_entry/index/0') }}">Sales Entry<i class="fa fa-pencil-square-o fonticonright sublisticon" aria-hidden="true"></i></a></li>
                        <li><a class="acnav__link acnav__link--level3" href="{{ url('rejection_in/index/0') }}">Rejection In<i class="fa fa-times fonticonright sublisticon" aria-hidden="true"></i></a></li>
                        <li><a class="acnav__link acnav__link--level3" href="{{ url('sales_gatepass_entry/index/0') }}">Sales Gate Pass Entry<i class="fa fa-ticket fonticonright sublisticon" aria-hidden="true"></i></a></li>
                        <li><a class="acnav__link acnav__link--level3" href="{{ url('credit_note/index/0') }}">Credit Note<i class="fa fa-ban fonticonright sublisticon" aria-hidden="true"></i></a></li>
                          </ul>
                    </li>
                    </ul>
                    
                      <ul class="acnav__list acnav__list--level2">  
                      <!--1st Add sub menu--> 
                  <li class="has-children">
                          <div class="acnav__label acnav__label--level2">Payment<i class="fa fa-money fonticonright" aria-hidden="true"></i></div>
                          <ul class="acnav__list acnav__list--level3">
                            
                          <li><a  class="acnav__link acnav__link--level3" href="{{ route('payment_request.index') }}">Payment Request<i class="fa fa-info-circle fonticonright sublisticon" aria-hidden="true"></i></a></li>
                            <li><a class="acnav__link acnav__link--level3" href="{{ route('payment_process.index') }}">Payment Process<i class="fa fa-retweet fonticonright sublisticon" aria-hidden="true"></i></a></li>
                            <!-- <li><a class="acnav__link acnav__link--level3" href="{{ route('payment_expense.index') }}">Payment Of Expenses</a></li> -->
                </ul>
                    </li>
                    </ul>
      
      
                    <ul class="acnav__list acnav__list--level2">  
                      <!--1st Add sub menu--> 
                  <li class="has-children">
                          <div class="acnav__label acnav__label--level2">Receipt<i class="fa fa-sticky-note fonticonright" aria-hidden="true"></i></div>
                          <ul class="acnav__list acnav__list--level3">
                            
                          <li><a  class="acnav__link acnav__link--level3" href="{{ route('receipt_request.index') }}">Receipt Request<i class="fa fa-info-circle fonticonright sublisticon" aria-hidden="true"></i></a></li>
                            <li><a class="acnav__link acnav__link--level3" href="{{ route('receipt_process.index') }}">Receipt Process<i class="fa fa-retweet fonticonright sublisticon" aria-hidden="true"></i></a></li>
                            <li><a class="acnav__link acnav__link--level3" href="{{ route('receipt_income.index') }}">Receipt Of Income<i class="fa fa-money fonticonright sublisticon" aria-hidden="true"></i></a></li>  </ul>
                    </li>
                    </ul> 
                    
                      <ul class="acnav__list acnav__list--level2">  
                      <!--1st Add sub menu--> 
                  <li class="has-children">
                          <div class="acnav__label acnav__label--level2">Advance Settlement<i class="fa fa-forward fonticonright" aria-hidden="true"></i></div>
                          <ul class="acnav__list acnav__list--level3">
                            
                          <li><a class="acnav__link acnav__link--level3" href="{{ route('advance_settlement_supplier.create') }}">Advance to Suppliers<i class="fa fa-user fonticonright sublisticon" aria-hidden="true"></i></a></li>
                            <li><a class="acnav__link acnav__link--level3" href="{{ route('advance_settlement_customer.create') }}">Advance from Customers<i class="fa fa-male fonticonright sublisticon" aria-hidden="true"></i></a></li>
                                </ul>
                    </li>
                    </ul> 

                      <ul class="acnav__list acnav__list--level2">  
                      <!--1st Add sub menu--> 
                  <li class="has-children">
                          <div class="acnav__label acnav__label--level2">Account Expenses<i class="fa fa-usd fonticonright" aria-hidden="true"></i></div>
                          <ul class="acnav__list acnav__list--level3">
                            
                          <li><a class="acnav__link acnav__link--level3"  href="{{ route('expense.create') }}">Account Transaction<i class="fa fa-usd fonticonright sublisticon" aria-hidden="true"></i></a></li>
                        
                                </ul>
                    </li>
                    </ul> 
          <ul class="acnav__list acnav__list--level2">  
                      <!--1st Add sub menu--> 

                      <li class="has-children">
                          <div class="acnav__label acnav__label--level2">Production Module<i class="fa fa-product-hunt fonticonright" aria-hidden="true"></i></div>
                          <ul class="acnav__list acnav__list--level3">
                            
                          <li><a class="acnav__link acnav__link--level3"  href="{{url('production')}}">Production<i class="fa fa-product-hunt fonticonright sublisticon" aria-hidden="true"></i></a></li>
                        
                                </ul>

                      
                    </li>

                      <li class="has-children">
                          <div class="acnav__label acnav__label--level2">Uncleared Cheques<i class="fa fa-bookmark fonticonright" aria-hidden="true"></i></div>
                          <ul class="acnav__list acnav__list--level3">
                            
                          <li><a class="acnav__link acnav__link--level3"  href="{{ route('received.index') }}">Received </a></li>
                          
                          <li><a class="acnav__link acnav__link--level3"  href="{{ route('paid.index') }}">Paid</a></li>
                                </ul>

                      
                    </li>

                    </ul> 
      
      </li>
      
      

      <!--3rdt li menu-->
      <li class="has-children"><div class="acnav__label">   Price Updation  <i class="fa fa-tag fonticonright" aria-hidden="true"></i> </div>
          
          <ul class="acnav__list acnav__list--level2">  
                      <!--1st Add sub menu--> 
                  <li class="has-children">
                          
                          <li><a class="acnav__link acnav__link--level3" href="{{ route('price_updation.index') }}">Mark Up and Mark Down<i class="fa fa-tag fonticonright sublisticon" aria-hidden="true"></i></a></li>
                            
                    </li>
                    </ul>
      
      </li>
      
      
      <!--4th li menu-->
      <li class="has-children"><div class="acnav__label">   Registers    <i class="fa fa-file fonticonright" aria-hidden="true"></i></div>
      
          <ul class="acnav__list acnav__list--level2">  
                      <!--1st Add sub menu--> 
                  <li class="has-children">
                          <div class="acnav__label acnav__label--level2">Purchase<i class="fa fa-credit-card-alt fonticonright" aria-hidden="true"></i></div>
                          <ul class="acnav__list acnav__list--level3">
                            
                          <li><a class="acnav__link acnav__link--level3" href="{{ url('estimation/index/1') }}">Purchase Estimation<i class="fa fa-calculator fonticonright sublisticon" aria-hidden="true"></i></a></li>
                            <li><a class="acnav__link acnav__link--level3" href="{{ url('purchase_order/index/1') }}">Purchase order<i class="fa fa-file-word-o fonticonright sublisticon" aria-hidden="true"></i></a></li>
                            <li><a class="acnav__link acnav__link--level3" href="{{ url('receipt_note/index/1') }}">Receipt Note<i class="fa fa-file-text-o fonticonright sublisticon" aria-hidden="true"></i></a></li>
                            <li><a class="acnav__link acnav__link--level3" href="{{ url('purchase_entry/index/1') }}">Purchase Entry<i class="fa fa-pencil-square-o fonticonright sublisticon" aria-hidden="true"></i></a></li>
                            <li><a class="acnav__link acnav__link--level3" href="{{ url('rejection_out/index/1') }}">Rejection Out<i class="fa fa-times fonticonright sublisticon" aria-hidden="true"></i></a></li>
                            <li><a class="acnav__link acnav__link--level3"  href="{{ url('debit_note/index/1') }}">Debit Note<i class="fa fa-ban fonticonright sublisticon" aria-hidden="true"></i></a></li>    </ul>
                    </li>
                    </ul>
                    
                    <ul class="acnav__list acnav__list--level2">  
                      <!--1st Add sub menu--> 
                  <li class="has-children">
                          <div class="acnav__label acnav__label--level2">Sales<i class="fa fa-line-chart fonticonright" aria-hidden="true"></i></div>
                          <ul class="acnav__list acnav__list--level3">
                            
                          <li><a class="acnav__link acnav__link--level3" href="{{ url('sales_estimation/index/1') }}">Sales Estimation<i class="fa fa-calculator fonticonright sublisticon" aria-hidden="true"></i></a></li>
                        <li><a class="acnav__link acnav__link--level3" href="{{ url('sale_order/index/1') }}">Sales Order<i class="fa fa-file-word-o fonticonright sublisticon" aria-hidden="true"></i></a></li>
                        <li><a class="acnav__link acnav__link--level3" href="{{ url('delivery_note/index/1') }}">Delivery Note<i class="fa fa-file-text-o fonticonright sublisticon" aria-hidden="true"></i></a></li>
                        <li><a class="acnav__link acnav__link--level3" href="{{ url('sales_entry/index/1') }}">Sales Entry<i class="fa fa-pencil-square-o fonticonright sublisticon" aria-hidden="true"></i></a></li>
                        <li><a class="acnav__link acnav__link--level3" href="{{ url('rejection_in/index/1') }}">Rejection In<i class="fa fa-times fonticonright sublisticon" aria-hidden="true"></i></a></li>
                        <!-- <li><a class="acnav__link acnav__link--level3" href="{{ url('sales_gatepass_entry/index/1') }}">Sales Gate Pass Entry</a></li> -->
                        <li><a class="acnav__link acnav__link--level3" href="{{ url('credit_note/index/1') }}">Credit Note<i class="fa fa-ban fonticonright sublisticon" aria-hidden="true"></i></a></li>
                          </ul>
                    </li>
                    </ul>
      
      </li>
      
      <!--5th li menu-->
      <li class="has-children"><div class="acnav__label">    Outstanding   <i class="fa fa-list-alt fonticonright" aria-hidden="true"></i></div> 
      
        <ul class="acnav__list acnav__list--level2">  
                      <!--1st Add sub menu--> 
                  <li class="has-children">
                          <div class="acnav__label acnav__label--level2">Receivables</div>
                          <ul class="acnav__list acnav__list--level3">
                          <li><a class="acnav__link acnav__link--level3" href="{{ route('receivable_billwise.index') }}">Bill Wise</a></li>
                            <li><a class="acnav__link acnav__link--level3" href="{{ route('receivable_partywise.index') }}">Party Wise</a></li>               </ul>
                    </li>
                    </ul>
        
        <ul class="acnav__list acnav__list--level2">  
                      <!--1st Add sub menu--> 
                  <li class="has-children">
                          <div class="acnav__label acnav__label--level2">Payables</div>
                          <ul class="acnav__list acnav__list--level3">
                          <li><a class="acnav__link acnav__link--level3" href="{{ route('payable_billwise.index') }}">Bill Wise</a></li>
                        <li><a class="acnav__link acnav__link--level3" href="{{ route('payable_partywise.index') }}">Party Wise</a></li>    </ul>
                    </li>
                    </ul>
        
      </li>
      
      <!--5th li menu-->
      <li class="has-children"><div class="acnav__label">   Reports  <i class="fa fa-envelope fonticonright" aria-hidden="true"></i> </div> 
        
        <ul class="acnav__list acnav__list--level2">  
                      <!--1st Add sub menu--> 
                  <li class="has-children">
                          <div class="acnav__label acnav__label--level2">Day Book<i class="fa fa-book fonticonright" aria-hidden="true"></i></div>
                          <ul class="acnav__list acnav__list--level3">
                          <li><a  class="acnav__link acnav__link--level3"  href="{{ route('daybook.index') }}">Day Book<i class="fa fa-book fonticonright sublisticon" aria-hidden="true"></i></a></li>
                            
                                            </ul>
                    </li>
                    </ul>
                    
        <ul class="acnav__list acnav__list--level2">  
                      <!--1st Add sub menu--> 
                  <li class="has-children">
                          <div class="acnav__label acnav__label--level2">Stock Reports<i class="fa fa-area-chart fonticonright" aria-hidden="true"></i></div>
                          <ul class="acnav__list acnav__list--level3">
                          <li><a  class="acnav__link acnav__link--level3" href="{{ route('stock-report.index') }}">Stock Report<i class="fa fa-area-chart fonticonright sublisticon" aria-hidden="true"></i></a></li>
                           <li><a  class="acnav__link acnav__link--level3" href="{{ route('stock_summary.index') }}">Stock Summary<i class="fa fa-files-o fonticonright sublisticon" aria-hidden="true"></i></a></li>
                           <li><a  class="acnav__link acnav__link--level3" href="{{ route('stock_ageing.index') }}">Stock Ageing<i class="fa fa-bar-chart fonticonright sublisticon" aria-hidden="true"></i></a></li>
                            
                                            </ul>
                    </li>
                    </ul>           
        
        <ul class="acnav__list acnav__list--level2">  
                      <!--1st Add sub menu--> 
                  <li class="has-children">
                          <div class="acnav__label acnav__label--level2">Individual Ledger<i class="fa fa-file-text fonticonright" aria-hidden="true"></i></div>
                          <ul class="acnav__list acnav__list--level3">
                          <li><a  class="acnav__link acnav__link--level3" href="{{ route('individual_ledger.index') }}">Individual Ledger<i class="fa fa-file-text fonticonright sublisticon" aria-hidden="true"></i></a></li>
                              </ul>
                    </li>
                    </ul> 
                    
          <ul class="acnav__list acnav__list--level2">  
                      <!--1st Add sub menu--> 
                  <li class="has-children">
                          <div class="acnav__label acnav__label--level2">GST Report<i class="fa fa-percent fonticonright" aria-hidden="true"></i></div>
                          <ul class="acnav__list acnav__list--level3">
                          <li><a class="acnav__link acnav__link--level3" href="{{ route('gst_report.index') }}">GST Report<i class="fa fa-percent fonticonright sublisticon" aria-hidden="true"></i></a></li>
                            </ul>
                    </li>
                    </ul> 

                    <ul class="acnav__list acnav__list--level2">  
                      <!--1st Add sub menu--> 
                  <li class="has-children">
                          <div class="acnav__label acnav__label--level2">Last Purchase Cost Report<i class="fa fa-file-text fonticonright" aria-hidden="true"></i></div>
                          <ul class="acnav__list acnav__list--level3">
                          <li><a  class="acnav__link acnav__link--level3" href="{{ route('purchase_cost.index') }}">Last Purchase Cost<i class="fa fa-file-text fonticonright sublisticon" aria-hidden="true"></i></a></li>
                              </ul>
                    </li>
                    </ul>
        
      </li>
      
      <!--6th li menu-->
      <li class="has-children"><div class="acnav__label">    Settings  <i class="fa fa-cog fonticonright" aria-hidden="true"></i></div> 
      
        <ul class="acnav__list acnav__list--level2">  
                      <!--1st Add sub menu--> 
                  <li class="has-children">
                          <div class="acnav__label acnav__label--level2">Selling Price<i class="fa fa-cog fonticonright" aria-hidden="true"></i></div>
                          <ul class="acnav__list acnav__list--level3">
                          <li><a class="acnav__link acnav__link--level3" href="{{ route('selling-price-setup.index') }}">Selling Price Setup<i class="fa fa-cog fonticonright sublisticon" aria-hidden="true"></i></a></li>
                       
                                            </ul>
                    </li>

                    <li class="has-children">
                          <div class="acnav__label acnav__label--level2">Logo Settings<i class="fa fa-cog fonticonright" aria-hidden="true"></i></div>
                          <ul class="acnav__list acnav__list--level3">
                          <li><a class="acnav__link acnav__link--level3" href="{{ route('upload-logo.index') }}">Logo<i class="fa fa-picture-o fonticonright sublisticon" aria-hidden="true"></i></a></li>
                       
                                            </ul>
                    </li>
                    </ul> 
                    <ul class="acnav__list acnav__list--level2">  
                      <!--1st Add sub menu--> 
                  <!-- <li class="has-children">
                          <div class="acnav__label acnav__label--level2">Mail Setting</div>
                          <ul class="acnav__list acnav__list--level3">
                          <li><a class="acnav__link acnav__link--level3" href="{{ route('mailsetting-setup.index') }}">Mail Setup</a></li>
                       
                                            </ul>
                    </li> -->

                    </ul> 
        
      </li>
      
      
      <!--7th li menu-->
      <li class="has-children"><div class="acnav__label">  POS    <i class="fa fa-stack-exchange fonticonright" aria-hidden="true"></i></div> 
        
        <ul class="acnav__list acnav__list--level2">  
                      <!--1st Add sub menu--> 
                  <li class="has-children">
                          <div class="acnav__label acnav__label--level2">POS<i class="fa fa-stack-exchange fonticonright" aria-hidden="true"></i></div>
                          <ul class="acnav__list acnav__list--level3">
                            
                          <li><a class="acnav__link acnav__link--level3" href="{{ route('pos.index') }}">POS<i class="fa fa-stack-exchange fonticonright sublisticon" aria-hidden="true"></i></a></li>
                      
                                            </ul>
                    </li>
                    </ul> 
        
        
      </li>
      
      <li class="has-children"><div class="acnav__label">  User Validation <i class="fa fa-pencil fonticonright" aria-hidden="true"></i></div> 
        
        <ul class="acnav__list acnav__list--level3">
          
        <li><a class="acnav__link acnav__link--level3" href="{{ url('validation') }}">Validation<i class="fa fa-pencil fonticonright sublisticon" aria-hidden="true"></i></a></li>
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
 


         <a href="{{ url('/') }}"><i class="fa fa-close headercloseicons" aria-hidden="true" ></i></a> 
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
         <?php
         
         
         $id = auth()->user()->id;?>
                   <a class="changepass" href="{{ url('change-password/'.$id) }}">
                     <strong><i class="fa fa-lock" aria-hidden="true"></i> Change Password</strong>
                   </a>

 <a class="logout" href="{{url('logout')}}">
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
@if ($message=Session::get('success'))
   
   <!-- <div class="alert alert-success alert-dismissible fade show container py-1 mt-2 mb-0" role="alert"> -->
   <div class="alert alert-success alert-dismissible fade show " role="alert" align="center">
   <strong>{{ $message }}</strong>
   <button type="button" class="close py-1" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
   </button>
   </div>  
 
   @endif

   @if ($message=Session::get('failure'))
   
   <div class="alert alert-danger alert-dismissible fade show" role="alert" align="center">
   <strong>{{ $message }}</strong>
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
   </button>
   </div>  
  
    
   @endif

   @if (isset($errors) && count($errors)>0)
  
   <div class="alert alert-danger alert-dismissible fade show container py-1 mt-2 mb-0" role="alert" align="center">
   <strong>Validation Errros </strong>
   <button type="button" class="close py-1" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
   </button>
   </div>  
 
   @endif