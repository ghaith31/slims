<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Details reduction</title>
    <meta name="description" content="" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/produit.css')); ?>">
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon/logoo.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap" rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="assets/vendor/fonts/tabler-icons.css" />
    <link rel="stylesheet" href="assets/vendor/fonts/flag-icons.css" />

    <!-- Page CSS -->
    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>
    <!-- Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!-- Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="assets/vendor/js/template-customizer.js"></script>
    <!-- Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="assets/js/config.js"></script>
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

    <link rel="stylesheet" href="assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
    <link rel="stylesheet" href="assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" />
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
       
        .button-heading-container {
    display: flex;
    align-items: center; /* Align items vertically in the center */
    justify-content: space-between; /* Add space between the heading and the button */
    margin-bottom: 20px; /* Adjust margin as needed */
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



<?php echo $__env->make('admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

     <!-- Layout container -->
 <div class="layout-page">
         <?php echo $__env->make('admin.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

 <!-- Content wrapper -->
 <div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
                <div class="dev">
                     <h5 class="py-3 mb-2"><a href ="<?php echo e(route('reduction.affich')); ?>">Retour</a></h5>
                     <div  class="button-heading-container">
                        <h4 class="py-3 mb-2"><span class="text-muted fw-light"></span><?php echo e($reduction->nom); ?></h4>

                        <?php if(!$reduction->deleted_at ): ?>                   
                        <button type="button" id="create-button" class="create-button"  data-bs-toggle="modal" data-bs-target="#exampleModal">Modifier la réduction</button>
                        <?php else: ?>
                        <button type="button" id="restore-button" class="button-button"  data-bs-toggle="modal" data-bs-target="#restoreModal">Restaurer la réduction</button>
                        <?php endif; ?>
                        </div>
                       <div class="card">
    <div class="card-body">
        <div class="row">
            <!-- Left half -->
            <div class="col-md-6">
                <div class="mb-3"><label>Nom:</label><br><?php echo e($reduction->nom); ?></div><hr>
                <?php if($reduction->type_reduction=='Fixée'): ?>
                <div class="mb-3"><label>Montant de la remise:</label><br><?php echo e($reduction->montant_reductionF); ?></div><hr>
                <?php else: ?> 
                <div class="mb-3"><label>Montant de la remise:</label><br><?php echo e($reduction->montant_reductionP); ?>%</div><hr>
                <div class="mb-3"><label>Prix maximum du produit:</label><br><?php echo e($reduction->reduction_maximale); ?></div><hr>
                <?php endif; ?>
            </div>

            <!-- Right half -->
            <div class="col-md-6">
                <div class="mb-3"><label>Qualification:</label><br><?php echo e($reduction->qualification); ?></div><hr>
                <div class="mb-3"><label>Référence:</label><br><?php echo e($reduction->reference); ?></div><hr>
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
            <form class="mb-3"  action ="<?php echo e(route('reduction.restaurereduction',$reduction->id)); ?>"  method="POST" >
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
            <form class="mb-3"  action ="<?php echo e(route('reduction.sup', $reduction->id )); ?>" method="POST"  enctype="multipart/form-data">
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
                    <h5 class="modal-title" id="exampleModalLabel">Créer un  produit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form class="mb-3" action="<?php echo e(route('reduction.modif', $reduction->id )); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                 <div class="mb-3">
                    <label class="form-label" data-bs-toggle="tooltip" data-bs-placement="top"title="Entrez un nom de réduction">
                    <span>Nom</span><span style="color: red;">*</span><i class="fas fa-exclamation-circle"></i></label>
                      <input type="text" class="form-control" id="nomm" name ="nom"  value="<?php echo e($reduction->nom); ?>">
                  </div>
                  <div class="mb-3">
                    <label class="form-label" data-bs-toggle="tooltip" data-bs-placement="top"title="Choisissez si la remise peut être appliquée au niveau de la commande, au niveau du produit ou aux deux.">
                      <span>Qualification</span><span style="color: red;">*</span><i class="fas fa-exclamation-circle"></i></label>
                      <select id="qualificationn" class="form-control" name ="qualification">
                      <option value="">Choisir...</option>
                      <option value="" <?php echo e($reduction->qualification == '' ? 'selected' : ''); ?>>Choisir...</option>
                      <option value="Produit" <?php echo e($reduction->qualification == 'Produit' ? 'selected' : ''); ?>>Produit</option>
                      <option value="Order" <?php echo e($reduction->qualification == 'Order' ? 'selected' : ''); ?>>Order</option>
                      <option value="Order & produit" <?php echo e($reduction->qualification == 'Order & produit' ? 'selected' : ''); ?>>Order & produit</option>
                      </select>
                  </div>
               
                  <div class="mb-3">
                      <label class="form-label" data-bs-toggle="tooltip" data-bs-placement="top"title="Qu’il s’agisse d’une remise d’un montant fixe ou d’une remise en pourcentage.">
                        <span>Type de réduction</span><span style="color: red;">*</span><i class="fas fa-exclamation-circle"></i></label>
                      <select id="tdr" class="form-control" name="type_reduction">
                      <option value="" <?php echo e($reduction->type_reduction == '' ? 'selected' : ''); ?>>Choisir...</option>
                      <option value="Fixée" <?php echo e($reduction->type_reduction == 'Fixée' ? 'selected' : ''); ?>>Fixée</option>
                      <option value="Pourcentage" <?php echo e($reduction->type_reduction == 'Pourcentage' ? 'selected' : ''); ?>>Pourcentage</option>
                      </select>
                  </div>
                
                  <div class="mb-3" id="typefixeContainer" style="display: none;">
             <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Montant de la remise qui sera appliquée sur les commandes ou les produits.">
            <span>Montant de la réduction</span><span style="color: red;">*</span> <i class="fas fa-exclamation-circle"></i></label>
           <input type="text" class="form-control" id="montant_remise" name="montant_reductionF" value="<?php echo e($reduction->montant_reductionF); ?>">
           </div>

  
           <div  id="typepourcentageContainer" style="display: none;">
           <div class="mb-3">
             <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Montant de la remise qui sera appliquée sur les commandes ou les produits.">
            <span>Montant de la réduction (%)</span><span style="color: red;">*</span> <i class="fas fa-exclamation-circle"></i></label>
           <input type="text" class="form-control" id="montant_remise" name="montant_reductionP"  value="<?php echo e($reduction->montant_reductionP); ?>">
           </div>
           <div class="mb-3">
             <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="La valeur maximale de la réduction peut être appliquée.">
            <span>Réduction maximale</span><span style="color: red;">*</span> <i class="fas fa-exclamation-circle"></i></label>
           <input type="text" class="form-control" id="reduction_maximale" name="reduction_maximale" value="<?php echo e($reduction->reduction_maximale); ?>">
           </div>
        </div>



                  <div class="mb-3">
                    <label class="form-label" data-bs-toggle="tooltip" data-bs-placement="top"title="Numéro de référence ou identifiant de la remise.">
                      <span>Référence</span><span style="color: red;">*</span><i class="fas fa-exclamation-circle"></i></label>
                      <input type="text" class="form-control" id="reference" name ="reference"   value="<?php echo e($reduction->reference); ?>">
                  </div>
                  
                      
                     
       
                        
                        <div class="modal-footer">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal" class="delete" style="margin-right: auto;">Supprimer la réduction</a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary" id="saveButton">Sauvegarder</button>
                </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
    <!-- /Modal -->         
  


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selectElement = document.getElementById('tdr');
            const typefixeContainer = document.getElementById('typefixeContainer');
            const typepourcentageContainer = document.getElementById('typepourcentageContainer');
    
            selectElement.addEventListener('change', function() {
                if (this.value === 'Fixée') {
                    typefixeContainer.style.display = 'block';
                    typepourcentageContainer.style.display = 'none';
                } else if (this.value === 'Pourcentage') {
                    typefixeContainer.style.display = 'none';
                    typepourcentageContainer.style.display = 'block';
                } else {
                    typefixeContainer.style.display = 'none';
                    typepourcentageContainer.style.display = 'none';
                }
            });
        });
    </script>








 <!-- Bootstrap JS and jQuery -->
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

 <script>
  $(document).ready(function() {
    $('.create-button').on('click', function() {
      $('#exampleModal').modal('show');
    });

    $('.branche-button').on('click', function() {
      $('#brancheModal').modal('show');
    });

    $('.categorie-button').on('click', function() {
      $('#categoriemodal').modal('show');
    });

    $('.produit-button').on('click', function() {
      $('#produitmodal').modal('show');
    });

    $('.combos-button').on('click', function() {
      $('#combosmodal').modal('show');
    });
  });
</script>

</body>
</html>

<?php /**PATH C:\viore_aide\resources\views/admin/mange/detailreduction.blade.php ENDPATH**/ ?>