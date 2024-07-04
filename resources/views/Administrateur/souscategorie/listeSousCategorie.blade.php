<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Espace Administrateur Rapidos</title>
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

        <!-- Include the header -->
        @include('Administrateur.layout.navbar')

        <!-- Include the sidebar -->
        @include('Administrateur.layout.sidebar')

        <!-- Main Content -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">

                    <!-- Page Title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">Liste des Sous-Catégories</h4>
                            </div>
                        </div>
                    </div>
                    <!-- End Page Title -->

                    <!-- Table -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Liste des Sous-Catégories</h4>
                                    <br />
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>Nom</th>
                                                <th>Catégorie Parente</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
    @foreach($data as $sousCategorie)
    <tr>
        <td>{{ $sousCategorie->nom }}</td>
        @foreach($dataa as $Categorie)
        @if($Categorie->id ==$sousCategorie->id_categorie )
        <td>{{ $Categorie->nom }}</td>
        @endif
       
            @endforeach
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
                    <!-- End Table -->

                </div> <!-- container-fluid -->
            </div> <!-- End Page-content -->

            <!-- Include the footer -->
            @include('Administrateur.layout.footer')

        </div> <!-- main-content -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="{{ asset('libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('libs/node-waves/waves.min.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('js/app.js') }}"></script>
    </body>

</html>
