<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laundryes - Laundry Business Html Template</title>
    <meta name="description" content="Laundryes - Laundry Business Html Template. It is built using bootstrap 3.3.2 framework, works totally responsive, easy to customise, well commented codes and seo friendly.">
    <meta name="keywords" content="laundry, multipage, business, clean, bootstrap">
    <meta name="author" content="rudhisasmito.com">

    <!-- Favicons -->
    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,700,900' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!-- Modernizr -->
    <script type="text/javascript" src="js/modernizr.min.js"></script>
</head>

<body>
    <!-- Load page -->
    <div class="animationload">
        <div class="loader"></div>
    </div>

    <!-- NAVBAR SECTION -->
    <div class="navbar navbar-main navbar-fixed-top">
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
                        <div class="info">
                            <div class="info-item">
                                <span class="fa fa-phone"></span> Phone +62 7144 3300
                            </div>
                            <div class="info-item">
                                <span class="fa fa-envelope-o"></span> <a href="mailto:info@laundryes.com" title="">Email info@laundryes.com</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                        <div class="top-sosmed pull-right">
                            <a href="#" title=""><span class="fa fa-facebook"></span></a>
                            <a href="#" title=""><span class="fa fa-twitter"></span></a>
                            <a href="#" title=""><span class="fa fa-instagram"></span></a>
                            <a href="#" title=""><span class="fa fa-pinterest"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/"><img src="images/logo_blue.png" alt="" /></a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="/">Home</a>
                       
                    </li>
                    <li><a href="{{ route('panier.index') }}">Panier</a></li>
                    <li><a href="{{ route('listeCategorie1') }}">SERVICES</a></li>
                    <li><a href="pricing">PRICING</a></li>
                    <li><a href="faq">FAQ</a></li>
                    <li><a href="blog">BLOG</a></li>
                    <li><a href="{{ route('login') }}"> login</a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.mine.js"></script>
</body>

</html>
