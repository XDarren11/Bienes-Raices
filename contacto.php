<?php 
    require 'includes/app.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Contacto</h1>

        <picture>
            <source src="build/img/destacada3.webp" type="image/webp">
            <source src="build/img/destacada3.jpg" type="image/jpg">
            <img src="build/img/destacada3.jpg" alt="imagen contacto" loadin="lazy">
        </picture>

        <h2>Llene el Formulario de Contacto</h2>

        <form class="formulario">
            <fieldset>
                <legend>Informacion Personal</legend>

                <label for="nombre">Nombre</label>
                <input type="type" placeholder="Tu Nombre" id="nombre">

                <label for="email">E-mail</label>
                <input type="email" placeholder="Tu Email" id="email">

                <label for="telefono">Telefono</label>
                <input type="tel" placeholder="Tu Telefono" id="telefono">

                <label for="mensaje">Mensaje:</label>
                <textarea id="mensaje"></textarea>
            </fieldset>

            <fieldset>
                <legend>Informacion Sobre la Propiedad</legend>

                <label for="opciones">Vende o Compra: </label>
                <select id="opciones">
                    <option value="" disabled selected>-- Seleccione --</option>
                    <option value="Compra">Compra</option>
                    <option value="Vende">Vende</option>
                </select>

                <label for="presupuesto">Precio o Presupuesto</label>
                <input type="number" placeholder="Tu Precio o Presupuesto" id="presupuesto">
            </fieldset>

            <fieldset>
                <legend>Informacion Sobre la Propiedad</legend>

                <P>Como desea ser contactado</P>

                <div class="forma-contacto">
                    <label for="contactar-telefono">Telefono</label>
                    <input name="contacto" type="radio" value="telefono" id="contactar-telefono">

                    <label for="contactar-email">E-mail</label>
                    <input name="contacto" type="radio" value="email" id="contactar-email">
                </div>

                <p>Si eligio telefono, elija la fecha y la hora para ser contactado</p>

                <label for="fecha">Fecha</label>
                <input type="date" id="date">

                <label for="hora">Hora</label>
                <input type="time" id="hora" min="09:00" max="18:00">
            </fieldset>

            <input type="submit" value="Enviar" class="boton-verde">
        </form>
    </main>

<?php incluirTemplate('footer');  ?>