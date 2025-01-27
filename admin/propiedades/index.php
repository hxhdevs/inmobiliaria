<?php
    require '../../includes/app.php';

    estaAutenticado();
    
    use App\Propiedad;
    use App\Vendedor;

    $propiedades = Propiedad::all();
    $vendedores = Vendedor::all();
    dep($propiedades);
    $resultado = $_GET['resultado'] ?? null;

    if ($_SERVER['REQUEST_METHOD']==='POST') {
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if ($id) {
            $propiedad = Propiedad::find($id);
            $propiedad->eliminar();
            //Eliminamos el archivo
            $query = "SELECT imagen FROM propiedades WHERE id = ${id}";
        }
        // var_dump($id); 
    }
    //incluye in template        
    
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
                <?php foreach ($propiedades as $propiedad): ?>
                <tr>
                    <td><?php echo $propiedad->id;?> </td>
                    <td><?php echo $propiedad->titulo;?></td>
                    <td><img src="../../imagenes/<?php echo $propiedad->imagen.'.jpg'?>" class="imagen-tabla"></td>
                    <td><?php echo $propiedad->precio;?></td>
                    <td>
                        <form method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $propiedad->id ?>">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
                        <a href="actualizar.php?id=<?php echo $propiedad->id;?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>

<?php
    mysqli_close($db);
    incluirTemplate('footer');
?>