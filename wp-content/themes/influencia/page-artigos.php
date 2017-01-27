<?php get_header(); ?>

<section class="artigos container-fluid">

	<ul>

		<?php 

		$args = array(
			'tax_query' => array(
				array(
					'taxonomy'  => 'book-artigos',
					'field'     => 'slug',
					'terms'     => 'saude',
					'operator'  => 'NOT IN'
				)
			)
		);
		$artigos = get_post_by_type('artigos', 'DESC', -1, NULL, NULL, NULL, $args);
		$i = 0;

		while ($artigos->have_posts()) :

			$artigos->the_post();

			$imagemCabecalho = get_field('imagem_cabecalho');
			$caderno = get_field('caderno');

			if ($i == 0) :

				//só usa chamada se for o primeiro artigo
				$chamada = get_field('chamada');

				?>

				<div class="row">
					<li id="destaque" class="col-xs-12">
						<article>
							<a href="<?php the_permalink() ?>">
								<figure>
									<img src="<?php echo $imagemCabecalho['sizes']['artigo-destaque-home'] ?>">
								</figure>
								<div id="wrap" class="col-lg-4">
									<h2><?php the_title() ?></h2>
									<?php echo ($chamada != "") ? '<h3>' . $chamada . '</h3>' : '' ?>
									<div id="social">
										<span><i id="curtidas" class="ico">Curtidas: </i>0</span>
										<span><i id="comentarios" class="ico">Comentários: </i>0</span>
										<span><i id="shares" class="ico">Compartilhamentos: </i>0</span>
									</div>
								</div>
							</a>
						</article>
					</li>
				</div>
				<div class="container">
					<div class="row grid">

				<?php 

			elseif ($i > 0) :

				//as tags e categorias só aparecem depois do primeiro artigo
		        $tags = get_field('tags');
				$categoria = get_field('categoria');
				$caderno = get_field('caderno');

					if ( $i == 1 || $i == 4) : 

						?>

						<li id="artigo-xg" class="grid-item grid-item--width2 col-xs-6">
							<article>
								<a href="<?php the_permalink() ?>">
									<figure>
										<img src="<?php echo $imagemCabecalho['sizes']['artigos-img-g'] ?>">
									</figure>
								</a>
								<span id="cat">
									<?php echo $caderno->name ?>
								</span>
								<ul class="tags">

									<?php 

									if ($tags): 

									    foreach ($tags as $tag):

									     ?>
									        <li><a href=""><?php echo $tag->name ?></a></li>
									    <?php 

									    endforeach;

								    endif;

									?>

									 <div class="clearfix"></div>
								</ul>
								<a href="<?php the_permalink() ?>">
									<h2><?php the_title() ?></h2>
								</a>
							</article>
						</li>

						<?php

					elseif ( ($i > 1 && $i < 4) || ($i > 4 && $i < 7) ) :

						?>

						<li id="artigo-g" class="grid-item col-xs-3 <?php echo $categoria->slug ?>">
							<article>
								<a href="<?php the_permalink() ?>">
									<figure>
										<img src="<?php echo $imagemCabecalho['sizes']['artigos-img-m'] ?>">
									</figure>
								</a>
								<span id="cat">
									<?php echo $caderno->name ?>
								</span>
								<ul class="tags">

									<?php
										if ($tags):

										    foreach ($tags as $tag) :

										     ?>
										        <li><a href=""><?php echo $tag->name ?></a></li>
										    <?php 

										    endforeach;

										endif;
									?>

									 <div class="clearfix"></div>
								</ul>
								<a href="<?php the_permalink() ?>">
									<h2><?php the_title() ?></h2>
								</a>
							</article>
						</li>

						<?php

					elseif ( $i >= 8 && $i < 10 ) :

						?>

						<li id="artigo-m" class="grid-item col-xs-6 <?php echo $categoria->slug ?>">
							<article class="row">
								<div id="wrap-img" class="col-xs-4">
									<a href="<?php the_permalink() ?>">
										<figure>
											<img src="<?php echo $imagemCabecalho['sizes']['artigos-img-p'] ?>">
										</figure>
									</a>
									<span id="cat">
										<?php echo $caderno->name ?>
									</span>
								</div>
								<div id="wrap-info" class="col-xs-8">
									<ul class="tags">

										<?php
											if ($tags):

											    foreach ($tags as $tag) :

											     ?>
											        <li><a href=""><?php echo $tag->name ?></a></li>
											    <?php 

											    endforeach;

											endif;
										?>

										 <div class="clearfix"></div>
									</ul>
									<a href="<?php the_permalink() ?>">
										<h2><?php the_title() ?></h2>
									</a>
								</div>
							</article>
						</li>

						<?php

					endif;

				endif;

				$i++;

			endwhile;

			?>

			</div>
		</div>

	</ul>

</section>


<?php get_footer(); ?>