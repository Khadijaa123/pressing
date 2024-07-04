<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Espace Administrateur Rapidos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href=" {{ asset('images/favicon.ico') }}">

    <!-- Bootstrap Css -->
    <link href=" {{ asset('css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href=" {{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href=" {{ asset('css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body data-sidebar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">
        <!-- ========== Navbar Start ========== -->
        @include('Administrateur/layout/navbar')
        <!-- Navbar End -->

        <!-- ========== Left Sidebar Start ========== -->
        @include('Administrateur/layout/sidebar')
        <!-- Left Sidebar End -->

        <!-- Start right Content here -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">Modifier</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Modifier les services</h4>
                                    <form action="{{ route('services.update',  ['id' => $service->id]) }}" method="POST">
                                        @csrf
                                        <div class="row mb-4">
                                            <label for="nom" class="col-form-label col-lg-2">Prix</label>
                                            <div class="col-lg-10">
                                                <input id="prix" name="prix" type="text" class="form-control" placeholder="Entrer le prix" value="{{$service->prix}}">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="photo" class="col-form-label col-lg-2">Photo</label>
                                            <div class="col-lg-10">
                                                <input id="photo" name="photo" type="file" class="form-control">
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label class="col-form-label col-lg-2">Description</label>
                                            <div class="col-lg-10">
                                                <input id="description" name="description" type="text" class="form-control" placeholder="Entrer la description" value="{{$service->description}}">
                                            </div>
                                        </div>

                                        

                                        
                                        <div class="row mb-4">
                                            <label for="id_sous_categories"
                                                class="col-form-label col-lg-2">Sous-Catégorie</label>
                                            <div class="col-lg-10">
                                                <select id="id_sous_categories" name="id_sous_categories"
                                                    class="form-control">
                                                    @foreach($sousCategories as $sousCategorie)
                                                    <option value="{{ $sousCategorie->id }}">{{ $sousCategorie->nom }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row justify-content-end">
                                            <div class="col-lg-10">
                                                <button type="submit" class="btn btn-primary">Modifier le service</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <!-- ========== Footer Start ========== -->
            @include('Administrateur/layout/footer')
            <!-- Footer End -->
        </div>
        <!-- end main content-->

        {{-- <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div> --}}
</body>

</html>
