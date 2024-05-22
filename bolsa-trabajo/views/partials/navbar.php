<header>
    <nav class="flex justify-between items-center px-5 sm:px-20 py-5 border border-b-2">
        <div class="flex gap-5">
            <a href="<?= constant('URL')?>" class="text-[#000] hover:text-[#1E40AF]">Inicio</a>
            <a href="<?= constant('URL')?>ofertas/" class="text-[#000] hover:text-[#1E40AF]">Trabajos</a>
            <a href="<?= constant('URL')?>empresas/" class="text-[#000] hover:text-[#1E40AF]">Empresas</a>
        </div>

        <div class="flex gap-3">
        <?php
            require_once __DIR__ . '../../../controllers/userSesion.php';
            $userSession = new UserSesion();
            $currentUser = $userSession->getCurrentUser();

            if ($currentUser && $currentUser['user']) {
                // Si hay un usuario actual, muestra el botón
                echo '
                <div id="login-button" class="sm:flex hidden gap-x-5 bg-[#DCE8F8] p-2 rounded-lg mt-1 z-10">
                    <a class="text-[#2A56CB] hover:text-[#1E40AF]" href="' . constant('URL') . 'login/logout">Cerrar sesión</a>
                </div>';
                
                if ($currentUser['rol_id'] == 2) { // rol_id 2 es para empresas
                    echo '
                    <div id="profile-button" class="sm:flex hidden gap-x-5 bg-[#DCE8F8] p-2 rounded-lg mt-1 z-10">
                        <a class="text-[#2A56CB] hover:text-[#1E40AF]" href="' . constant('URL') . 'perfilEmpresa/">Perfil de Empresa</a>
                    </div>';
                } else {
                    // Si el usuario no es una empresa, muestra el botón de perfil
                    echo '
                    <div id="profile-button" class="sm:flex hidden gap-x-5 bg-[#DCE8F8] p-2 rounded-lg mt-1 z-10">
                        <a class="text-[#2A56CB] hover:text-[#1E40AF]" href="' . constant('URL') . 'perfilUsuario/">Perfil</a>
                    </div>';
                }
            } else {
                // Si no hay un usuario actual, muestra los botones de inicio de sesión y registro
                echo '
                <div id="login-button" class="sm:flex hidden gap-x-5 bg-[#DCE8F8] p-2 rounded-lg mt-1 z-10">
                    <a href="' . constant('URL') . 'login/" class="text-[#2A56CB] hover:text-[#1E40AF]">Iniciar Sesión</a>
                </div>
                <div id="register-button" class="sm:flex hidden gap-x-5 bg-[#DCE8F8] p-2 rounded-lg mt-1 z-10">
                    <a href="' . constant('URL') . 'registroUsuario/" class="text-[#2A56CB] hover:text-[#1E40AF]">Registrarme</a>
                </div>';
            }
            ?>
        </div>
    </nav>
</header>

