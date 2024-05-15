<header>
    <nav class="flex justify-between items-center px-5 sm:px-20 py-5 border border-b-2">
        <div class="flex gap-5">
            <a href="<?= constant('URL')?>/" class="text-[#2A56CB] hover:text-[#1E40AF]">Inicio</a>
            <a href="<?= constant('URL')?>trabajos/" class="text-[#2A56CB] hover:text-[#1E40AF]">Trabajos</a>
            <a href="<?= constant('URL')?>empresas/" class="text-[#2A56CB] hover:text-[#1E40AF]">Empresas</a>
            <?php
            require_once __DIR__ .'../../../controllers/userSesion.php';
            $userSession = new UserSesion();
            $user = $userSession->getCurrentUser();

            if ($user) {
                // Si hay un usuario actual, muestra el botón
                echo '<a  class="text-[#2A56CB] hover:text-[#1E40AF]" href="' . constant('URL') . 'login/logout">Salir</a>';
            }
            ?>
            
        </div>

        <div class="flex flex-col gap-3">
            <div id="login-button" class="sm:flex hidden gap-x-5 bg-[#DCE8F8] p-2 rounded-lg absolute  left-64 top-20 md:top-[10px] md:left-[2000px] mt-1 z-10 hidden">
                <a href="<?= constant('URL')?>login/" class="text-[#2A56CB] hover:text-[#1E40AF]">Iniciar Sesión</a>
            </div>
            <div id="register-button" class="sm:flex hidden gap-x-5 bg-[#DCE8F8] p-2 rounded-lg absolute  left-64 top-32 md:top-[10px] md:left-[2150px] mt-1 z-10 hidden">
                <a href="<?= constant('URL')?>registro/" class="text-[#2A56CB] hover:text-[#1E40AF]">Registrarme</a>
            </div>            

            <div class="sm:hidden relative">
                <button id="menu-toggle" class="flex items-center px-3 py-2 border rounded text-[#2A56CB] border-[#2A56CB] hover:text-[#1E40AF] hover:border-[#1E40AF]">
                    <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 9a1 1 0 100 2h12a1 1 0 100-2H3zm1 4a1 1 0 110-2h9a1 1 0 110 2H4z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        </div>
    </nav>
</header>

</header>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const menuToggle = document.getElementById('menu-toggle');
        const loginButton = document.getElementById('login-button');
        const registerButton = document.getElementById('register-button');

        menuToggle.addEventListener('click', function () {
            loginButton.classList.toggle('hidden');
            registerButton.classList.toggle('hidden');
        });
    });
</script>
