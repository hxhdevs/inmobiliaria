<?php
    include 'includes/funciones.php';
    incluirTemplate('header');
?>   

    <main class="contenedor seccion contenido-centrado">
        <h1>Iniciar sesion</h1>

        <form class="formulario">
            <fieldset>
                <legend>Email y password</legend>

                <label for="email">E-mail</label>
                <input type="email" placeholder="Tu email" id="email">

                <label for="password">Password</label>
                <input type="password" placeholder="Tu password" id="password">
            </fieldset>

            <input type="submit" value="Iniciar sesion" class="boton boton-verde">
        </form>
    </main>

<?php
    incluirTemplate('footer');
?>