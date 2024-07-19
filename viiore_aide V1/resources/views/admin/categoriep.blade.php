<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-assets-path="{{ asset('assets/')}}" data-template="vertical-menu-template">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Catégories Principales</title>
    <meta name="description" content="" />
    <!-- Favicon -->
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap" rel="stylesheet" />
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/fontawesome.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/tabler-icons.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/flag-icons.css')}}" />
    <!-- Page CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}" />
</head>
<body class="bg-white">

<!-- Sidebar -->
@include('admin.sidebar')
<!-- /Sidebar -->
<style>

    .nav{
      margin-right: 4%;
        margin-left: 5%; 
    }
      @media (max-width: 768px) {
  #sidebar {
  width: 150px;
  }
  }
  .sidebar {
  width: 200px;
  margin: 0 10px;
  padding: 10px;
  }
  .dev{
             margin-right: -98%;
              margin-left: -0.02%;         
  }
  .table {
  width: 100%; /* Set the width of the table to 100% of its container */
  border-collapse: collapse; /* Collapse the borders to remove extra space */
  }
  .bg-red-700{
  background-color: #AF2B1D;
  }
  .prod{
      margin-right: 50%;
      width: 100%;
  }
  .button-heading-container {
    display: flex;
    align-items: center; /* Align items vertically in the center */
    justify-content: space-between; /* Add space between the heading and the button */
    margin-bottom: 20px; /* Adjust margin as needed */
}

  </style> 
<!-- Content -->
<div class="layout-page">
    <div class="content-wrapper dev">
        <div class="container-xxl flex-grow-1 container-p-y prod" >
            <!-- Navigation -->
            @include('admin.nav')
            <!-- /Navigation -->
            <!-- Page Title -->
            <div  class="button-heading-container">
            <h4 class="py-3 mb-2"><span class="text-muted fw-light"></span><b>Tous les Catégories Principales</b></h4>
            
            <!-- Create Category Button -->
            <button id="create-category-button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Créer une catégorie principal </button>   
            </div>       
            <!-- Category Table -->
            <div class="card">
                <div class="card-body" style="text-align: center;">
                    <div class="table-responsive">
                        <table class="table datatables-customers table-bordered">
                            <thead>
                                <tr>
                                    <th>Photo de catégorie</th>
                                    <th>Nom</th>  
                                    <th>Référence</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categoriesp as $categoriep)
                                    <tr>        
                                        <td><img src="{{ $categoriep->photo }}" width="60" height="60" class="img img-responsive" style="position: center"/></td>                  
                                        <td>{{ $categoriep->Nom }}</td>
                                        <td>{{ $categoriep->Référence }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Content -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Créer une catégorie</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('catégorie.storep') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="Nom">Nom de catégorie Principale:</label>
                        <input type="text" class="form-control" id="Nom" name="Nom">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="photo">Photo de catégorie:</label>
                        <input type="file" class="form-control" id="photo" name="photo">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="Référence">Référence :</label>
                        <input type="text" class="form-control" id="Référence" name="Référence">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary">Sauvegarder</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
</body>
</html>
