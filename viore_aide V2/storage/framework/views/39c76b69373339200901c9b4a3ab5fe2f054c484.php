<!doctype html>
<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="<?php echo e(asset('assets/')); ?>"
  data-template="vertical-menu-template">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Dashboard Admin</title>

    <meta name="description" content="" />


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap"
      rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/fonts/fontawesome.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/fonts/tabler-icons.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/fonts/flag-icons.css')); ?>" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/css/rtl/core.css')); ?>" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/css/rtl/theme-default.css')); ?>" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/demo.css')); ?>" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/node-waves/node-waves.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/typeahead-js/typeahead.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/apex-charts/apex-charts.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/swiper/swiper.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css')); ?>" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/css/pages/cards-advance.css')); ?>" />

    <!-- Helpers -->
    <script src="<?php echo e(asset('assets/vendor/js/helpers.js')); ?>"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
   
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="<?php echo e(asset('assets/js/config.js')); ?>"></script>
  </head>

  <body>
  <style>
.sidebar-menu {
  display: flex;
  flex-direction: column;
  align-items: center; /* Centrer horizontalement */
}

.menu-link {
  display: flex;
  align-items: center; /* Centrer verticalement */
  text-decoration: none; /* Supprimer le soulignement des liens */
  color: black; /* Couleur du texte */
}

.menu-logo {
  margin-right: 5px; /* Espacement entre l'icône et le texte */
}
.img {
    margin-top: 10% !important;
   margin-left: 8%;
    /* Réglez cette valeur selon vos besoins */
}  
.img1 {
  width: 40%; /* Adjust the width as needed */
    height: 7%; /* Adjust the height as needed */
    margin-top: 15% !important; /* Adjust the top margin as needed */
    display: block;
    margin-left: auto;
    margin-right: auto;
    }
   

</style>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->
        
        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme sidebar-menu" >
          <a href="<?php echo e(route('menu.create')); ?> "> <img width="7%" height="7%"  fill="none" src="<?php echo e(asset('men.png')); ?>" class="img" style="margin-bottom: -20% !important;"></a>
           <img  viewBox="0 0 32 22" fill="none" src="<?php echo e(asset('slims.png')); ?>" class="img1">
          <div class="app-brand demo">
            <a href="https://vioredigital.com/" class="app-brand-link">
              <span class="app-brand-logo demo">
              </span>
            </a>
           
          </div>

          <div class="menu-inner-shadow"></div>
         
          <ul class="menu-inner py-1">
           
           
            
            <!-- Apps & Pages -->
            <li class="menu-item  ">
  <a href="<?php echo e(route('dash')); ?>" class="menu-link">
    
    <!-- Ici, vous pouvez ajouter votre image -->
    <img src="<?php echo e(asset('assets/icons/dashboard.png')); ?>" alt="Votre Logo" class="menu-logo" style="width: 20px; height: 20px;">
    <!-- Fin de l'insertion du logo -->
    <div class="menu-item icon-label sidebar-item">Tableau de bord</div>
  </a>
</li>
<li  class="menu-item ">
<a href="<?php echo e(route('admin.index')); ?>" class="menu-link">
    
    <!-- Ici, vous pouvez ajouter votre image -->
    <img src="<?php echo e(asset('assets/icons/shop.png')); ?>" alt="Votre Logo" class="menu-logo" style="width: 20px; height: 20px;">
    <!-- Fin de l'insertion du logo -->
    <div class="menu-item  ">Commands</div>
  </a>
</li>
            <!-- e-commerce-app menu start -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
              <img src="<?php echo e(asset('assets/icons/menu.png')); ?>" alt="Votre Logo" class="menu-logo" style="width: 20px; height: 20px;"> 
                <div >Menu</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="<?php echo e(route('catégorie.indexp')); ?>" class="menu-link">
                    <div>Catégories Principales</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="<?php echo e(route('catégorie.index')); ?>" class="menu-link">
                    <div>Catégories</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="/nouveauproduit" class="menu-link">
                    <div>Produit</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="<?php echo e(route('combos.affich')); ?>" class="menu-link">
                    <div>Combinaisons</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="<?php echo e(route('cartefidelite.affich')); ?>" class="menu-link">
                    <div>Cartes de fidélité</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="<?php echo e(route('modif.affich')); ?>"  class="menu-link">
                    <div>Modificatrices</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="<?php echo e(route('optionmodif.affich')); ?>" class="menu-link">
                    <div>option de modificateur</div>
                  </a>
                </li>
              </ul>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
              <img src="<?php echo e(asset('assets/icons/in.png')); ?>" alt="Votre Logo" class="menu-logo" style="width: 20px; height: 20px;"> 
                <div >Inventaire</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="<?php echo e(route('article.back')); ?>"  class="menu-link">
                    <div>Articles</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="<?php echo e(route('fournisseur.affich')); ?>" class="menu-link">
                    <div>Fournisseuses</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="<?php echo e(route('ordre.affich')); ?>" class="menu-link">
                    <div>Commandes d'achat</div>
                  </a>
                </li>
               
               
              </ul>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
              <img src="<?php echo e(asset('assets/icons/settings.png')); ?>" alt="Votre Logo" class="menu-logo" style="width: 20px; height: 20px;"> 
                <div >Manage</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="<?php echo e(route('employe.affich')); ?>" class="menu-link">
                    <div>Utilisateurs</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="<?php echo e(route('branche.affich')); ?>"  class="menu-link">
                    <div>Branche</div>
                  </a>
                </li>

                <li class="menu-item">
                  <a href="<?php echo e(route('reduction.affich')); ?>" class="menu-link">
                    <div>Réductions</div>
                  </a>
                </li>
              </ul>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-lock"></i>
                <div data-i18n="Authentications">Authentications</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <div data-i18n="Comptes">Comptes</div>
                  </a>
                  <ul class="menu-sub">
                    <li class="menu-item">
                      <a href="<?php echo e(route('employe.affich')); ?>"class="menu-link" target="_blank">
                        <div >Ajouter un Compte</div>
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>
            </li>

           
            <!-- Misc -->
            <li class="menu-header small text-uppercase">
              <span class="menu-header-text" data-i18n="Misc">Misc</span>
            </li>
            <li class="menu-item">
              <a href="https://vioredigital.com/" target="_blank" class="menu-link">
                <i class="menu-icon tf-icons ti ti-lifebuoy"></i>
                <div data-i18n="Support">Support</div>
              </a>
            </li>
          
          </ul>
        </aside>
        <script src="<?php echo e(asset('assets/vendor/libs/jquery/jquery.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/libs/popper/popper.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/js/bootstrap.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/libs/node-waves/node-waves.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/libs/hammer/hammer.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/libs/i18n/i18n.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/libs/typeahead-js/typeahead.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/js/menu.js')); ?>"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="<?php echo e(asset('assets/vendor/libs/apex-charts/apexcharts.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/libs/swiper/swiper.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')); ?>"></script>

    <!-- Main JS -->
    <script src="<?php echo e(asset('assets/js/main.js')); ?>"></script>

    <!-- Page JS -->
    <script src="<?php echo e(asset('assets/js/dashboards-analytics.js')); ?>"></script>
    <!-- Vendors JS -->
</body>
</html><?php /**PATH C:\viore_aide\resources\views/admin/sidebar.blade.php ENDPATH**/ ?>