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
    <link href="{{ asset('css/toastr.css') }}" rel="stylesheet" />

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Toastr -->
    <script src="{{ asset('js/toastr.js') }}"></script>

    <script>
        $(document).ready(function() {
            // Initialisation de Toastr avec options
            toastr.options = {
                "debug": false,
                "positionClass": "toast-top-right",
                "onclick": null,
                "fadeIn": 300,
                "fadeOut": 1000,
                "timeOut": 5000,
                "extendedTimeOut": 1000
            };

            // Exemple de notification Toastr
            toastr.success("Settings Saved!");
        });
    </script>
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
                                <h4 class="mb-sm-0 font-size-18">Modifier sous-catégorie</h4>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Modifier les sous-catégories</h4>
                                    <form action="{{ route('sousCategorie.update', ['id' => $sousCategorie->id]) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="mb-4">
                                            <label for="nom" class="form-label">Nom de sous-catégorie</label>
                                            <input id="nom" name="nom" type="text" class="form-control" value="{{ $sousCategorie->nom }}">
                                        </div>

                                        <div class="mb-4">
                                            <label for="id_categories" class="form-label">Catégorie</label>
                                            <select id="id_categories" name="id_categories" class="form-control">
                                                @foreach($categories as $categorie)
                                                    <option value="{{ $categorie->id }}" {{ $categorie->id == $sousCategorie->id_categorie ? 'selected' : '' }}>
                                                        {{ $categorie->nom }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-4">
                                            <label for="description" class="form-label">Description</label>
                                            <textarea id="description" name="description" class="form-control">{{ $sousCategorie->description }}</textarea>
                                        </div>

                                        <div class="mb-4">
                                            <label for="photo" class="form-label">Photo</label>
                                            <input id="photo" name="photo" type="file" class="form-control">
                                            @if($sousCategorie->photo)
                                                <img src="{{ asset('images/services/' . $sousCategorie->photo) }}" alt="{{ $sousCategorie->nom }}" width="100" height="100" class="mt-2">
                                            @endif
                                        </div>

                                        <div class="row justify-content-end">
                                            <div class="col-lg-10">
                                                <button type="submit" class="btn btn-primary">Modifier la sous-catégorie</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div> <!-- container-fluid -->
            </div> <!-- End Page-content -->
        </div> <!-- main-content -->

        @include('Administrateur.layout.footer')
    </div>

</body>

</html>
