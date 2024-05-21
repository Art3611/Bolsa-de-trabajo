<?php
 require 'views/partials/header.php';
 require_once __DIR__ .'../../../controllers/userSesion.php';
// Obtener el usuario actual
    $userSession = new UserSesion();
    $currentUser = $userSession->getCurrentUser();
?>
<main class='flex'>

<?php require 'views/partials/sideBarEmpresa.php';?>

<section class='flex justify-start ml-10 items-start p-10 w-full'>
                                    
<div class='flex flex-col gap-10'>
    <div class="flex items-center gap-20">
    <img src="<?= constant('URL') ?>/public/img/logo.png" height="200" width="200" alt="Perfil de la empresa" />
    <h1 class="text-xl font-bold"><?= $currentUser['user'] ?></h1>
    </div>                                                                                                         

    <div>
        <h2 class="font-bold text-xl"> Descripcion de la empresa</h2>
        <p><?= $currentUser['descripcion'] ?></p>
    </div>
</div>

</section>
</main>

<?php require 'views/partials/footer.php'?>