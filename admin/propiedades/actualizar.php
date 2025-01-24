<?php

use App\Propiedad;

    require '../../includes/app.php';
    estaAutenticado();
    
    // Validando url por id valido
    $id = $_GET['id'];
    $id = filter_var($id,FILTER_VALIDATE_INT);

    if (!$id) {
        header('Location: index.php');
    }
    
    $propiedad = Propiedad::find($id);
    dep($propiedad);

    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db,$consulta);
    $errores = Propiedad::getErrores();


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $args = $_POST['propiedad'];
        $propiedad->sincronizar($args);
        
        $errores = $propiedad->validar();
        if (empty($errores)) {
            // Crear carpeta de imágenes si no existe
            $carpetaImagenes = '../../imagenes/';
            if (!is_dir($carpetaImagenes)) {
                mkdir($carpetaImagenes);
            }
            $nombreImagen='';
            if ($imagen['name']) {
                // Eliminar imagen existente, si hay una imagen guardada
                if (file_exists($carpetaImagenes . $imagenPropiedad)) {
                    unlink($carpetaImagenes . $imagenPropiedad);
                }
    
                // Crear un nombre único para la nueva imagen
                $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
                move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);
            } else {
                // Mantener la imagen actual si no se sube una nueva
                $nombreImagen = $imagenPropiedad;
            }
    
            // Actualizar la base de datos con la nueva información
            $query = "UPDATE propiedades SET 
                        titulo = '${titulo}', 
                        precio = '${precio}', 
                        imagen = '${nombreImagen}', 
                        descripcion = '${descripcion}', 
                        habitaciones = '${habitaciones}', 
                        wc = ${wc}, 
                        estacionamiento = ${estacionamiento}, 
                        fk_vendedor = '${vendedorId}' 
                      WHERE id = ${id}";
    
            $resultado = mysqli_query($db, $query);
    
            if ($resultado) {
                header('Location: /bienesraices/admin/propiedades/index.php?resultado=2');
            }
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