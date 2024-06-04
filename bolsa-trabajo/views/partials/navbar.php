<?php

require_once __DIR__ . '../../../controllers/userSesion.php';
$userSession = new UserSesion();
$currentUser = $userSession->getCurrentUser();

?>

<!-- Navbar -->
<div class="flex items-center justify-between p-5 bg-white">
    <div>
        <a href="<?php constant('URL')?>" class="text-xl font-bold text-gray-800">Logo</a>
    </div>
    <div class="hidden md:flex items-center space-x-3">
        <a href="<?= constant('URL')?>" class="text-gray-800 hover:text-gray-500">Inicio</a>
        <a href="<?= constant('URL')?>ofertas/" class="text-gray-800 hover:text-gray-500">Trabajos</a>
        <a href="<?= constant('URL')?>empresas/" class="text-gray-800 hover:text-gray-500">Empresas</a>
        <?php if ($currentUser && $currentUser['user']) { ?>
        <?php if ($currentUser['rol_id'] == 2) { ?>
            <div id="profile-button" class="flex gap-x-5 bg-[#DCE8F8] p-2 rounded-lg mt-1 z-10">
                <a class="text-[#2A56CB] hover:text-[#1E40AF]" href="<?= constant('URL') ?>perfilEmpresa/">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                        <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                    </svg>
                </a>
            </div>
        <?php } else { ?>
            <a class="text-[#2A56CB] hover:text-[#1E40AF]" href="<?= constant('URL') ?>perfilUsuario/">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                </svg>
            </a>
        <?php } ?>
        <a class="text-[#2A56CB] hover:text-[#1E40AF]" href="<?= constant('URL') ?>login/logout">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-logout">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                <path d="M9 12h12l-3 -3" />
                <path d="M18 15l3 -3" />
            </svg>
        </a>
    <?php } else { ?>
        <a href="<?= constant('URL') ?>login/" class="text-gray-800 hover:text-gray-500">Iniciar Sesión</a>
        <a href="<?= constant('URL') ?>registroUsuario/" class="text-gray-800 hover:text-gray-500">Registrarme</a>
    <?php } ?>
    </div>
    <div class="md:hidden cursor-pointer" id="burger">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6 text-gray-800">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
    </div>
</div>

<!-- Mobile Menu -->
<div class="hidden flex flex-col justify-center items-center space-y-3 text-center md:hidden p-5" id="mobile-menu">
    <a href="<?= constant('URL')?>" class="text-gray-800 hover:text-gray-500">Inicio</a>
    <a href="<?= constant('URL')?>ofertas/" class="text-gray-800 hover:text-gray-500">Trabajos</a>
    <a href="<?= constant('URL')?>empresas/" class="text-gray-800 hover:text-gray-500">Empresas</a>

    <?php if ($currentUser && $currentUser['user']) { ?>
        <?php if ($currentUser['rol_id'] == 2) { ?>
            <div id="profile-button" class="flex gap-x-5 bg-[#DCE8F8] p-2 rounded-lg mt-1 z-10">
                <a class="text-[#2A56CB] hover:text-[#1E40AF]" href="<?= constant('URL') ?>perfilEmpresa/">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                        <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                    </svg>
                </a>
            </div>
        <?php } else { ?>
            <a class="text-[#2A56CB] hover:text-[#1E40AF]" href="<?= constant('URL') ?>perfilUsuario/">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                </svg>
            </a>
        <?php } ?>
        <a class="text-[#2A56CB] hover:text-[#1E40AF]" href="<?= constant('URL') ?>login/logout">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-logout">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                <path d="M9 12h12l-3 -3" />
                <path d="M18 15l3 -3" />
            </svg>
        </a>
    <?php } else { ?>
        <a href="<?= constant('URL') ?>login/" class="text-gray-800 hover:text-gray-500">Iniciar Sesión</a>
        <a href="<?= constant('URL') ?>registroUsuario/" class="text-gray-800 hover:text-gray-500">Registrarme</a>
    <?php } ?>
</div>