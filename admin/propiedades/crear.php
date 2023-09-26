<?php

    require '../../includes/app.php';
    use App\Propiedad;
    use Intervention\Image\ImageManagerStatic as Image;

    estaAutenticado();

    // base de datos
    $db = conectarDB();

    $prpiedad = new Propiedad();

    // consultar para optener los vendedores
    $consulta = "SELECT * FROM vendedores;";
    $resultado = mysqli_query($db, $consulta);

    // arreglo con mensajes de errores
    $errores = Propiedad::getErrores();

    // ejecutar el codigo despues de que el usurio mando el formulario
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        
        //Crea una nueva instancia */
        $propiedad = new Propiedad($_POST['propiedad']);

        //* SUBIDA DE ARCHIVOS *//

        //crear un nombre unico para cada imagen
        $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

        /*SETEA LA IMAGEN */
        //Realiza un resize a la imagen con intervention
        if($_FILES['propiedad']['tmp_name']['imagen']) {
            $image = Image::make($_FILES['propiedad']['tmp_name']['imagen']) -> fit(800,600);
            $propiedad -> setImagen($nombreImagen);
        }

        //Validar
        $errores = $propiedad -> validar();

        //Revisar que le arreglo de errores este vacio
        if(empty($errores)){

            //crear una carpeta
            if(!is_dir(CARPETAS_IMAGENES)) {
                mkdir(CARPETAS_IMAGENES);
            }

            //Guarda la imagen en el servidor
            $image -> save(CARPETAS_IMAGENES . $nombreImagen);

            //Guarda en la base de datos
            $propiedad -> guardar();
        }
    }

    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Crear</h1>

        <a href="/admin" class="boton boton-verde">Volver</a>

        <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error;?>
        </div>
        <?php endforeach; ?>

        <form class="formulario" method="POST" action="/admin/propiedades/crear.php" enctype="multipart/form-data">  <!-- enctype="multipart/form-data sirve para poder insertar archivos en el formulario y "accion" nos sirve para ver en donde se van a procesar los datos-->
            
            <?php include '../../includes/templates/formulario_propiedades.php'; ?>

            <input type="submit" value="Crear Propiedad" class="boton boton-verde">
        </form>
    </main>

<?php 
    incluirTemplate('footer'); 
?>