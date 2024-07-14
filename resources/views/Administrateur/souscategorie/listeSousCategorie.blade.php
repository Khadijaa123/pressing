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
                                <h4 class="mb-sm-0 font-size-18">Liste des Sous-Catégories</h4>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Liste des Sous-Catégories</h4>
                                    <br />
                                    
                                    <!-- Search Input -->
                                    <div class="input-group mb-3">
                                        <input type="text" id="search" name="search" class="form-control" placeholder="Rechercher..." value="{{ $searchTerm ?? '' }}">
                                    </div>

                                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>Nom</th>
                                                <th>Catégorie Parente</th>
                                                <th>Image</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="souscategories-table-body">
                                            @foreach($data as $sousCategorie)
                                                <tr>
                                                    <td>{{ $sousCategorie->nom }}</td>
                                                    <td>
                                                        @foreach($dataa as $categorie)
                                                            @if($categorie->id == $sousCategorie->id_categorie)
                                                                {{ $categorie->nom }}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @if($sousCategorie->photo)
                                                            <img src="{{ asset('images/services/' . $sousCategorie->photo) }}" alt="{{ $sousCategorie->nom }}" width="50" height="50">
                                                        @else
                                                            Pas d'image
                                                        @endif
                                                    </td>
                                                    <td>{{ $sousCategorie->description }}</td>
                                                    <td>
                                                        <a href="{{ route('sousCategorie.edit', ['id' => $sousCategorie->id]) }}" class="btn btn-primary">Modifier</a>
                                                        <form action="{{ route('sousCategorie.destroy', ['id' => $sousCategorie->id]) }}" method="POST" style="display: inline-block;">
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
                        url: '{{ route("listeSousCategories") }}',
                        type: 'GET',
                        data: { search: search },
                        success: function(response) {
                            var tableBody = $('#souscategories-table-body');
                            tableBody.empty();
                            $.each(response.data, function(index, item) {
                                var row = '<tr>' +
                                    '<td>' + item.nom + '</td>' +
                                    '<td>' + (item.categorie ? item.categorie.nom : '') + '</td>' +
                                    '<td>';
                                if (item.photo) {
                                    row += '<img src="{{ asset('images/services') }}/' + item.photo + '" alt="' + item.nom + '" width="50" height="50">';
                                } else {
                                    row += 'Pas d\'image';
                                }
                                row += '</td>' +
                                    '<td>' + item.description + '</td>' +
                                    '<td>' +
                                    '<a href="{{ url('sousCategorie/edit') }}/' + item.id + '" class="btn btn-primary">Modifier</a> ' +
                                    '<form action="{{ url('sousCategorie/destroy') }}/' + item.id + '" method="POST" style="display: inline-block;">' +
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
