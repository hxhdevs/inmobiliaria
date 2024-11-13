<?php
    require 'includes/config/database.php';
    $db = conectarDB();

    $errores = [];
    
    if ($_SERVER['REQUEST_METHOD']==='POST') {
        echo "<pre>";
        var_dump($_POST);
        echo "</pre>";

        $email= mysqli_real_escape_string($db,filter_var($_POST['email'],FILTER_VALIDATE_EMAIL));
        $password= mysqli_real_escape_string($db,$_POST['password']);

        if (!$email) {
            $errores[]="El email es obligatorio o no es valido";
        }
        if (!$password) {
            $errores[]="El password es obligatorio";
        }

        if (empty($errores)) {
        
            $query = "SELECT * FROM usuarios WHERE email = '${email}'";
            $resultado = mysqli_query($db, $query);
        
            var_dump($resultado);

            if ($resultado->num_rows) {
                //Revisar si el password es correcto
                $usuario =mysqli_fetch_assoc($resultado);

                // var_dump($usuario['password']);
                
                //Verificar si el password es correcto o no

                $auth = password_verify($password, $usuario['password']);

                if ($auth) {
                    
                    session_start();

                    $_SESSION['usuario'] = $usuario['email'];
                    $_SESSION['login'] = true;
                    
                } else {
                    $errores[]='El password es incorrecto';
                }
                
            } else {
                $errores[] = "El usuario no existe";
            }
            
        }
        echo "<pre>";
        var_dump($errores);
        echo "</pre>";
    }

    include 'includes/funciones.php';
    incluirTemplate('header');
?>   

    <main class="contenedor seccion contenido-centrado">
        <h1>Iniciar sesion</h1>

        <?php foreach($errores as $error):?>
            <div class="alerta error">
                <?php echo $error ?>
            </div>
        <?php endforeach?>
        
        <form method="POST" class="formulario">
            <fieldset>
                <legend>Email y password</legend>

                <label for="email">E-mail</label>
                <input type="email" name="email" placeholder="Tu email" id="email" required>

                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Tu password" id="password" required>
            </fieldset>

            <input type="submit" value="Iniciar sesion" class="boton boton-verde">
        </form>
    </main>

<?php
    incluirTemplate('footer');
?>