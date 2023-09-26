<?php 

    require '../includes/app.php';
    use App\Propiedad;

    estaAutenticado();

    //Implementar un metodo para obetener todas las propiedades
    $propiedades = Propiedad::all();

    //mensaje condicional
    $resultado = $_GET['resultado'] ?? null;  // busca la variable resultado y si no lo encuenta le asigna null
    
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if($id) {  //si tenemos un id

            $propiedad = propiedad::find($id);
            $propiedad->eliminar();
        }
    }

    //Incluyendo un templete
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Administrador de Bienes Raices</h1>

        <?php if(intval($resultado) === 1):?>
            <p class="alerta exito">Anuncio Creado Correctamente</p>
        <?php elseif( intval($resultado) === 2): ?>
            <p class="alerta exito">Anuncio Actualizado Correctamente</p>
        <?php elseif( intval($resultado) === 3): ?>
            <p class="alerta exito">Anuncio Eliminado Correctamente</p>
        <?php endif ?>

        <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva propiedad</a>

        <table class="propiedades">
            <thead>
                <tr>
                    
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>

                </tr>
            </thead>

            <tbody> <!-- Mostrar los resultados -->

                <?php foreach( $propiedades as $propiedad): ?>

                <tr>
                    
                    <td> <?php echo $propiedad -> id; ?> </td>
                    <td> <?php echo $propiedad -> titulo; ?> </td>
                    <td> <img src="/imagenes/<?php echo $propiedad -> imagen; ?> " class="imagen-tabla"></td>
                    <td>$ <?php echo $propiedad -> precio; ?> </td>
                    <td>
                        <form method="POST" class="w-100">
 
                            <input type="hidden" name="id" value="<?php echo $propiedad -> id; ?>">  <!-- Input de tipo oculto-->

                            <input type="submit" class="boton-rojo-block" value="eliminar">
                        </form>
                        
                        <a href="admin/propiedades/actualizar.php? id=<?php echo $propiedad -> id; ?>" 
                        class="boton-amarillo-block">Actualizar</a>
                    </td>

                </tr>

                <?php endforeach; ?>

            </tbody>
        </table>
    </main>

<?php 

    // Cerrar la conexion
    mysqli_close($db);

    incluirTemplate('footer'); 
?>