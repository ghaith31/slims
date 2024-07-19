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
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
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
    <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="menu-logo">
            <img src="<?php echo e(asset('slims.png')); ?>" alt="Slims Logo">
        </div>
        <div class="menu-inner-shadow"></div>
        <ul class="menu-inner py-1">
            <!-- eCommerce Section -->
            <li class="menu-item active open">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-shopping-cart"></i>
                    <div data-i18n="eCommerce">e-Commerce</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item active open">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <div>Restaurant</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item active">
                                <a href="SlimsDigital/allcustomers" class="menu-link">
                                    <div>Tous les restaurants</div>
                                </a>
                            </li>
                        </ul>
                    </li>      
                </ul>
            </li>
            <!-- Misc Section -->
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text" data-i18n="Misc">Misc</span>
            </li>
            <li class="menu-item">
                <a href="http://vioredigital.com/" target="_blank" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-lifebuoy"></i>
                    <div data-i18n="Support">Support</div>
                </a>
            </li>
        </ul>
    </aside>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="layout-container">
          
            <div class="content-wrapper">
                <!-- Content -->
                <canvas id="partnershipChart" width="400" height="200"></canvas>
                <div class="dev">
                    <div class="mb-4">
                        <div class="swiper-container swiper-container-horizontal swiper swiper-card-advance-bg" id="swiper-with-pagination-cards">
                            <div class="swiper-slide">
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="text-white mb-0 mt-2" style="text-align: center;">Collaborations</h5>
                                    </div>
                                    <div class="col-lg-7 col-md-9 col-12 order-2 order-md-1">
                                        <h6 class="text-white mt-0 mt-md-3 mb-3"><strong>Tous les collaborations:</strong></h6>
                                        <?php if(session()->has('restaurants')): ?>
                                        <?php if(isset($totalRestaurants)): ?>
                                        <p class="mb-0 fw-medium me-2 website-analytics-text-bg"><?php echo e($totalRestaurants); ?></p>
                                    
                                        <h6 class="text-white mt-0 mt-md-3 mb-3"><strong>Collaboration de jour:</strong></h6>
                                        <ul class="list-unstyled mb-0">
                                            <?php $__currentLoopData = $requestCountsByDay; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $date => $count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li class="d-flex align-items-center mb-2"><?php echo e($date); ?>: <?php echo e($count->count); ?> requests</li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    <?php else: ?>
                                        <p>No data available.</p>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                    </div>
                                    <div class="col-lg-5 col-md-3 col-12 order-1 order-md-2 my-4 my-md-0 text-center">
                                        <img src="<?php echo e(asset('assets/img/illustrations/card-website-analytics-3.png')); ?>" alt="Website Analytics" width="170" class="card-website-analytics-img" />
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
                                , made with ❤️ by
                                <a href="https://pixinvent.com" target="_blank" class="footer-link text-primary fw-medium">Pixinvent</a>
                            </div>
                            <div class="d-none d-lg-inline-block">
                                <a href="https://themeforest.net/licenses/standard" class="footer-link me-4" target="_blank">License</a>
                                <a href="https://1.envato.market/pixinvent_portfolio" target="_blank" class="footer-link me-4">More Themes</a>
                                <a href="https://demos.pixinvent.com/vuexy-html-admin-template/documentation/" target="_blank" class="footer-link me-4">Documentation</a>
                                <a href="https://pixinvent.ticksy.com/" target="_blank" class="footer-link d-none d-sm-inline-block">Support</a>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- / Footer -->
                <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>
    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
</body>
</html>
<?php /**PATH C:\wamp64\www\viore_aide\resources\views/layouts/auth.blade.php ENDPATH**/ ?>