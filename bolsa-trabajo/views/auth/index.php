<?php require 'views/partials/header.php';?>
<main>

    <div class="text-center">
      <?= $this->mensaje ?>
    </div>

    <h1>Registro de usuario</h1>

    <form action="<?= constant('URL')?>auth/registerUser" method="POST">
        <label for="nombre">Nombre de usuario</label>
        <input type="text" name='nombre' required>
        <label for="email">Correo electronico</label>
        <input type="email" name='email' required>
        <label for="password">Contraseña</label>
        <input type="password" name='password' required>
        <button>Crear cuenta</button>
    </form>
</main>
<?php require 'views/partials/footer.php'?>
