<footer class='flex flex-col align-center justify-center'> 
    <div class='flex flex-col md:flex-row justify-between items-center border-b-1 border-b p-10 md:p-20'>
        <div>
          <img src="<?= constant('URL')?>public/img/logo.png" alt="Imagen de la empresa" width="100" height="100">
        </div>
      
        <div>
          <h6 class='font-bold text-xl'>Para candidatos</h6>
          <ul class='text-gray text-xl space-y-5 mt-2'>
            <li>
               <a href="<?= constant('URL') ?>ofertas/">Aplicar a un trabajo</a>
            </li>
            <li>
               <a href="<?= constant('URL') ?>registroUsuario/">Registrarme</a>
            </li>
            <li>
               <a href="<?= constant('URL') ?>ofertas/">Aplicar a un trabajo</a>
            </li>
          </ul>
        </div>
        <div>
          <h6 class='font-bold text-xl'>Para empleadores</h6>
          <ul class='text-gray text-xl space-y-5 mt-2'>
              <li><a href="<?= constant('URL') ?>registroEmpresa/">Publicar una oferta</a></li>
              <li><a href="<?= constant('URL') ?>registroEmpresa/">Registrarme</a></li>
          </ul>
        </div>
    </div>
    <div class='p-10'>
            <p class='text-center'>@2024 Todos los derechos reservados</p>
     </div>
</footer>
</body>
</html>