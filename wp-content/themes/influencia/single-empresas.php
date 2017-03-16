<?php get_header(); ?>


<?php $filial = get_query_var('onde-encontrar-regioes', ''); ?>


<section class="empresa pagina">

	<?php 

		$logo = get_field('logo');
		if (is_array($logo)) {
			$logo = $logo['sizes']['logo-perfil-empresa'];
		}
		$endereco = get_field('endereco');
		$objRegiao = get_field_object('regiao_administrativa');
		$regiao = get_field('regiao_administrativa');
		if(is_object($regiao))
		{
			$regiao = $regiao->name;
		}
		$telefone = get_field('telefone');
		$telefone2 = get_field('telefone2');
		$facebook = get_field('facebook');
		$email = get_field('email');
		$site = get_field('site');
		$descricaoBreve = get_field('descricao_breve');
		$notaAvaliacao = get_field('nota_avaliacao');
		$numeroAvaliacoes = get_field('numero_avaliacoes');
		$filiais = get_field('filiais');

		//se a filial tiver o mesmo nome da matriz, esvazia $filial
		if ( $filial == get_term_by('name', $regiao, 'onde-encontrar-regioes')->slug ) {
			$filial = '';
		}

		//se estiver visializando uma filial marca a posição $i dela
		if ($filial != '') 
		{
			for ($i=0; $i < count($filiais); $i++)
			{ 
				if($filiais[$i]['regiao_administrativa_filial']->slug == $filial)
				{
					$iFilial = $i;
					break;
				}
			}
		}

	?>

	<header id="header-interno-onde-encontrar" class="container-fluid">

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
							<?php if (1 == 0): ?>
								<li><a class="ani-04" href="<?php bloginfo('url') ?>/onde-encontrar/cadastro">Criar perfil do meu negócio</a></li>
								<li><a class="ani-04" href="#">Login</a></li>
							<?php endif ?>
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
							<span id="helper"></span><img src="<?php echo (is_array($logo)) ? $logo['sizes']['large'] : $logo; ?>">
						</figure>

					<?php endif ?>
					<div id="textos" class="col-lg-10">
						<h3><?php the_title() ?></h3>
						<?php if ($filiais): ?>
						<select id="select-filiais" class="ani-04 bg-cor-1 bg-cor-2-hover" name="filiais" data-p="filiais" <?php echo ( $filial != '' ) ? 'data-s="' . $filial . '"' : ''; ?> <?php echo ( count( $filiais ) + 1 <= 1 ) ? 'disabled' : ''; ?>>
							<option value="<?php echo get_term_by('name', $regiao, 'onde-encontrar-regioes')->slug ?>" <?php echo ( ( $filial == '' || get_term_by('slug', $filial, 'onde-encontrar-regioes')->name == $regiao ) ) ? 'selected' : ''; ?>><?php echo $regiao ?></option>
							<?php
								for ($i=0; $i < count( $filiais ); $i++) :
									?>
									
								<option value="<?php echo $filiais[$i]['regiao_administrativa_filial']->slug ?>" <?php echo ( ( $filial != '' && $filial == $filiais[$i]['regiao_administrativa_filial']->slug ) ) ? 'selected' : ''; ?>><?php echo $filiais[$i]['regiao_administrativa_filial']->name ?></option>

									<?php 
								endfor;

							?>
						</select>
						<?php endif ?>
						<div class="clearfix"></div>

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
						<?php if ($filial == ''): ?>
							<p id="endereco">
								<i class="ico maps-pin-line-red"></i>
								<?php echo "{$endereco}, {$regiao} - DF"; ?>
							</p>
						<?php else: ?>
							<p id="endereco">
								<i class="ico maps-pin-line-red"></i>
								<?php echo "{$filiais[$iFilial]['endereco_filial']}, {$regiao} - DF"; ?>
							</p>
						<?php endif ?>
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
						<?php if ($filial == ''): ?>

							<?php if($telefone != ''): ?>
								<li id="telefone" class="ani-02"><i class="ico"></i><?php echo $telefone ?></li>
							<?php endif; ?>
							<?php if($telefone2 != ''): ?>
								<li id="telefone" class="ani-02"><i class="ico"></i><?php echo $telefone2 ?></li>
							<?php endif; ?>
							<?php if($facebook != ''): ?>
								<li id="facebook" class="ani-02"><i class="ico"></i><?php echo $facebook ?></li>
							<?php endif; ?>
							<?php if($email != ''): ?>
								<li id="email" class="ani-02"><i class="ico"></i><?php echo $email ?></li>
							<?php endif; ?>
							<?php if($site != ''): ?>
								<li id="site" class="ani-02"><a href="<?php echo $site ?>?s=oe" target='_blank'><i class="ico"></i><?php echo $site ?></a></li>
							<?php endif; ?>

						<?php else: ?>

							<?php if($filiais[$iFilial]['telefone_filial'] != ''): ?>
								<li id="telefone" class="ani-02"><i class="ico"></i><?php echo $filiais[$iFilial]['telefone_filial'] ?></li>
							<?php elseif ($telefone != ''): ?>
								<li id="telefone" class="ani-02"><i class="ico"></i><?php echo $telefone ?></li>
							<?php endif; ?>
							<?php if($filiais[$iFilial]['telefone2_filial'] != ''): ?>
								<li id="telefone" class="ani-02"><i class="ico"></i><?php echo $filiais[$iFilial]['telefone2_filial'] ?></li>
							<?php elseif ($telefone2 != ''): ?>
								<li id="telefone" class="ani-02"><i class="ico"></i><?php echo $telefone ?></li>
							<?php endif; ?>
							<?php if($facebook != ''): ?>
								<li id="facebook" class="ani-02"><i class="ico"></i><?php echo $facebook ?></li>
							<?php endif; ?>
							<?php if($filiais[$iFilial]['email_filial'] != ''): ?>
								<li id="email" class="ani-02"><i class="ico"></i><?php echo $filiais[$iFilial]['email_filial'] ?></li>
							<?php elseif ($email != ''): ?>
								<li id="email" class="ani-02"><i class="ico"></i><?php echo $email ?></li>
							<?php endif; ?>
							<?php if($site != ''): ?>
								<li id="site" class="ani-02"><a href="<?php echo $site ?>?s=oe" target='_blank'><i class="ico"></i><?php echo $site ?></a></li>
							<?php endif; ?>

						<?php endif ?>
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