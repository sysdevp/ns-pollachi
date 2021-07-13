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
														<li><a class="acnav__link acnav__link--level3" href=""> State</a></li>
														<li><a class="acnav__link acnav__link--level3" href="">District</a></li>
													</ul>
										</li>
										
										<!--2nd Add sub menu-->	
										<li class="has-children">
													<div class="acnav__label acnav__label--level2">Bank</div>
													<ul class="acnav__list acnav__list--level3">
														<li><a class="acnav__link acnav__link--level3" href="">Bank</a></li>
														<li><a class="acnav__link acnav__link--level3" href="">Bank Branch</a></li>
													</ul>
										</li>
													
												<!--Add sub menu-->			

													
												
									</li>
								</ul>
								
								<!--sub menu-->
			</li>
			
			<!--2nd li menu-->

			<li class="has-children"><div class="acnav__label"> <i class="fa fa-leaf" aria-hidden="true"></i>   Transactions</div></li>
			
			<!--3rdt li menu-->
			<li class="has-children"><div class="acnav__label"> <i class="fa fa-leaf" aria-hidden="true"></i>   Price Updation </div></li>
			
			
			<!--3rdt li menu-->
			<li class="has-children"><div class="acnav__label">   <i class="fa fa-leaf" aria-hidden="true"></i>   Updation </div></li>
			
			

		</ul>
	</nav>
	
</section>
      </div>
    </div>    
  </nav>