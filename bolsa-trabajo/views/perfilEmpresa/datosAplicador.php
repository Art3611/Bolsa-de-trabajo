<?php require 'views/partials/header.php'; ?>

<main class='flex flex-col md:flex-row'>

    <?php require 'views/partials/sideBarEmpresa.php';?>

    <?php if (isset($this->usuario)) { ?>
        <p>
        Nombre: <?= isset($this->usuario['nombre']) ? $this->usuario['nombre'] : 'Nombre no disponible' ?>
Correo: <?= isset($this->usuario['email']) ? $this->usuario['email'] : 'Correo no disponible' ?>

        </p>
    <?php } else { ?>
        <p><?= $this->mensaje ?></p>
    <?php } ?>

</main>


<?php require 'views/partials/footer.php'?>
