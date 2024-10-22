<?php
    require '../../includes/config/database.php';
    $db=conectarDB();

    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db,$consulta);

    $titulo = '';
    $precio = '';
    $descripcion = '';
    $habitaciones = '';
    $wc = '';
    $estacionamiento = '';
    $vendedorId = '';
    $creado = '';

    $errores =[];
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        $titulo = mysqli_real_escape_string($db, $_POST['titulo']);
        $precio = mysqli_real_escape_string($db, $_POST['precio']);
        $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
        $habitaciones = mysqli_real_escape_string($db, $_POST['habitaciones']);
        $wc = mysqli_real_escape_string($db, $_POST['wc']);
        $estacionamiento = mysqli_real_escape_string($db, $_POST['estacionamiento']);
        $vendedorId = mysqli_real_escape_string($db, $_POST['vendedor']);
        $creado = date('Y/m/d');
        
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
        
        
        echo "<pre>";
        var_dump($_POST);
        echo "</pre>";

        if (empty($errores)) {
            $query = "INSERT INTO propiedades (titulo,precio,descripcion,habitaciones,wc,estacionamiento,creado,fk_vendedor) VALUES ('$titulo','$precio','$descripcion','$habitaciones','$wc','$estacionamiento','$creado','$vendedorId')";

            // echo $query;

            $resultado = mysqli_query($db,$query);

            if ($resultado) {
                header('Location: /bienesraices/admin/propiedades/');
            }
        }

        
    }

    require '../../includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Crear</h1>

        <a href="/bienesraices/admin/propiedades/index.php" class="boton boton-verde">Volver</a>

        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <form class="formulario" method="POST" action="">
            <fieldset>
                <legend>Informacion general</legend>
                    <label for="titulo">Titulo:</label>
                    <input type="text" id="titulo" name="titulo" placeholder="Titulo Propiedad" value="<?php echo $titulo; ?>">
                    
                    <label for="precio">Precio:</label>
                    <input type="number" id="precio" name="precio" placeholder="Precio Propiedad" value="<?php echo $precio; ?>">
                    
                    <label for="imagen">Imagen:</label>
                    <input type="file" id="imagen" accept="image/jpeg, image/png" >

                    <label for="descripcion">Descripcion:</label>
                    <textarea id="descripcion" name="descripcion"><?php echo $descripcion; ?></textarea>
            </fieldset>

            <fieldset>
                <legend>Informnacion Propiedad</legend>

                <label for="habitaciones">Habitaciones:</label>
                <input type="number" id="habitaciones" name="habitaciones" placeholder="Ej: 3" min="1" max="9" value="<?php echo $habitaciones;  ?>">
                
                <label for="wc">Baños:</label>
                <input type="number" id="wc" name="wc" placeholder="Ej: 3" min="1" max="9" value="<?php echo $wc; ?>">

                <label for="estacionamiento">Estacionamiento:</label>
                <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Ej: 3" min="1" max="9" value="<?php echo $estacionamiento; ?>">
            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>

                <select name="vendedor">
                    <option value="">-- Seleccione --</option>
                    <?php while($vendedor = mysqli_fetch_assoc($resultado)): ?>
                        <option <?php echo $vendedorId === $vendedor['id'] ? 'selected' : ''; ?> value="<?php echo $vendedor['id']; ?>">
                        <?php echo $vendedor['nombre'] . " " . $vendedor['apellido'];?> </option>
                        <?php endwhile; ?>
                    </select>

            </fieldset>

            <input type="submit" value="Crear propiedad" class="boton boton-verde">
        </form>
    </main>

<?php
    incluirTemplate('footer');
?>