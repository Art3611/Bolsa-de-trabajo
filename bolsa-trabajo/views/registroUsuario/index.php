<?php require 'views/partials/header.php';?>
<main class='flex flex-col justify-center items-center p-10 md:p-20'>

<div class='bg-[#F3F6FB] md:w-[725px] p-10 rounded-lg'>
<h1 class='text-xl text-center'>Registro de usuario</h1>

<form action="<?= constant('URL')?>registroUsuario/registrarUsuario" method="POST" class='flex flex-col gap-3 md:gap-5'>
        <label for="nombre">Nombre de usuario <span class='text-red-500'>*</span></label>
        <input type="text" name='nombre' class=' h-10 md:h-16 rounded-lg' required>
 
        <label for="apellido">Apeliido
                <span class='text-red-500'>*</span>
        </label>
        <input type="text" name='apellido' class='h-10 md:h-16 rounded-lg' required>

        <label for="nif">Nif
            <span class='text-red-500'>*</span>
        </label>
        <input type="text" name='nif' class='h-10 md:h-16 rounded-lg' required>

        <label for="direccion">Direccion
            <span class='text-red-500'>*</span>
         </label>
         <input type="text" name='direccion' class='h-10 md:h-16 rounded-lg' required>

        <label for="email">Correo electronico <span class='text-red-500'>*</span></label>
        <input type="email" name='email' class='h-10 md:h-16 rounded-lg' required>

        <label for="password">Contraseña <span class='text-red-500'>*</span></label>
        <input type="password" name='password' class='h-10 md:h-16 rounded-lg' required>

        <span class='text-red-500 text-center'><?= $this->error ?></span>
    

        <div class='text-center'>
            <span class='text-center mr-2'>Eres empresa?</span><a class='text-blue-500 inline-block' href='<?= constant('URL')?>registroEmpresa/'>Crear cuenta</a>
        </div>
        <button class='p-5 rounded-lg text-white bg-blue-500 mt-10'>Crear cuenta</button>
    </form>

</main>
<?php require 'views/partials/footer.php'?>
