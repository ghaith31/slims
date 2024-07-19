<!doctype html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr"
  data-theme="theme-default" data-assets-path="<?php echo e(asset('assets/')); ?>" data-template="vertical-menu-template">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
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
  <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/css/rtl/theme-default.css')); ?>"
    class="template-customizer-theme-css" />
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

  <style>
    .sidebar-menu {
      display: flex;
      flex-direction: column;
      align-items: center;
      /* Centrer horizontalement */
    }

    .menu-link {
      display: flex;
      align-items: center;
      /* Centrer verticalement */
      text-decoration: none;
      /* Supprimer le soulignement des liens */
      color: black;
      /* Couleur du texte */
    }

    .menu-logo {
      margin-right: 15px;
      margin-left: -20px;

      /* Espacement entre l'icône et le texte */
    }
    .menu-logo {
  margin-right: 5px; /* Espacement entre l'icône et le texte */
}

    .img {
      margin-top: 10% !important;
      /* Réglez cette valeur selon vos besoins */
    }
    .img1 {
    width: 30%; /* Adjust the width as needed */
    height: 10%; /* Adjust the height as needed */
    margin-top: 20% !important; /* Adjust the top margin as needed */
    display: block;
    margin-left: auto;
    margin-right: auto;
    }

    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background: #ffffff;
    }

    .sidebar {
      width: 160px;
      background: linear-gradient(to bottom, #f5f5f5, #e5e5e5);
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      height: 100vh;
      position: sticky;
      top: 0;
      display: flex;
      flex-direction: column;
      border: 1px solid #000;
      flex-wrap: wrap;
      align-items: center;
      align-content: center;
      justify-content: flex-start;
      flex-wrap: nowrap;
    }

    .sidebar-title {
      font-size: 20px;
      margin-bottom: 0;
      color: #333;
      text-align: center;
      margin-left: 5px;
      margin-top: -40%;
    }

    .sidebar-categories {
      list-style-type: none;
      padding: 0;
      margin: 0;
      display: flex;
      flex-direction: column;
      gap: 15px;
      margin-top: 18px;
    }

    .sidebar-link {
      padding: 15px;
      color: #333;
      text-decoration: none;
      border-radius: 3px;
      transition: background-color 0.3s;
      display: flex;
      align-items: center;
      background-color: #fff;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .sidebar-link:hover {
      background-color: #ddd;
    }

    .sidebar-icon {
      width: 24px;
      height: 24px;
      margin-right: 15px;
    }

    .sidebar-text {
      flex: 1;
      font-size: 18px;
    }

    .logout-button {
      background-color: black;
      color: white;
      border: none;
      padding: 10px 20px; /* Ajuster le rembourrage pour la taille du bouton */
      cursor: pointer;
      text-decoration: none;
      border-radius: 5px;
      font-size: 14px;
      margin-top: auto; /* Placer le bouton en bas de la barre latérale */
      margin-bottom: 20px; /* Ajout de marge en bas pour espacement */
    }

    /* Media Queries pour rendre l'interface responsive */
    @media (max-width: 00px) {
      .sidebar {
        width: 20%;
        height: auto;
        padding: 20px;
        border: none;
        box-shadow: none;
        position: static;
        border-radius: 0;
      }

      .sidebar-title {
      font-size: 20px;
      margin-bottom: 0;
      color: #333;
      text-align: center;
      margin-left: 5px;
    }

      .sidebar-link {
        padding: 10px;
        font-size: 16px;
      }

      .sidebar-icon {
        width: 20px;
        height: 20px;
        margin-right: 10px;
      }

      .sidebar-text {
        font-size: 16px;
      }

      .logout-button {
        font-size: 12px;
        padding: 5px 8px;
      }

      .sidebar-title-container {
      display: flex;
      align-items: center;
      margin-bottom: 30px;
    }
    @media (max-width: 1199.98px) {
    .layout-navbar.navbar-detached {
        width: calc(100vw -(100vw - 100%) - 1.5rem* 2) !important;
    }
}

.layout-navbar.navbar-detached {
    width: calc(100% - 1.5rem* 2);
    margin: 1rem auto 0;
    border-radius: 0.375rem;
    padding: 0 1.5rem;
}
.layout-navbar-fixed .layout-navbar {
  position: fixed;
    top: 0;
    right: 0;
}
    }
  </style>
</head>

<body>
<?php echo $__env->make('admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="layout-page">
        <?php echo $__env->make('admin.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <ul class="navbar-nav flex-row align-items-center ms-auto">
    <!-- Quick links -->

    <!-- Notification -->
   
    <script>
    document.addEventListener("DOMContentLoaded", function() {
    const markAllButton = document.getElementById('mark-all-notifications-button');
    markAllButton.addEventListener('click', function() {
        document.getElementById('mark-all-notifications-form').submit();
    });

    const notifications = document.querySelectorAll('.dropdown-notifications-item');
    notifications.forEach(function(notification) {
        notification.addEventListener('click', function(event) {
            const notificationId = notification.getAttribute('data-notification-id');

            fetch(`/notifications/markAsRead/${notificationId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => {
                if (response.ok) {
                    const badge = document.querySelector('.badge-notifications');
                    if (badge) {
                        let unreadCount = parseInt(badge.textContent.trim());
                        unreadCount = Math.max(0, unreadCount - 1);
                        badge.textContent = unreadCount > 0 ? unreadCount : '';
                    }
                    notification.classList.add('notification-read');
                }
            })
            .catch(error => console.error('Une erreur s\'est produite :', error));
        });
    });
});

    </script>
    <li class="nav-item navbar-dropdown dropdown-user dropdown">
      <ul class="dropdown-menu dropdown-menu-end">
        <li>
          <div class="d-flex">
    <a href="<?php echo e(route('menu.create')); ?> "> <img width="10%" height="8%"  fill="none" src="<?php echo e(asset('men.png')); ?>" class="img" style="margin-bottom: -20% !important;"></a>
          </div>
        </li>
      </ul>
    </li>
    

  <!-- Menu -->
  <aside id="layout-menu"
    class="layout-menu menu-vertical menu bg-menu-theme sidebar-menu"
    style="height: 900px;">

    <a href="<?php echo e(route('menu.create')); ?> "> <img width="7%" height="7%"  fill="none" src="<?php echo e(asset('men.png')); ?>" class="img" style="margin-bottom: -20% !important;"></a>
    <img  viewBox="0 0 32 22" fill="none" src="<?php echo e(asset('slims.png')); ?>" class="img1">
    <div class="app-brand demo">
      <a href="https://vioredigital.com/" class="app-brand-link">
        <span class="app-brand-logo demo">
        </span>
      </a>
    </div>
    <div class="sidebar-title-container">
      <img src="<?php echo e(asset('assets/icons/menu.png')); ?>" alt="Votre Logo" class="menu-logo" style="width: 20px; height: 20px;">
      <h2 class="sidebar-title">Menu</h2>
    </div>
    <ul class="sidebar-categories">
      <?php $__currentLoopData = $Categoriep; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <li>
        <a href="<?php echo e(url('/menu/' . $cat->id)); ?>" class="sidebar-link">
          <img src="<?php echo e($cat->photo); ?>" class="img img-responsive sidebar-icon">
          <span class="sidebar-text"><?php echo e($cat->Nom); ?></span>
        </a>
      </li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>

    <div style="display: none;">
      <form id="logout-form" action="<?php echo e(route('logout1')); ?>" method="POST">
        <?php echo csrf_field(); ?>
      </form>
    </div>

    <!-- Logout button at the bottom with an icon -->
    <button type="button" class="logout-button"
      onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
      <i class="fa fa-sign-out logout-icon"></i> <!-- Replace with your desired icon class -->
      Logout
    </button>

  </aside>

</body>

</html>
<?php /**PATH C:\viore_aide\resources\views/admin/menu.blade.php ENDPATH**/ ?>