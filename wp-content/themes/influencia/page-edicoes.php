<?php get_header(); ?>

<section class="edicoes" class="container-fluid">

    <div class="container">
        <div class="row">
            <ul>

                <?php 

                    $loop = get_post_by_type('edicoes');

                    while ( $loop->have_posts() ) :
                    
                        $loop->the_post();

       


                     ?>

                        <li class="col-lg-3">
                            <article>
                                <figure>
                                    <a href="<?php bloginfo('url') ?>/edicao/<?php echo $numero ?>" target="_blank">
                                        <img src="<?php echo $capa['sizes']['capa-revista'] ?>" alt="Ed. nº <?php echo $numero ?> | Ano <?php echo $anoNum ?> (<?php echo $ano ?>)">
                                    </a>
                                </figure>
                                <hgroup>
                                    <h2>Ed. nº <?php echo $numero ?></h2>
                                    <h3>Ano <?php echo $anoNum ?> (<?php echo $ano ?>)</h3>
                                    <div class="clearfix"></div>
                                </hgroup>
                                <div id="links">
                                    <a class="ani-04" href="<?php echo $pdf['url'] ?>" target="_blank">Baixar PDF</a>
                                    <a class="ani-04" href="<?php bloginfo('url') ?>/edicao/<?php echo $numero ?>" target="_blank">Ler Online</a>
                                </div>
                            </article>
                        </li>

                    <?php

                endwhile;

                ?>

            </ul>
        </div>
    </div>

</section>

<?php get_footer(); ?>