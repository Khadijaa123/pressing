<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Espace Administrateur Rapidos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
    <link href="{{ asset('css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body data-sidebar="dark">
    <div id="layout-wrapper">
        @include('Administrateur.layout.navbar')
        @include('Administrateur.layout.sidebar')

        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">Liste des Services</h4>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-12">
                            <div class="input-group">
                                <input type="text" id="search" name="search" class="form-control" placeholder="Rechercher..." value="{{ $searchTerm ?? '' }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Liste des Services</h4>
                                    <br />
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>Nom</th>
                                                <th>Prix</th>
                                                <th>Photo</th>
                                                <th>Description</th>
                                                <th>Sous-Catégorie</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="services-table-body">
                                            @foreach($data as $service)
                                                <tr>
                                                    <td style="vertical-align: middle;">{{ $service->nom }}</td>
                                                    <td>{{ $service->prix }}</td>
                                                    <td>
                                                        <img src="{{ asset('images/services/' . $service->photo) }}" alt="Photo du service" style="max-width: 100px;">
                                                    </td>
                                                    <td>{{ $service->description }}</td>
                                                    <td>{{ $service->sousCategorie->nom }}</td>
                                                    <td>
                                                        <a href="{{ route('services.edit', ['id' => $service->id]) }}" class="btn btn-primary">Modifier</a>
                                                        <form action="{{ route('services.destroy', ['id' => $service->id]) }}" method="POST" style="display: inline-block;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Supprimer</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            @include('Administrateur.layout.footer')
        </div>

        <div class="rightbar-overlay"></div>

        <script src="{{ asset('libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('libs/node-waves/waves.min.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>

        <script>
            $(document).ready(function() {
                $('#search').on('input', function() {
                    var search = $(this).val();
                    $.ajax({
                        url: '{{ route("listeService") }}',
                        type: 'GET',
                        data: { query: search },
                        success: function(response) {
                            var tableBody = $('#services-table-body');
                            tableBody.empty();
                            $.each(response.data, function(index, item) {
                                var row = '<tr>' +
                                    '<td style="vertical-align: middle;">' + item.nom + '</td>' +
                                    '<td>' + item.prix + '</td>' +
                                    '<td>';
                                if (item.photo) {
                                    row += '<img src="{{ asset('images/services') }}/' + item.photo + '" alt="Photo du service" style="max-width: 100px;">';
                                } else {
                                    row += 'Pas d\'image';
                                }
                                row += '</td>' +
                                    '<td>' + item.description + '</td>' +
                                    '<td>' + (item.sous_categorie ? item.sous_categorie.nom : '') + '</td>' +
                                    '<td>' +
                                    '<a href="{{ url('services/edit') }}/' + item.id + '" class="btn btn-primary">Modifier</a> ' +
                                    '<form action="{{ url('services/destroy') }}/' + item.id + '" method="POST" style="display: inline-block;">' +
                                    '@csrf @method('DELETE')' +
                                    '<button type="submit" class="btn btn-danger">Supprimer</button>' +
                                    '</form>' +
                                    '</td>' +
                                    '</tr>';
                                tableBody.append(row);
                            });
                        }
                    });
                });
            });
        </script>
    </div>
</body>
</html>
