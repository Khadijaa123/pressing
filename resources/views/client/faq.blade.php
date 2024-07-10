@extends('client.layouts.app')

@section('title', 'Profil Client')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profil Client</title>
    
    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- Custom Stylesheet -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />
    <style>
        .form-label {
            text-align: center;
            width: 100%;
        }
        .form-control {
            max-width: 400px;
            margin: 0 auto;
        }
        .profile-section {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 20px auto;
        }
        .profile-section h4 {
            margin-bottom: 20px;
        }
        .profile-section .form-label {
            font-weight: bold;
        }
        .profile-section .form-control {
            background-color: #e9ecef;
        }
        .breadcrumb {
            background: transparent;
            padding: 0;
            margin-bottom: 0;
        }
        .breadcrumb li {
            display: inline;
            font-size: 14px;
        }
        .breadcrumb li a {
            color: #6c757d;
        }
        .breadcrumb li.active {
            color: #495057;
        }
    </style>
</head>

<body>
    <!-- Load page -->
    <div class="animationload">
        <div class="loader"></div>
    </div>
    
    <!-- NAVBAR SECTION -->
    @include('client.partials.header')

    <!-- BANNER -->
    <div class="section subbanner" style="background: url('{{ asset('images/slide_page.jpg') }}') no-repeat center center; background-size: cover;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="caption">
                        <h3>Profil Client</h3>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- PROFILE SECTION -->
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card profile-section">
                            <div class="card-body">
                                <h4 class="card-title" style="font-family: 'Raleway', sans-serif; font-weight: 700; font-size: 24px; color: #333;">Informations du Client</h4>
                                <br />
                                <form action="{{ route('client.update', $client->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="nom" class="form-label">Nom</label>
                                        <input type="text" class="form-control" id="nom" name="nom" value="{{ $client->nom }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="prenom" class="form-label">Prénom</label>
                                        <input type="text" class="form-control" id="prenom" name="prenom" value="{{ $client->prenom }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">E-mail</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{ $client->email }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="num_tel" class="form-label">Numéro de téléphone</label>
                                        <input type="text" class="form-control" id="num_tel" name="num_tel" value="{{ $client->num_tel }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="ville" class="form-label">Ville</label>
                                        <input type="text" class="form-control" id="ville" name="ville" value="{{ $client->ville }}">
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Modifier</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>document.write(new Date().getFullYear())</script> © Rapidos.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end d-none d-sm-block">
                            Design & Develop by Digilife
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- JAVASCRIPT -->
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script type='text/javascript' src='https://maps.google.com/maps/api/js?sensor=false&#038;ver=4.1.5'></script>
    <script type='text/javascript' src='js/jqBootstrapValidation.js'></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap-hover-dropdown.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
</body>
</html>
@endsection
