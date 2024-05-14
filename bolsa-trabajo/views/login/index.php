<?php require 'views/partials/header.php';?>
<main class='flex flex-col justify-center items-center'>
    <h1>Iniciar sesion</h1>

    <div class="text-center">
      <?= $this->mensaje ?>
    </div>

    <form action="<?= constant('URL')?>login/loginUser" method="POST" class='flex flex-col'>
        <label for="email">Correo electronico</label>
        <input type="email" name='nombre' required>
        <label for="password">Contraseña</label>
        <input type="password" name='password' required>
        <button>Iniciar sesion</button>
    </form>
</main>
<?php require 'views/partials/footer.php'?>
