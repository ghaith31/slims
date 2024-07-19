<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Details option</title>
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
    <link rel="stylesheet" href="<?php echo e(asset('/assets/vendor/fonts/flag-icons.css')); ?>" />

    <!-- Page CSS -->
    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>
    <!-- Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!-- Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="assets/vendor/js/template-customizer.js"></script>
    <!-- Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="assets/js/config.js"></script>
    <link href="<?php echo e(asset('assets/css/app.css')); ?>" rel="stylesheet">
    <script src="<?php echo e(asset('assets/js/app.js')); ?>" defer></script>
   
    <link rel="stylesheet" href="/assets/css/produit.css">

    <link rel="stylesheet" href="assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
    <link rel="stylesheet" href="assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" />
    
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
 <?php echo $__env->make('admin.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>      

 <!-- Content wrapper -->
 <div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
                <div class="dev">
                <h5 class="py-3 mb-2"><a href ="<?php echo e(route('optionmodif.affich')); ?>"   >  Retour</a></h5>
                     <div  class="button-heading-container">
                        <h4 class="py-3 mb-2"><span class="text-muted fw-light"></span><?php echo e($option->Nom); ?></h4>
                        <div class="button-group">
                        <?php if(!$option->deleted_at ): ?>
                        <form action ="<?php echo e(route('option.status', $option->id)); ?>"  method="POST" >
                          <?php echo csrf_field(); ?>
                         <?php echo method_field('PUT'); ?>
                         <button type="submit" class="button-button" >option <?php echo e($option->statut); ?> </button>
                          </form>                      
                        <button type="button" id="create-button" class="create-button"  data-bs-toggle="modal" data-bs-target="#exampleModal">Modidier l'option</button>
                        <?php else: ?>
                        <button type="button" id="restore-button" class="button-button"  data-bs-toggle="modal" data-bs-target="#restoreModal">Restaurer l'option</button>
                        <?php endif; ?>
               </div>
                    </div>

                    <div class="card">
                    <div class="card-body">
                        <div class="row">
                           <div class="col-md-6">
                                <div class="mb-3"><label>Nom:</label><br><?php echo e($option->Nom); ?></div><hr>
                                 <div class="mb-3"><label>SKU:</label>  <br><?php echo e($option->SKU); ?></div><hr>  
                                 <div class="mb-3"><label>Groupe d'impôt:</label><br><?php echo e($option->groupe_impot); ?></div><hr> 
                                 <div class="mb-3"><label>coût:</label><br><?php echo e($option->cout); ?></div><hr>
                                                         
                            </div>
                           <div class="col-md-6">
                           <div class="mb-3"><label>Modificateur:</label><br><?php echo e($option->modify->Nom); ?></div><hr>   
                                 <div class="mb-3"><label>Méthode de calcul des coûts:</label><br><?php echo e($option->méthode_calcul_couts); ?></div><hr> 
                                 <div class="mb-3"><label>Prix:</label><br><?php echo e($option->prix); ?></div><hr> 
                                 <div class="mb-3"><label>Calories:</label><br><?php echo e($option->calories); ?></div><hr>
                              
                                 
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
<div class="modal fade" id="restoreModal" tabindex="-1" aria-labelledby="restoreModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="restoreModel">Confirmer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form class="mb-3"   action ="<?php echo e(route('option.restaureoption', $option->id)); ?>" m method="POST" >
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
                </div>
                <div class="modal-body">
                <form class="mb-3"  action ="<?php echo e(route('option.sup', $option->id)); ?>"  method="POST"  enctype="multipart/form-data">
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modifier le produit</h5>
                </div>
                <div class="modal-body">
                <form class="mb-3"     action="<?php echo e(route('option.modif', $option->id)); ?>" method="POST" >
                 <?php echo csrf_field(); ?>
                 <?php echo method_field('PUT'); ?>
                 <div class="mb-3">
                <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="le nom de l'option du modificateur">
                  <span>Nom</span><span style="color: red;">*</span> <i class="fas fa-exclamation-circle"></i></label>
                 <input type="text" class="form-control" id="Nom" name="Nom" value="<?php echo e($option->Nom); ?>">
                 </div>
                 <div class="mb-3">
                <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="choisissez le modificateur de cette option">
                  <span>Modificateur</span><span style="color: red;">*</span> <i class="fas fa-exclamation-circle"></i></label>
                <select class="form-control" id="modificateur" name="modificateur">
                          <option value="">Choisir...</option>
                           <?php $__currentLoopData = $modif; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modif): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($modif->Nom); ?>"<?php if($option->modify->Nom == $modif->Nom): ?> selected <?php endif; ?>><?php echo e($modif->Nom); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                 </div>
                 <div class="mb-3">
                 <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="L'unité de gestion des stocks est un code composé de chiffres ou de lettres.">
                  <span>SKU</span><span style="color: red;">*</span> <i class="fas fa-exclamation-circle"></i></label>
                 <input type="text" class="form-control" id="SKU" name="SKU" value="<?php echo e($option->SKU); ?>">
                 </div>
                 <div class="mb-3">
                 <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Pour définir le prix de l’option de modificateur">
                  <span>Prix</span><span style="color: red;">*</span> <i class="fas fa-exclamation-circle"></i></label>
                 <input type="text" class="form-control" id="prix" name="prix" value="<?php echo e($option->prix); ?>">
                 </div>
                 <div class="mb-3">
                <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Pour choisir le groupe de d'impot appliqué à cette option de modificateur.">
                  <span>Groupe d'impôt</span> <i class="fas fa-exclamation-circle"></i></label>
                 <input type="text" class="form-control" id="groupe_impot" name="groupe_impot" value="<?php echo e($option->groupe_impot); ?>">
                 </div>
                 <div class="mb-3">
                            <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Choisissez le mode de calcul du coût des options de modificateur.">
                  <span>Méthode de calcul des coûts</span><span style="color: red;">*</span> <i class="fas fa-exclamation-circle"></i></label>
                            <select id="mcc" class="form-control" name ="méthode_calcul_couts" value ="méthode_calcul_couts">
                            <option value="Coûts fixes" name ="Coûts fixes">Coûts fixes</option>
                            <option value="A partir d'ingrédients" name="A partir d'ingrédients">A partir d'ingrédients</option>
                            </select>
                        </div>
                        <div class="mb-3" id="prixContainer" style="display: none;">
                   <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Coût fixe par unité.">
                  <span>coût</span><span style="color: red;">*</span> <i class="fas fa-exclamation-circle"></i></label>
                 <input type="text" class="form-control" id="cout" name="cout" value ="<?php echo e($option->cout); ?>">
                 </div>

                 <div class="mb-3">    
                <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Les calories de cette option de modificateur.">
                <span>Calories</span> <i class="fas fa-exclamation-circle"></i></label>
                 <input type="text" class="form-control" id="calories" name="calories" value="<?php echo e($option->calories); ?>" >
                 </div>
                        <div class="modal-footer">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal" class="delete" style="margin-right: auto;">Supprimer l'option</a>

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    
                    <button type="submit" class="btn btn-primary" id="saveButton">Sauvegarder</button>
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
  });
</script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const selectElement = document.getElementById('mcc');
        const prixContainer = document.getElementById('prixContainer');

        selectElement.addEventListener('change', function() {
            if (this.value === 'Coûts fixes') {
                prixContainer.style.display = 'block';
            } else {
                prixContainer.style.display = 'none';
            }
        });

        // To handle the initial load state
        if (selectElement.value === 'Coûts fixes') {
            prixContainer.style.display = 'block';
        } else {
            prixContainer.style.display = 'none';
        }
    });
</script>


<script src="assets/vendor/js/bootstrap.js"></script>
<script src="assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
<script src="assets/vendor/libs/@form-validation/bootstrap5.js"></script>
</body>
</html>

<?php /**PATH C:\viore_aide\resources\views/admin/menu/detailoption.blade.php ENDPATH**/ ?>