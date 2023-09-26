<?php 
    require 'includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Guia Para la Decoracion de Tu hogar</h1>

        <picture>
            <source srcset="build/img/destacada2.webp" type="image/webp">
            <source srcset="build/img/destacada2.jpg" type="image/jpg">
            <img src="build/img/destacada2.jpg" alt="Anuncio" loading="lazy">
        </picture>

        <p class="informacion-meta">Escrito el: <span>20/10/2022</span> por: <span>Admin</span></p>

        <div class="resumen-propiedad">
            
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Error cum facilis 
                praesentium accusantium a possimus accusamus! Provident nisi eveniet tempore 
                alias consequuntur excepturi quibusdam veniam dolor minus. Atque, repudiandae facilis.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Error cum facilis 
                praesentium accusantium a possimus accusamus! Provident nisi eveniet tempore 
                alias consequuntur excepturi quibusdam veniam dolor minus. Atque, repudiandae facilis.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Error cum facilis 
                praesentium accusantium a possimus accusamus! Provident nisi eveniet tempore 
                alias consequuntur excepturi quibusdam veniam dolor minus. Atque, repudiandae facilis.
            </p>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Error cum facilis 
                praesentium accusantium a possimus accusamus! Provident nisi eveniet tempore 
                alias consequuntur excepturi quibusdam veniam dolor minus. Atque, repudiandae facilis.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Error cum facilis 
            </p>
        </div>
    </main>

<?php incluirTemplate('footer');  ?>