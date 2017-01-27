<?php get_header(); ?>

<section class="empresa pagina">

	<?php 

		$logo = get_field('logo');
		$logo = $logo['sizes']['large'];
		$endereco = get_field('endereco');
		$objRegiao = get_field_object('regiao_administrativa');
		$regiao = get_field('regiao_administrativa');
		$regiao = $regiao->name;
		$telefone = get_field('telefone');
		$telefone2 = get_field('telefone2');
		$facebook = get_field('facebook');
		$email = get_field('email');
		$site = get_field('site');
		$descricaoBreve = get_field('descricao_breve');
		$notaAvaliacao = get_field('nota_avaliacao');
		$numeroAvaliacoes = get_field('numero_avaliacoes');

	?>

	<header id="header-interno-onde-encontrar" class="container-fluid">

		<div class="row" id="linha1">
			<div class="container">
				<div class="row">

					<h2 class="col-lg-2">Onde Encontrar<span class="hidden"> | <?php the_title(); ?></span></h2>
					<form class="busca-onde-encontrar col-lg-9" action="<?php bloginfo('url') ?>/onde-encontrar" method="GET">

						<?php include 'form-busca-onde-encontrar.php'; ?>

					</form>

					<nav class="col-lg-1">
						<button id="toggle-menu"></button>
						<ul>
							<li><a class="ani-04" href="#o-que-e">O que é</a></li>
							<li><a class="ani-04" href="#por-que-anunciar">Por que anunciar</a></li>
							<li><a class="ani-04" href="<?php bloginfo('template_url') ?>/perfil">Criar perfil do meu negócio</a></li>
							<li><a class="ani-04" href="#">Login</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</div>

		<div class="row" id="infos">
			<div class="container">
				<div id="wrap" class="row">
					<?php if ($logo != ''): ?>
						
						<figure class="col-lg-2">
							<span id="helper"></span><img src="<?php echo $logo ?>">
						</figure>

					<?php endif ?>
					<div id="textos" class="col-lg-10">
						<h3><?php the_title() ?></h3>
						<ul id="categorias">
							<?php 

								$tags = wp_get_post_terms( $post->ID, 'onde-encontrar-tags' );

								for ($i=0; $i < count($tags); $i++):

								?>

									<li>
										<a href="<?php echo get_bloginfo('url') . '/onde-encontrar/?b=' . $tags[$i]->name ?>"><?php echo $tags[$i]->name ?></a>
									</li>

								<?php 

								endfor;

							?>
							<div class="clearfix"></div>
						</ul>
						<p id="endereco"><i class="ico maps-pin-line-red"></i><?php echo $endereco . ', ' . $regiao . ' - DF'; ?></p>
						<div id="avaliacoes">
							<div id="estrelas">
								<span id="bg"></span>
								<span id="bar" class="ani-06" style="width: <?php echo $notaAvaliacao * 100?>%"></span>
								<span id="msk"></span>
							</div>
							<span id="numero"><?php echo $numeroAvaliacoes ?> <?php echo pluralize($numeroAvaliacoes, 'avaliações', 'avaliação') ?></span>
						</div>
					</div>
				</div>
				<div class="row">
					<ul id="contatos">
						<?php if($telefone != ''): ?>
							<li id="telefone"><i class="ico"></i><?php echo $telefone ?></li>
						<?php endif; ?>
						<?php if($telefone2 != ''): ?>
							<li id="telefone"><i class="ico"></i><?php echo $telefone2 ?></li>
						<?php endif; ?>
						<?php if($facebook != ''): ?>
							<li id="facebook"><i class="ico"></i><?php echo $facebook ?></li>
						<?php endif; ?>
						<?php if($email != ''): ?>
							<li id="email"><i class="ico"></i><?php echo $email ?></li>
						<?php endif; ?>
						<?php if($site != ''): ?>
							<li id="site"><a href="<?php echo $site ?>?s=oe" target='_blank'><i class="ico"></i><?php echo $site ?></a></li>
						<?php endif; ?>
					</ul>
				</div>
				<div class="row">
					<ul id="acoes">
						<?php if($email != ''): ?>
							<li id="email"><button class="ani-02"><i class="ico"></i>Enviar e-mail</button></li>
						<?php endif; ?>
						<li id="avaliar"><button class="ani-02"><i class="ico"></i>Avaliar</button></li>
					</ul>
				</div>
			</div>
		</div>

	</header>

	<section id="caracteristicas" class="container-fluid">
		
		<div class="container">
			<div class="row">
				<?php if( $descricaoBreve != '' ): ?>
					<div class="col-lg-7">
						<p id="descricao-breve"><?php echo $descricaoBreve ?></p>
					</div>
				<?php endif; ?>
				<?php if( 2 != 2 ): ?>
					<div id="wrap-map" class="<?php echo ($descricaoBreve == '') ? 'col-lg-12' : 'col-lg-5' ?>">
						<span id="map-perfil-empresa"></span>
					</div>
				<?php endif; ?>
			</div>
		</div>
		
	</section>

</section>

<?php get_footer(); ?>