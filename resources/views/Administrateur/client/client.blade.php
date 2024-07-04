<!doctype html>
<html lang="en">


<!-- Mirrored from themesbrand.com/skote/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Aug 2022 09:50:55 GMT -->

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

        @include('Administrateur/layout/navbar')

        <!-- ========== Left Sidebar Start ========== -->
        @include('Administrateur/layout/sidebar')
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">Ajouter Nouveau</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Ajouter Nouveau Client</h4>
                                    <form action="{{ route('client.store') }}" method="POST">
                                        @csrf
                                        <div class="row mb-4">
                                            <label for="nom" class="col-form-label col-lg-2">Nom de
                                                client</label>
                                            <div class="col-lg-10">
                                                <input id="nom" name="nom" type="text"
                                                    class="form-control" placeholder="Entrer le nom">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="prenom" class="col-form-label col-lg-2">Prénom de
                                                client</label>
                                            <div class="col-lg-10">
                                                <input id="prenom" name="prenom" type="text"
                                                    class="form-control" placeholder="Entrer le prenom">
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label class="col-form-label col-lg-2">E-mail de client</label>
                                            <div class="col-lg-10">
                                                <input id="adresseE" name="adresseE" type="email"
                                                    class="form-control" placeholder="Entrer l'e-mail">
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="telephone" class="col-form-label col-lg-2">Numéro de téléphone
                                                de client</label>
                                            <div class="col-lg-10">
                                                <input id="telephone" name="telephone" type="numeric"
                                                    class="form-control" placeholder="Entrer le numéro téléphone">
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label class="col-form-label col-lg-2">Ville de client</label>
                                            <div class="col-lg-10">
                                                <input id="ville" name="ville" type="text"
                                                    class="form-control" placeholder="Entrer la ville">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="username" class="col-form-label col-lg-2">Nom d'utilisateur</label>
                                            <div class="col-lg-10">
                                                <input id="username" name="username" type="text" class="form-control" placeholder="Entrer le nom d'utilisateur" required>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="pwd" class="col-form-label col-lg-2">Mot de passe</label>
                                            <div class="col-lg-10">
                                                <input id="pwd" name="pwd" type="password" class="form-control" placeholder="Entrer le mot de passe" required>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="pwd_confirmation" class="col-form-label col-lg-2">Confirmer le mot de passe</label>
                                            <div class="col-lg-10">
                                                <input id="pwd_confirmation" name="pwd_confirmation" type="password" class="form-control" placeholder="Confirmer le mot de passe" required>
                                            </div>
                                        </div>
                                        <div class="row justify-content-end">
                                            <div class="col-lg-10">
                                                <button type="submit" class="btn btn-primary">Ajouter compte
                                                    client</button>
                                            </div>
                                        </div>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            @include('Administrateur/layout/footer')
</body>


<!-- Mirrored from themesbrand.com/skote/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Aug 2022 09:51:50 GMT -->

</html>
