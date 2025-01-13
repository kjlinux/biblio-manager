<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>MyBiblio</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href={{ asset('assets/vendors/ti-icons/css/themify-icons.css') }}>
    <link rel="stylesheet" href={{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}>
    <link rel="stylesheet" href={{ asset('assets/vendors/css/vendor.bundle.base.css') }}>
    <link rel="stylesheet" href={{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}>
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href={{ asset('assets/vendors/jvectormap/jquery-jvectormap.css') }}>
    <link rel="stylesheet" href={{ asset('assets/vendors/flag-icon-css/css/flag-icons.min.css') }}>
    <link rel="stylesheet" href={{ asset('assets/vendors/owl-carousel-2/owl.carousel.min.css') }}>
    <link rel="stylesheet" href={{ asset('assets/vendors/owl-carousel-2/owl.theme.default.min.css') }}>
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link href={{ asset('assets/css/select2.min.css') }} rel="stylesheet" />
    <link rel="stylesheet" href={{ asset('assets/css/style.css') }}>
    <!-- End layout styles -->
    <link rel="stylesheet" href={{ asset('assets/css/bootstrap-icons.css') }}>
    <link rel="shortcut icon" href={{ asset('assets/images/side-logo.png') }} />
    <link rel="stylesheet" href={{ asset('assets/css/bootstrap-table.min.css') }}>

</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
                <h1 style="color: white">MyBiblio</h1>
                <a class="sidebar-brand brand-logo-mini" href={{ asset('assets/images/logo.svg') }}>
                    <h1 style="color: white">MyBiblio</h1>
                </a>
            </div>
            <ul class="nav">
                <li class="nav-item nav-category">
                    <span class="nav-link">Navigation</span>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href={{ route('home') }}>
                        <span class="menu-icon">
                            <i class="mdi mdi-home"></i>
                        </span>
                        <span class="menu-title">Accueil</span>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href={{ route('books.index') }}>
                        <span class="menu-icon">
                            <i class="mdi mdi-book-open-page-variant"></i>
                        </span>
                        <span class="menu-title">Livres</span>
                        <i class="menu-arrow"></i>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href={{ route('customers.index') }}>
                        <span class="menu-icon">
                            <i class="mdi mdi-account-group"></i>
                        </span>
                        <span class="menu-title">Clients</span>
                        <i class="menu-arrow"></i>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href={{ route('borrows.index') }}>
                        <span class="menu-icon">
                            <i class="mdi mdi-calendar-check"></i>
                        </span>
                        <span class="menu-title">Emprunts</span>
                        <i class="menu-arrow"></i>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href={{ route('authors.index') }}>
                        <span class="menu-icon">
                            <i class="mdi mdi-account-tie"></i>
                        </span>
                        <span class="menu-title">Auteurs</span>
                        <i class="menu-arrow"></i>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href={{ route('classifications.index') }}>
                        <span class="menu-icon">
                            <i class="mdi mdi-tag-multiple"></i>
                        </span>
                        <span class="menu-title">Classifications</span>
                        <i class="menu-arrow"></i>
                    </a>
                </li>

                <li class="nav-item menu-items">
                    <a class="nav-link" href={{ route('editions.index') }}>
                        <span class="menu-icon">
                            <i class="mdi mdi-book-edit"></i>
                        </span>
                        <span class="menu-title">Editions</span>
                        <i class="menu-arrow"></i>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href={{ route('providers.index') }}>
                        <span class="menu-icon">
                            <i class="mdi mdi-truck"></i>
                        </span>
                        <span class="menu-title">Fournisseurs</span>
                        <i class="menu-arrow"></i>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href={{ route('purchases.index') }}>
                        <span class="menu-icon">
                            <i class="mdi mdi-cart"></i>
                        </span>
                        <span class="menu-title">Achats de livres</span>
                        <i class="menu-arrow"></i>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                        aria-controls="ui-basic">
                        <span class="menu-icon">
                            <i class="mdi mdi-database-search"></i>
                        </span>
                        <span class="menu-title">Interrogation BD</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-basic">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href={{ route('queries.books') }}>Livres</a>
                            </li>
                            <li class="nav-item"> <a class="nav-link" href={{ route('queries.borrows') }}>Emprunts</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            <nav class="navbar p-0 fixed-top d-flex flex-row">
                <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
                    <a class="navbar-brand brand-logo-mini" href="index.html">
                        <h1></h1><img height="400" width="400px" src={{ asset('assets/images/l.png') }}
                            alt="logo" />
                    </a>
                </div>
                <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button"
                        data-toggle="minimize">
                        <span class="mdi mdi-menu"></span>
                    </button>
                    <ul class="navbar-nav navbar-nav-right">
                        <li class="nav-item dropdown">
                            <a class="nav-link" id="profileDropdown" href="#" data-bs-toggle="dropdown">
                                <div class="navbar-profile">
                                    <img class="img-xs rounded-circle" src={{ asset('assets/images/side-logo.png') }}
                                        alt="">
                                    <p class="mb-0 d-none d-sm-block navbar-profile-name">Bienvenue</p>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end navbar-dropdown preview-list"
                                aria-labelledby="profileDropdown">
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-logout text-danger"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject mb-1">Déconnexion</p>
                                    </div>
                                </a>
                            </div>
                        </li>
                    </ul>
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                        data-toggle="offcanvas">
                        <span class="mdi mdi-format-line-spacing"></span>
                    </button>
                </div>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('layout')
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright ©
                            2024 <a href="https://github.com/kjlinux/biblio-manager/tree/master"
                                target="_blank">IDSI-M1-DS</a>. Tous
                            droits réservés.</span>
                        <span class="text-muted float-none float-sm-end d-block mt-1 mt-sm-0 text-center"> <span
                                class="text-muted float-none float-sm-end d-block mt-1 mt-sm-0 text-center">JUDE
                                KOFFI
                                & OUMAROU SYLLA </span></span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src={{ asset('assets/js/jquery.min.js') }}></script>

    <script src={{ asset('assets/vendors/js/vendor.bundle.base.js') }}></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src={{ asset('assets/vendors/chart.js/chart.umd.js') }}></script>
    <script src={{ asset('assets/vendors/progressbar.js/progressbar.min.js') }}></script>
    <script src={{ asset('assets/vendors/jvectormap/jquery-jvectormap.min.js') }}></script>
    <script src={{ asset('assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}></script>
    <script src={{ asset('assets/vendors/owl-carousel-2/owl.carousel.min.js') }}></script>
    <script src={{ asset('assets/js/jquery.cookie.js') }} type="text/javascript"></script>
    <script src={{ asset('assets/js/select2.min.js') }}></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src={{ asset('assets/js/off-canvas.js') }}></script>
    <script src={{ asset('assets/js/misc.js') }}></script>
    <script src={{ asset('assets/js/settings.js') }}></script>
    <script src={{ asset('assets/js/todolist.js') }}></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src={{ asset('assets/js/proBanner.js') }}></script>
    <script src={{ asset('assets/js/dashboard.js') }}></script>
    <script src={{ asset('assets/js/bootstrap.bundle.min.js') }}></script>
    <script src={{ asset('assets/js/bootstrap-table.min.js') }}></script>
    <script src={{ asset('assets/js/bootstrap-table-fr-FR.min.js') }}></script>
    <script src={{ asset('assets/js/sweetalert2@11.js') }}></script>
    {{-- <script src={{asset("assets/js/chart.min.js")}}
        integrity="sha512-L0Shl7nXXzIlBSUUPpxrokqq4ojqgZFQczTYlGjzONGTDAcLremjwaWv5A+EDLnxhQzY5xUZPWLOLqYRkY0Cbw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    {{-- <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script> --}}
    @stack('script')
    <!-- End custom js for this page -->
</body>

</html>
