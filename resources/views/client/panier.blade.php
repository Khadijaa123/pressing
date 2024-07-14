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
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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
            
            <!-- Total Sum -->
            <div class="row">
                <div class="col-md-12">
                    <div class="text-right">
                        <h3>Total Panier: {{ $totalSum }} DT</h3>
                    </div>
                </div>
            </div>

            <!-- Form for additional information -->
            <div class="row">
                <div class="col-md-12">
                    <h3>Remplir le formulaire</h3>
                    <form id="commandeForm" action="{{ route('commande.valider') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="remarque">Remarque</label>
                            <textarea name="remarque" id="remarque" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="adresse_livraison">Adresse de livraison(+10dt si le adress autre):</label>
                            <select name="adresse_livraison" id="adresse_livraison" class="form-control">
                                <option value="Gabes Ville">Gabes Ville</option>
                                <option value="Gabes Nord">Gabes Nord</option>
                                <option value="Gabes Sud">Gabes Sud</option>
                                <option value="Autre">Autre</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="specification_adresse">Adresse exacte:</label>
                            <input type="text" name="specification_adresse" id="specification_adresse" class="form-control" placeholder="Entrez les spécifications de l'adresse">
                        </div>
                        <div class="form-group">
                            <label for="num_tel">Numéro de Téléphone</label>
                            <input type="text" name="num_tel" id="num_tel" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="date_ramassage">Temps de Ramassage</label>
                            <input type="datetime-local" name="date_ramassage" id="date_ramassage" class="form-control" required>
                        </div>
                        <!-- Hidden fields for total with delivery -->
                        <input type="hidden" name="total_with_delivery" id="total_with_delivery" value="{{ $totalSum }}">
                        <!-- Valider Commande Button -->
                        <div class="text-right">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#validerCommandeModal">Valider Commande</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Valider Commande Modal -->
    <div class="modal fade" id="validerCommandeModal" tabindex="-1" role="dialog" aria-labelledby="validerCommandeModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="validerCommandeModalLabel">Confirmer la Commande</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Order Summary -->
                    <h5>Détails de la Commande</h5>
                    <p>Adresse de livraison: <span id="modalAdresseLivraison"></span></p>
                    <p>Adresse exacte: <span id="modalSpecificationAdresse"></span></p>
                    <p>Numéro de Téléphone: <span id="modalNumTel"></span></p>
                    <p>Temps de Ramassage: <span id="modalDateRamassage"></span></p>
                    <p>Remarque: <span id="modalRemarque"></span></p>
                    <h5>Total panier: {{ $totalSum }} DT</h5>
                
                    <!-- Frais de livraison -->
                    <div class="form-group mt-4">
                        <label for="frais_livraison">Frais de livraison:</label>
                        <span id="frais_livraison"></span>
                    </div>
                
                    <!-- Total avec frais de livraison -->
                    <h5>Total avec frais de livraison: <span id="totalWithDelivery">{{ $totalSum }} DT</span></h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-success" id="confirmValiderCommande">Confirmer</button>
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
                positionClass: "toast-top-right",
                timeOut: 5000,
                extendedTimeOut: 1000,
                fadeIn: 300,
                fadeOut: 1000
            });
        @endif

        // Handle Valider Commande Button Click
        $('[data-target="#validerCommandeModal"]').on('click', function() {
            // Get form values
            $('#modalAdresseLivraison').text($('#adresse_livraison').val());
            $('#modalSpecificationAdresse').text($('#specification_adresse').val());
            $('#modalNumTel').text($('#num_tel').val());
            $('#modalDateRamassage').text($('#date_ramassage').val());
            $('#modalRemarque').text($('#remarque').val());

            // Calculate and set frais de livraison
            var adresseLivraison = $('#adresse_livraison').val();
            var fraisLivraison = (adresseLivraison === 'Gabes Ville' || adresseLivraison === 'Gabes Nord' || adresseLivraison === 'Gabes Sud') ? 'Gratuit' : '10 DT';
            $('#frais_livraison').text(fraisLivraison);

            // Calculate total with delivery fee
            var totalSum = {{ $totalSum }};
            var fraisLivraisonValue = (fraisLivraison === 'Gratuit') ? 0 : 10;
            var totalWithDelivery = totalSum + fraisLivraisonValue;
            $('#totalWithDelivery').text(totalWithDelivery + ' DT');

            // Update hidden field
            $('#total_with_delivery').val(totalWithDelivery);
        });

        // Handle Confirm Button Click in Modal
        $('#confirmValiderCommande').on('click', function() {
            // Submit the form
            $('#commandeForm').submit();
        });
    });
</script>

</body>
</html>
@endsection
