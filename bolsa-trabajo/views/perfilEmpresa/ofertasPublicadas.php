<?php

require 'views/partials/header.php';
include_once __DIR__ . '../../../models/Ofertas.php';

function truncateString($string, $length) {
    if (strlen($string) > $length) {
        return substr($string, 0, $length) . '...';
    } else {
        return $string;
    }
}

?>

<main class='flex flex-col md:flex-row'>

<?php require 'views/partials/sideBarEmpresa.php'; ?>

<section>
<h1 class='text-center font-bold'>Ofertas publicadas</h1>
<section class='mx-auto flex gap-10 p-10 md:h-screen'>
<?php if (isset($this->mensaje)) { ?>
    <div class="alert alert-warning">
        <h1 class='font-bold'><?= $this->mensaje ?></h1>
    </div>
<?php } else { ?>
    <?php foreach ($this->ofertas as $row) {
        $oferta = new Oferta();
        $oferta = $row;

    ?>
    <div class='h-20 w-96 flex justify-between items-center p-5 border border-1 rounded-lg'>
        <h3 class='font-semibold'><?= truncateString($oferta->nombre_trabajo, 20) ?></h3>
        <a href='<?= constant('URL') . 'perfilEmpresa/editarOferta/'. $oferta->id ?>' class='bg-blue-light p-2 rounded-lg text-white cursor-pointer'>
            Editar
        </a>
        <a href='<?= constant('URL') . 'perfilEmpresa/eliminarOferta/' . $oferta->id; ?>' class='bg-red-500 text-white rounded-lg text-white p-2'>
            Eliminar
        </a>
    </div>
    <?php }} ?>
</section>
</section>

</main>

<?php require 'views/partials/footer.php'?>