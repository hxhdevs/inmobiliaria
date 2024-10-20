<?php
    $inicio = true;
    include './includes/templates/header.php';
?>   
    
    <main class="contenedor seccion">
        <h1>Mas sobre nosotros</h1>
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
    </main>

    <section class="seccion contenedor">
        <h2>Casas y depas en venta</h2>

        <div class="contenedor-anuncios">
            <div class="anuncio">
                <picture>
                    <source srcset="build/img/anuncio1.webp" type="image/webp">
                    <source srcset="build/img/anuncio1.jpg" type="image/jpg">
                    <img loading="lazy" src="build/img/anuncio1.jpg" alt="anuncio">
                </picture>
                
                <div class="contenido-anuncio">
                    <h3>Casa de lujo en el lago</h3>
                    <p>Cada en el lago, excelente vista, acabados de lujo a un excelente precio</p>
                    <p class="precio">$3,000,000</p>
                    
                    <ul class="iconos-caracteristicas">
                        <li>
                            <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                            <p>3</p>
                        </li>
                        <li>
                            <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                            <p>3</p>
                        </li>
                        <li>
                            <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                            <p>3</p>
                        </li>
                    </ul>

                    <a href="anuncio.html" class="boton boton-amarillo-block">
                        Ver Propiedad
                    </a>
                </div>
            </div><!-- Anuncio-->
            <div class="anuncio">
                <picture>
                    <source srcset="build/img/anuncio2.webp" type="image/webp">
                    <source srcset="build/img/anuncio2.jpg" type="image/jpg">
                    <img loading="lazy" src="build/img/anuncio2.jpg" alt="anuncio">
                </picture>
                
                <div class="contenido-anuncio">
                    <h3>Casa terminados de lujo</h3>
                    <p>Cada en el lago, excelente vista, acabados de lujo a un excelente precio</p>
                    <p class="precio">$3,000,000</p>
                    
                    <ul class="iconos-caracteristicas">
                        <li>
                            <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                            <p>3</p>
                        </li>
                        <li>
                            <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                            <p>3</p>
                        </li>
                        <li>
                            <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                            <p>3</p>
                        </li>
                    </ul>

                    <a href="anuncio.html" class="boton boton-amarillo-block">
                        Ver Propiedad
                    </a>
                </div>
            </div><!-- Anuncio-->
            <div class="anuncio">
                <picture>
                    <source srcset="build/img/anuncio3.webp" type="image/webp">
                    <source srcset="build/img/anuncio3.jpg" type="image/jpg">
                    <img loading="lazy" src="build/img/anuncio3.jpg" alt="anuncio">
                </picture>
                
                <div class="contenido-anuncio">
                    <h3>Casa con alberca</h3>
                    <p>Cada en el lago, excelente vista, acabados de lujo a un excelente precio</p>
                    <p class="precio">$3,000,000</p>
                    
                    <ul class="iconos-caracteristicas">
                        <li>
                            <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                            <p>3</p>
                        </li>
                        <li>
                            <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                            <p>3</p>
                        </li>
                        <li>
                            <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                            <p>3</p>
                        </li>
                    </ul>

                    <a href="anuncio.html" class="boton boton-amarillo-block">
                        Ver Propiedad
                    </a>
                </div><!-- Contenido anuncios -->
            </div><!-- Anuncio-->
        </div><!-- .contenedor-anuncios-->

        <div class="ver-todas alinear-derecha">
            <a href="anuncios.html" class="boton-verde">Ver Todss</a>
        </div>
    </section>

    <section class="imagen-contacto">
        <h2>Encuentra la casa de tus sueños</h2>
        <p>LLena el formulario de contacto y un asesor se pondra en contacto contigo</p>
        <a href="contacto.html" class="boton-amarillo">Contactanos</a>
    </section>

    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro blog</h3>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp">
                        <source srcset="build/img/blog1.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/blog1.jpg" alt="Texto entrada blog">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="entrada.html">
                        <h4>Terraza en el techo de tu casa</h4>
                        <p class="informacion-meta">Escrito el:<span>10/09/2024</span> por: <span>Admin</span></p>
                        <p>
                            Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero
                        </p>
                    </a>
                </div>
            </article>
            
            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog2.webp" type="image/webp">
                        <source srcset="build/img/blog2.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/blog1.jpg" alt="Texto entrada blog">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="entrada.html">
                        <h4>Guia para la decoracion de tu hogar</h4>
                        <p class="informacion-meta">Escrito el:<span>10/09/2024</span> por: <span>Admin</span></p>
                        <p>
                            Maximiza el espacio en tu hogar con esta guia, aprende a combinar muebles y colores para darle vida a tu espacio
                        </p>
                    </a>
                </div>
            </article>
        </section>

        <section class="testimoniales">
            <h3>Testimoniales</h3>

            <div class="testimonial">
                <blockquote>
                    El personal se comporto de una excelente forma, muy buena atencion y la casa que me ofrecieron cumple con todas mis espectativas.
                </blockquote>
                <p>- HxH Devs</p>
            </div>
        </section>
    </div>

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
    <h1></h1>
    <script src="build/js/bundle.min.js"></script>
</body>
</html>