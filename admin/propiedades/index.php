<?php
var_dump($_POST);
    require '../../includes/config/database.php';
    $db= conectarDB();

    $query = "SELECT * FROM propiedades";

    $resultadoConsulta = mysqli_query($db,$query);

    //Muestra mensaje condicional
    $resultado = $_GET['resultado'] ?? null;

    if ($_SERVER['REQUEST_METHOD']==='POST') {
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if ($id) {
            //Eliminamos el archivo
            $query = "SELECT imagen FROM propiedades WHERE id = ${id}";
            echo $query;
            $resultado = mysqli_query($db,$query);
            $propiedad = mysqli_fetch_assoc($resultado);
            unlink('../../imagenes/'.$propiedad['imagen']);
            // //Eliminamos el archivo
            // exit;
            $query = "DELETE FROM propiedades WHERE id =${id}";
            $resultado=mysqli_query($db,$query);

            if ($resultado) {
                header('location: ../../admin/propiedades/index.php?resultado=3');
            }
        }
        // var_dump($id); 
    }
    //incluye in template        
    require '../../includes/funciones.php';
    incluirTemplate('header');
?>


    <main class="contenedor seccion">
        <h1>Administrador de bienes raices</h1>
        <?php if (intval($resultado) ===1):?> 
            <p class="alerta exito">Anuncio creado correctamente</p>
        <?php elseif (intval($resultado) ===2):?> 
            <p class="alerta exito">Anuncio actualizado correctamente</p>    
        <?php elseif (intval($resultado) ===3):?> 
            <p class="alerta exito">Anuncio eliminado correctamente</p>    
        <?php endif; ?>

        <a href="/bienesraices/admin/propiedades/crear.php" class="boton boton-verde">Nueva propiedad</a>

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

            <tbody>
                <?php while ($propiedad = mysqli_fetch_assoc($resultadoConsulta)):?>
                <tr>
                    <td><?php echo $propiedad['id'];?> </td>
                    <td><?php echo $propiedad['titulo'];?></td>
                    <td><img src="../../imagenes/<?php echo $propiedad['imagen']?>" class="imagen-tabla"></td>
                    <td><?php echo $propiedad['precio'];?></td>
                    <td>
                        <form method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $propiedad['id'] ?>">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
                        <a href="actualizar.php?id=<?php echo $propiedad['id'];?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </main>

<?php
    mysqli_close($db);
    incluirTemplate('footer');
?>