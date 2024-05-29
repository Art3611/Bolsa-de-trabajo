<?php require 'views/partials/header.php'; ?>

<main class='flex flex-col md:flex-row'>

<?php require 'views/partials/sideBarEmpresa.php';?>

<section class='mx-auto flex flex-col md:flex-row gap-10 p-10'>

<div class='bg-[#F3F6FB] md:w-[725px] p-10 rounded-lg'>
 <h1 class='text-xl text-center'>Publicar oferta</h1>

 <form action="<?= constant('URL')?>perfilEmpresa/registrarOferta" method="POST" class='flex flex-col gap-3 md:gap-5'>
    <label for="nombre_trabajo">Nombre del trabajo <span class='text-red-500' >*</span></label>
    <input type="text" name='nombre_trabajo' class=' h-10 md:h-16 rounded-lg' minlength="10"  maxlength="255" required>

    <label for="descripcion">Descripcion del empleo <span class='text-red-500'>*</span></label>
    <input type="text" name='descripcion' class=' h-10 md:h-16 rounded-lg' maxlength="560" minlength="20" required>

    <label for="ubicacion">Ubicacion del empleo <span class='text-red-500'>*</span></label>
    <input type="text" name='ubicacion' class=' h-10 md:h-16 rounded-lg' minlength="5"  maxlength="255" required>

    <label for="contrato">Tipo de contrato <span class='text-red-500'>*</span></label>
    <input type="text" name='contrato' class=' h-10 md:h-16 rounded-lg' minlength="5"  maxlength="255" required>

    <label for="salario">Salario <span class='text-red-500'>*</span></label>
    <input type="text" name='salario' class=' h-10 md:h-16 rounded-lg' minlength="5"  maxlength="255" required>

    <label for="duracion">Duracion <span class='text-red-500'>*</span></label>
    <input type="text" name='duracion' class=' h-10 md:h-16 rounded-lg' minlength="5"  maxlength="255" required>

    <label for="requisitos">Requisitos <span class='text-red-500'>*</span></label>
    <textarea type="text" name='requisitos' class='h-10 md:h-16 rounded-lg resize-none'minlength="15"  maxlength="255" required></textarea>

    <button class='p-5 rounded-lg text-white bg-blue-500 mt-10'>Publicar oferta</button>

      </form>
    </div>

</section>

</main>

<?php require 'views/partials/footer.php'?>