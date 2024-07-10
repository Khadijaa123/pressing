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
                        <h2 class="lead">Votre Panier</h2>
                    </div>
                </div>
            </div>
            
            <div class="row">
                @foreach($cart as $item)
                @foreach($categories as $itemm)
                @if ($item['service_id'] == $itemm['id'])
                <div class="services-item-full">
                    <div class="col-xs-12 col-md-6">
                        <div class="about-img">
                            <img src="{{ asset('images/services/' . $itemm->photo) }}" class="img-responsive" alt="{{ $itemm->nom }}" width="200" height="200">
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6">
                        <p>Name: {{ $itemm['nom'] }}</p>
                        <p>Quantity: {{ $item['quantity'] }}</p>
                        <p>Price: {{ $itemm['prix'] }}DT</p>
                        <p>Total Price: {{ $item['quantity'] * $itemm['prix'] }}DT</p>
                    </div>
                </div>
                <div class="clearfix"></div>
                @endif
                @endforeach
                @endforeach
            </div>

            <!-- Form for additional information -->
            <div class="row">
                <div class="col-md-12">
                    <h3>Remplir le formulaire</h3>
                    <form action="{{ route('commande.valider') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="remarque">Remarque</label>
                            <textarea name="remarque" id="remarque" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="num_tel">Numéro de Téléphone</label>
                            <input type="text" name="num_tel" id="num_tel" class="form-control" required>
                        </div>
                        
                        <!-- Valider Commande Button -->
                        <div class="text-right">
                            <button type="submit" class="btn btn-success">Valider Commande</button>
                        </div>
                    </form>
                </div>
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
