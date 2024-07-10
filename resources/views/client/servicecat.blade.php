@extends('client.layouts.app')

@section('title', 'Services')

@section('content')
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Services</title>
    
    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- Custom Stylesheet -->
    <link rel="stylesheet" type="text/css" href="css/style.css" />
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
                        <p class="sublead">Explore our services.</p>
                    </div>
                </div>
            </div>
            
            <div class="row">
                @foreach($data as $category)
                <div class="desc-wrap">
                    <div class="col-xs-12 col-md-6">
                        <div class="about-img">
                            <img src="{{ asset('images/services/' . $category->photo) }}" class="img-responsive" alt="{{ $category->nom }}" width="200" height="200">
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6">
                        <div class="desc-wrap">
                            <h4 class="title-page"><a>{{ $category->nom }}</a></h4>
                            <p>{{ $category->prix }} DT</p>
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
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- Toastr notification script -->
    <script>
        $(document).ready(function() {
            @if(session('success'))
                toastr.success("{{ session('success') }}", "Success!", {
                    "positionClass": "toast-top-right",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "fadeIn": "300",
                    "fadeOut": "1000"
                });
            @endif
        });
    </script>
</body>
</html>
@endsection
