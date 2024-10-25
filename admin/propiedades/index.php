<?php
    $resultado = $_GET['resultado'] ?? null;
        
    require '../../includes/funciones.php';
    incluirTemplate('header');
?>


    <main class="contenedor seccion">
        <h1>Administrador de bienes raices</h1>
        <?php if (intval($resultado) ===1):?> 
            <p class="alerta exito">Anuncio creado correctamente</p>
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
                <tr>
                    <td>1</td>
                    <td>Casa campirana</td>
                    <td><img src="../../imagenes/068046074189c19d8379128a8af44923.jpg" class="imagen-tabla"></td>
                    <td>$1,200,000.00</td>
                    <td>
                        <a href="" class="boton-rojo-block">Eliminar</a>
                        <a href="" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </main>

<?php
    incluirTemplate('footer');
?>