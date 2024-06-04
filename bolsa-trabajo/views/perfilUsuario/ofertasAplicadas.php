<?php require 'views/partials/header.php'; ?>

<main class="flex">
    
<?php require 'views/partials/sideBarUsuario.php';?>

<section class='flex flex-wrap flex-col items-start md:flex-row gap-10 p-10 md:h-screen'>
<?php
    if (!empty($this->aplicaciones)) {
        foreach ($this->aplicaciones as $aplicacion) {
    ?>
    <div class='h-20 md:w-80 flex justify-between items-center p-5 border border-1 rounded-lg'>
        <h3 class='font-semibold'><?= $aplicacion->nombre_trabajo ?></h3>
        <a class='bg-green-500 p-2 text-center rounded-lg text-white cursor-pointer'>Ver</a>
    </div>
    <?php
    }
    } else { ?>
     <h1 class='font-bold text-center'>No hay ofertas con aspirantes</h1>
   <?php  
    }
    ?>
</section>
</main>

<?php require 'views/partials/footer.php'?>