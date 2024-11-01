<?php
    require '../../includes/config/database.php';
    $db= conectarDB();

    $query = "SELECT * FROM propiedades";

    $resultadoConsulta = mysqli_query($db,$query);

    //Muestra mensaje condicional
    $resultado = $_GET['resultado'] ?? null;
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
                        <a href="" class="boton-rojo-block">Eliminar</a>
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