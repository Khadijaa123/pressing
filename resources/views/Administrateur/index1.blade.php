
<!doctype html>
<html lang="en">

    
<!-- Mirrored from themesbrand.com/skote/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Aug 2022 09:52:56 GMT -->
<head>
        
        <meta charset="utf-8" />
        <title>Login | Skote - Admin & Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">

        <!-- Bootstrap Css -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" id="bootstrap-style" type="text/css" />
        <!-- Icons Css -->
        <link rel="stylesheet" href="{{ asset('css/icons.min.css') }}" type="text/css" />
        <!-- App Css-->
        <link rel="stylesheet" href="{{ asset('css/app.min.css') }}" id="app-style" type="text/css" />
    </head>

    <body>
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="bg-primary bg-soft">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-primary p-4">
                                            <h5 class="text-primary">Espace Administrateur Rapidos  !</h5>
                                            <p>Veuillez s'authentifier.</p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="assets/images/profile-img.png" alt="" class="img-fluid">                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0"> 
                                <div class="auth-logo">
                                    <a href="index.html" class="auth-logo-light">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="assets/images/logo-light.svg" alt="" class="rounded-circle" height="34">                                            </span>                                        </div>
                                    </a>

                                    <a href="index.html" class="auth-logo-dark">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="assets/images/logo.svg" alt="" class="rounded-circle" height="34">                                            </span>                                        </div>
                                    </a>                                </div>
                                <div class="p-2">
                                    <form action="{{ route('client.store1') }}" method="POST">
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
                        <div class="mt-5 text-center">
                            
                            <div>
                                <p>&nbsp;</p>
                                <p>© <script>document.write(new Date().getFullYear())</script> 
                                  Rapidos. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end account-pages -->

        <!-- JAVASCRIPT -->
        <script src="{{ asset('libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('libs/node-waves/waves.min.js') }}"></script>
        
        <!-- App js -->
        <script src="{{ asset('/js/app.js') }}"></script>
    </body>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<!-- Mirrored from themesbrand.com/skote/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Aug 2022 09:52:56 GMT -->
</html>
