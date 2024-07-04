@extends('client.layouts.app')

@section('title', 'Services')

@section('content')
<!DOCTYPE html>
<html class="no-js" lang="en">
  <head>
    <!-- Basic Page Needs -->
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
    @include('client.partials.header')

 
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
                        <p class="sublead">akthar dfdfdfcat .</p>
                    </div>
                </div>
            </div>
            
			<div class="row">
				@foreach($data as $item)
				<div class="desc-wrap">
                    <div class="col-xs-12 col-md-6">
                        <div class="about-img">
                            <img src="{{ asset('images/services/' . $item->photo) }}" class="img-responsive" alt="{{ $item->nom }}" width="200" height="200">

                        </div>
                    </div>
					<div class="col-xs-12 col-md-6">
						<div class="desc-wrap"><a href="{{ route('servicecat', ['id' => $item->id]) }}">
							<h4 class="title-page">{{ $item->nom }}</a></h4>
								<ul class="service-list">
									<p>{{ $item->description }}</p>
								   
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
