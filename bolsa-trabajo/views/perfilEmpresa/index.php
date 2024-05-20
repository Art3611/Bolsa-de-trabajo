<?php
 require 'views/partials/header.php';
 
?>
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
<div class='bg-[#F3F6FB] md:w-[725px] md:h-[550px] p-10 rounded-lg'>
<form action="" class='flex flex-col'>
    <label for="descripcion">Agregar una descripcion <span class='text-red-500'>*</span></label>   
    <input type="text"  class="h-10 md:h-16 rounded-lg">
    <label for="perfil">Agrega una imagen de perfil  <span class='text-red-500'>*</span></label></label>
    <input type="text">
</form>
</div>

</main>


<?php require 'views/partials/footer.php'?>