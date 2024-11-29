<?php
    require 'includes/app.php';
    $inicio = true;
    incluirTemplate('header');
?>
    
    <main class="contenedor seccion contenido-centrado">
        <h1>Guia para la decoracion de tu hogar</h1>
        <picture>
            <source srcset="build/img/destacada2.webp" type="image/webp">
            <source srcset="build/img/destacada2.jpg" type="image/jpg">
            <img loading="lazy" src="build/img/destacada2.jpg" alt="imagen de la propiedad">
        </picture>
        <p class="informacion-meta">Escrito el: <span> 21/09/2021</span> por: <span>Admin</span></p>
        <div class="resumen-propiedad">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus quia molestias repellat, praesentium blanditiis adipisci necessitatibus quam in doloremque, similique eos voluptatem nemo officia aliquam maiores? Ipsam dignissimos accusantium corrupti! Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus quia molestias repellat, praesentium blanditiis adipisci necessitatibus quam in doloremque, similique eos voluptatem nemo officia aliquam maiores? Ipsam dignissimos accusantium corrupti!</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus quia molestias repellat, praesentium blanditiis adipisci necessitatibus quam in doloremque, similique eos voluptatem nemo officia aliquam maiores? Ipsam dignissimos accusantium corrupti!</p>
        </div>
    </main>   


    <?php
        incluirTemplate('footer');
    ?>