<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Details fournisseur</title>
    <meta name="description" content="" />
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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
    <link rel="stylesheet" href="/assets/css/produit.css"/>
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

    <link rel="stylesheet" href="assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
    <link rel="stylesheet" href="assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" />
    


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

<body class=" bg-white">



<?php echo $__env->make('admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

     <!-- Layout container -->
 <div class="layout-page">
     <?php echo $__env->make('admin.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
 <!-- Content wrapper -->
 <div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
                <div class="dev">
                     <h5 class="py-3 mb-2"><a href ="<?php echo e(route('fournisseur.affich')); ?>">Retour</a></h5>
                     <div  class="button-heading-container">
                         <h4 class="py-3 mb-2"><span class="text-muted fw-light"></span><?php echo e($fournisseur->Nom); ?></h4>
                             <div class="button-group">
                                 <?php if(!$fournisseur->deleted_at ): ?>                 
                                 <button type="button" id="create-button" class="create-button"  data-bs-toggle="modal" data-bs-target="#exampleModal">Modidier le fournisseur</button>
                                  <?php else: ?>  
                                  <button type="button" id="restore-button" class="button-button"  data-bs-toggle="modal" data-bs-target="#restoreModal">Restaurer le fournisseur</button>
                                 <?php endif; ?>                            
                             </div>
                       </div>
                    <div class="card">
                    <div class="card-body">
                       <div class="row">
                       <!-- Left half -->
                         <div class="col-md-6">
                                <div class="mb-3"><label>Nom:</label><br>   <?php echo e($fournisseur->Nom); ?></div><hr> 
                                <div class="mb-3"><label>Numero de téléphone:</label><br>  <?php echo e($fournisseur->numero_de_téléphone); ?></div><hr>
                                 <div class="mb-3"><label>Code de fournisseur:</label><br> <?php echo e($fournisseur->Code); ?> </div><hr>                                
                            </div>
                           <div class="col-md-6">                               
                                 <div class="mb-3"><label>Nom de contact:</label><br> <?php echo e($fournisseur->Nom_contact); ?> </div><hr>
                                 <div class="mb-3"><label>Email principale:</label><br> <?php echo e($fournisseur->Email_principale); ?> </div><hr>
                                 <div class="mb-3"><label>Email secondaire:</label><br> <?php echo e($fournisseur->Email_secondaire); ?> </div><hr>                              
                            </div> 
                         </div>
                         </div> 
                         </div>
                         
                         <div  class="button-heading-container">
                         <h4 class="py-3 mb-2"><span class="text-muted fw-light"></span>Article</h4>
                        <button type="button" id="tags-button" class="add-button"  data-bs-toggle="modal" data-bs-target="#articlemodal">Lier les éléments</button>
                        </div>
                     
                  
                    <?php if($article_fournisseur->count()>0): ?>
                    <div class="card">
                        <div class="card-datatable table-responsive">
                    <table class="datatables-customers table border-top"    id="mainTable">
                        <div class="d-flex justify-content-end">        
                  <thead>
                     <tr>
                         <th>article</th>
                     <th>SKU</span>
                     </tr>
                    </thead>
                     <tbody class="text-sm">
                     <?php $__currentLoopData = $article_fournisseur; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article_fournisseur): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                     <tr>
                                                      
                             <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900"><?php echo e($article_fournisseur->article->Nom); ?></td>  
                             <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900"><?php echo e($article_fournisseur->article->SkU); ?></td>                  
                         </tr>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </tbody>                 
                     </div>
                    </table>
                </div>
            </div>
                   
<?php else: ?> 
<div class="card">
    <div class="card-body">
                          <h5>Liez ce fournisseur aux articles en stock que vous achetez chez lui et vous pouvez attribuer différentes unités de commande et différents coûts à chaque article.</h5>   

                         </div>
                        
</div>
   <?php endif; ?>       







            
                       
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
                <form class="mb-3"  action ="<?php echo e(route('fourni.restaurefourni', ['id' => $fournisseur->id])); ?>"  method="POST" >
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
                <form class="mb-3"  action ="<?php echo e(route('fourni.sup', $fournisseur->id)); ?>" method="POST"  enctype="multipart/form-data">
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
                    <h5 class="modal-title" id="exampleModalLabel">Modifier le fournisseur</h5>

                </div>
                <div class="modal-body">
                <form class="mb-3" action="<?php echo e(route('fourni.modif', ['id' => $fournisseur->id])); ?>) }}" method="POST">
                <?php echo csrf_field(); ?>
                <div class="mb-3">
                        <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Nom de l'entreprise du fournisseur">
                        <span>Nom</span>
                        <span style="color: red;">*</span>
                         <i class="fas fa-exclamation-circle"></i></label>
                            <input type="text" class="form-control" id="nom" name ="Nom"  value="<?php echo e($fournisseur->Nom); ?>" >
                        </div>
                        <div class="mb-3">
                        <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Code unique pour ce fournisseur">
                        <span>Code fournisseur</span>
                         <i class="fas fa-exclamation-circle"></i></label>
                            <input type="text" class="form-control" id="cdf" name ="Code"  value="<?php echo e($fournisseur->Code); ?>">
                        </div>
                        <div class="mb-3">
                        <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Nom du contact du fournisseur.">
                        <span>Nom contact</span>
                         <i class="fas fa-exclamation-circle"></i></label>
                            <input type="text" class="form-control" id="nc" name ="Nom_contact" value="<?php echo e($fournisseur->Nom_contact); ?>">
                        </div>
                          
                        <div class="mb-3">
                        <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Numéro de téléphone du fournisseur.">
                        <span>Numéro de téléphone</span>
                         <i class="fas fa-exclamation-circle"></i></label>
                            <input type="text" class="form-control" id="num" name ="numero_de_téléphone"   value="<?php echo e($fournisseur->numero_de_téléphone); ?>">
                        </div>
                        
                        <div class="mb-3">
                        <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Entrez un e-mail principale .">
                        <span>Email principale</span>
                         <i class="fas fa-exclamation-circle"></i></label>
                            <input type="text" class="form-control" id="email1" name ="Email_principale" value ="<?php echo e($fournisseur->Email_principale); ?>">
                        </div>

                        <div class="mb-3">
                        <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Entrez un e-mail secondaire .">
                        <span>Email secondaire</span>
                         <i class="fas fa-exclamation-circle"></i></label>
                            <input type="text" class="form-control" id="email2" name ="Email_secondaire" value="<?php echo e($fournisseur->Email_secondaire); ?>">
                        </div>
                           <div class="modal-footer">
                         
                           <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal" class="delete" >Supprimer la fournisseur</a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <?php echo method_field('PUT'); ?>
                    <button type="submit" class="btn btn-primary" id="saveButton" >Sauvegarder</button>
                </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
    <!-- /Modal -->



    <!-- Modal -->
<div class="modal fade" id="articlemodal" tabindex="-1" aria-labelledby="articleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="articleModalLabel">Ajouter des articles</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form class="mb-3" action="<?php echo e(route('ajoutfourniarticle', $fournisseur->id)); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <div class="mb-3">
        <label>Article</label>
        <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="articles[]" id="article_<?php echo e($article->id); ?>" value="<?php echo e($article->id); ?>" >
                <label class="form-check-label" for="article_<?php echo e($article->id); ?>">
                    <?php echo e($article->Nom); ?>

                </label>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary" id="saveButton">Appliquer</button>
    </div>
</form>

                </div>
                
            </div>
        </div>
    </div>
    <!-- /Modal -->





     <!-- Modal -->
<div class="modal fade" id="articlemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter des modificateurs </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form class="mb-3" action="" method="POST">
                 <?php echo csrf_field(); ?>
                        <div class="mb-3">
                            <label  class="form-label">article </label>
                            <input type="text" class="form-control" id="article" name ="article"  >
                        </div>
                        <div class="modal-footer">
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
  
      $('#tags-button').on('click', function() {
        $('#tagsModal').modal('show');
      });
  
      $('#article-button').on('click', function() {
        $('#articlemodal').modal('show');
      });
    });
  </script>
  
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js" integrity="sha384-FsroB1BFCqjMfe8KDv+3GTQG/UM2aWNCnJGMFkpwDGS+6Vqwqrvc2Vmi05qoa2lP" crossorigin="anonymous"></script>
<script src="assets/vendor/js/bootstrap.js"></script>
<script src="assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
<script src="assets/vendor/libs/@form-validation/bootstrap5.js"></script>
</body>
</html><?php /**PATH C:\viore_aide\resources\views/admin/inventaire/detailfournisseur.blade.php ENDPATH**/ ?>