<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Details carte  fidelite</title>
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
    <link rel="stylesheet" href="/assets/vendor/fonts/flag-icons.css" />

    <!-- Page CSS -->
    <!-- Helpers -->
    <script src="/assets/vendor/js/helpers.js"></script>
    <!-- Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!-- Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="assets/vendor/js/template-customizer.js"></script>
    <!-- Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="assets/js/config.js"></script>
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
   
    <link rel="stylesheet" href="/assets/css/produit.css">

    <link rel="stylesheet" href="/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
    <link rel="stylesheet" href="/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" />
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
    <style>
        /* CSS styling for the box */
      
        .button-heading-container {
    display: flex;
    align-items: center; /* Align items vertically in the center */
    justify-content: space-between; /* Add space between the heading and the button */
    margin-bottom: 20px; /* Adjust margin as needed */
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

<body  class=" bg-white">



<?php echo $__env->make('admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

     <!-- Layout container -->
 <div class="layout-page">
 <!-- Content wrapper -->
 <?php echo $__env->make('admin.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
 <div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
                <div class="dev">
                <h5 class="py-3 mb-2"><a href ="<?php echo e(route('cartefidelite.affich')); ?>"   >  Retour</a></h5>
                     <div  class="button-heading-container">
                        <h4 class="py-3 mb-2"><span class="text-muted fw-light"></span><?php echo e($carte->Nom); ?></h4>
                        <div class="button-group">
                        <?php if(!$carte->deleted_at ): ?>
                        <form action ="<?php echo e(route('carte.status', ['id' => $carte->id])); ?>" method="POST" id="form-status" >
                          <?php echo csrf_field(); ?>
                         <?php echo method_field('PUT'); ?>
                         <button type="button" id ="change-status" class="button-button" >carte de fédilité <?php echo e($carte->status); ?></button>
                          </form>    
                        <button type="button" id="create-button" class="create-button"  data-bs-toggle="modal" data-bs-target="#exampleModal">Modidier la carte de fédilité</button>
                        <?php else: ?>  
                        <button type="button" id="restore-button" class="button-button"  data-bs-toggle="modal" data-bs-target="#restoreModal">Restaurer la carte de fédilité</button>
                <?php endif; ?> </div>
                      </div>
                      <div class="card">
                    <div class="card-body">
                    <div class="row">
                         <div class="col-md-6">
                                <div class="mb-3"><label>Nom:</label><br><?php echo e($carte->Nom); ?></div><hr> 
                                <div class="mb-3"><label>Catégorie:</label> <br> <?php echo e($carte->Category->Nom); ?></div><hr> 
                                <div class="mb-3"><label>Stratégie de prix:</label> <br>  <?php echo e($carte->strategie_prix); ?></div><hr>                              
                      </div>
                    <div class="col-md-6">
                                  <div class="mb-3"><label>SKU:</label><br> <?php echo e($carte->SKU); ?> </div><hr> 
                                 <div class="mb-3"><label>Barcode:</label><br><?php echo e($carte->code_barre); ?></div><hr>
                          </div>
                         </div>
                            </div>
</div>
                         
                    







            
                       
                <?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>

    </div>
</div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Créer une carte de fidélité</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form class="mb-3" action="<?php echo e(route('carte.modifier', $carte->id)); ?>" method="POST" enctype="multipart/form-data">
                 <?php echo csrf_field(); ?>
                 <?php echo method_field('PUT'); ?>
                 <div class="mb-3">
                            <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Entrez un nom de carte de fidélité">
                        <span>Nom</span><span style="color: red;">*</span> <i class="fas fa-exclamation-circle"></i></label>
                            <input type="text" class="form-control" id="nom" name ="Nom" value ="<?php echo e($carte->Nom); ?>">
                     </div>
                    <div class="mb-3">
                         <label class="form-label" >Photo de carte de fidélité</label>
                        <input type="file" class="form-control" id="photo" name="photo">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Choisissez la catégorie de cette carte fidélité">
                        <span>Catégories</span><span style="color: red;">*</span> <i class="fas fa-exclamation-circle"></i></label>
                            <select class="form-control" id="Catégorie" name="Catégorie">
                             <option value="">Choisir...</option>
                               <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               <option value="<?php echo e($categorie->Nom); ?>" <?php if($carte->category->Nom == $categorie->Nom): ?> selected <?php endif; ?>><?php echo e($categorie->Nom); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 </select>
                    </div>
                    <div class="mb-2 row">
                    <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="L'unité de gestion des stocks est un code composé de chiffres ou de lettres qui identifie la carte fidélité">
                        <span>SKU</span><span style="color: red;">*</span> <i class="fas fa-exclamation-circle"></i></label>
                        <div class="col-sm-8">
                         <input type="text" class="form-control" id="sku" name ="SKU" value ="<?php echo e($carte->SKU); ?>">
                        </div>
                         <div class="col-sm-2">
                        <button type="button" class="btn btn-secondary">Générer</button>
                        </div>
                    </div>
                    <div class="mb-3">
                            <label  class="form-label">Code à barre </label>
                            <input type="text" class="form-control" id="code_barre" name ="code_barre" value="<?php echo e($carte->code_barre); ?>">
                      </div>
                      <div class="mb-3">
                      <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Pour choisir le mode de tarification">
                        <span>Stratégie de prix</span><span style="color: red;">*</span> <i class="fas fa-exclamation-circle"></i></label>
                            <select id="stp" class="form-control" name ="strategie_prix">
                            <option value="Méthode fixe" name ="Méthode fixe">Méthode fixe</option>
                            <option value="Prix libre" name ="Prix libre">Prix libre</option>
                            </select>
                      </div>
                      <div class="mb-3">
                      <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Pour choisir le mode de tarification">
                        <span>Prix</span><span style="color: red;">*</span> <i class="fas fa-exclamation-circle"></i></label>
                            <input type="text" class="form-control" id="prix" name ="Prix" value ="<?php echo e($carte->Prix); ?>">
                      </div>
                      <div class="modal-footer">
                             <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal" class="delete" style="margin-right: auto;">Supprimer la carte de fidélité</a>
                             <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                          
                            <button type="submit" class="btn btn-primary" id="saveButton">Sauvegarder</button>
                      </div>
                    </form>
                </div>               
            </div>
        </div>
    </div>
    <!-- /Modal -->

    
<!-- Modal -->
<div class="modal fade" id="restoreModal" tabindex="-1" aria-labelledby="restoreModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="restoreModel">Confirmer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form class="mb-3"  action ="<?php echo e(route('carte.restaurecarte', ['id' => $carte->id])); ?>" m method="POST" >
                 <?php echo csrf_field(); ?>
                <div class="mb-3">
               <h4>Etes-vous sûr de vouloir restaurer ceci?</h4>
                 </div>
                 <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                  <?php echo method_field('PUT'); ?>
                  <button type="submit" class="btn btn-primary" id="deleteButton">Oui</button>
                 </div>
                  </form>
                </div>       
            </div>
        </div>
    </div>
    <!-- /Modal -->

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirmer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form class="mb-3"  action ="<?php echo e(route('carte.sup', ['id' => $carte->id])); ?>" method="POST"  enctype="multipart/form-data">
                 <?php echo csrf_field(); ?>
                <div class="mb-3">
               <h4>Etes-vous sûr de vouloir supprimer ceci?</h4>
                 </div>
                 <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                  <?php echo method_field('DELETE'); ?>
                  <button type="submit" class="btn btn-primary" id="deleteButton">Oui</button>
                 </div>
                  </form>
                </div>       
            </div>
        </div>
    </div>
    <!-- /Modal -->



  







 <!-- Bootstrap JS and jQuery -->
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>
  $(document).ready(function() {
    $('.create-button').on('click', function() {
      $('#exampleModal').modal('show');
    });

    $('#change-status').on('click', function() {
      console.log('test');
      let url =$('#form-status').attr('action');
      console.log(url);
      $.ajax({
                    url: url, // Laravel route to handle the request
                    method: 'PUT',
                    data: {
                        _token: '<?php echo e(csrf_token()); ?>' // CSRF token for security
                    },
                    success: function(response) {
                        location.reload();
                        // $('#message').html('<p>Product added successfully!</p>');
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
     
    });

    $('.#tags-button').on('click', function() {
      $('#tagsModal').modal('show');
  })});
</script>
<script src="assets/vendor/js/bootstrap.js"></script>
<script src="assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
<script src="assets/vendor/libs/@form-validation/bootstrap5.js"></script>
</body>
</html>

<?php /**PATH C:\viore_aide\resources\views/admin/menu/detailcarte.blade.php ENDPATH**/ ?>