<!doctype html>

<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data--path="{{asset('assets/') }}"
  data-template="vertical-menu-template">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Account settings</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('slims.png') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap"
      rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{asset('assets/vendor/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/fonts/tabler-icons.css') }}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/fonts/flag-icons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('assets/vendor/css/rtl/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('assets/vendor/css/rtl/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset('assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/node-waves/node-waves.css') }}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/typeahead-js/typeahead.css') }}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/@form-validation/form-validation.css') }}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/animate-css/animate.css') }}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{asset('assets/vendor/js/helpers.js') }}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="{{asset('assets/vendor/js/template-customizer.js') }}"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{asset('assets/js/config.js') }}"></script>
  </head>

  <body>
    <style>
      .dev{
             margin-right: 150%;
              margin-left: 18%;           
  }
  .profil{
      width: 520% !important;
  }
      </style>
       @include('admin.sidebar')
            <!-- Content wrapper -->
            <div class="dev">
            <div class="content-wrapper">
              <!-- Content -->
              @include('admin.nav')
              <div class="profil">
            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-md-12">
                  <ul class="nav nav-pills flex-column flex-md-row mb-4">
                    <li class="nav-item">
                      <a class="nav-link active" href="javascript:void(0);"
                        ><i class="ti-xs ti ti-users me-1"></i>Compte</a>
                    </li>
                  </ul>
                  <div class="card mb-4">
                    <h5 class="card-header">Détails du profile</h5>
                    <!-- Account -->
                    <form  method="post" action="{{ route('admin.updateProfile',$id) }}" enctype="multipart/form-data">
                      @csrf
                   
                    <div class="card-body">
                      <h4>Ajoutez votre image</h4>
                        <div class="d-flex align-items-start align-items-sm-center gap-4">                                                         
                                    <input type="file" class="form-control input-field " id="photo" name="photo">
                            
                        </div>
                    </div>
                
                    <hr class="my-0" />
                    <div class="card-body">
                      
                        <div class="row">
                         
                          <div class="mb-3 col-md-6">
                            <label for="lastName" class="form-label">Nom et Prénom:</label>
                            <input class="form-control" type="text" name="Nom" id="Nom" value="{{$employe->Nom}}" />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">E-mail: </label>
                            <input
                              class="form-control"
                              type="text"
                              id="Email"
                              name="Email"
                              value="{{$employe->Email}}" />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="organization" class="form-label">Restaurant :</label>
                            <input
                              type="text"
                              class="form-control"
                              id="nomrestau"
                              name="nomrestau"
                              value="{{$employe->nomrestau}}" />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="phoneNumber">Numéro de téléphone :</label>
                            <div class="input-group input-group-merge">
                              <input
                                type="text"
                                id="numero_de_téléphone"
                                name="numero_de_téléphone"
                                class="form-control"
                                value ="{{$employe->numero_de_téléphone}}" />
                            </div>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="address" class="form-label">Addresse :</label>
                            <input type="text" class="form-control" id="customerAddress1" name="customerAddress1" value="{{$employe->customerAddress1}}" />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="country">Pays:</label>
                            <select id="pays" name="pays" class="select2 form-select">
                                <option value="">Select</option>
                                <option value="Australia" {{$employe->pays == "Australia" ? 'selected' : ''}}>Australia</option>
                                <option value="Bangladesh" {{$employe->pays == "Bangladesh" ? 'selected' : ''}}>Bangladesh</option>
                                <option value="Belarus" {{$employe->pays == "Belarus" ? 'selected' : ''}}>Belarus</option>
                                <option value="Brazil" {{$employe->pays == "Brazil" ? 'selected' : ''}}>Brazil</option>
                                <option value="Canada" {{$employe->pays == "Canada" ? 'selected' : ''}}>Canada</option>
                                <option value="China" {{$employe->pays == "China" ? 'selected' : ''}}>China</option>
                                <option value="France" {{$employe->pays == "France" ? 'selected' : ''}}>France</option>
                                <option value="Germany" {{$employe->pays == "Germany" ? 'selected' : ''}}>Germany</option>
                                <option value="India" {{$employe->pays == "India" ? 'selected' : ''}}>India</option>
                                <option value="Indonesia" {{$employe->pays == "Indonesia" ? 'selected' : ''}}>Indonesia</option>
                                <option value="Tunisia" {{$employe->pays == "Tunisia" ? 'selected' : ''}}>Tunisia</option>
                                <option value="Italy" {{$employe->pays == "Italy" ? 'selected' : ''}}>Italy</option>
                                <option value="Japan" {{$employe->pays == "Japan" ? 'selected' : ''}}>Japan</option>
                                <option value="Korea" {{$employe->pays == "Korea" ? 'selected' : ''}}>Korea, Republic of</option>
                                <option value="Mexico" {{$employe->pays == "Mexico" ? 'selected' : ''}}>Mexico</option>
                                <option value="Philippines" {{$employe->pays == "Philippines" ? 'selected' : ''}}>Philippines</option>
                                <option value="Russian Federation" {{$employe->pays == "Russian Federation" ? 'selected' : ''}}>Russian Federation</option>
                                <option value="South Africa" {{$employe->pays == "South Africa" ? 'selected' : ''}}>South Africa</option>
                                <option value="Thailand" {{$employe->pays == "Thailand" ? 'selected' : ''}}>Thailand</option>
                                <option value="Turkey" {{$employe->pays == "Turkey" ? 'selected' : ''}}>Turkey</option>
                                <option value="Ukraine" {{$employe->pays == "Ukraine" ? 'selected' : ''}}>Ukraine</option>
                                <option value="United Arab Emirates" {{$employe->pays == "United Arab Emirates" ? 'selected' : ''}}>United Arab Emirates</option>
                                <option value="United Kingdom" {{$employe->pays == "United Kingdom" ? 'selected' : ''}}>United Kingdom</option>
                                <option value="United States" {{$employe->pays == "United States" ? 'selected' : ''}}>United States</option>
                            </select>
                        </div>
                        
                        </div>
                        <div class="mt-2">
                          <button type="submit" class="btn btn-primary me-2">Enregistrer les changements</button>
                          <button type="reset" class="btn btn-label-secondary">Cancel</button>
                        </div>
                      </form>
                    </div>
                    <!-- /Account -->
                  </div>
                 
                </div>
              </div>
            </div>
          </div>
        </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl">
                <div
                  class="footer-container d-flex align-items-center justify-content-between py-2 flex-md-row flex-column">
                  <div>
                    ©
                    <script>
                      document.write(new Date().getFullYear());
                    </script>
                    , made with ❤ 
                  </div>
                  <div class="d-none d-lg-inline-block">

                    <a href="https://vioredigital.com/" target="_blank" class="footer-link d-none d-sm-inline-block"
                      >Support</a
                    >
                  </div>
                </div>
              </div>
            </footer>
          </div>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
        
        

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>

      <!-- Drag Target Area To SlideIn Menu On Small Screens -->
      <div class="drag-target"></div>
    </form>
    @if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
    <!-- Main JS -->
   

    <!-- Page JS -->
    
  </body>
</html>