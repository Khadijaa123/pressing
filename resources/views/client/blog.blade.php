 
@extends('client.layouts.app')

@section('title', 'Blog')

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
					<li><a href="services">SERVICES</a></li>
					<li><a href="pricing">PRICING</a></li>
					<li><a href="faq">FAQ</a></li>
					<li class="active"><a href="blog">BLOG</a></li>
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
						<h3>BLOG</h3>
						<ol class="breadcrumb">
						  <li><a href="#">Home</a></li>
						  <li class="active">Blog</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
		
	</div>
	
	
	<!-- ABOUT SECTION -->
	<div id="services" class="section services">
		<div class="container">
			<!--  -->
			<div class="row">
				<div class="col-sm-12 col-md-12">
					<div class="page-title">
						<h2 class="lead">HOW IT WORKS</h2>
						<p class="sublead">This template is designed with a unique and simple, so that it can promote and laundry business solution.</p>
					</div>
				</div>
			</div>
			
			
			<div class="row pbot-main">
			
				<div class="col-xs-12 col-md-8">
					<div class="post-item">
						<div class="image-wrap">
							<div class="meta">
								<div class="date"><i class="fa fa-calendar"></i>March 12, 2015</div>
								<div class="tag"><i class="fa fa-tags"></i>Tips, Suit</div>
								<div class="tag"><i class="fa fa-comments"></i>20 Comments</div>
							</div>
							<div id="img-slider" class="carousel slide" data-ride="carousel">

								<!-- Wrapper for slides -->
								<div class="carousel-inner" role="listbox">
									<div class="item active">
									   <img src="images/blog-img-1.jpg" alt="...">
									</div>
									<div class="item">
									   <img src="images/blog-img-1b.jpg" alt="...">
									</div>
									<div class="item">
									   <img src="images/blog-img-1c.jpg" alt="...">
									</div>
								</div>

								<!-- Controls -->
								<a class="left carousel-control" href="#img-slider" role="button" data-slide="prev">
									<span class="fa fa-angle-left" aria-hidden="true"></span>
									<span class="sr-only">Previous</span>
								</a>
								<a class="right carousel-control" href="#img-slider" role="button" data-slide="next">
									<span class="fa fa-angle-right" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								</a>
							</div>
							
						</div>
						<h3 class="post-title"><a href="blog-1.html" title="">How to laundry your suit Office - tips and tricks.</a></h3>
						<p>Our planet is really feeling the heat of Global Warming. Humans are consuming resources like never before. A new coal-fired power plant is built in China EVERY WEEK! This all signifies that consumption of raw materials will keep on increasing. A new coal-fired power plant is built in China EVERY WEEK! This all signifies that consumption of raw materials will keep on increasing...</p>
						<a href="blog-1.html" class="post-read-more" title="">Read More <i class="fa fa-chevron-circle-right"></i></a>
					</div>
				
					<div class="post-item">
						<div class="image-wrap">
							<div class="meta">
								<div class="date"><i class="fa fa-calendar"></i>March 12, 2015</div>
								<div class="tag"><i class="fa fa-tags"></i>Tips, Suit</div>
								<div class="tag"><i class="fa fa-comments"></i>20 Comments</div>
							</div>
							<img src="images/blog-img-2.jpg" alt="..." class="img-responsive">
							
						</div>
						<h3 class="post-title"><a href="blog-2.html" title="">Welcome to Our Office in Indonesia. Austin visit Us From UK</a></h3>
						<p>Our planet is really feeling the heat of Global Warming. Humans are consuming resources like never before. A new coal-fired power plant is built in China EVERY WEEK! This all signifies that consumption of raw materials will keep on increasing. A new coal-fired power plant is built in China EVERY WEEK! This all signifies that consumption of raw materials will keep on increasing...</p>
						<a href="blog-2.html" class="post-read-more" title="">Read More <i class="fa fa-chevron-circle-right"></i></a>
					</div>
					
					<div class="post-item">
						<div class="image-wrap">
							<div class="meta">
								<div class="date"><i class="fa fa-calendar"></i>March 12, 2015</div>
								<div class="tag"><i class="fa fa-tags"></i>Tips, Suit</div>
								<div class="tag"><i class="fa fa-comments"></i>20 Comments</div>
							</div>
							<div class="embed-responsive embed-responsive-16by9">
								<iframe class="embed-responsive-item" src="http://www.youtube.com/embed/frcNCwIaR0Y?autoplay=0&loop=0&showinfo=0&theme=dark&color=red&controls=1&modestbranding=1&start=0&fs=0&iv_load_policy=3" allowfullscreen></iframe>
							</div>
							
						</div>
						<h3 class="post-title"><a href="blog-3.html" title="">4 Ways to Simplify Laundry! (Clean My Space).</a></h3>
						<p>Our planet is really feeling the heat of Global Warming. Humans are consuming resources like never before. A new coal-fired power plant is built in China EVERY WEEK! This all signifies that consumption of raw materials will keep on increasing. A new coal-fired power plant is built in China EVERY WEEK! This all signifies that consumption of raw materials will keep on increasing...</p>
						<a href="blog-3.html" class="post-read-more" title="">Read More <i class="fa fa-chevron-circle-right"></i></a>
					</div>
					
					<ul class="pagination">
						<li class="active"><a href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
					</ul>
					
				</div>
				
				<div class="col-xs-12 col-md-4">
					<div class="widget recent-post">
						<h4 class="widget-heading">RECENT POST</h4>
						<div class="widget-wrap">
							<div class="media">
								<div class="media-left">
									<a href="#">
									  <img class="media-object" src="images/thumb-blog-1.jpg" alt="...">
									</a>
								</div>
								<div class="media-body">
									<p><a href="#" title="">How to Laundry you suit office - tips and tricks.</a></p>
									<div class="meta-comment">
										<i class="fa fa-comments"></i>20 Comments
									</div>
								</div>
							</div>
							<div class="media">
								<div class="media-left">
									<a href="#">
									  <img class="media-object" src="images/thumb-blog-2.jpg" alt="...">
									</a>
								</div>
								<div class="media-body">
									<p><a href="#" title="">How to Laundry you suit office - tips and tricks.</a></p>
									<div class="meta-comment">
										<i class="fa fa-comments"></i>20 Comments
									</div>
								</div>
							</div>
							<div class="media">
								<div class="media-left">
									<a href="#">
									  <img class="media-object" src="images/thumb-blog-3.jpg" alt="...">
									</a>
								</div>
								<div class="media-body">
									<p><a href="#" title="">How to Laundry you suit office - tips and tricks.</a></p>
									<div class="meta-comment">
										<i class="fa fa-comments"></i>20 Comments
									</div>
								</div>
							</div>
							
						</div>
					</div>
					
					<div class="widget categories">
						<h4 class="widget-heading">CATEGORIES</h4>
						<div class="widget-wrap">
							<ul class="list-unstyled">
								<li><a href="#" title=""><i class="fa fa-angle-double-right"></i>Business Laundry (3)</a></li>
								<li><a href="#" title=""><i class="fa fa-angle-double-right"></i>Industry Laundry(12)</a></li>
								<li><a href="#" title=""><i class="fa fa-angle-double-right"></i>Redential Laundry (5)</a></li>
								<li><a href="#" title=""><i class="fa fa-angle-double-right"></i>Cosplay Laundry (1)</a></li>
							</ul>
						</div>
					</div>
					
					<div class="widget categories">
						<h4 class="widget-heading">ARCHIVES</h4>
						<div class="widget-wrap">
							<ul class="list-unstyled">
								<li><a href="#" title=""><i class="fa fa-angle-double-right"></i>March 2015</a></li>
								<li><a href="#" title=""><i class="fa fa-angle-double-right"></i>Februari 2015</a></li>
								<li><a href="#" title=""><i class="fa fa-angle-double-right"></i>Januari 2015</a></li>
								<li><a href="#" title=""><i class="fa fa-angle-double-right"></i>Desember 2014</a></li>
								<li><a href="#" title=""><i class="fa fa-angle-double-right"></i>November 2014</a></li>
							</ul>
						</div>
					</div>
					
					
				</div>
			</div>
			
			
			
			
		</div>
	</div>
	
	
	<!-- FOOTER SECTION -->
	<div class="footer">
	
		<div class="f-desc">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
						<div class="footer-item">
							<div class="footer-logo">
								<img src="images/logo_blue.png" alt="" />
							</div>
							<p>This template is a micro niche for business categories, namely laundry business. there was an excess of this template is using adobe muse making it easier to edit, add content, and without having to use the coding in the edit.</p>
							<div class="footer-sosmed">
								<a href="#" title="">
									<div class="item">
										<i class="fa fa-facebook"></i>
									</div>
								</a>
								<a href="#" title="">
									<div class="item">
										<i class="fa fa-twitter"></i>
									</div>
								</a>
								<a href="#" title="">
									<div class="item">
										<i class="fa fa-pinterest"></i>
									</div>
								</a>
								<a href="#" title="">
									<div class="item">
										<i class="fa fa-google"></i>
									</div>
								</a>
								<a href="#" title="">
									<div class="item">
										<i class="fa fa-instagram"></i>
									</div>
								</a>
								<a href="#" title="">
									<div class="item">
										<i class="fa fa-linkedin"></i>
									</div>
								</a> 
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
						<div class="footer-item">
							<div class="footer-title">
								<h4>RECENT POST</h4>
							</div>
							<div class="footer-blog-item">
								<div class="footer-blog-lead">
									<a href="blog-1.html" title="">How to laundry your suit office - tips and trick.</a>
								</div>
								<div class="footer-blog-date">
									May 29, 2015
								</div>
							</div>
							<div class="footer-blog-item">
								<div class="footer-blog-lead">
									<a href="blog-1.html" title="">How to laundry your suit office - tips and trick.</a>
								</div>
								<div class="footer-blog-date">
									May 29, 2015
								</div>
							</div>
							
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
						<div class="footer-item">
							<div class="footer-title">
								<h4>NEWSLETTER</h4>
							</div>
							<div class="footer-form">
								<form action="#">
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Name">
									</div>
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Email">
									</div>
									<div class="form-group">
										<button type="submit" class="btn btn-default">SEND</button>
									</div>
									
								</form>
							</div>
							
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
						<div class="footer-item">
							<div class="footer-title">
								<h4>GET IN TOUCH</h4>
							</div>
							<div class="footer-getintouch">
								<div class="footer-getintouch-item">
									<div class="icon">
										<b class="fa fa-phone"></b>
									</div>
									<div class="desc">
										<div class="desc-1">Phone</div>
										<div class="desc-2">:</div>
										<div class="desc-3">+62 7000 4400 <br />+62 7000 4422</div>
									</div>
								</div>
								<div class="footer-getintouch-item">
									<div class="icon">
										<b class="fa fa-envelope "></b>
									</div>
									<div class="desc">
										<div class="desc-1">Email</div>
										<div class="desc-2">:</div>
										<div class="desc-3"><a href="mailto:support@laundryes.com" title="">support@laundryes.com</a></div>
									</div>
								</div>
								<div class="footer-getintouch-item">
									<div class="icon">
										<b class="fa fa-globe"></b>
									</div>
									<div class="desc">
										<div class="desc-1">Website </div>
										<div class="desc-2">:</div>
										<div class="desc-3">www.laundryes.com</div>
									</div>
								</div>
								<div class="footer-getintouch-item">
									<div class="icon">
										<b class="fa fa-map-marker"></b>
									</div>
									<div class="desc">
										<div class="desc-1">Address </div>
										<div class="desc-2">:</div>
										<div class="desc-3">80 sukarajin street <br />Pekanbaru 40021 Riau</div>
									</div>
								</div>
								
							</div>
						</div>
						
					</div>
					
				</div>
			</div>
				
		</div>
		
		<div class="fcopy">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<p class="ftex">&copy; 2016 Laundryes by Rudhi Sasmito - All Rights Reserved</p>
					</div>
				</div>
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
