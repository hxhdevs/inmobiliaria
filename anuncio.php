<?php
    include 'includes/templates/header.php';
?>   
    
    <main class="contenedor seccion contenido-centrado">
        <h1>Casa en venta frente al bosque</h1>

        <picture>
            <source srcset="build/img/destacada.webp" type="image/webp">
            <source srcset="build/img/destacada.jpg" type="image/jpg">
            <img loading="lazy" src="build/img/destacada.jpg" alt="imagen de la propiedad">
        </picture>

        <div class="resumen-propiedad">
            <p class="precio">$3,000,000</p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                    <p>3</p>
                </li>
                <li>
                    <img loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                    <p>3</p>
                </li>
                <li>
                    <img loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                    <p>3</p>
                </li>
            </ul>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus quia molestias repellat, praesentium blanditiis adipisci necessitatibus quam in doloremque, similique eos voluptatem nemo officia aliquam maiores? Ipsam dignissimos accusantium corrupti!</p>
        </div>
    </main>   


    <footer class="footer seccion">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
                <a href="nosotros.html">Nosotros</a>
                <a href="anuncios.html">Anuncios</a>
                <a href="blog.html">Blog</a>
                <a href="contacto.html">Contacto</a>
            </nav>
        </div>
        <p class="copyright">Todos los derechos reservados 2025 &copy;</p>
    </footer>

    <script src="build/js/bundle.min.js"></script>
</body>
</html>