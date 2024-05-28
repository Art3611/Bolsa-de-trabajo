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

<section class='mx-auto flex gap-10 p-10'>

<?php
 foreach($this->ofertas as $row
 ){
     $oferta = new Oferta();
     $oferta = $row;

?>

<div class='h-20 w-96 flex justify-between items-center p-5 border border-1 rounded-lg'>
  <h3 class='font-semibold'><?= truncateString($oferta->nombre_trabajo, 20) ?></h3>
    <div class='bg-blue-light p-2 rounded-lg text-white'>
        Editar
    </div>
    <div class='bg-red-500 text-white rounded-lg text-white p-2'>
        Eliminar
    </div>
</div>


<?php } ?>
</section>


</main>

<?php require 'views/partials/footer.php'?>