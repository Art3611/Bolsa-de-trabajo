<?php require 'views/partials/header.php';?>

<div>
    <form action="" method="POST" class='flex flex-col gap-3 md:gap-5'>
     
    <label for="industria_empresa">Industria de la empresa
            <span class='text-red-500'>*</span>
    </label>
    <input type="text" name='industria_empresa' class='h-10 md:h-16 rounded-lg' required>

    <label for="locacion">Ubicacion de la empresa
            <span class='text-red-500'>*</span>
    </label>
    <input type="text" name='locacion' class='h-10 md:h-16 rounded-lg' required>

    <label for="locacion">Ubicacion de la empresa
            <span class='text-red-500'>*</span>
    </label>
    <input type="text" name='locacion' class='h-10 md:h-16 rounded-lg' required>

    <label for="foto_perfil">Foto perfil
        <span class='text-red-500'>*</span>
    </label>
    <input type="file" required>

    </form>
</div>

<?php require 'views/partials/footer.php'?>
