<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Liste des Catégories - Espace Administrateur Rapidos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">

    <!-- Bootstrap Css -->
    <link href="{{ asset('css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body data-sidebar="dark">

    <div id="layout-wrapper">

        <!-- Navbar -->
        @include('Administrateur.layout.navbar')

        <!-- Sidebar -->
        @include('Administrateur.layout.sidebar')

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">Liste des catégories</h4>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Vous pouvez supprimer ou modifier des informations concernant les catégories</h4>
                                    <br />
                                    
                                    <!-- Search Input -->
                                    <div class="input-group mb-3">
                                        <input type="text" id="search" name="search" class="form-control" placeholder="Rechercher..." value="{{ $searchTerm ?? '' }}">
                                    </div>

                                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>Nom</th>
                                                <th>Description</th>
                                                <th>Photo</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody id="categories-table-body">
                                            @foreach($data as $item)
                                            <tr>
                                                <td style="vertical-align: middle;">{{ $item->nom }}</td>
                                                <td style="vertical-align: middle;">{{ $item->description }}</td>
                                                <td style="vertical-align: middle;">
                                                    @if ($item->photo)
                                                        <img src="{{ asset('images/services/' . $item->photo) }}" alt="{{ $item->nom }}" width="50" height="50">
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <a href="{{ route('modifierCategorie', ['id' => $item->id]) }}" class="btn btn-primary">Modifier</a>
                                                    <a href="{{ route('categories.destroy', ['id' => $item->id]) }}" class="btn btn-danger">Supprimer</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                </div> <!-- container-fluid -->
            </div>

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

        <div class="rightbar-overlay"></div>

        <script src="{{ asset('libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('libs/node-waves/waves.min.js') }}"></script>
        <script src="{{ asset('libs/apexcharts/apexcharts.min.js') }}"></script>
        <script src="{{ asset('js/pages/dashboard.init.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>

        <script>
            $(document).ready(function() {
                $('#search').on('input', function() {
                    var search = $(this).val();
                    $.ajax({
                        url: '{{ route("getCategories") }}',
                        type: 'GET',
                        data: { search: search },
                        success: function(response) {
                            var tableBody = $('#categories-table-body');
                            tableBody.empty();
                            $.each(response.data, function(index, item) {
                                var row = '<tr>' +
                                    '<td style="vertical-align: middle;">' + item.nom + '</td>' +
                                    '<td style="vertical-align: middle;">' + item.description + '</td>' +
                                    '<td style="vertical-align: middle;">';
                                if (item.photo) {
                                    row += '<img src="{{ asset('images/services') }}/' + item.photo + '" alt="' + item.nom + '" width="50" height="50">';
                                } else {
                                    row += 'N/A';
                                }
                                row += '</td>' +
                                    '<td style="vertical-align: middle;">' +
                                    '<a href="{{ url('modifierCategorie') }}/' + item.id + '" class="btn btn-primary">Modifier</a> ' +
                                    '<a href="{{ url('categories/destroy') }}/' + item.id + '" class="btn btn-danger">Supprimer</a>' +
                                    '</td>' +
                                    '</tr>';
                                tableBody.append(row);
                            });
                        }
                    });
                });
            });
        </script>
    </body>
</html>
