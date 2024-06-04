<?php require 'views/partials/header.php'; ?>

<main class='flex flex-col md:flex-row p-10 md:p-0'>

    <?php require 'views/partials/sideBarEmpresa.php';?>

    <section class="bg-[#DCE8F8] flex justify-center items-center flex-col rounded-lg p-10">
        <h1 class='font-bold'>Perfil del aspirante a el empreo</h1>
    <?php if (isset($this->usuario)) { ?>
        <section>
        <article>
        <h3 class='font-bold'>Nombre:</h3>
            <p>
            <?= $this->usuario->nombre ?>
            </p>
        </article>

        <article>
        <h3 class='font-bold'>Descripcion:</h3>
            <p>
            <?= $this->usuario->descripcion ?>
            </p>
        </article>
        <article>
        <h3 class='font-bold'>Direccion:</h3>
        <p>
         <?= $this->usuario->direccion ?>
         </p>
        </article>
        <article>
        <h3 class='font-bold'>Telefono:</h3>
        <p>
         <?= $this->usuario->telefono ?>
         </p>
        </article>
        </section>
      
    <?php } else { ?>
        <p><?= $this->mensaje ?></p>
    <?php } ?>

    </section>
</main>


<?php require 'views/partials/footer.php'?>
