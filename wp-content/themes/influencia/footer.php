

        <footer>

            <section class="parceiros container-fluid">
                <div class="row">
                    <div class="container">
                        
                        <div class="row">
                            <h2 class="titulo-section">Nossos <span>Parceiros</span></h2>
                        </div>
                        <div class="row">
                            <ul>
                                <li>
                                    <a id="p03" href="http://humanostud.io" target="_blank">Humano Studio</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            <section class="rodape container-fluid">
                <div class="row-fluid">
                    <div class="container">
                        <div class="row">
                            <nav class="col-lg-7">
                                <ul id="menu-rodape">
                                    <!-- 
                                    <li>
                                        <a class="ani-04" href="<?php bloginfo('url') ?>/anuncie">Anuncie</a>
                                    </li>
                                     -->
                                    <li>
                                        <a class="ani-04" href="<?php bloginfo('url') ?>/edicoes">Revista On-line</a>
                                    </li>
                                    <!-- 
                                    <li>
                                        <a class="ani-04" href="<?php bloginfo('url') ?>/editorial">Editorial</a>
                                    </li>
                                    <li>
                                        <a class="ani-04" href="<?php bloginfo('url') ?>/dados-tecnicos">Dados Técnicos</a>
                                    </li>
                                     -->
                                </ul>
                            </nav>
                            <div id="realizacao" class="col-lg-5">
                                <ul>
                                    <h3>Realização</h3>
                                    <li>
                                        <a id="facidf" href="http://blogdafacidf.blogspot.com.br/" target="_blank">FACIDF</a>
                                    </li>
                                </ul>
                                <ul>
                                    <h3>Coordenação</h3>
                                    <li>
                                        <a id="feicotur" href="http://feicotur.com" target="_blank">FEICOTUR</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </footer>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src= "<?php bloginfo("template_url") ?>/js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

        <script src= "<?php bloginfo('template_url') ?>/js/bootstrap.min.js"></script>
        <script src= "<?php bloginfo('template_url') ?>/js/vendor/modernizr-2.8.3.min.js"></script>

        <script src= "<?php bloginfo('template_url') ?>/js/main.js"></script>
        <script src="<?php bloginfo('template_url') ?>/js/jquery.mask.min.js"></script>
        <script src="<?php bloginfo('template_url') ?>/js/jquery.form.js"></script>
        <script src="<?php bloginfo('template_url') ?>/js/jquery.validate.min.js"></script>
        <script src="<?php bloginfo('template_url') ?>/js/masonry.pkgd.min.js"></script>
        <!-- <script src="<?php bloginfo('template_url') ?>/js/jquery.cookie.js"></script> -->

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <!-- 
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
         -->

         <?php 
             if( isset($_GET['bar']) )
             {
                 wp_footer();
             }
         ?> 


    </body>


</html>
