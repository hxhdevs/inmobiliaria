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
    $errores =[];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        echo"<pre>";
        var_dump($_POST);
        echo"</pre>";
        // exit;
        

        $titulo = mysqli_real_escape_string($db, $_POST['titulo']);
        $precio = mysqli_real_escape_string($db, $_POST['precio']);
        $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
        $habitaciones = mysqli_real_escape_string($db, $_POST['habitaciones']);
        $wc = mysqli_real_escape_string($db, $_POST['wc']);
        $estacionamiento = mysqli_real_escape_string($db, $_POST['estacionamiento']);
        $vendedorId = mysqli_real_escape_string($db, $_POST['vendedor']);
        $creado = date('Y/m/d');
        
        $imagen = $_FILES['imagen'];


        if (!$titulo) {
            $errores[] = "Debes añadir un titulo";
        }        
        if (!$precio) {
            $errores[] = "El precio ees obligatorio";
        }
        if (strlen($descripcion)<2) {
            $errores[] = "La descripcion es obligatoria como minimo 10 caracteres";
        }
        if (!$habitaciones) {
            $errores[] = "El numero de habitaciones es obligatorio";
        }
        if (!$wc) {
            $errores[] = "El numero de baños es obligatorio";
        }
        if (!$estacionamiento) {
            $errores[] = "El numero de estacionamiento es obligatorio";
        }
        if (!$vendedorId) {
            $errores[] = "Elige vendedor";
        } 
        
        $medida = 1000 * 1000;

        if ($imagen['size']>$medida) {
            $errores[]='La imagen es muy pesada';
        }
        // exit;
        
        echo "<pre>";
        var_dump($_POST);
        echo "</pre>";
        
        echo "<pre>";
        var_dump($_FILES);
        echo "</pre>";

        if (empty($errores)) {
            // Crear carpeta de imágenes si no existe
            $carpetaImagenes = '../../imagenes/';
            if (!is_dir($carpetaImagenes)) {
                mkdir($carpetaImagenes);
            }
    
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