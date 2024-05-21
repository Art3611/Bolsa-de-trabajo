<?php require 'views/partials/header.php'; ?>
 <main class='flex flex-col justify-center items-center p-10 md:p-20'>

 <div class='bg-[#F3F6FB] md:w-[725px] p-10 rounded-lg'>
 <h1 class='text-xl text-center'>Publicar oferta</h1>

 <form action="<?= constant('URL')?>perfilEmpresa/registrarOferta" method="POST" class='flex flex-col gap-3 md:gap-5'>
    <label for="nombre_trabajo">Nombre del trabajo <span class='text-red-500'>*</span></label>
    <input type="text" name='nombre_trabajo' class=' h-10 md:h-16 rounded-lg' required>

    <label for="descripcion">Descripcion del empleo <span class='text-red-500'>*</span></label>
    <input type="text" name='descripcion' class=' h-10 md:h-16 rounded-lg' required>

    <label for="ubicacion">Ubicacion del empleo <span class='text-red-500'>*</span></label>
    <input type="text" name='ubicacion' class=' h-10 md:h-16 rounded-lg' required>

    <label for="contrato">Tipo de contrato <span class='text-red-500'>*</span></label>
    <input type="text" name='contrato' class=' h-10 md:h-16 rounded-lg' required>

    <label for="salario">Salario <span class='text-red-500'>*</span></label>
    <input type="text" name='salario' class=' h-10 md:h-16 rounded-lg' required>

    <label for="duracion">Duracion <span class='text-red-500'>*</span></label>
    <input type="text" name='duracion' class=' h-10 md:h-16 rounded-lg' required>

    <label for="requisitos">Requisitos <span class='text-red-500'>*</span></label>
    <textarea type="text" name='requisitos' class='h-10 md:h-16 rounded-lg' required> </textarea>

    <button class='p-5 rounded-lg text-white bg-blue-500 mt-10'>Publicar oferta</button>

</form>
</div>

</main>


<?php require 'views/partials/footer.php'?>