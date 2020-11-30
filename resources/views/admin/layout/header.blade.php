<!doctype html>
<html lang="en">
  <head>
  <title>Ns Pollachi</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

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
    <!-- main js -->
    <script src="{{asset('assets/js/jquery-3.3.1.js')}}"></script>

    <script type="text/javascript">
      var APP_URL = {!! json_encode(url('/')) !!}
      </script>
    
    

  </head>
  <body>

  <div class="container-fluid px-0">
<!-- header -->
    <div class="row mx-0 header">
    <div class="col-12 px-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-green px-2 py-0">
      <a class="navbar-brand" href="#"><img src="{{asset('assets/image/logo.png')}}" class="img-fluid" alt="logo" /></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
         <li class="nav-item active">
            <a class="nav-link" href="#">Dashboard</a>
          </li>
        <!--  <li class="nav-item">
            <a class="nav-link" href="#">Favourties</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Daily Task
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Transactions
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li> -->
          <li class="nav-item dropdown menu-large">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Masters
            </a>
            <ul class="dropdown-menu megamenu">
                    <div class="row mx-0">
                   @if(Gate::check('state_list') || Gate::check('district_list') || Gate::check('city_list') || Gate::check('location_type_list') || Gate::check('address_type') || Gate::check('location_list'))
                    <li class="col-md-3 dropdown-item">
                        <ul>
                            <li class="dropdown-header">Location</li>
                            @can('state_list')
                            <li><a href="{{url('master/state')}}">State</a></li>
                            @endcan
                            @can('district_list')
                            <li><a href="{{url('master/district')}}">District</a></li>
                            @endcan
                            @can('city_list')
                            <li><a href="{{url('master/city')}}">City</a></li>
                            @endcan
                            @can('location_type_list')
                            <li><a href="{{url('master/location-type')}}">Location Type</a></li>
                            @endcan
                            @can('address_type_list')
                            <li><a href="{{url('master/address-type')}}">Address Type</a></li>
                            @endcan
                            @can('location_list')
                            <li><a href="{{url('master/location')}}">Company Location</a></li>
                            @endcan
                            <li><a href="{{ url('master/ho_details')}}">Head Office Details</a></li>
                        </ul>
                    </li>
                    @endif
                    @if(Gate::check('bank_list') || Gate::check('bank_branch_list') || Gate::check('denomination_list') || Gate::check('accounts_type_list'))
                    <li class="col-md-3 dropdown-item">
                        <ul>
                            <li class="dropdown-header">Bank</li>
                            @can('bank_list')
                            <li><a href="{{url('master/bank')}}">Bank</a></li>
                            @endcan
                            @can('bank_branch_list')
                            <li><a href="{{url('master/bank-branch')}}">Bank Branch</a></li>
                            @endcan
                            @can('denomination_list')
                            <li><a href="{{url('master/denomination')}}">Denomination</a></li>
                            @endcan
                            @can('accounts_type_list')
                            <li><a href="{{url('master/accounts-type')}}">Accounts Type</a></li>
                            @endcan
                        </ul>
                    </li>
                    @endif
                    @if(Gate::check('department_list') || Gate::check('desigination_list') || Gate::check('employee_list'))
                    <li class="col-md-3 dropdown-item">
                        <ul>
                            <li class="dropdown-header">Employee</li>
                            @can('department_list')
                            <li><a href="{{url('master/department')}}">Department</a></li>
                            @endcan
                            @can('desigination_list')
                            <li><a href="{{url('master/designation')}}">Desigination</a></li>
                            @endcan
                            @can('employee_list')
                            <li><a href="{{url('master/employee')}}">Employee</a></li>
                            @endcan
                        </ul>
                    </li>
                    @endif
                    @if(Gate::check('user_list') || Gate::check('role_list'))
                    <li class="col-md-3 dropdown-item">
                      <ul>
                          <li class="dropdown-header">User</li>
                          @can('user_list')
                          <li><a href="{{url('master/user')}}">User</a></li>
                          @endcan
                          @can('role_list')
                          <li><a href="{{url('master/role')}}">Role</a></li>
                          @endcan
                           </ul>
                  </li>
                  @endif
                  @if(Gate::check('expense_list') || Gate::check('income_list') || Gate::check('gst_master_list') || Gate::check('gift_voucher_matser_list'))
                    <li class="col-md-3 dropdown-item">
                        <ul>
                           
                            <li class="dropdown-header">Accounts</li>
                            <!-- @can('expense_list')
                            <li><a href="{{url('master/expense-type')}}">Expense</a></li>
                            @endcan
                            @can('income_list')
                            <li><a href="{{url('master/income-type')}}">Income</a></li>
                            @endcan -->
                           <!-- @can('gst_master_list')
                            <li><a href="{{url('master/gst-type')}}">Gst</a></li>
                            @endcan -->
                            @can('gift_voucher_matser_list')
                            <li><a href="{{url('master/gift-voucher')}}">Gift Voucher</a></li>
                            @endcan
                        </ul>
                    </li>
                    @endif




                   
                    @if(Gate::check('category_list') || Gate::check('category_1_master_list') || Gate::check('category_2_master_list') || Gate::check('category_3_master_list') || Gate::check('brand_master_list'))
                    <li class="col-md-3 dropdown-item">
                        <ul>
                          <li class="dropdown-header">Category</li>
                            @can('category_list')
                            <li><a href="{{url('master/category')}}">Category </a></li>
                            @endcan

                            @can('brand_list')
                            <li><a href="{{url('master/brand')}}">Brand </a></li>
                            @endcan
                            <!--
                             @can('category_name_master_list')
                            <li><a href="{{url('master/category-name')}}">Category Name</a></li>
                            @endcan
                            @can('category_1_master_list')
                            <li><a href="{{url('master/category-one')}}">Category 1</a></li>
                            @endcan
                            @can('category_2_master_list')
                            <li><a href="{{url('master/category-two')}}">Category 2</a></li>
                            @endcan
                            @can('category_3_master_list')
                            <li><a href="{{url('master/category-three')}}">Category 3</a></li>
                            @endcan -->
                         </ul>
                    </li>
                    @endif

                    @if(Gate::check('language_master_list'))
                    <li class="col-md-3 dropdown-item">
                      <ul>
                          <li class="dropdown-header">Language</li>
                          @can('language_master_list')
                           <li><a href="{{url('master/language')}}">Language</a></li>
                           @endcan
                          </ul>
                  </li>
                  @endif
               
                  @if(Gate::check('uom_list') || Gate::check('item_master_list') || Gate::check('item_tax_details_list'))
                    <li class="col-md-3 dropdown-item">
                      <ul>
                          <li class="dropdown-header">Item</li>
                          @can('uom_list')
                          <li><a href="{{url('master/uom')}}">Uom</a></li>
                          @endcan
                          <li><a href="{{route('tax.index')}}">Tax</a></li>
                          @can('item_master_list')
                          <li><a href="{{url('master/item')}}">Item</a></li>
                          @endcan
                          @can('item_tax_details_list')
                          <li><a href="{{url('master/item-tax-details')}}">Item Tax Details</a></li>
                          @endcan
                        
                      </ul>
                  </li>
                  @endif

                  @if(Gate::check('agent_list') || Gate::check('customer_list') || Gate::check('supplier_list'))
                    <li class="col-md-3 dropdown-item">
                        <ul>
                            <li class="dropdown-header">Vendor</li>
                            @can('agent_list')
                            <li><a href="{{url('master/agent')}}">Agent</a></li>
                            @endcan
                          @can('customer_list')
                            <li><a href="{{url('master/customer')}}">Customer</a></li>
                            @endcan
                          @can('supplier_list')
                            <li><a href="{{url('master/supplier')}}">Supplier</a></li>
                            @endcan
                            <li><a href="{{route('sales_man.index')}}">Sales Man</a></li>
                         
                          </ul>
                    </li>
                    @endif
                    @if(Gate::check('area_list'))
                    <li class="col-md-3 dropdown-item">
                      <ul>
                          <li class="dropdown-header">Area</li>
                          @can('area_list')
                          <li><a href="{{url('master/area')}}">Area</a></li>
                          @endcan
                           </ul>
                  </li>
                  @endif

                  <li class="col-md-3 dropdown-item">
                      <ul>
                          <li class="dropdown-header">Account Group</li>
                          <li><a href="{{route('account_group.index')}}">Account Group</a></li>
                          <li><a href="{{route('account_head.index')}}">Account Head</a></li>
                          <li><a href="{{route('account_group_tax.index')}}">Tax For Account Group</a></li>
                           </ul>
                  </li>

                  
                    
            </ul>        
            
            
          </li>



<!-- <li class="nav-item dropdown menu-large">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Estimation
            </a>
            <ul class="dropdown-menu megamenu">
                    <div class="row mx-0">
                   <li class="col-md-3 dropdown-item">
                        <ul>
                            <li class="dropdown-header">Estimation</li>
                           
                            <li><a href="{{ route('estimation.index') }}">Estimation</a></li> -->
                            <!-- <li><a href="{{ route('taxdummy.index') }}">TaxDummy</a></li> -->
                            <!-- <li><a href="{{ route('cart.index') }}">Cart</a></li> -->
                            
                            
                        <!-- </ul>
                    </li> -->
                    <!-- <li class="col-md-3 dropdown-item">
                        <ul>
                            <li class="dropdown-header">Gate Pass Entry</li>
                           
                            <li><a href="{{ route('gate_pass_entry.index') }}">Gate Pass Entry</a></li>
                            
                            <li><a href="{{ route('cart.index') }}">Cart</a></li>
                            
                            
                        </ul>
                    </li> -->
                    
                    
            <!-- </ul>        
            
            
          </li>
 -->
          <li class="nav-item dropdown menu-large">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Transactions
            </a>
            <ul class="dropdown-menu megamenu">
                    <div class="row mx-0">
                   
                    <li class="col-md-3 dropdown-item">
                        <ul>

                            <li class="dropdown-header">Purchase</li>
                           <li><a href="{{ url('estimation/index/0') }}">Estimation</a></li>
                            <li><a href="{{ url('purchase_order/index/0') }}">Purchase order</a></li>
                            <li><a href="{{ url('receipt_note/index/0') }}">Receipt Note</a></li>
                            <li><a href="{{ url('purchase_entry/index/0') }}">Purchase Entry</a></li>
                            <li><a href="{{ url('rejection_out/index/0') }}">Rejection Out</a></li>
                            <li><a href="{{ url('purchase_gatepass_entry/index/0') }}">Purchase Gate Pass Entry</a></li>
                            <li><a href="{{ url('debit_note/index/0') }}">Debit Note</a></li>
                            
                        </ul>
                    </li>

                    <li class="col-md-3 dropdown-item">
                        <ul>
                        <li class="dropdown-header">Sales</li>
                        <li><a href="{{ url('sales_estimation/index/0') }}">Sales Estimation</a></li>
                        <li><a href="{{ url('sale_order/index/0') }}">Sales Order</a></li>
                        <li><a href="{{ url('delivery_note/index/0') }}">Delivery Note</a></li>
                        <li><a href="{{ url('sales_entry/index/0') }}">Sales Entry</a></li>
                        <li><a href="{{ url('rejection_in/index/0') }}">Rejection In</a></li>
                        <li><a href="{{ url('sales_gatepass_entry/index/0') }}">Sales Gate Pass Entry</a></li>
                        <li><a href="{{ url('credit_note/index/0') }}">Credit Note</a></li>
                        </ul>
                    </li>

                    <li class="col-md-3 dropdown-item">
                        <ul>
                            <li class="dropdown-header">Payment</li>
                           
                           <li><a href="{{ route('payment_request.index') }}">Payment Request</a></li>
                            <li><a href="{{ route('payment_process.index') }}">Payment Process</a></li>
                            <li><a href="{{ route('payment_expense.index') }}">Payment Of Expenses</a></li>
                            
                        </ul>
                    </li>

                    <li class="col-md-3 dropdown-item">
                        <ul>
                            <li class="dropdown-header">Receipt</li>
                           
                           <li><a href="{{ route('receipt_request.index') }}">Receipt Request</a></li>
                            <li><a href="{{ route('receipt_process.index') }}">Receipt Process</a></li>
                            <li><a href="{{ route('receipt_income.index') }}">Receipt Of Income</a></li>
                            
                        </ul>
                    </li>

                    <li class="col-md-3 dropdown-item">
                        <ul>
                            <li class="dropdown-header">Advance Settlement</li>
                           
                           <li><a href="{{ route('advance_settlement_supplier.create') }}">Advance Settlement For Supplier</a></li>
                            <li><a href="{{ route('advance_settlement_customer.create') }}">Advance Settlement For Customer</a></li>
                            
                        </ul>
                    </li>
                    
                    
            </ul>        
            
            
          </li>

          <!-- <li class="nav-item dropdown menu-large">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Sales
            </a>
            <ul class="dropdown-menu megamenu">
                    <div class="row mx-0">
                   
                    <li class="col-md-3 dropdown-item">
                        <ul>
                        <li class="dropdown-header">Sales</li>
                        <li><a href="{{ url('sales_estimation/index/0') }}">Sales Estimation</a></li>
                        <li><a href="{{ url('sale_order/index/0') }}">Sales Order</a></li>
                        <li><a href="{{ url('delivery_note/index/0') }}">Delivery Note</a></li>
                        <li><a href="{{ url('sales_entry/index/0') }}">Sales Entry</a></li>
                        <li><a href="{{ url('rejection_in/index/0') }}">Rejection In</a></li>
                        <li><a href="{{ url('sales_gatepass_entry/index/0') }}">Sales Gate Pass Entry</a></li>
                        <li><a href="{{ url('credit_note/index/0') }}">Credit Note</a></li>
                        </ul>
                    </li>
                    
                    
            </ul>        
            
            
          </li> -->

          <!-- <li class="nav-item dropdown menu-large">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Payment
            </a>
            <ul class="dropdown-menu megamenu">
                    <div class="row mx-0">
                   <li class="col-md-3 dropdown-item">
                        <ul>
                            <li class="dropdown-header">Payment</li>
                           
                           <li><a href="{{ route('payment_request.index') }}">Payment Request</a></li>
                            <li><a href="{{ route('payment_process.index') }}">Payment Process</a></li>
                            <li><a href="{{ route('payment_expense.index') }}">Payment Of Expenses</a></li>
                            
                        </ul>
                    </li>
                    
            </ul>        
            
            
          </li> -->

          <!-- <li class="nav-item dropdown menu-large">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Receipt
            </a>
            <ul class="dropdown-menu megamenu">
                    <div class="row mx-0">
                   <li class="col-md-3 dropdown-item">
                        <ul>
                            <li class="dropdown-header">Receipt</li>
                           
                           <li><a href="{{ route('receipt_request.index') }}">Receipt Request</a></li>
                            <li><a href="{{ route('receipt_process.index') }}">Receipt Process</a></li>
                            <li><a href="{{ route('receipt_income.index') }}">Receipt Of Income</a></li>
                            
                        </ul>
                    </li>
                    
            </ul>        
            
            
          </li> -->

          <!-- <li class="nav-item dropdown menu-large">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Advance Settlement
            </a>
            <ul class="dropdown-menu megamenu">
                    <div class="row mx-0">
                   <li class="col-md-3 dropdown-item">
                        <ul>
                            <li class="dropdown-header">Advance Settlement</li>
                           
                           <li><a href="{{ route('advance_settlement_supplier.create') }}">Advance Settlement For Supplier</a></li>
                            <li><a href="{{ route('advance_settlement_customer.create') }}">Advance Settlement For Customer</a></li>
                            
                        </ul>
                    </li>
                    
            </ul>        
            
            
          </li> -->

          <li class="nav-item dropdown menu-large">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Price Updation
            </a>
            <ul class="dropdown-menu megamenu">
                    <div class="row mx-0">
                   <li class="col-md-3 dropdown-item">
                        <ul>

                            <li class="dropdown-header">Price Updation</li>
                           <li><a href="{{ route('price_updation.index') }}">Mark Up and Mark Down</a></li>
                            
                        </ul>
                    </li>

            </ul>        
            
            
          </li>

          <li class="nav-item dropdown menu-large">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Registers
            </a>
            <ul class="dropdown-menu megamenu">
                    <div class="row mx-0">
                   <li class="col-md-3 dropdown-item">
                        <ul>

                            <li class="dropdown-header">Purchase</li>
                           <li><a href="{{ url('estimation/index/1') }}">Purchase Estimation</a></li>
                            <li><a href="{{ url('purchase_order/index/1') }}">Purchase order</a></li>
                            <li><a href="{{ url('receipt_note/index/1') }}">Receipt Note</a></li>
                            <li><a href="{{ url('purchase_entry/index/1') }}">Purchase Entry</a></li>
                            <li><a href="{{ url('rejection_out/index/1') }}">Rejection Out</a></li>
                            <li><a href="{{ url('purchase_gatepass_entry/index/1') }}">Purchase Gate Pass Entry</a></li>
                            <li><a href="{{ url('debit_note/index/1') }}">Debit Note</a></li>
                            
                        </ul>
                    </li>

                    <li class="col-md-3 dropdown-item">
                        <ul>
                        <li class="dropdown-header">Sales</li>
                        <li><a href="{{ url('sales_estimation/index/1') }}">Sales Estimation</a></li>
                        <li><a href="{{ url('sale_order/index/1') }}">Sales Order</a></li>
                        <li><a href="{{ url('delivery_note/index/1') }}">Delivery Note</a></li>
                        <li><a href="{{ url('sales_entry/index/1') }}">Sales Entry</a></li>
                        <li><a href="{{ url('rejection_in/index/1') }}">Rejection In</a></li>
                        <li><a href="{{ url('sales_gatepass_entry/index/1') }}">Sales Gate Pass Entry</a></li>
                        <li><a href="{{ url('credit_note/index/1') }}">Credit Note</a></li>
                        </ul>
                    </li>
                    
            </ul>        
            
            
          </li>

          <li class="nav-item dropdown menu-large">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Outstanding
            </a>
            <ul class="dropdown-menu megamenu">
                    <div class="row mx-0">
                   <li class="col-md-3 dropdown-item">
                        <ul>

                            <li class="dropdown-header">Receivables</li>
                           <li><a href="{{ route('receivable_billwise.index') }}">Bill Wise</a></li>
                            <li><a href="{{ route('receivable_partywise.index') }}">Party Wise</a></li>
                            
                        </ul>
                    </li>

                    <li class="col-md-3 dropdown-item">
                        <ul>
                        <li class="dropdown-header">Payables</li>
                        <li><a href="{{ route('payable_billwise.index') }}">Bill Wise</a></li>
                        <li><a href="{{ route('payable_partywise.index') }}">Party Wise</a></li>
                        </ul>
                    </li>
                    
            </ul>        
            
            
          </li>



          <li class="nav-item dropdown menu-large">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Reports
            </a>
            <ul class="dropdown-menu megamenu">
                    <div class="row mx-0">
                   <li class="col-md-3 dropdown-item">
                        <ul>

                            <li class="dropdown-header">Day Book</li>
                           <li><a href="{{ route('daybook.index') }}">Day Book</a></li>
                            
                        </ul>
                    </li>

                    <li class="col-md-3 dropdown-item">
                        <ul>

                            <li class="dropdown-header">Stock Reports</li>
                           <li><a href="{{ route('stock_summary.index') }}">Stock Summary</a></li>
                           <li><a href="{{ route('stock_ageing.index') }}">Stock Ageing</a></li>
                            
                        </ul>
                    </li>

                    <li class="col-md-3 dropdown-item">
                        <ul>

                            <li class="dropdown-header">Individual Ledger</li>
                           <li><a href="{{ route('individual_ledger.index') }}">Individual Ledger</a></li>
                            
                        </ul>
                    </li>

                    <li class="col-md-3 dropdown-item">
                        <ul>

                            <li class="dropdown-header">GST Report</li>
                           <li><a href="{{ route('gst_report.index') }}">GST Report</a></li>
                            
                        </ul>
                    </li>
                    
            </ul>        
            
            
          </li>

          <li class="nav-item dropdown menu-large">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Settings
            </a>
            <ul class="dropdown-menu megamenu">
                    <div class="row mx-0">
                   <li class="col-md-3 dropdown-item">
                        <ul>

                            <li class="dropdown-header">selling Price</li>
                           <li><a href="{{ route('selling-price-setup.index') }}">Selling Price Setup</a></li>
                        </ul>
                    </li>
                    
            </ul>        
            
            
          </li>

          
        </ul>
        <ul class="navbar-nav ml-auto login">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Admin
          <!--  <span>     
              <img src="./" alt="..." class="admin-logo">
            </span> -->
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Profile</a>
            @if (Auth::user())
            <a class="dropdown-item" href="{{url('logout')}}">Logout</a>
            @endif
          
          </div>
        </li>
      </ul>
      </div>
    </nav>
  </div>
  </div>
    <!-- end.!@ -->
	
	
	
    @if ($message=Session::get('success'))
   
    <!-- <div class="alert alert-success alert-dismissible fade show container py-1 mt-2 mb-0" role="alert"> -->
    <div class="alert alert-success alert-dismissible fade show " role="alert">
      <strong>{{ $message }}</strong>
      <button type="button" class="close py-1" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>  
  
    @endif

    @if ($message=Session::get('failure'))
    
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>{{ $message }}</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>  
   
       
    @endif

    @if (isset($errors) && count($errors)>0)
   
    <div class="alert alert-danger alert-dismissible fade show container py-1 mt-2 mb-0" role="alert">
      <strong>Validation Errros </strong>
      <button type="button" class="close py-1" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>  
  
    @endif