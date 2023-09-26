<?php 

    use App\propiedad;
    use Intervention\Image\ImageManagerStatic as image;
    require '../../includes/app.php';
    estaAutenticado();

    // Validar que sea un id valido
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);
    if(!$id) {
        header('Location: /admin');
    }

    //Consulta para obtener los datos de la propiedad
    $propiedad = propiedad::find($id);

    // consultar para optener los vendedores
    $consulta = "SELECT * FROM vendedores;";
    $resultado = mysqli_query($db, $consulta);

    // arreglo con mensajes de errores
    $errores = propiedad::getErrores();

    // ejecutar el codigo despues de que el usurio mando el formulario
    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        $args = $_POST['propiedad'];

        $propiedad ->sincronizar($args);

        //validacion
        $errores = $propiedad->validar();

        //subida de archivos

        //Crea un nombre unico
        $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

        if($_FILES['propiedad']['tmp_name']['imagen']) {
            $image = Image::make($_FILES['propiedad']['tmp_name']['imagen']) -> fit(800,600);
            $propiedad -> setImagen($nombreImagen);
        }

        //Revisar que el arreglo de errores este vacio
        if(empty($errores)){

            //amacenar imagen
            $image->save(CARPETAS_IMAGENES . $nombreImagen);

            $propiedad->guardar();
        }
    }

    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Actualizar Propiedades</h1>

        <a href="/admin" class="boton boton-verde">Volver</a>

        <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error;?>
        </div>
        <?php endforeach; ?>

        <form class="formulario" method="POST" enctype="multipart/form-data">  <!-- enctype="multipart/form-data sirve para poder insertar archivos en el formulario-->

            <?php include '../../includes/templates/formulario_propiedades.php'; ?>
            <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">
        </form>
    </main>

<?php 
    incluirTemplate('footer'); 
?>