<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>catégorie</title>
    <meta name="description" content="" />

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
    

    <link rel="stylesheet" href="assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
    <link rel="stylesheet" href="assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" />
</head>

<body class="bg-white">
  
<?php echo $__env->make('admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<style>
    .input-field {
        width: 500px !important;; /* Set a fixed width for the input fields */
    }
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
        margin-right: -100%;
        width: 100%;
    }
    .select-field {
        appearance: menulist; /* Set the appearance of the select element to a list */
        -webkit-appearance: menulist; /* Set the appearance of the select element to a list for Safari */
        background-color: #f2f2f2; /* Set the background color for the select element */
        padding: 5px;
        margin-bottom: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
    }
    .button-heading-container {
        display: flex;
        align-items: center; /* Align items vertically in the center */
        justify-content: space-between; /* Add space between the heading and the button */
        margin-bottom: 20px; /* Adjust margin as needed */
    }
    .search-container {
        position: relative; /* Ensure the icon is positioned relative to this container */
        display: flex;
        justify-content: center;
        margin-bottom: 20px;
        width: 100%;
    }
    .search-container input {
        width: 100%;
        max-width: 100%;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    .search-container .fa-search {
        position: absolute;
        right: 10px; /* Adjust as needed */
        bottom: 5px; /* Adjust as needed to position the icon below the input field */
        cursor: pointer;
    }
</style>
<div class="layout-page">
    <div class="dev prod">
        <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 container-p-y">
                <?php echo $__env->make('admin.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="button-heading-container">
                    <h4 class="py-3 mb-2"><span class="text-muted fw-light"></span><b>Tous les Categories</b></h4>
                    <button id="create-category-button" class="butt bg-red-700 hover:bg-black-700 text-white py-2 px-4 rounded inline-block" data-bs-toggle="modal" data-bs-target="#exampleModal">Créer une catégorie</button>
                </div>
                <div class="card">
                    <div class="card-body" style="text-align: center;">
                        <!-- Search Bar -->
                        <div class="search-container">
                            <input type="text" id="table-search" placeholder="Rechercher...">
                            <i class="fa fa-search"></i>
                        </div>
                        <div class="card-datatable table-responsive table">
                            <!-- Table -->
                            <table class="table datatables-customers table border-top" style="text-align:center;">
                                <thead>
                                    <tr>
                                        <th>Tous</th>
                                        <th>Supprimé</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <th>Photo de catégorie</th>
                                        <th>Nom</th>
                                        <th>Catégorie Principal</th>
                                        <th>Référence</th>
                                        <th>Produit</th>
                                        <th>Combinaisons</th>
                                        <th>Cartes cadeau</th>
                                        <th>Créé</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white">             
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>       
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                                            <img src="<?php echo e($categorie->photo); ?>" width="80" height="80" class="img img-responsive" style="position: centre"/>
                                        </td>  
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                                            <?php echo e($categorie->Nom); ?>

                                        </td>              
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">
                                            <?php if($categorie->categoriesp): ?>
                                                <?php echo e($categorie->categoriesp->Nom); ?>

                                            <?php else: ?>
                                                Catégorie parente non définie
                                            <?php endif; ?>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                                            <?php echo e($categorie->Référence); ?>

                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                                            Produit (<?php echo e($categorie->Produit); ?>)
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                                            Combinaisons (<?php echo e($categorie->Combinaisons); ?>)
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                                            Cartes cadeaux (<?php echo e($categorie->Cartes_cadeau); ?>)
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                                            <?php echo e($categorie->created_at); ?>

                                        </td>   
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Créer une catégorie</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="mb-3" action="<?php echo e(route('catégorie.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="mb-3">
                        <label class="form-label" for="Nom">Nom de catégorie :</label>
                        <input type="text" class="form-control input-field" id="Nom" name="Nom">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="photo">Photo de catégorie :</label>
                        <input type="file" class="form-control input-field" id="photo" name="photo">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="Categoriep">Catégorie Principale :</label><br>
                        <select name="Categoriep" class="form-select input-field">
                            <option value="" class="input-field select-field">Sélectionner une catégorie</option>
                            <?php $__currentLoopData = $categoriesp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($cat->Nom); ?>" class="input-field"><?php echo e($cat->Nom); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="Référence">Référence :</label>
                        <input type="text" class="form-control input-field" id="Référence" name="Référence">
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

<!-- Font Awesome -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js" integrity="sha512-t8kWsUqgrT8De/20UdY5w/NeJxkX5Y3qUCjfq4Hk5U2Q02X47t05wU3b1YpIOxrLpo/v78HTzTbZFY4UIb0Tgw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Custom JavaScript for Search Functionality -->
<script>
    // Function to filter table rows based on input value
    function filterTable() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("table-search");
        filter = input.value.toUpperCase();
        table = document.querySelector(".datatables-customers");
        tr = table.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1]; // Index 1 is for Nom column
            td2 = tr[i].getElementsByTagName("td")[2]; // Index 2 is for Catégorie Principale column
            if (td || td2) {
                txtValue = (td.textContent || td.innerText) + (td2.textContent || td2.innerText);
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    // Add event listener to input field
    document.getElementById("table-search").addEventListener("input", filterTable);
</script>

</body>
</html>
<?php /**PATH C:\viore_aide\resources\views/admin/categorie.blade.php ENDPATH**/ ?>