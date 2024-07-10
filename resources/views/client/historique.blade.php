@extends('client.layouts.app')

@section('title', 'Historique des Commandes')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Historique des Commandes</title>
    
    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- Custom Stylesheet -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />
    <style>
        .order-section {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .order-section h4 {
            margin-bottom: 10px;
            font-family: 'Raleway', sans-serif;
            font-weight: 700;
            font-size: 18px;
            color: #333;
        }
        .order-section .order-details {
            font-size: 16px;
            color: #555;
        }
        .order-section .order-details span {
            display: block;
            margin-bottom: 5px;
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
                        <h3>Historique des Commandes</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ORDER HISTORY SECTION -->
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        @foreach ($data as $item)
                            <div class="card order-section">
                                <div class="card-body">
                                    <h4 class="card-title">Commande #{{ $item->id }}</h4>
                                    <div class="order-details">
                                        <span><strong>Date:</strong> {{ $item->date }}</span>
                                        <span><strong>Heure:</strong> {{ $item->heure }}</span>
                                        <span><strong>Prix:</strong> {{ $item->prix }} €</span>
                                        <span><strong>Date Ramassage:</strong> {{ $item->date_ramassage }}</span>
                                        <span><strong>Numéro de Téléphone:</strong> {{ $item->num_tel }}</span>
                                        <span><strong>Remarque:</strong> {{ $item->remarque }}</span>
                                        <span><strong>Type:</strong> {{ $item->type }}</span>
                                        <span>
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#detailModal{{ $item->id }}">
                                                Voir Détails
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="detailModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel{{ $item->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="detailModalLabel{{ $item->id }}">Détails de la Commande #{{ $item->id }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                @foreach($panier as $itemmm)
                                                    @foreach($ligne_panier as $itemm)
                                                        @if ($item->id_panier == $itemmm->id && $itemm->id_panier == $itemmm->id)
                                                  
                                                        @foreach($service as $serv)
                                                        @if ($serv->id == $itemm->id_service )
                                                  
                                                            <div class="services-item-full">
                                                                <div class="col-xs-12 col-md-6">
                                                                    <div class="about-img">
                                                                        <img src="{{ asset('images/services/' . $serv->photo) }}" class="img-responsive" alt="{{ $itemm->nom }}" width="200" height="200">
                                                                    </div>
                                                                </div>
                                                                <div class="col-xs-12 col-md-6">
                                                                    <p>Nom: {{ $serv->nom }}</p>
                                                                    <p>Quantité: {{ $itemm->quantite }}</p>
                                                                    <p>Prix: {{ $serv->prix }} DT</p>
                                                                    <p>Prix Total: {{ $itemm->quantite * $serv->prix }} DT</p>
                                                                </div>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                            @endif
                                                            @endforeach
                                                            @endif
                                                    @endforeach
                                                @endforeach
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
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
    <script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false&ver=4.1.5"></script>
    <script type="text/javascript" src="{{ asset('js/jqBootstrapValidation.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap-hover-dropdown.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
</body>
</html>
@endsection
