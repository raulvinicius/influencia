<section class="busca pagina">


	<header id="header-interno-onde-encontrar" class="container-fluid <?php echo (!isset($_GET['c'])) ? 'no-cat' : '' ; ?>">

		<div class="row submenu" id="linha1">
			<div class="container">
				<div class="row">
					
					<h2 class="col-lg-2">Onde Encontrar</h2>
					<form id="fm-onde-encontrar" class="busca-onde-encontrar col-lg-8 locked" action="<?php bloginfo('url') ?>/onde-encontrar" method="GET">

						<?php include 'form-busca-onde-encontrar.php'; ?>

					</form>

					<nav class="col-lg-2 fechado">
						<button id="toggle-menu" class="ani-02" data-target='links'></button>
						<ul id="links" class="hidden">
							<li><a class="ani-04" href="<?php bloginfo('url') ?>/onde-encontrar/#o-que-e">O que é</a></li>
							<li><a class="ani-04" href="<?php bloginfo('url') ?>/onde-encontrar/#por-que-anunciar">Por que anunciar</a></li>
							<!-- 
							<li><a class="ani-04" href="<?php bloginfo('url') ?>/onde-encontrar/cadastro">Criar perfil do meu negócio</a></li>
							<li><a class="ani-04" href="#">Login</a></li>
							 -->
						</ul>
					</nav>
				</div>
			</div>
		</div>

		<?php
			if ( isset( $_GET['c'] ) ) :

				$idCat = get_term_by( 'name', $_GET['c'], 'onde-encontrar' );

				$imgCat = get_field('imagem', $idCat);
				$imgCat = $imgCat['sizes']['capa-cat-onde-encontrar'];

			endif;
		?>

		<div id="linha2" <?php echo ( isset($_GET['c']) ) ? 'style="background-image: url(' . $imgCat . ')"' : '' ; ?>>
			<div class="container-fluid">
				<div class="container">
					<div class="row">
						<?php if ( isset($_GET['c']) ): ?>							
							<h3 <?php echo ( !isset($_GET['b']) && !isset($_GET['r']) ) ? 'style="margin-bottom: 0; bottom: 0;"' : '' ; ?>>
								<span id="wrap-categoria">
									<?php echo $_GET['c']; ?>
								</span>
							</h3>
						<?php endif ?>
						<?php if ( isset($_GET['b']) ): ?>							
						<h4>
							<?php if ( isset($_GET['b']) ): ?>							
								<span id="wrap-busca">
									<span id="linha1">Mostrando resultados para:</span>
									<span id="mostra-termo">"<?php echo $_GET['b']; ?>"</span>
								</span>
							<?php endif ?>
						</h4><?php endif ?><?php if ( isset($_GET['r']) ): ?><h5>
							<span id="wrap-regiao">
								<?php if (isset($_GET['r']) && $_GET['r'] != ''): ?>
									<span id="linha1">Na região: </span>
									<span id="mostra-termo"><?php echo $GLOBALS['vRegiao'][$_GET['r']]; ?> </span>
								<?php endif ?>
							</span>
						</h5>
						<?php endif ?>
					</div>
				</div>
			</div>
		</div>



	</header>

	<div id="wrap-resultados">
		<section id="resultados" class="container">
			

			<div class="row">
				<aside class="col-lg-3">
					<section>
						<h2>Categorias</h2>
						<div id="wrap-busca-rapida" class="row">
							<span>
								<input type="text">
							</span>
							<button id="limpar"></button>
						</div>
						<ul>
							<?php
								$cats = get_terms( 'onde-encontrar', array('orderby'=>'name') );
								foreach ($cats as $key):
								?>

								<li class="ani-02">
									<a href="<?php echo get_bloginfo('url') ?>/onde-encontrar/?<?php echo ( isset($_GET['b']) ) ? '&b=' . $_GET['b'] : ''; ?><?php echo ( isset($_GET['r']) ) ? '&r=' . $_GET['r'] : ''; ?>&c=<?php echo $key->name ?>">
										<?php echo $key->name ?>
										<span id="qtd"><?php echo $key->count ?></span>
									</a>
								</li>

								<?php
								endforeach;
							?>
						</ul>
					</section>
				</aside>

				<?php 

					$argsBusca = array(
						's' => NULL,
						'r' => NULL,
						'c' => NULL
					);

					if (isset($_GET['b']))
					{
						$argsBusca['b'] = $_GET['b'];
					};

					if (isset($_GET['r']))
					{
						$argsBusca['r'] = $_GET['r'];
					};

					if (isset($_GET['c']))
					{
						$argsBusca['c'] = $_GET['c'];
					};

					$posts = busca_onde_encontrar('empresas', $argsBusca, 'DESC');

				?>

				<div id="empresas" class="col-lg-9" data-termo="<?php echo ( isset($_GET['b']) ) ? $_GET['b'] : '' ?>">
					<div id="info" class="col-lg-12">Total de <span class="influencia-bt green"><?php echo count($posts) ?></span> resultados, ordenados por <span class="influencia-bt red">Ordem Alfabética</span></div>

					<ul>

						<?php 

						if($posts) :
							global $post;

							foreach ($posts as $post) :
								setup_postdata($post);

						// while ( $loop->have_posts() ) :
						
						//     $loop->the_post();

							$logo = get_field('logo');
							$descricaoBreve = get_field('descricao_breve');
							$endereco = get_field('endereco');
							$regiao = get_field('regiao_administrativa');
							if(is_object($regiao))
							{
								$regiao = $regiao->name;
							}
							$telefone = get_field('telefone');

							// $servico = get_field('servico_principal');
							// $servico = $objServico['choices'][$servico];

							// $miniCapa = get_field('mini_capa');
							// $miniCapa = wp_get_attachment_image_src($miniCapa, 'full');

							$tags = wp_get_post_terms( $post->ID, 'onde-encontrar-tags' );
							$categoria = wp_get_post_terms( $post->ID, 'onde-encontrar' );

							?>

							<li class="col-lg-12">
								<a href="<?php the_permalink(); ?>">
									<article <?php echo ($logo == "") ? 'class="no-logo" ' : '' ?>>
										<div id="cor" class="ani-04"></div>

										<!-- 
										<?php if ($logo != ""): ?>
										<div id="wrap-infos" style="background-image: url(<?php bloginfo('template_url') ?>/img/revista-influencia-bg-empresas-<?php echo $categoria[0]->slug ?>.jpg)" class="col-xs-9">
										<?php endif ?>
										 -->

											<h2 class="ani-04 col-xs-12"><?php the_title(); ?></h2>
											<div id="infos" <?php echo ($logo != "") ? 'class="col-xs-9"' : 'class="col-xs-12"' ; ?>>
												<p><?php //echo $descricaoBreve ?></p>
												<p><?php echo $endereco . ', '; echo ($regiao != '') ? $regiao . '-DF' : '' ?></p>
												<p id="telefone">
													<?php echo ($telefone != '') ? '<i class="ico telefone-circ vermelho"></i>' : '' ?>
													<?php echo $telefone ?>
												</p>

												<?php if (count($tags) > 0): ?>

													<ul id="tags">

														<?php 

														for ($i=0; $i < count($tags); $i++):
														?>

														<li><?php echo $tags[$i]->name ?></li>

														<?php 

														endfor;

														?>
														<div class="clearfix"></div>
													</ul>

												<?php endif ?>

											</div>

											<?php if ($logo != "") : ?>
	 											<div id="logo" class="col-xs-3">
													<figure>
														<img src="<?php echo $logo['sizes']['large']; ?>">
													</figure>
												</div>
											<?php endif ?>

											<div class="clearfix"></div>
									</article>
								</a>
							</li>

							<?php
							
							endforeach;
						endif;

						wp_reset_query();

						?>

					</ul>
				</div>
			</div>
		
		</section>
	</div>

</section>
