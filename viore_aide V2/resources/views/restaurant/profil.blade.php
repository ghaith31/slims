<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-assets-path="assets/" data-template="vertical-menu-template">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <title>Profile</title>
    <!-- Metas, title, links aux styles, etc. -->

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets//img/favicon/favicon.ico')}}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/fontawesome.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/tabler-icons.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/flag-icons.css')}}">

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/core.css')}}" class="template-customizer-core-css">
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/theme-default.css')}}" class="template-customizer-theme-css">
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css')}}">

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/node-waves/node-waves.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/typeahead-js/typeahead.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css')}}">



    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="assets/vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="assets/js/config.js"></script>
</head>
<body>
    <style>
        .dev {
            margin-right: 3% !important;
            margin-left: 18%;
        }
        .profil {
            width: 240%;
        }
    </style>

    @include('admin.sidebar')
    @include('admin.nav')

    <div class="profil dev">
        @if ($employe)
        <div class="container-xxl  container-p-y">
            <h4 class="py-3 mb-4"><span class="text-muted fw-light"> /</span> Profile</h4>

            <!-- Header -->
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
                            <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                                <img src="{{ $employe->photo }}" alt="user image" class="img img-responsive d-block h-auto ms-0 ms-sm-4 rounded user-profile-img">
                            </div>
                            <div class="flex-grow-1 mt-3 mt-sm-5">
                                <div class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                                    <div class="user-profile-info">
                                        <h4>{{ $employe->Nom }}</h4>
                                        <ul class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                                            <li class="list-inline-item d-flex gap-1">
                                                <i class="ti ti-color-swatch"></i> Admin restaurant
                                            </li>
                                            <li class="list-inline-item d-flex gap-1">
                                                <i class="ti ti-map-pin"></i>{{ $employe->pays }}
                                            </li>
                                            <li class="list-inline-item d-flex gap-1">
                                                <i class="ti ti-calendar"></i> {{ $employe->created_at }}
                                            </li>
                                        </ul>
                                    </div>
                                    <a href="javascript:void(0)" class="btn btn-primary">
                                        <i class="ti ti-check me-1"></i>Connected
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Header -->

            <!-- Navbar pills -->
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-pills flex-column flex-sm-row mb-4">
                        <li class="nav-item">
                            <a class="nav-link active" href="javascript:void(0);"><i class="ti-xs ti ti-user-check me-1"></i> Profile</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!--/ Navbar pills -->

            <!-- User Profile Content -->
            <div class="row">
                <div class="col-xl-4 col-lg-5 col-md-5">
                    <!-- About User -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <small class="card-text text-uppercase">Apropos</small>
                            <ul class="list-unstyled mb-4 mt-3">
                                <li class="d-flex align-items-center mb-3">
                                    <i class="ti ti-user text-heading"></i>
                                    <span class="fw-medium mx-2 text-heading">Nom et prénom :</span> <span>{{ $employe->Nom }}</span>
                                </li>
                                <li class="d-flex align-items-center mb-3">
                                    <i class="ti ti-check text-heading"></i>
                                    <span class="fw-medium mx-2 text-heading">Status:</span> <
                                    <span>Active</span>
                                  </li>
                                  <li class="d-flex align-items-center mb-3">
                                      <i class="ti ti-crown text-heading"></i>
                                      <span class="fw-medium mx-2 text-heading">Role:</span> <span>Admin</span>
                                  </li>
                                  <li class="d-flex align-items-center mb-3">
                                      <i class="ti ti-flag text-heading"></i>
                                      <span class="fw-medium mx-2 text-heading">Country:</span> <span>{{ $employe->pays }}</span>
                                  </li>
                              </ul>
                              <small class="card-text text-uppercase">Contacts</small>
                              <ul class="list-unstyled mb-4 mt-3">
                                  <li class="d-flex align-items-center mb-3">
                                      <i class="ti ti-phone-call"></i>
                                      <span class="fw-medium mx-2 text-heading">Contact:</span>
                                      <span>{{ $employe->numero_de_téléphone }}</span>
                                  </li>
                                  <li class="d-flex align-items-center mb-3">
                                      <i class="ti ti-brand-skype"></i>
                                      <span class="fw-medium mx-2 text-heading">Restaurant:</span>
                                      <span>{{ $employe->nomrestau }}</span>
                                  </li>
                                  <li class="d-flex align-items-center mb-3">
                                      <i class="ti ti-mail"></i>
                                      <span class="fw-medium mx-2 text-heading">Email:</span>
                                      <span>{{ $employe->Email }}</span>
                                  </li>
                              </ul>
                          </div>
                      </div>
                      <!--/ About User -->
                  </div>
                  <div class="col-xl-8 col-lg-7 col-md-7">
                      <div class="row">
                          <!-- Vous pouvez ajouter d'autres éléments ici si nécessaire -->
                      </div>
                  </div>
              </div>
              <!--/ User Profile Content -->
          </div>
          <!-- / Content -->
          @else 
          <p>Ajoutez vos informations svp</p>
          @endif
      </div>
  
      @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
      @endif
  
      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
  
      <!-- Drag Target Area To SlideIn Menu On Small Screens -->
      <div class="drag-target"></div>
  </body>
  </html>
  