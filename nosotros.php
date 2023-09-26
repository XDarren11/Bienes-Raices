<?php 
    require 'includes/app.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Conoce Sobre Nosotros</h1>
        
        <div class="contenido-nosotros">
            <picture>
                <source srcset="build/img/nosotros.webp" type="image/webp">
                <source srcset="build/img/nosotros.jpg" type="image/jpg">
                <img src="build/img/nosotros.jpg" alt="Texto Entrada Blog" loading="lazy">
            </picture>

            <div class="texto-nosotros">

                <blockquote> 25 Años de Experiencia</blockquote>
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
        </div>
    </main>

    <section class="contenedor seccion">
        <h1>Mas Sobre Nosotros</h1>

        <div class="iconos-nosotros">

            <div class="iconos">
                <img src="build/img/icono1.svg" alt="Icono Seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Soluta, vitae ipsum? Rerum fugiat 
                    molestias, debitis cumque odio doloremque explicabo veritatis voluptatum? Accusamus ipsam 
                    quam rem blanditiis, laborum veniam? Beatae, sit!
                </p>
            </div>

            <div class="iconos">
                <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy">
                <h3>Precio</h3>
                <p> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Soluta, vitae ipsum? Rerum fugiat 
                    molestias, debitis cumque odio doloremque explicabo veritatis voluptatum? Accusamus ipsam 
                    quam rem blanditiis, laborum veniam? Beatae, sit!
                </p>
            </div>

            <div class="iconos">
                <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
                <h3>Tiempo</h3>
                <p> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Soluta, vitae ipsum? Rerum fugiat 
                    molestias, debitis cumque odio doloremque explicabo veritatis voluptatum? Accusamus ipsam 
                    quam rem blanditiis, laborum veniam? Beatae, sit!
                </p>
            </div>
        </div>
    </section>

<?php incluirTemplate('footer');  ?>