<?php
    require '../../includes/config/database.php';
    $db=conectarDB();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        echo "<pre>";
        var_dump($_POST);
        echo "</pre>";

        $titulo = $_POST['titulo'];
        $precio = $_POST['precio'];
        $descripcion = $_POST['descripcion'];
        $habitaciones = $_POST['habitaciones'];
        $wc = $_POST['wc'];
        $estacionamiento = $_POST['estacionamiento'];
        $vendedor = $_POST['vendedor'];

        $query = "INSERT INTO propiedades (titulo,precio,descripcion,habitaciones,wc,estacionamiento,fk_vendedor) VALUES ('$titulo','$precio','$descripcion','$habitaciones','$wc','$estacionamiento','$vendedor')";

        echo $query;

        $resultado = mysqli_query($db,$query);

        if ($resultado) {
            echo "Insertado correctamente";
        }
    }

    require '../../includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Crear</h1>

        <a href="/bienesraices/admin/propiedades/index.php" class="boton boton-verde">Volver</a>

        <form class="formulario" method="POST" action="">
            <fieldset>
                <legend>Informacion general</legend>
                    <label for="titulo">Titulo:</label>
                    <input type="text" id="titulo" name="titulo" placeholder="Titulo Propiedad">
                    
                    <label for="precio">Precio:</label>
                    <input type="number" id="precio" name="precio" placeholder="Precio Propiedad">
                    
                    <label for="imagen">Imagen:</label>
                    <input type="file" id="imagen" accept="image/jpeg, image/png">

                    <label for="descripcion">Descripcion:</label>
                    <textarea id="descripcion" name="descripcion"></textarea>
            </fieldset>

            <fieldset>
                <legend>Informnacion Propiedad</legend>

                <label for="habitaciones">Habitaciones:</label>
                <input type="number" id="habitaciones" name="habitaciones" placeholder="Ej: 3" min="1" max="9">
                
                <label for="wc">Baños:</label>
                <input type="number" id="wc" name="wc" placeholder="Ej: 3" min="1" max="9">

                <label for="estacionamiento">Estacionamiento:</label>
                <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Ej: 3" min="1" max="9">
            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>

                <select name="vendedor">
                    <option value="1">Elih</option>
                    <option value="2">Pitta</option>
                </select>
            </fieldset>

            <input type="submit" value="Crear propiedad" class="boton boton-verde">
        </form>
    </main>

<?php
    incluirTemplate('footer');
?>