<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Star Admin2 </title>
    <!-- BOXICONS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- UNICONS -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('vendors/feather/feather.css') }} ">
    <link rel="stylesheet" href="{{ asset('vendors/mdi/css/materialdesignicons.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('vendors/ti-icons/css/themify-icons.css') }} ">
    <link rel="stylesheet" href="{{ asset('vendors/typicons/typicons.css') }} ">
    <link rel="stylesheet" href="{{ asset('vendors/simple-line-icons/css/simple-line-icons.css') }} ">
    <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }} ">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('vendors/datatables.net-bs4/dataTables.bootstrap4.css') }} ">
    <link rel="stylesheet" href="{{ asset('js/select.dataTables.min.css') }} ">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }} " />

</head>

<body>
    {{-- start header --}}



    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
                <div class="me-3">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button"
                        data-bs-toggle="minimize">
                        <span class="icon-menu"></span>
                    </button>
                </div>
                <div>
                    <a class="navbar-brand brand-logo" href="index.html">
                        <img src="images/logo.svg" alt="logo" />
                    </a>
                    <a class="navbar-brand brand-logo-mini" href="index.html">
                        <img src="images/logo-mini.svg" alt="logo" />
                    </a>
                </div>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-top">
                <ul class="navbar-nav">
                    <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
                        <h1 class="welcome-text">Bonjour , <span
                                class="text-black fw-bold">{{ Auth::user()->name }}</span></h1>
                        <h3 class="welcome-sub-text"> Votre résumé de performance cette semaine </h3>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown d-none d-lg-block">
                        <a class="nav-link dropdown-bordered dropdown-toggle dropdown-toggle-split" id="messageDropdown"
                            href="#" data-bs-toggle="dropdown" aria-expanded="false"> Select Category </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0"
                            aria-labelledby="messageDropdown">
                            <a class="dropdown-item py-3">
                                <p class="mb-0 font-weight-medium float-left">Select category</p>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-item-content flex-grow py-2">
                                    <p class="preview-subject ellipsis font-weight-medium text-dark">Bootstrap Bundle
                                    </p>
                                    <p class="fw-light small-text mb-0">This is a Bundle featuring 16 unique dashboards
                                    </p>
                                </div>
                            </a>
                            <a class="dropdown-item preview-item">
                                <div class="preview-item-content flex-grow py-2">
                                    <p class="preview-subject ellipsis font-weight-medium text-dark">Angular Bundle</p>
                                    <p class="fw-light small-text mb-0">Everything you’ll ever need for your Angular
                                        projects</p>
                                </div>
                            </a>
                            <a class="dropdown-item preview-item">
                                <div class="preview-item-content flex-grow py-2">
                                    <p class="preview-subject ellipsis font-weight-medium text-dark">VUE Bundle</p>
                                    <p class="fw-light small-text mb-0">Bundle of 6 Premium Vue Admin Dashboard</p>
                                </div>
                            </a>
                            <a class="dropdown-item preview-item">
                                <div class="preview-item-content flex-grow py-2">
                                    <p class="preview-subject ellipsis font-weight-medium text-dark">React Bundle</p>
                                    <p class="fw-light small-text mb-0">Bundle of 8 Premium React Admin Dashboard</p>
                                </div>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item d-none d-lg-block">
                        <div id="datepicker-popup" class="input-group date datepicker navbar-date-picker">
                            <span class="input-group-addon input-group-prepend border-right">
                                <span class="icon-calendar input-group-text calendar-icon"></span>
                            </span>
                            <input type="text" class="form-control">
                        </div>
                    </li>
                    <li class="nav-item">
                        <form class="search-form" action="#">
                            <i class="icon-search"></i>
                            <input type="search" class="form-control" placeholder="Search Here" title="Search here">
                        </form>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link count-indicator" id="notificationDropdown" href="#"
                            data-bs-toggle="dropdown">
                            <i class="icon-mail icon-lg"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0"
                            aria-labelledby="notificationDropdown">
                            <a class="dropdown-item py-3 border-bottom">
                                <p class="mb-0 font-weight-medium float-left">You have 4 new notifications </p>
                                <span class="badge badge-pill badge-primary float-right">View all</span>
                            </a>
                            <a class="dropdown-item preview-item py-3">
                                <div class="preview-thumbnail">
                                    <i class="mdi mdi-alert m-auto text-primary"></i>
                                </div>
                                <div class="preview-item-content">
                                    <h6 class="preview-subject fw-normal text-dark mb-1">Application Error</h6>
                                    <p class="fw-light small-text mb-0"> Just now </p>
                                </div>
                            </a>
                            <a class="dropdown-item preview-item py-3">
                                <div class="preview-thumbnail">
                                    <i class="mdi mdi-settings m-auto text-primary"></i>
                                </div>
                                <div class="preview-item-content">
                                    <h6 class="preview-subject fw-normal text-dark mb-1">Settings</h6>
                                    <p class="fw-light small-text mb-0"> Private message </p>
                                </div>
                            </a>
                            <a class="dropdown-item preview-item py-3">
                                <div class="preview-thumbnail">
                                    <i class="mdi mdi-airballoon m-auto text-primary"></i>
                                </div>
                                <div class="preview-item-content">
                                    <h6 class="preview-subject fw-normal text-dark mb-1">New user registration</h6>
                                    <p class="fw-light small-text mb-0"> 2 days ago </p>
                                </div>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link count-indicator" id="countDropdown" href="#"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="icon-bell"></i>
                            <span class="count"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0"
                            aria-labelledby="countDropdown">
                            <a class="dropdown-item py-3">
                                <p class="mb-0 font-weight-medium float-left">You have 7 unread mails </p>
                                <span class="badge badge-pill badge-primary float-right">View all</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <img src="images/faces/face10.jpg" alt="image" class="img-sm profile-pic">
                                </div>
                                <div class="preview-item-content flex-grow py-2">
                                    <p class="preview-subject ellipsis font-weight-medium text-dark">Marian Garner </p>
                                    <p class="fw-light small-text mb-0"> The meeting is cancelled </p>
                                </div>
                            </a>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <img src="images/faces/face12.jpg" alt="image" class="img-sm profile-pic">
                                </div>
                                <div class="preview-item-content flex-grow py-2">
                                    <p class="preview-subject ellipsis font-weight-medium text-dark">David Grey </p>
                                    <p class="fw-light small-text mb-0"> The meeting is cancelled </p>
                                </div>
                            </a>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <img src="images/faces/face1.jpg" alt="image" class="img-sm profile-pic">
                                </div>
                                <div class="preview-item-content flex-grow py-2">
                                    <p class="preview-subject ellipsis font-weight-medium text-dark">Travis Jenkins
                                    </p>
                                    <p class="fw-light small-text mb-0"> The meeting is cancelled </p>
                                </div>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown d-none d-lg-block user-dropdown">
                        <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <img class="img-xs rounded-circle" src="images/faces/face8.jpg" alt="Profile image"> </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                            <div class="dropdown-header text-center">
                                <img class="img-md rounded-circle" src="images/faces/face8.jpg" alt="Profile image">
                                <p class="mb-1 mt-3 font-weight-semibold">Allen Moreno</p>
                                <p class="fw-light text-muted mb-0">allenmoreno@gmail.com</p>
                            </div>
                            <a class="dropdown-item"><i
                                    class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My
                                Profile <span class="badge badge-pill badge-danger">1</span></a>
                            <a class="dropdown-item"><i
                                    class="dropdown-item-icon mdi mdi-message-text-outline text-primary me-2"></i>
                                Messages</a>
                            <a class="dropdown-item"><i
                                    class="dropdown-item-icon mdi mdi-calendar-check-outline text-primary me-2"></i>
                                Activity</a>
                            <a class="dropdown-item"><i
                                    class="dropdown-item-icon mdi mdi-help-circle-outline text-primary me-2"></i>
                                FAQ</a>
                            <a href="{{ route('logout') }}" class="dropdown-item"><i
                                    class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-bs-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        {{-- end header --}}
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->

            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">
                            <i class="mdi mdi-grid-large menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item nav-category">Recrutement</li>
                    {{-- ADMIN --}}
                    @role('admin')
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                                aria-controls="ui-basic">
                                <i class="menu-icon mdi mdi-floor-plan"></i>
                                <span class="menu-title">Rôle et Permission</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="collapse" id="ui-basic">
                                <ul class="nav flex-column sub-menu">
                                    {{-- @can('gestion roles et permissions') --}}
                                    <li class="nav-item"> <a class="nav-link" href="{{ route('role.new') }}">Creation
                                            role</a></li>
                                    {{-- @endcan --}}
                                    <li class="nav-item"> <a class="nav-link"
                                            href="{{ route('role.attributPermissionToRole') }}">Attribution permission</a>
                                    </li>
                                    <li class="nav-item"> <a class="nav-link"
                                            href="{{ route('role.attributRoleUser') }}">Attribution Rôle aux User</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="{{ route('role.list') }}">list</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endrole

                    {{-- OFFRES --}}
                    @role('admin')
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#Offres" aria-expanded="false"
                            aria-controls="ui-basic">
                            <i class="menu-icon mdi mdi-floor-plan"></i>
                            <span class="menu-title">Offres</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="Offres">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link"
                                        href="{{ route('offres.liste') }}">Listes</a></li>
                                <li class="nav-item"> <a class="nav-link"
                                        href="{{ route('offres.nouveau') }}">Nouveau</a></li>
                                <li class="nav-item"> <a class="nav-link"
                                        href="pages/ui-features/dropdowns.html">Questionnaires</a></li>
                            </ul>
                        </div>
                    </li>
                    {{-- CANDIDATS --}}
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#Candidats" aria-expanded="false"
                            aria-controls="auth">
                            <i class="menu-icon mdi mdi-account-circle-outline"></i>
                            <span class="menu-title">Candidats</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="Candidats">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Liste </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @endrole
                    {{-- PERSONNELS --}}
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#Personnels" aria-expanded="false"
                            aria-controls="auth">
                            <i class="menu-icon mdi mdi-account-circle-outline"></i>
                            <span class="menu-title">Personnels</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="Personnels">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="{{ route('employes.liste') }}">
                                        Liste </a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ route('employes.nouveau') }}">
                                        Nouveau </a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ route('employes.voir') }}">
                                        Contrat </a></li>


                            </ul>
                        </div>
                    </li>

                    {{-- Conges --}}
                    @role('admin')
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="collapse" href="#Conges" aria-expanded="false"
                                aria-controls="auth">
                                <i class="menu-icon mdi mdi-account-circle-outline"></i>
                                <span class="menu-title">Conges</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="collapse" id="Conges">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item"> <a class="nav-link" href="{{ route('conges.nouveau') }}">
                                            Nouveau </a></li>
                                    <li class="nav-item"> <a class="nav-link" href="{{ route('conges.notif') }}"> Notif
                                        </a></li>
                                    <li class="nav-item"> <a class="nav-link" href="{{ route('conges.historique') }}">
                                            Historique </a></li>
                                </ul>
                            </div>
                        </li>
                    @endrole

                    {{-- Paiement --}}
                    @role('admin')
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="collapse" href="#Paiement" aria-expanded="false"
                                aria-controls="auth">
                                <i class="menu-icon mdi mdi-account-circle-outline"></i>
                                <span class="menu-title">Paiement</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="collapse" id="Paiement">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item"> <a class="nav-link" href="{{ route('paies.liste') }}"> Liste
                                        </a></li>
                                    <li class="nav-item"> <a class="nav-link" href="{{ route('paies.nouveau') }}">
                                            Nouveau </a></li>
                                    <li class="nav-item"> <a class="nav-link" href="{{ route('paies.choixPeriode') }}">
                                            Etat de paie </a></li>
                                </ul>
                            </div>
                        </li>
                    @endrole
                    {{-- PRESENCE --}}
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#Presence" aria-expanded="false"
                            aria-controls="auth">
                            <i class="menu-icon mdi mdi-account-circle-outline"></i>
                            <span class="menu-title">Presence</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="Presence">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="{{ route('presence.choix') }}">
                                        Liste </a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ route('presence.nouveau') }}">
                                        Nouveau </a></li>
                            </ul>
                        </div>
                    </li>

                    {{-- BON COMMANDE --}}
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#bonCommande" aria-expanded="false"
                            aria-controls="auth">
                            <i class="menu-icon mdi mdi-account-circle-outline"></i>
                            <span class="menu-title">Bon de commande</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="bonCommande">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link"
                                        href="{{ route('bonCommandes.nouveau') }}"> nouveau </a></li>
                                <li class="nav-item"> <a class="nav-link"
                                        href="{{ route('detailsBonCommandes.nouveau') }}"> Modifier </a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ route('bonCommandes.liste') }}">
                                        liste </a></li>
                                @role('finance')
                                        <li class="nav-item"> <a class="nav-link"
                                        href="{{ route('bonCommandes.notiffinance') }}"> Notif finance </a></li>
                                @endrole
                                @role('daf')
                                    <li class="nav-item"> <a class="nav-link"
                                            href="{{ route('bonCommandes.notifdaf') }}"> Notif daf </a></li>
                                @endrole
                            </ul>
                        </div>
                    </li>
                    {{-- FOURNISSEUR --}}
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#fournisseur" aria-expanded="false"
                            aria-controls="auth">
                            <i class="menu-icon mdi mdi-account-circle-outline"></i>
                            <span class="menu-title">Fournisseur</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="fournisseur">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="{{ route('fournisseur.nouveau') }}">
                                        nouveau </a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ route('fournisseur.liste') }}">
                                        liste </a></li>
                            </ul>
                        </div>
                    </li>
                    {{-- PRODUIT --}}
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#Produit" aria-expanded="false"
                            aria-controls="auth">
                            <i class="menu-icon mdi mdi-account-circle-outline"></i>
                            <span class="menu-title">Produit</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="Produit">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="{{ route('produit.nouveau') }}">
                                        nouveau </a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ route('produit.liste') }}"> liste
                                    </a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#Produit" aria-expanded="false"
                            aria-controls="auth">
                            <i class="menu-icon mdi mdi-account-circle-outline"></i>
                            <span class="menu-title">Stocks</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="Produit">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="{{ route('stock.entre') }}">entre de stock </a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ route('stock.sortie') }}">sortie de stock </a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ route('stock.choiceEtatStock') }}">etat de stock </a></li>
                            </ul>
                        </div>
                    </li>

                    {{-- DEMANDES DE PRODUIT --}}
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#demandeProduit" aria-expanded="false"
                            aria-controls="auth">
                            <i class="menu-icon mdi mdi-account-circle-outline"></i>
                            <span class="menu-title">Demande</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="demandeProduit">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="{{ route('demande.nouveau') }}">
                                        nouveau </a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ route('demande.validation') }}"> liste
                                    </a></li>
                                @can('valider demande produit')
                                    <li class="nav-item"> <a class="nav-link" href="{{ route('demande.validation') }}">
                                            validation
                                        </a></li>
                                @endcan
                            </ul>
                        </div>
                    </li>


                    <li class="nav-item nav-category">Finance</li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false"
                            aria-controls="form-elements">
                            <i class="menu-icon mdi mdi-card-text-outline"></i>
                            <span class="menu-title">Form elements</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="form-elements">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">Basic
                                        Elements</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#charts" aria-expanded="false"
                            aria-controls="charts">
                            <i class="menu-icon mdi mdi-chart-line"></i>
                            <span class="menu-title">Charts</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="charts">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link"
                                        href="pages/charts/chartjs.html">ChartJs</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false"
                            aria-controls="tables">
                            <i class="menu-icon mdi mdi-table"></i>
                            <span class="menu-title">Tables</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="tables">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="pages/tables/basic-table.html">Basic
                                        table</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#icons" aria-expanded="false"
                            aria-controls="icons">
                            <i class="menu-icon mdi mdi-layers-outline"></i>
                            <span class="menu-title">Icons</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="icons">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html">Mdi icons</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>

            <!-- CONTENU -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        @yield('page-content')
                        {{-- <div class="col-sm-12">
              <div class="home-tab">
                <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                  
                </div>
          
              </div>
            </div> --}}
                    </div>
                </div>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        {{-- END --}}

        <!-- plugins:js -->
        <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <script src="{{ asset('vendors/chart.js/Chart.min.js') }}"></script>
        <script src="{{ asset('vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
        <script src="{{ asset('vendors/progressbar.js/progressbar.min.js') }}"></script>

        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ asset('js/AJAX.js') }}"></script>

        <script src="{{ asset('js/off-canvas.js') }}"></script>
        <script src="{{ asset('js/hoverable-collapse.js') }}"></script>
        <script src="{{ asset('js/template.js') }}"></script>
        <script src="{{ asset('js/settings.js') }}"></script>
        <script src="{{ asset('js/todolist.js') }}"></script>
        <!-- endinject -->
        <!-- Custom js for this page-->
        <script src="{{ asset('js/jquery.cookie.js" type="text/javascript') }}"></script>
        <script src="{{ asset('js/dashboard.js') }}"></script>
        <script src="{{ asset('js/Chart.roundedBarCharts.js') }}"></script>
        <!-- End custom js for this page-->

        <script>
            $('#ajouter_reponse').click(function(e) {
                e.preventDefault();
                let newinput = $(`<input type="text" name="reponses[]"  class="form-control"  placeholder="reponse">`)
                $('.reponses').append(newinput);
            });
        </script>
</body>

</html>
