<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Ajouter Categorie - Espace Administrateur Rapidos</title>
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
                                <h4 class="mb-sm-0 font-size-18">Ajouter Nouveau Categorie</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Ajouter Nouveau Categorie</h4>
                                    <form action="{{ route('categorie.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row mb-4">
                                            <label for="nom" class="col-form-label col-lg-2">Nom de Categorie</label>
                                            <div class="col-lg-10">
                                                <input id="nom" name="nom" type="text" class="form-control" placeholder="Entrer le nom">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="description" class="col-form-label col-lg-2">Description</label>
                                            <div class="col-lg-10">
                                                <textarea id="description" name="description" class="form-control" rows="4" placeholder="Entrer la description"></textarea>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="photo" class="col-form-label col-lg-2">Photo</label>
                                            <div class="col-lg-10">
                                                <input id="photo" name="photo" type="file" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row justify-content-end">
                                            <div class="col-lg-10">
                                                <button type="submit" class="btn btn-primary">Ajouter Categorie</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
            @include('Administrateur.layout.footer')
        </div>
    </div>
    <script src="{{ asset('libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('js/pages/dashboard.init.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
