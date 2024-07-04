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
    
    <!-- Favicons -->
    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
    
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,700,900' rel='stylesheet' type='text/css'>
    
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
    <div class="section subbanner" style="background:url('images/slide_page.jpg') no-repeat center center; background-size: cover">
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
    
    <!-- SERVICES SECTION -->
    <div id="services" class="section services">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="page-title">
                        <h2 class="lead">OUR SERVICES</h2>
                        <p class="sublead">akthar cat.</p>
                    </div>
                </div>
            </div>
            
            <div class="row">
                @foreach($data as $category)
                <div class="services-item-full">
                    <div class="col-xs-12 col-md-6">
                        <div class="about-img">
                            <img src="images/services-img-1.jpg" alt="" class="img-responsive" />
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6">
                        <div class="desc-wrap">
                            <h4 class="title-page"><a >{{ $category->nom }}</a></h4>
                            <p>{{ $category->description }}</p>
                            <!-- Add a label and button for each service -->
                            <form action="{{ route('panier.add') }}" method="POST">
                                @csrf
                                <input type="hidden" name="service_id" value="{{ $category->id }}">
                                <div class="form-group">
                                    <label for="quantity">Quantité</label>
                                    <input type="number" name="quantity" id="quantity" class="form-control" min="1" value="1" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Ajouter au panier</button>
                            </form>
                            
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
