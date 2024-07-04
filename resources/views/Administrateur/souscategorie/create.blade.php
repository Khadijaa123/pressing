<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Ajouter Nouveau Sous-Categorie</title>
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
                                <h4 class="mb-sm-0 font-size-18">Ajouter Nouveau Sous-Categorie</h4>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Ajouter Nouveau Sous-Categorie</h4>
                                    <form action="{{ route('sousCategorie.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row mb-4">
                                            <label for="nom" class="col-form-label col-lg-2">Nom</label>
                                            <div class="col-lg-10">
                                                <input id="nom" name="nom" type="text" class="form-control"
                                                    placeholder="Entrer le nom">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="photo" class="col-form-label col-lg-2">Photo</label>
                                            <div class="col-lg-10">
                                                <input id="photo" name="photo" type="file" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="description" class="col-form-label col-lg-2">Description</label>
                                            <div class="col-lg-10">
                                                <textarea id="description" name="description" class="form-control"
                                                    placeholder="Entrer la description"></textarea>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="categorie_id" class="col-form-label col-lg-2">Catégorie</label>
                                            <div class="col-lg-10">
                                                <select id="categorie_id" name="categorie_id" class="form-control">
                                                    @foreach($categories as $categorie)
                                                    <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row justify-content-end">
                                            <div class="col-lg-10">
                                                <button type="submit" class="btn btn-primary">Ajouter Sous-Categorie</button>
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

    <script src="{{ asset('js/vendor.min.js') }}"></script>
    <script src="{{ asset('js/app.min.js') }}"></script>

</body>

</html>
