 
@extends('client.layouts.app')

@section('title', 'Services')

@section('content')
<!DOCTYPE html>
<html class="no-js" lang="en">
  <head>
    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laundryes - Laundry Business Html Template</title>
    <meta name="description" content="Laundryes - Laundry Business Html Template. It is built using bootstrap 3.3.2 framework, works totally responsive, easy to customise, well commented codes and seo friendly.">
    <meta name="keywords" content="laundry, multipage, business, clean, bootstrap">
    <meta name="author" content="rudhisasmito.com"> 
	
	<!-- ==============================================
	Favicons
	=============================================== -->
	<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
	
	<!-- ==============================================
	CSS
	=============================================== -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	
	
	
	<!-- ==============================================
	Google Fonts
	=============================================== -->
	<link href='http://fonts.googleapis.com/css?family=Raleway:400,700,900' rel='stylesheet' type='text/css'>
	
	
	<!-- Custom Stylesheet -->
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	
	
    <script type="text/javascript" src="js/modernizr.min.js"></script>
	
</head>

<body>
	
	<!-- Load page -->
	<div class="animationload">
		<div class="loader"></div>
	</div>
	
	
	<!-- NAVBAR SECTION -->
	<div class="navbar navbar-main navbar-fixed-top">
		<div class="header-top">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
						<div class="info">
							<div class="info-item">
								<span class="fa fa-phone"></span> Phone +62 7144 3300
							</div>
							<div class="info-item">
								<span class="fa fa-envelope-o"></span> <a href="mailto:info@laundryes.com" title="">Email info@laundryes.com</a>
							</div>
							
						</div>
					</div>
					<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
						<div class="top-sosmed pull-right">
							<a href="#" title=""><span class="fa fa-facebook"></span></a>
							<a href="#" title=""><span class="fa fa-twitter"></span></a>
							<a href="#" title=""><span class="fa fa-instagram"></span></a>
							<a href="#" title=""><span class="fa fa-pinterest"></span></a>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="/"><img src="images/logo_blue.png" alt="" /></a>
				
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
					  <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Home <span class="caret"></span></a>
					  <ul class="dropdown-menu">
						<li><a href="/">Homepage Default</a></li>
						<li><a href="index2.html">Homepage Sliders</a></li>
					  </ul>
					</li>
					<li><a href="about">ABOUT</a></li>
					<li class="active"><a href="services">SERVICES</a></li>
					<li><a href="pricing">PRICING</a></li>
					<li><a href="faq">FAQ</a></li>
					<li><a href="blog">BLOG</a></li>
					<li><a href="contact">CONTACT</a></li>
				</ul>
			</div>
		</div>
    </div>

 
	<!-- BANNER -->
	<div class="section subbanner" style="background:url('images/slide_page.jpg') no-repeat center center;   -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="caption">
						<h3>SERVICES</h3>
						<ol class="breadcrumb">
						  <li><a href="#">Home</a></li>
						  <li class="active">Services</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
		
	</div>
	
	
	<!-- ABOUT SECTION -->
	<div id="services" class="section services">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-12">
					<div class="page-title">
						<h2 class="lead">OUR SERVICES</h2>
						<p class="sublead">akhtar cat btaak.</p>
					</div>
				</div>
			</div>
			
			<div class="row">
				@foreach($data as $item)
				<div class="services-item-full">
					<div class="col-xs-12 col-md-6">
						<div class="about-img">
							<img src="images/services-img-1.jpg" alt="" class="img-responsive" />
						</div>
					</div>
					<div class="col-xs-12 col-md-6">
						<div class="desc-wrap">
							<h4 class="title-page"><a href="{{ route('servicecat', ['id' => $item->id]) }}">{{ $item->nom }}</h4>
							<p>This template is designed with a unique and simple, so that it can promote and laundry business solution. This template can be an alternative for entrepreneurs engaged in the laundry. or could be an alternative for web developers who need to design websites laundry kategory business. As for the advantages of this template is multipage template which consists of a homepage, about page, services page, pricing page, faq page, blog and contact page. so that it can describe all the requirements needed for a business website.</p>
							<ul class="service-list">
								<li><i class="fa fa-check-circle"></i> Ready for hbnhbyhbyall devices.</li>
								<li><i class="fa fa-check-circle"></i> Made with Adobe Muse.</li>
								<li><i class="fa fa-check-circle"></i> No Coding Required.</li>
								<li><i class="fa fa-check-circle"></i> Easy Costumizable.</li>
								<li><i class="fa fa-check-circle"></i> Affordable Price.</li>
							</ul>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
				@endforeach
				
				
				
				
			</div>
			
		</div>
	</div>
	
	

	
	
	
	
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type='text/javascript' src='https://maps.google.com/maps/api/js?sensor=false&#038;ver=4.1.5'></script>
	<script type='text/javascript' src='js/jqBootstrapValidation.js'></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/bootstrap-hover-dropdown.min.js"></script>
	
	<script type="text/javascript" src="js/script.js"></script>
	
</body>
</html>
@endsection
