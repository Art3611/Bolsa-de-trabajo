<?php require 'views/partials/header.php' ?>

<main class='h-screen flex justify-center items-center flex-col'>
    <h1 class='font-bold text-3xl text-center'><?= $this->mensaje; ?></h1>
    <a href="<?= constant('URL')?>inicio/"
       class='text-blue-500 text-xl text-center'>
       Volver
    </a>
</main>

<?php require 'views/partials/footer.php'?>
