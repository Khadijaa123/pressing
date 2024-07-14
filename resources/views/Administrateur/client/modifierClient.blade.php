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
    <link href= "{{ asset('css/toastr.css') }} " rel="stylesheet" />
    <script src="{{ asset('js/toastr.js') }} "></script>
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script>
        $(document).ready(function() {
            //toastr.info('Are you the 6 fingered man?')


            Command: toastr[success]("   ", "Settings Saved!")

            toastr.options: {
                "debug": false,
                "positionClass": "toast-top-right",
                "onclick": null,
                "fadeIn": 300,
                "fadeOut": 1000,
                "timeOut": 5000,
                "extendedTimeOut": 1000
            }
        });
    </script>

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">

        @include('Administrateur/layout/navbar')
        <!-- ========== Left Sidebar Start ========== -->
        @include('Administrateur/layout/sidebar')
        <!-- Left Sidebar End -->

        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">Modifier Client</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Modifier les informations d'un client</h4>
                                    <form action="{{ route('client.update1',$data->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="id" value="{{ $data->id }}">

                                        <div class="row mb-4">
                                            <label for="nom" class="col-form-label col-lg-2">Nom de client</label>
                                            <div class="col-lg-10">
                                                <input id="nom" name="nom" type="text" class="form-control"
                                                    value="{{ $data->nom }}">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="prenom" class="col-form-label col-lg-2">Prénom de
                                                client</label>
                                            <div class="col-lg-10">
                                                <input id="prenom" name="prenom" type="text" class="form-control"
                                                    value="{{ $data->prenom }}">
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label class="col-form-label col-lg-2">E-mail de client</label>
                                            <div class="col-lg-10">
                                                <input id="adresseE" name="adresseE" type="email"
                                                    class="form-control" value="{{ $data->email }}">

                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="telephone" class="col-form-label col-lg-2">Numéro de téléphone
                                                de client</label>
                                            <div class="col-lg-10">
                                                <input id="telephone" name="telephone" type="numeric"
                                                    class="form-control" value="{{ $data->num_tel }}">
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label class="col-form-label col-lg-2">ville de client</label>
                                            <div class="col-lg-10">
                                                <input id="ville" name="ville" type="text"
                                                    class="form-control" value="{{ $data->ville }}">

                                            </div>
                                        </div>
                                        <div class="row justify-content-end">
                                            <div class="col-lg-10">
                                                <button type="submit" class="btn btn-primary">Modifier compte
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
</html>