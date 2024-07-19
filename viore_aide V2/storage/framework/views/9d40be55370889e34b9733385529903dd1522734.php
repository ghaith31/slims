<!DOCTYPE html>
<html>
<head>
    <title>Bienvenue à notre équipe !</title>
</head>
<body>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .logo {
            text-align: center;
            margin-bottom: 20px;
        }
        .logo img {
            max-width: 100px;
            height: auto;
        }
        </style>
    <div class="logo">
        <img src="<?php echo e($message->embed(public_path('slims.png'))); ?>" alt="Logo de notre plateforme">

    </div>
    <h1>Bienvenue à notre équipe !</h1>
    <p>Voici vos informations de connexion :</p>
    <ul>
        <p><strong>login :</strong><a href="<?php echo e(url('SlimsDigital/logine')); ?>">SlimsDigital/logine</a>
        <li><b>Rôle:</b> <?php echo e($role); ?></li>
        <li><b>Email:</b> <?php echo e($email); ?></li>
        <li><b>Mot de passe:</b> <?php echo e($password); ?></li>
    </ul>
    <p>Veuillez garder ces informations en sécurité.</p>
</body>
</html>
<?php /**PATH C:\viore_aide\resources\views/emails/posted/emp_registred.blade.php ENDPATH**/ ?>