<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Liste des Commandes - Espace Administrateur Rapidos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
    <link href="{{ asset('css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body data-sidebar="dark">

    <div id="layout-wrapper">

        <!-- Navbar -->
        @include('Administrateur.layout.navbar')

        <!-- Sidebar -->
        @include('Administrateur.layout.sidebar')

        <!-- Main Content -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- Page Title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">Liste des Commandes</h4>
                            </div>
                        </div>
                    </div>
                    <!-- End Page Title -->

                    <!-- Most Ordered Service Statistics -->
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Statistiques du Service le Plus Commandé</h4>
                                    <canvas id="mostOrderedServiceChart" height="200"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Most Ordered Service Statistics -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title">Liste des commandes enregistrées</h4>
                                    <br />
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Heure</th>
                                                <th>Prix</th>
                                                <th>Date de Ramassage</th>
                                                <th>Numéro de téléphone</th>
                                                <th>Type</th>
                                                <th>Remarque</th>
                                                <th>ID Client</th>
                                                <th>Transporteur</th>
                                                <th>Panier</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $item)
                                                @if ($item->type != '4')
                                                    <tr>
                                                        <td>{{ $item->date }}</td>
                                                        <td>{{ $item->heure }}</td>
                                                        <td>{{ $item->prix }}</td>
                                                        <td>{{ $item->date_ramassage }}</td>
                                                        <td>{{ $item->num_tel }}</td>
                                                        <td>{{ $item->type }}
                                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#chooseTypeModal" data-id="{{ $item->id }}">
                                                            Choisir Type
                                                        </button></td>
                                                        <td>{{ $item->remarque }}</td>
                                                        <td>{{ $item->id_client }}</td>
                                                        <td>@foreach($transporteurs as $transporteur)
                                                            @foreach($pers as $per)
                                                                @if ($per->id == $transporteur->id_personnels &&$item->id_transporteur ==$transporteur->id)
                                                                    
                                                                        {{ $per->nom }}
                                                                        @endif
                                                                        @endforeach
                                                                        @endforeach
                                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#chooseTransporteurModal" data-id="{{ $item->id }}">
                                                                Choisir Transporteur
                                                            </button>
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('detail_commande', ['id_panier' => $item->id_panier]) }}" class="btn btn-info btn-sm">
                                                                Voir Détails
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>

                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <!-- Footer -->
            @include('Administrateur.layout.footer')

        </div> <!-- main-content -->

    </div> <!-- layout-wrapper -->

    <!-- Modal for choosing transporteurs -->
    <div class="modal fade" id="chooseTransporteurModal" tabindex="-1" role="dialog" aria-labelledby="chooseTransporteurModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="chooseTransporteurModalLabel">Choisir un Transporteur</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('assign_transporteur') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="commande_id" id="commande_id">
                        <div class="form-group">
                            <label for="transporteur">Transporteur</label>
                            <select class="form-control" id="id_transporteur" name="id_transporteur" required>
                                @foreach($transporteurs as $transporteur)
                                    @foreach($pers as $per)
                                        @if ($per->id == $transporteur->id_personnels)
                                            <option value="{{ $transporteur->id }}">
                                                {{ $per->nom }}
                                            </option>
                                        @endif
                                    @endforeach
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary">Assigner</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal for choosing types -->
    <div class="modal fade" id="chooseTypeModal" tabindex="-1" role="dialog" aria-labelledby="chooseTypeModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="chooseTypeModalLabel">Choisir un Type</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('assign_type') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="commande_id" id="commande_id">
                        <div class="form-group">
                            <label for="type">Type</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="type1" name="types[]" value="1">
                                <label class="form-check-label" for="type1">Type 1</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="type2" name="types[]" value="2">
                                <label class="form-check-label" for="type2">Type 2</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="type3" name="types[]" value="3">
                                <label class="form-check-label" for="type3">Type 3</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="type4" name="types[]" value="4">
                                <label class="form-check-label" for="type4">Type 4</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary">Assigner Type</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap & Core JS -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Custom Script for Modal -->
    <script>
        $('#chooseTransporteurModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var commandeId = button.data('id');
            var modal = $(this);
            modal.find('.modal-body #commande_id').val(commandeId);
        });

        $('#chooseTypeModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var commandeId = button.data('id');
            var modal = $(this);
            modal.find('.modal-body #commande_id').val(commandeId);
        });
    </script>

    <!-- Chart.js Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var ctx = document.getElementById('mostOrderedServiceChart').getContext('2d');
            
            // Assuming $mostOrderedService is already available in your view
            var mostOrderedService = @json($mostOrderedService);
            
            // Prepare arrays to hold labels, data, and percentages
            var labels = [];
            var data = [];
            var percentages = [];
    
            // Calculate total orders sum
            var totalOrdersSum = mostOrderedService.reduce((acc, service) => acc + service.total_orders, 0);
    
            // Iterate through the data and populate labels, data, and percentages arrays
            mostOrderedService.forEach(function(service) {
                labels.push(service.nom);
                data.push(service.total_orders);
                var percentage = (service.total_orders / totalOrdersSum) * 100;
                percentages.push(percentage.toFixed(2)); // Round to 2 decimal places
            });
    
            var chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Total Orders',
                        data: data,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                precision: 0
                            }
                        }
                    },
                    plugins: {
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    var label = context.dataset.label || '';
                                    if (label) {
                                        label += ': ';
                                    }
                                    label += context.raw.toLocaleString();
                                    label += ' (' + percentages[context.dataIndex] + '%)';
                                    return label;
                                }
                            }
                        }
                    }
                }
            });
        });
    </script>
    
    
    
</body>

</html>
