<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'views/partials/header.php';
include_once __DIR__ . '../../../models/Ofertas.php';


?>

<main class='flex flex-col'>
    <section class='bg-slider flex flex-col justify-center items-center'>
        <h1 class='text-center text-white text-3xl md:text-6xl'>Encuentra tu mejor trabajo</h1>

        <article class='flex flex-col md:flex-row gap-14 mt-10'>
            <div class='bg-[#D9D9D9] bg-opacity-20 md:w-32 h-32 cursor-pointer rounded-full flex justify-center items-center p-5'>
                <p class='text-white text-center font-semibold'>Finanzas</p>
            </div>
                <div class='bg-[#D9D9D9] bg-opacity-20  md:w-32 h-32 cursor-pointer rounded-full flex justify-center items-center p-5'>
                    <p class='text-white text-center font-semibold'>Diseño</p>
                </div>
            <div class='bg-[#D9D9D9] bg-opacity-20  md:w-32 h-32 cursor-pointer rounded-full flex justify-center items-center p-5'>
                <p class='text-white text-center font-semibold'>Desarrollo web</p>
            </div>
        </article>
    </section>

    <section class='mt-10 p-10 md:p-20'>
        <h1 class='text-5xl text-center'>Trabajos recomendados</h1>
        <p class='text-center'>Podemos ayudarte a encontrar tu trabajo deseado.</p>

        <article class='mt-10'>
             <!-- Aqui van las ofertas de trabajo -->
     <div class='flex flex-wrap justify-center items-center gap-10'>
        <?php
            foreach($this->ofertas as $row){
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
                    <button class='p-2 bg-green-500 rounded-lg text-white'>Ver oferta</button>
                </div>
            </div> <!-- Cierre del contenedor de la tarjeta -->
        <?php } ?>
        </div>
        </article>
    </section>
    
    <section>
        <h2 class="text-center text-3xl font-bold p-10 md:p-20">Como comenzar a trabajar</h2>

        <article class='flex flex-col items-center md:flex-row justify-center gap-20 mt-10'>
        <div>
            <h3 class='text-center text-xl font-bold'>Registrate</h3>
            <p class='text-gray text-center'>Registrate en nuestra plataforma</p>

        </div>
        <div>
            <h3 class='text-center text-xl font-bold'>Crea tu perfil</h3>
            <p class='text-gray text-center'>Agrega tus datos personales y de contacto</p>
        </div>
        <div>
            <h3 class='text-center text-xl font-bold'>Aplica a un trabajo</h3>
             <p class='text-gray text-center'>Busca tu trabajo deseado</p>
        </div>
    </article>  

        <article class='bg-footer flex flex-col md:flex-row justify-center md:justify-around items-center py-0 px-10 md:p-20 gap-14 mt-10'>
            <div class='bg-blue md:w-[500px] h-72 md:h-80 rounded-lg text-white p-5 p-10 md:p-20'>
                <h3 class='text-3xl'>Soy candidato</h3>
                <p class='text-sm md:text-base'>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ab numquam exercitationem laboriosam aspernatur adipisci fugit. Doloribus animi eveniet suscipit laborum. Optio consequuntur, voluptate odio obcaecati fugit aperiam placeat non sunt.</p>
            </div>
            <div class='bg-blue-light  md:w-[500px] h-72 md:h-80 rounded-lg text-white p-10 md:p-20'>
                <h3 class='text-3xl'>Soy empleador</h3>
                <p class='text-sm md:text-base'>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dignissimos delectus assumenda expedita. Perferendis dicta consequuntur porro quas, modi saepe suscipit nobis. Pariatur esse doloribus assumenda soluta accusantium dignissimos a quis?</p>
            </div>
        </article>
        
    </section>
    
<?php require 'views/partials/footer.php'?>