<?php
    include 'includes/templates/header.php';
?>   
    <main class="contenedor seccion">
        <h1>Conoce sobre nosotros</h1>

        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp">
                    <source srcset="build/img/nosotros.jpg" type="image/jpg">
                    <img loading="lazy" src="build/img/nosotros.jpg" alt="imagen nosotros">
                </picture>  
            </div>

            <div class="texto-nosotros">
                <blockquote>
                    25 años de experiencia
                </blockquote>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur nemo sed obcaecati atque ducimus fuga labore possimus eveniet vel. Adipisci esse in, tempore labore error molestias quo voluptates possimus alias?</p>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laborum mollitia repellat cupiditate ullam consequatur dicta fugit! Impedit sint earum quos veniam, tempora officia aperiam iste dignissimos, accusamus explicabo quo distinctio.</p>
            </div>
        </div>
    </main>
    <section class="contenedor seccion">
        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="icono seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis veniam optio possimus quae blanditiis deserunt vel doloribus molestias voluptatum tempora!</p>
            </div>
            <div class="icono">
                <img src="build/img/icono2.svg" alt="icono Precio" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellat ipsam rem magnam, quas non ratione officiis ea esse magni obcaecati, vel cumque aspernatur deleniti!</p>
            </div>
            <div class="icono">
                <img src="build/img/icono3.svg" alt="icono seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellat ipsam rem magnam, quas non ratione officiis ea esse magni obcaecati, vel cumque aspernatur deleniti!</p>
            </div>
        </div>
    </section>


    <?php
        include './includes/templates/footer.php';
    ?>   