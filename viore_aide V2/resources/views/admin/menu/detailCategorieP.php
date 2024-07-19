<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Détails de la catégorie</title>
    <meta name="description" content="" />
   
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon/logoo.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap" rel="stylesheet" />
  
    <!-- Icons -->
    <link rel="stylesheet" href="/assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="/assets/vendor/fonts/tabler-icons.css" />
    <link rel="stylesheet" href="{{ asset('/assets/vendor/fonts/flag-icons.css')}}" />

    <!-- Page CSS -->
    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>
    <script src="assets/vendor/js/template-customizer.js"></script>
    <script src="assets/js/config.js"></script>
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/js/app.js') }}" defer></script>
   
    <link rel="stylesheet" href="/assets/css/categorie.css">
    <link rel="stylesheet" href="assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
    <link rel="stylesheet" href="assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style> 
        .button-heading-container {
            display: flex;
            align-items: center; 
            justify-content: space-between; 
            margin-bottom: 20px;
        }
        .button-group {
            display: flex;
            gap: 10px;
        }
        .add-button {
            background-color: white;
            color: black;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>

<body class="bg-white">
    @include('admin.sidebar')

    <div class="layout-page">
        @include('admin.nav')

        <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 container-p-y">
                <div class="dev">
                    <h5 class="py-3 mb-2">
                        <a href ="{{ route('categorie.index') }}" style="text-decoration: none; border-bottom: 1px solid black;">Retour</a>
                    </h5>
                    <div class="button-heading-container">
                        <h4 class="py-3 mb-2"><span class="text-muted fw-light"></span>{{ $categorie->Nom }}</h4>
                        <div class="button-group">
                            @if (!$categorie->deleted_at )
                                <form action ="{{ route('categorie.statut', $categorie->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="button-button">Catégorie {{ $categorie->status }}</button>
                                </form>
                                <button type="button" id="create-button" class="create-button" data-bs-toggle="modal" data-bs-target="#exampleModal">Modifier la catégorie</button>
                            @else  
                                <button type="button" id="restore-button" class="button-button" data-bs-toggle="modal" data-bs-target="#restoreModal">Restaurer la catégorie</button>
                            @endif 
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3"><label>Nom:</label><br>{{ $categorie->Nom }}</div><hr>
                                    <div class="mb-3"><label>Référence:</label><br>{{ $categorie->Référence }}</div><hr>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3"><label>Créé à:</label><br>{{ $categorie->created_at }}</div><hr>
                                    <div class="mb-3"><label>Mis à jour à:</label><br>{{ $categorie->updated_at }}</div><hr>
                                </div>
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
            </div>
        </div>
    </div>

    <!-- Modals -->
    <div class="modal fade" id="restoreModal" tabindex="-1" aria-labelledby="restoreModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="restoreModalLabel">Confirmer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('categorie.restaurecategorie', $categorie->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <h4>Êtes-vous sûr de vouloir restaurer ceci?</h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-primary">Oui</button>
                        </div>
                    </form>
                </div>       
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modifier la catégorie</h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('categorie.modif', $categorie->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">Nom<span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="nom" name="Nom" value="{{ $categorie->Nom }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Référence<span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="référence" name="Référence" value="{{ $categorie->Référence }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Photo de la catégorie</label>
                            <input type="file" class="form-control" id="photo" name="photo">
                        </div>

                        <div class="modal-footer">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal" class="delete" style="margin-right: auto;">Supprimer la catégorie</a>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary">Sauvegarder</button>
                        </div>
                    </form>
                </div>       
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirmer</h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('categorie.sup', $categorie->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('DELETE')
                        <div class="mb-3">
                            <h4>Êtes-vous sûr de vouloir supprimer ceci?</h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-primary">Oui</button>
                        </div>
                    </form>
                </div>       
            </div>
        </div>
    </div>

    <!-- Core JS -->
    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="assets/vendor/js/menu.js"></script>
    <script src="assets/vendor/libs/apex-charts/apexcharts.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/dashboards-analytics.js"></script>
    <script src="assets/vendor/libs/datatables/jquery.dataTables.js"></script>
    <script src="assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
    <script src="assets/vendor/libs/datatables-responsive/datatables.responsive.js"></script>
    <script src="assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js"></script>
    <script src="assets/vendor/libs/datatables-buttons/datatables-buttons.js"></script>
    <script src="assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.js"></script>
</body>
</html>
