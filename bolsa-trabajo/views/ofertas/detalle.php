<?php 

require 'views/partials/header.php';
require_once __DIR__ . '../../../controllers/userSesion.php';
$userSession = new UserSesion();
$currentUser = $userSession->getCurrentUser();
  
?>

<main class='md:h-screen'>
<section class='bg-[#DCE8F8] h-32 flex justify-around items-center p-20'>
    <div>
    <h3 class='font-bold'><?= $this->oferta->nombre_trabajo ?></h3>
    <article class='flex gap-3'>
        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-map-pin"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" /><path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z" /></svg>
        <span>
        <?= $this->oferta->ubicacion ?>
        </span> 
        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-cash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 9m0 2a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2z" /><path d="M14 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M17 9v-2a2 2 0 0 0 -2 -2h-10a2 2 0 0 0 -2 2v6a2 2 0 0 0 2 2h2" /></svg>
        <span class='text-green-500'><?= $this->oferta->salario ?></span>
    </article>
    </div>

    <?php 
    if($currentUser && $currentUser['user']){
        if($currentUser['rol_id'] == 1){
            echo '
            <div class="p-5 bg-blue-500 rounded-lg text-white cursor-pointer">
               <a href="#">Aplicar al trabajo</a>
            </div>';
        }else {
            echo '<div></div>';
        }
    }
    ?>   
</section>

<section class='flex flex-col gap-yjustify-start items-start p-10 md:ml-72'>
    <section>
        <article class='mb-5'>
            <h3 class='font-bold'>Descripcion del empleo:</h3>
            <p><?= $this->oferta->descripcion ?></p>
        </article>

        <article>
            <h3 class='font-bold'>Requisitos:</h3>
            <p><?= $this->oferta->requisitos ?></p>
        </article>
    </section>
</section>

</main>

<?php require 'views/partials/footer.php'?>
