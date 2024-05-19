<?php require 'views/partials/header.php';?>
    <?php
        require_once __DIR__ .'../../../controllers/userSesion.php';
        $userSession = new UserSesion();
        $currentUser = $userSession->getCurrentUser();

        echo $currentUser['user'];
    ?>

<?php require 'views/partials/footer.php'?>