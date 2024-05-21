<?php require 'views/partials/header.php'; ?>
<main class='flex'>

<?php require 'views/partials/sideBarEmpresa.php';?>

<section class='flex justify-start ml-10 items-start p-10 w-full'>
<?php
    require_once __DIR__ .'../../../controllers/userSesion.php';
    $userSession = new UserSesion();
    $currentUser = $userSession->getCurrentUser();

    

    if(!$currentUser['profile']){
       echo "Aun no tienes has llenado tus datos de perfil";
    }

    echo '<div>
            <div class="flex items-center gap-5">
            <img src='. $currentUser['profile'] . ' height="200" width="200 alt="Perfil de la empresa" />
                <h1 class="text-xl font-bold">' . $currentUser['user'] . '</h1>
            </div>
            <h2 class="font-bold text-xl"> Descripcion de la empresa</h2>
            <p>' . $currentUser['descripcion'] . '</p>
          </div>';
?>
</section>
</main>

<?php require 'views/partials/footer.php'?>