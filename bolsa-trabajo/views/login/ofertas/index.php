<?php 
require 'views/partials/header.php';
require_once __DIR__ .'../../../models/Ofertas.php'

?>

<main>
<section class='mt-10 md:h-screen'>
    <h1 class='text-center font-bold text-3xl'>Ofertas laborales</h1>
             <!-- Aqui van las ofertas de trabajo -->
     <div class='grid grid-cols-2  justify-between justify-items-center gap-10 mt-10 '>
        <?php
            foreach($this->ofertas as $row
            ){
                $oferta = new Oferta();
                $oferta = $row;
        ?>
            <div class="border p-4 rounded-lg mb-5 md:w-96"> <!-- Añadí un contenedor para cada tarjeta -->
                <div>
                    <h3 class='font-semibold'><?= $oferta->nombre_trabajo ?></h3>
                </div>
                <div>
                    <span class='text-gray'><?= $oferta->ubicacion ?></span>
                    <span class='text-gray'><?= $oferta->salario ?></span>
                </div>
                <div class='flex justify-between'>
                    <span class='bg-blue-light p-2 rounded-lg text-white'><?= $oferta->duracion ?></span>
                    <a href="<?= constant('URL') . 'ofertas/verOferta/' . $oferta->id ?> " class='p-2 bg-green-500 rounded-lg text-white'>Ver oferta</a>
                </div>
            </div> <!-- Cierre del contenedor de la tarjeta -->
        <?php } ?>
        </div>
     </section>
</main>

<?php require 'views/partials/footer.php'?>