
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
                                    <form class="form-horizontal" action="{{ route('loginclient')}}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Nom d'utilisateur </label>
                                            <input type="text" class="form-control" id="username"  name="username" placeholder="Votre nom d'utilisateur">
                                        </div>
                
                                        <div class="mb-3">
                                            <label class="form-label">Mot de passe </label>
                                            <div class="input-group auth-pass-inputgroup">
                                                <input type="password" class="form-control" id="pwd"  name="pwd"  placeholder="Votre Mot de passe" aria-label="Password" aria-describedby="password-addon">
                                                <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                            </div>
                                        </div>

                                        
                                        <div class="mt-3 d-grid">
                                            <button class="btn btn-primary waves-effect waves-light" type="submit">Se connecter</button>
                                        </div>
            
                                      </form>
                                      <li>
                                        <a href="{{ route('cree') }}" key="t-login">
                                            <i class="bx bx-file"></i></i><span key="t-utility">cree compte</span>
                                        </a>
                                    </li>
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
