<?php

    use App\Propiedad;
    use Intervention\Image\ImageManagerStatic as Image;
    require '../../includes/app.php';
    estaAutenticado();
    
    // Validando url por id valido
    $id = $_GET['id'];
    $id = filter_var($id,FILTER_VALIDATE_INT);

    if (!$id) {
        header('Location: index.php');
    }
    
    $propiedad = Propiedad::find($id);

    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db,$consulta);
    $errores = Propiedad::getErrores();


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $args = $_POST['propiedad'];
        $propiedad->sincronizar($args);
        
        $errores = $propiedad->validar();
        $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
        if ($_FILES['propiedad']['tmp_name']['imagen']) {
            
            $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
            $propiedad->setImagen($nombreImagen);
        }
        if (empty($errores)) {
            // $image->save(CARPETA_IMAGENES.$nombreImagen);
            $propiedad->guardar();
        }
    }

    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Actualizar propiedad</h1>

        <a href="/bienesraices/admin/propiedades/index.php" class="boton boton-verde">Volver</a>

        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <form class="formulario" method="POST" enctype="multipart/form-data">
            <?php include '../../includes/templates/formulario_propiedades.php';?>
            <input type="submit" value="Actualizar propiedad" class="boton boton-verde">
        </form>
    </main>

<?php
    incluirTemplate('footer');
?>