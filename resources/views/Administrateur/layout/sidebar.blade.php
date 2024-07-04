<div class="vertical-menu">
    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>

                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="bx bx-home-circle"></i><span class="badge rounded-pill bg-info float-end">04</span>
                        <span key="t-dashboards">Tableau de bord</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-layout"></i>
                        <span key="t-layouts">Layouts</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="javascript: void(0);" class="has-arrow" key="t-vertical">Vertical</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="layouts-light-sidebar.html" key="t-light-sidebar">Light Sidebar</a></li>
                                <li><a href="layouts-compact-sidebar.html" key="t-compact-sidebar">Compact Sidebar</a></li>
                                <li><a href="layouts-icon-sidebar.html" key="t-icon-sidebar">Icon Sidebar</a></li>
                                <li><a href="layouts-boxed.html" key="t-boxed-width">Boxed Width</a></li>
                                <li><a href="layouts-preloader.html" key="t-preloader">Preloader</a></li>
                                <li><a href="layouts-colored-sidebar.html" key="t-colored-sidebar">Colored Sidebar</a></li>
                                <li><a href="layouts-scrollable.html" key="t-scrollable">Scrollable</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow" key="t-horizontal">Horizontal</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="layouts-horizontal.html" key="t-horizontal">Horizontal</a></li>
                                <li><a href="layouts-hori-topbar-light.html" key="t-topbar-light">Topbar light</a></li>
                                <li><a href="layouts-hori-boxed-width.html" key="t-boxed-width">Boxed width</a></li>
                                <li><a href="layouts-hori-preloader.html" key="t-preloader">Preloader</a></li>
                                <li><a href="layouts-hori-colored-header.html" key="t-colored-topbar">Colored Header</a></li>
                                <li><a href="layouts-hori-scrollable.html" key="t-scrollable">Scrollable</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="menu-title" key="t-pages">Pages</li>

                <li>
                    <a href="auth-login1.html" key="t-login">
                        <i class="bx bx-user-circle"></i><span key="t-utility">Changer mot de passe</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-file"></i>
                        <span key="t-utility">Utilités</span>
                    </a>
                

                <li class="menu-title" key="t-components">Outils</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-user-friends" style="font-size:14px"></i>
                        <span key="t-ui-elements">Clients</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('ajouterClient') }}" key="t-alerts">Ajouter un client</a></li>
                        <li><a href="{{ route('listeClient') }}" key="t-buttons">Liste des clients</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fa fa-users" style="font-size:14px"></i>
                        <span key="t-ui-elements">Personnels</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('ajouterPersonnel') }}" key="t-alerts">Ajouter un personnel</a></li>
                        <li><a href="{{ route('listePersonnels') }}" key="t-buttons">Liste des personnels</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fa fa-motorcycle" style="font-size:14px"></i>
                        <span key="t-ui-elements">Transporteur</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('ajouterTransporteur') }}" key="t-alerts">Ajouter un transporteur</a></li>
                        <li><a href="{{ route('listeTransporteurs') }}" key="t-buttons">Liste des transporteurs</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="has-arrow waves-effect">
                        <i class="fa fa-users" style="font-size:14px"></i>
                        <span key="t-ui-elements">Equipe</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('ajouterEquipe') }}" key="t-alerts">Ajouter un Equipe</a></li>
                        <li><a href="{{ route('listeEquipes') }}" key="t-buttons">Liste des Equipe</a></li>
                    </ul>
                </li>
                
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-file"></i>
                        <span key="t-ui-elements">Categorie</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('ajouterCategorie') }}" key="t-alerts">Ajouter un Categorie</a></li>
                        <li><a href="{{ route('listeCategorie') }}" key="t-buttons">Liste des Categories</a></li>
                    </ul>
                </li>
                
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-file"></i>
                        <span key="t-ui-elements">SousCategorie</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('ajouterSousCategorie') }}" key="t-alerts">Ajouter un SousCategorie</a></li>
                        <li><a href="{{ route('listeSousCategories') }}" key="t-buttons">Liste des SousCategories</a></li>
                    </ul>
                </li>
             
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-file"></i>
                        <span key="t-ui-elements">Service</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('servicescreate') }}" key="t-alerts">Ajouter un Service</a></li>
                        <li><a href="{{ route('listeService') }}" key="t-buttons">Liste des Services</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('listeCommandes') }}" key="t-login">
                        <i class="bx bx-file"></i></i><span key="t-utility">liste de commande</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('historique') }}" key="t-login">
                        <i class="bx bx-file"></i></i><span key="t-utility">Historique</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>

<!-- JAVASCRIPT -->
<script src="{{ asset('libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('libs/node-waves/waves.min.js') }}"></script>

<!-- apexcharts -->
<script src="{{ asset('libs/apexcharts/apexcharts.min.js') }}"></script>

<!-- dashboard init -->
<script src="{{ asset('js/pages/dashboard.init.js') }}"></script>

<!-- App js -->
<script src="{{ asset('js/app.js') }}"></script>
