<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Menu</title>
</head>
<body>
    <style>
.sidebar {
    width: 250px;
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
}

.sidebar-title {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 30px;
    color: #333;
    text-align: center;
}

.sidebar-categories {
    list-style-type: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-direction: column;
    margin-top: 0;
    gap: 15px;
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
    </style>
    <aside>
        <div class="sidebar">
            <div style="display: none;">
                <form id="logout-form" action="<?php echo e(route('logout1')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                </form>
            </div>
            
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="color: red; text-decoration: none;">Logout</a>
            
            <h2 class="sidebar-title">Menu</h2>
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
            
        </div>
        
    </aside> 
    <!-- Dans le corps de votre page HTML -->


 
</body>
</html><?php /**PATH C:\wamp64\www\viore_aide\resources\views/admin/menu.blade.php ENDPATH**/ ?>