<?php get_header(); ?>

<section class="artigo container">

    <?php 

        $imgHeader = get_field('imagem_cabecalho');
        $fonte = get_field('fonte');
        $tags = get_field('tags');
        $chamada = get_field('chamada');
        $dia = the_date('d');
        $mes = the_date('M');
        $ano = the_date('Y');

    ?>

    <header class="row">

        <figure class="col-lg-12">
            <img src="<?php echo $imgHeader['sizes']['header-artigo'] ?>" alt="">
        </figure>
        <div id="wrap" class="col-lg-12">
<!--
             <span id="data" class="col-lg-1">
                <span id="linha1">08</span>
                <span id="linha2">Mar</span>
                <span id="linha3">2016</span>
            </span>
 -->
             <span id="texto" class="col-lg-11">
                <h2><?php the_title() ?></h2>

                <ul class='tags'>
                    <?php 

                        if ($tags) :

                            foreach ($tags as $tag):

                             ?>
                                <li><a href=""><?php echo $tag->name ?></a></li>
                            <?php 

                            endforeach;

                        endif;

                     ?>
                     <div class="clearfix"></div>
                </ul>

                <?php if ($fonte != ""): ?>
                    
                    <p id="fonte">Fonte: <span><?php echo $fonte ?></span></p>

                <?php endif ?>
            </span>
        </div>
        
    </header>

    <div id="chamada" class="row">

        <h3 class="col-lg-8 col-lg-offset-2"><?php echo $chamada ?></h3>

    </div>


        <?php 

            if( have_rows('blocos') ):

                while ( have_rows('blocos') ) : the_row();

                    if( get_row_layout() == 'texto'):

                        if( get_sub_field('colunas') == 1):

                            ?>

                                <div id="bloco" class="row">

                                    <div class="col-lg-8 col-lg-offset-2"><?php echo the_sub_field('texto_1') ?></div>

                                </div>

                            <?php 

                        else:

                            ?>

                                <div id="bloco" class="row">

                                    <div class="col-lg-4 col-lg-offset-2"><?php echo the_sub_field('texto_1') ?></div>
                                    <div class="col-lg-4"><?php echo the_sub_field('texto_2') ?></div>

                                </div>

                            <?php 

                        endif;

                    elseif( get_row_layout() == 'texto_e_imagem' ): 

                        $img = get_sub_field('imagem');

                        if( get_sub_field('lado_texto') == 'Esquerda'):

                            ?>

                                <div id="bloco" class="row">
                                    
                                    <div class="col-lg-5 col-lg-offset-2">
                                        <?php echo get_sub_field('texto') ?>
                                    </div>
                                    <div class="col-lg-5">
                                        <img src="<?php echo $img['sizes']['ilustrativa-artigo']; ?>" alt="<?php echo $img['alt'] ?>">
                                    </div>

                                </div>

                            <?php 

                        else:

                            ?>
                        
                                <div id="bloco" class="row">
                                    <div class="col-lg-5">
                                        <img src="<?php echo $img['sizes']['ilustrativa-artigo']; ?>" alt="<?php echo $img['alt'] ?>">
                                    </div>
                                    <div class="col-lg-5">
                                        <?php echo get_sub_field('texto') ?>
                                    </div>

                                </div>
 
                            <?php 

                        endif;

                    elseif( get_row_layout() == 'citacao_e_texto' ): 

                        if( get_sub_field('lado_texto') == 'Esquerda'):

                            $img = get_sub_field('imagem');

                            ?>

                                <div id="bloco" class="row">
                                    
                                    <div class="col-lg-5 col-lg-offset-2">
                                        <?php echo the_sub_field('texto') ?>
                                    </div>
                                    <div id="citacao" class="col-lg-4">
                                        <?php echo get_sub_field('citacao') ?>
                                    </div>

                                </div>

                            <?php 

                        else:

                            ?>
                        
                                <div id="bloco" class="row">

                                    <div id="citacao" class="col-lg-4 col-lg-offset-1">
                                        <?php echo get_sub_field('citacao') ?>
                                    </div>
                                    <div class="col-lg-5">
                                        <?php echo the_sub_field('texto') ?>
                                    </div>

                                </div>
 
                            <?php 

                        endif;
    
                    elseif( get_row_layout() == 'imagem' ): 

                        $img = get_sub_field('imagem');

                        ?>

                            <div id="bloco" class="row">
                                
                                <div class="col-lg-10 col-lg-offset-2">
                                    <img src="<?php echo $img['sizes']['bloco-imagem-artigo']; ?>" alt="<?php echo $img['alt'] ?>">
                                </div>

                            </div>

                        <?php 

                    endif;

                endwhile;

            endif;

         ?>

     </div>

</section>




<?php get_footer(); ?>