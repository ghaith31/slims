<!doctype html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-assets-path="<?php echo e(asset('assets')); ?>" data-template="vertical-menu-template-no-customizer">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0" />
    <title>Dashboard</title>
    <meta name="description" content="" />
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('slims.png')); ?>" />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap" rel="stylesheet" />
    <!-- Icons -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/fonts/fontawesome.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/fonts/tabler-icons.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/fonts/flag-icons.css')); ?>" />
    <!-- Core CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/css/rtl/core.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/css/rtl/theme-default.css')); ?>" />
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

    <style>
        .dev {
            position: absolute;
            top: 100px;
            left: 58%;
            transform: translateX(-50%);
            width: 80%;
        }
        .menu-logo {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px 0;
        }
        .menu-logo img {
            width: 50%;
        }
    </style>
</head>
<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
    <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme sidebar-menu" >
        <a href="<?php echo e(route('menu.create')); ?> "> <img width="7%" height="7%"  fill="none" src="<?php echo e(asset('men.png')); ?>" class="img" style="margin-bottom: -20% !important;"></a>
         <img width="28%" height="15%" viewBox="0 0 32 22" fill="none" src="<?php echo e(asset('slims.png')); ?>" class="img">
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
    <div class="layout-wrapper layout-content-navbar">
      <?php echo $__env->make('admin.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="layout-container">
            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->
                <canvas id="ordersChart" width="400" height="200"></canvas>
                <div class="dev">
                    <div class="mb-4">
                        <div class="swiper-container swiper-container-horizontal swiper swiper-card-advance-bg" id="swiper-with-pagination-cards">
                            <div class="swiper-slide">
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="text-white mb-0 mt-2" style="text-align: center;">Orders Dashboard</h5>
                                    </div>
                                    <div class="col-lg-7 col-md-9 col-12 order-2 order-md-1">
                                        <h6 class="text-white mt-0 mt-md-3 mb-3"><strong>Tous les commands:</strong></h6>
                                        <p class="mb-0 fw-medium me-2 website-analytics-text-bg"><?php echo e($totalOrders); ?></p>

                                        <h6 class="text-white mt-0 mt-md-3 mb-3"><strong>Commands par jour:</strong></h6>
                                        <ul class="list-unstyled mb-0">
                                            <?php $__currentLoopData = $orderCountsByDay; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $date => $count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li class="d-flex align-items-center mb-2"><?php echo e($date); ?>: <?php echo e($count->count); ?> orders</li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                        <h6 class="text-white mt-4 mb-3"><strong>Commands par mois:</strong></h6>
                                        <ul class="list-unstyled mb-0">
                                            <?php $__currentLoopData = $orderCountsByMonth; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $month): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li class="d-flex align-items-center mb-2"><?php echo e($month['label']); ?>: <?php echo e($month['count']); ?> orders</li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                    <div class="col-lg-5 col-md-3 col-12 order-1 order-md-2 my-4 my-md-0 text-center">
                                        <img src="<?php echo e(asset('assets/img/illustrations/card-website-analytics-3.png')); ?>" alt="Orders Analytics" width="170" class="card-website-analytics-img" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
                <!-- Footer -->
                <footer class="content-footer footer bg-footer-theme">
                    <div class="container-xxl">
                        <div class="footer-container d-flex align-items-center justify-content-between py-2 flex-md-row flex-column">
                            <div>
                                ©
                                <script>
                                    document.write(new Date().getFullYear());
                                </script>
                                , made with ❤ by
                                <a href="https://pixinvent.com" target="_blank" class="footer-link text-primary fw-medium">Pixinvent</a>
                            </div>
                            <div class="d-none d-lg-inline-block">
                                <a href="https://themeforest.net/licenses/standard" class="footer-link me-4" target="_blank">License</a>
                                <a href="https://1.envato.market/pixinvent_portfolio" target="_blank" class="footer-link me-4">More Themes</a>
                                <a href="https://pixinvent.com/demo/vuexy-bootstrap-laravel-admin-template/documentation" target="_blank" class="footer-link me-4">Documentation</a>
                                <a href="https://pixinvent.ticksy.com/" target="_blank" class="footer-link d-none d-sm-inline-block">Support</a>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- / Footer -->
                <div class="content-backdrop fade"></div>
            </div>
            <!-- / Content wrapper -->
        </div>
    </div>
</div>
</div>
    <!-- / Layout wrapper -->
    <script src="<?php echo e(asset('assets/vendor/libs/jquery/jquery.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/libs/popper/popper.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/js/bootstrap.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/libs/node-waves/node-waves.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/libs/hammer/hammer.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/libs/i18n/i18n.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/libs/typeahead-js/typeahead.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/libs/apex-charts/apexcharts.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/libs/swiper/swiper.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/libs/datatables-responsive/datatables-responsive.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables-checkboxes.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/js/dropdown-hover.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/main.js')); ?>"></script>
    <script>
        var ctx = document.getElementById('ordersChart').getContext('2d');
        var ordersChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: <?php echo json_encode(array_keys($orderCountsByDay->toArray()), 15, 512) ?>,
                datasets: [{
                    label: 'Orders',
                    data: <?php echo json_encode($orderCountsByDay->pluck('count'), 15, 512) ?>,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html><?php /**PATH C:\wamp64\www\viore_aide\resources\views/admin/tabledebord.blade.php ENDPATH**/ ?>