<?php
    require '../../includes/app.php';

    estaAutenticado();
    
    use App\Propiedad;
    use App\Vendedor;

    $propiedades = Propiedad::all();
    $vendedores = Vendedor::all();
    // dep($propiedades);
    $resultado = $_GET['resultado'] ?? null;

    if ($_SERVER['REQUEST_METHOD']==='POST') {
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);
        
        if ($id) {
            $tipo = $_POST['tipo'];

            if (validarTipoContenido($tipo)) {
                if ($tipo === 'vendedor') {
                    $vendedor = Vendedor::find($id);
                    $vendedor->eliminar();
                }elseif ($tipo === 'propiedad') {
                    $propiedad = Propiedad::find($id);
                    $propiedad->eliminar();
                }
            }
        }
    }
    //incluye in template        
    
    incluirTemplate('header');
?>


    <main class="contenedor seccion">
        <h1>Administrador de bienes raices</h1>
        <?php
            $mensaje = mostrarNotificaciones(intval($resultado));
            if ($mensaje) {?>
                <p class="alerta exito"><?php echo s($mensaje) ?></p>
            <?php } ?>

        <a href="/bienesraices/admin/propiedades/crear.php" class="boton boton-verde">Nueva propiedad</a>
        <a href="/bienesraices/admin/vendedores/crear.php" class="boton boton-amarillo">Nuevo vendedor</a>
        <h2>Propiedades</h2>
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
                            <input type="hidden" name="tipo" value="propiedad">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
                        <a href="actualizar.php?id=<?php echo $propiedad->id;?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h2>Vendedores</h2>
        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Telefono</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($vendedores as $vendedor): ?>
                <tr>
                    <td><?php echo $vendedor->id;?> </td>
                    <td><?php echo $vendedor->nombre .' '. $vendedor->apellido;?></td>
                    <td><?php echo $vendedor->telefono;?></td>
                    <td>
                        <form method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $vendedor->id ?>">
                            <input type="hidden" name="tipo" value="vendedor">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
                        <a href="../vendedores/actualizar.php?id=<?php echo $vendedor->id;?>" class="boton-amarillo-block">Actualizar</a>
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