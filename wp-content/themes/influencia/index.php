<?php get_header(); ?>

<section class="home">


	<?php 

	$destaques = get_field('artigos', 'option');

	if (count($destaques) > 0):

		?>

		<section id="novidades" class="container-fluid">

			<div class="row">
				<button id="seta-esq" class="ani-02 layer seta esq ani-04-in-out"></button>
				<button id="seta-dir" class="ani-02 layer seta dir ani-04-in-out"></button>

	<!--
	 			<button id="seta-esq" class="layer seta esq ani-04-in-out" data-depth="0.1"></button>
				<button id="seta-dir" class="layer seta dir ani-04-in-out" data-depth="0.1"></button>
	 -->
				<ul class="ani-02-in-out">

				<?php 

					foreach ($destaques as $destaque):

						$titulo = $destaque->post_title;
						$status = $destaque->post_status;
						$slug = $destaque->post_name;
						$capa = get_field('imagem_cabecalho', $destaque->ID);

						if ($status == "publish"):

						?>

							<li>
								<article style="background-image: url('<?php echo $capa['sizes']['artigo-destaque-home'] ?>')">
									<figure class="hidden">
										<div id="msk"></div>
										<img src="<?php echo $capa['sizes']['header-artigo'] ?>">
									</figure>
									<div id="wrap-text">
										<div class="col-lg-5">
											<h2><?php echo $titulo ?></h2>
											<div id="wrap-link">
												<a class="ani-02" href="<?php bloginfo('url') ?>/artigos/<?php echo $slug; ?>">Continuar lendo<i class="ico ani-04 mais-circ-line right"></i></a>
											</div>
										</div>
									</div>
								</article>
							</li>

						<?php 

						endif;

					endforeach;

				?>

	<!-- 				<li>
						<article style="background-image: url('<?php bloginfo("template_url") ?>/img/ph-bg-carrossel-02.png')">
							<figure class="hidden">
								<img src="<?php bloginfo('template_url') ?>/img/ph-bg-carrossel.jpg">
							</figure>
							<div id="wrap-text">
								<div class="col-lg-5">
									<h2>Posse do novo Presidente da FACI-DF.</h2>
									<div id="wrap-link">
										<a class="ani-02" href="#">Continuar lendo<i class="ico ani-04 mais-circ-line right"></i></a>
									</div>
								</div>
							</div>
						</article>
					</li>
	 -->
				</ul>

				<?php

				if ( count($destaques) > 1):

				?>

					<div id="contador" style="width: 48px;">
						<div id="marca" style="left: 5px; right: 37px;"></div>
					</div>

				<?php 
				
				endif;

				?>


			</div>
	 	</section>

	 	<?php 

 	endif;

 	?>

	<section id="institucional" class="container-fluid">
		<div class="row-fluid">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-lg-offset-1">
						<h2 class="fadeInLeft animated">
							<span id="linha-1">Muito mais</span>
							<span id="linha-2">Influência</span>
							<span id="linha-3">para você</span>
						</h2>
					</div>
					<div id="texto" class="fadeIn animated col-lg-6">
						<p>A <span class="nome-empresa">Revista Influência</span> é leitura obrigatória para quem quer estabelecer estratégias, adquirir conhecimentos sobre gestão e inovação de empresas, assim como, empresários e seus processos.</p>
						<a class="ani-02" href="<?php bloginfo('url') ?>/institucional">Conheça mais sobre a Revista</a>
					</div>
				</div>
			</div>
 		</div>
	</section>

	<section id="edicoes" class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
					<h2>
						<span id="linha1">Últimas </span>
						<span id="linha2">Edições</span>
					</h2>
				</div>
				<div class="col-lg-9">
					<ul id="capas">

						<?php 

						$edicoes = get_post_by_type('edicoes', 'DESC', 4);

						while ( $edicoes->have_posts() ) :
						
						    $edicoes->the_post();

						    $capa = get_field('capa');
						    $numero = get_field('numero');
						    $numero = sprintf("%02d", $numero);
						    $anoInicial = 2011;
						    $ano = get_field('ano');
						    $anoNum = sprintf( "%02d", intval( $ano ) - $anoInicial + 1 );
						    $pdf = get_field('pdf');

							?>

							<li class="col-lg-3">
								<a href="<?php bloginfo('url') ?>/edicao/<?php echo $numero ?>" target="_blank">
									<img src="<?php echo $capa['sizes']['capa-revista'] ?>" alt="Ed. nº <?php echo $numero ?> | Ano <?php echo $anoNum ?> (<?php echo $ano ?>)">
								</a>
							</li>

							<?php 

						endwhile;

						?>

					</ul>

				</div>
			</div>
		</div>
	</section>

</section>


<?php get_footer(); ?>