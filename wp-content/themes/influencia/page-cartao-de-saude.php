<?php get_header(); ?>

<section class="cartao-saude pagina">

	<nav class="submenu">
		<ul>
			<li><a class="ani-04" href="#empresas-e-descontos">Empresas e Descontos</a></li>
			<li><a class="ani-04" id="termos" class='j-link' href="#termos-e-condicoes">Termos e Condições</a></li>
		</ul>
	</nav>


	<section id="cabecalho" class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-lg-offset-8">
				<!-- 
				<h2>
					<span id="linha1">Até</span>
					<span id="linha2">60%</span>
					<span id="linha3">de desconto</span>
					<span id="linha4">em consultas, exames e academias.</span>
				</h2>
				 -->
 				</div>
				<!-- <div class="col-lg-4 col-lg-offset-8"> -->
				<div class="col-lg-10 col-lg-offset-1">
					<div id="texto">
						<p>O portador do <strong class="nome-empresa">Cartão de Saúde</strong> terá direito a descontos que variam de <strong>5%</strong> a <strong>60%</strong> em vários estabelecimentos, como: Academias, Clínicas, Laboratórios, entre outros.</p>
						<button class="ani-02 influencia-bt red">Ver Estabelecimentos</button>
					</div>
				</div>

			</div>
		</div>
	</section>

	<section id="artigos" class="container-fluid">

		<div class="">

			<div class="col-xs-2 col-xs-offset-1">

				<h2>Dicas de <span>Saúde</span></h2>
				<p>Além de descontos para cuidar da súde, também temos uma sessão de artigos com dicas pra te ajudar nessa tarefa.</p>
				
			</div>

			<ul>

				<div class="col-xs-8">

					<?php 

					$args = array(
						'tax_query' => array(
							array(
								'taxonomy'  => 'book-artigos',
								'field'     => 'slug',
								'terms'     => 'saude'
							)
						)
					);
					$artigos = get_post_by_type('artigos', 'DESC', 4, NULL, NULL, NULL, $args);
					$i = 0;

					while ($artigos->have_posts()) :

						$artigos->the_post();

						$imagem = get_field('imagem_cabecalho');
						$imagem = $imagem['sizes']['artigo-saude-cartao'];

						$chamada = get_field('chamada');
					?>

						<li>

							<article class="col-xs-3">

								<figure>
									<img src="<?php echo $imagem; ?>">
								</figure>

								<div id="wrap">
									
									<h2><?php the_title(); ?></h2>
									<p><?php echo $chamada; ?></p>
									
									<a class="ani-04" href="<?php echo get_permalink( $post ); ?> ">Continuar Lendo</a>

								</div>

							</article>

						</li>

					<?php endwhile; ?>
					
					</div>	

	
			</ul>

		</div>
		
	</section>

	<section id="empresas-e-descontos" class="container-fluid">
		<div class="container">
			<div class="row">
				<h2 class="titulo-section">Estabelecimentos <span class="t-white t-bold">Cadastrados:</span></h2>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<ul id="empresas">
						<li class="col-lg-12">
							<div id="wrap-empresa">
								<div id="nome-empresa" class="col-lg-3">
									<h2 id="nome" style="background-image: url(<?php bloginfo('template_url') ?>/img/ph-logo-centro.jpg)">Centro Clínico Sobradinho</h2>
									<div id="info">
										<ul id="unidades">
											<li>
												<h2>Unidade Sobradinho</h2>
												<p>61 3030 3000</p>
											</li>
										</ul>
										<a href="<?php bloginfo('url') ?>/onde-encontrar/centro-clinico-matsumoto" class="ani-02 influencia-bt green">Ver perfil no <span class="nome-empresa">Onde Encontrar</span></a>
									</div>
								</div>
								<div id="descontos" class="col-lg-9">
									<ul>
										<li class="col-lg-4">
											<div id="wrap">
												<h2 id="tit-desconto" class="col-lg-3">60% <span>de desconto</span></h2>
												<ul id="servicos" class="col-lg-9 col-lg-offset-3">
													<h2 id="tit-servicos">Consultas</h2>
													<li>Clínico Geral</li>
													<li>Ortopedia</li>
													<li>Gastroenterologia</li>
													<li>Urologista</li>
													<li>Nutrição</li>
													<li>Otorrino</li>
													<li>Angiologia</li>
													<li>Proctologia</li>
												</ul>
												<div class="clearfix"></div>
											</div>
										</li>
										<li class="col-lg-4">
											<div id="wrap">
												<h2 id="tit-desconto" class="col-lg-3">40% <span>de desconto</span></h2>
												<ul id="servicos" class="col-lg-9 col-lg-offset-3">
													<h2 id="tit-servicos">Exames</h2>
													<li>Dermatologia</li>
													<li>Cardiologia</li>
													<li>Ginecologia</li>
												</ul>
												<div class="clearfix"></div>
											</div>
										</li>
										<li class="col-lg-4">
											<div id="wrap">
												<h2 id="tit-desconto" class="col-lg-3">10% <span>de desconto</span></h2>
												<ul id="servicos" class="col-lg-9 col-lg-offset-3">
													<h2 id="tit-servicos">Exames</h2>
													<li>Ecografias</li>
													<li>Tomografias</li>
													<li>Exames Cardiológicos</li>
													<li>Raios-X</li>
													<li>Mamografia</li>
													<li>Densitrometria</li>
													<li>Endoscopia</li>
													<li>Colonoscopia</li>
												</ul>
												<div class="clearfix"></div>
											</div>
										</li>
									</ul>
								</div>
								<div class="clearfix"></div>
							</div>
						</li>
						<li class="col-lg-12">
							<div id="wrap-empresa">
								<div id="nome-empresa" class="col-lg-3">
									<h2 id="nome" style="background-image: url(<?php bloginfo('template_url') ?>/img/ph-logo-sabin.jpg)">Laboratório Sabin</h2>
									<div id="info">
										<ul id="unidades">
											<li>
												<h2>Unidade Sobradinho</h2>
												<p>61 3329 8000</p>
											</li>
										</ul>
										<!-- <a href="#" class="ani-02 influencia-bt green">Ver perfil no <span class="nome-empresa">Onde Encontrar</span></a> -->
									</div>
								</div>
								<div id="descontos" class="col-lg-6">
									<ul>
										<li class="col-lg-12">
											<div id="wrap">
												<h2 id="tit-desconto" class="col-lg-3">40% <span>de desconto</span></h2>
												<ul id="servicos" class="col-lg-9 col-lg-offset-3">
													<h2 id="tit-servicos">Exames</h2>
													<li>Todos os exames</li>
												</ul>
												<div class="clearfix"></div>
											</div>
										</li>
									</ul>
								</div>
								<div class="clearfix"></div>
							</div>
						</li>
<!-- 						<li class="col-lg-12">
							<div id="wrap-empresa">
								<div id="nome-empresa" class="col-lg-3">
									<h2 id="nome" style="background-image: url(<?php bloginfo('template_url') ?>/img/ph-logo-concept.jpg)">Concept Fit</h2>
									<div id="info">
										<ul id="unidades">
											<li>
												<h2>Unidade Sobradinho</h2>
												<p>61 3967 2010</p>
											</li>
										</ul>
										<a href="#" class="ani-02 influencia-bt green">Ver perfil no <span class="nome-empresa">Onde Encontrar</span></a>
									</div>
								</div>
								<div id="descontos" class="col-lg-6">
									<ul id="servicos">
										<li class="col-lg-12">
											<div id="wrap">
												<h2 id="tit-desconto" class="col-lg-3">25% <span>de desconto</span></h2>
												<ul id="servicos" class="col-lg-9 col-lg-offset-3">
													<h2 id="tit-servicos">Planos</h2>
													<li>Plano de 12 meses</li>
													<li>Plano de 15 meses</li>
												</ul>
												<div class="clearfix"></div>
											</div>
										</li>
									</ul>
								</div>
								<div class="clearfix"></div>
							</div>
						</li>
 -->						<div class="clearfix"></div>
					</ul>
				</div>
			</div>
		</div>
	</section>

	<section id="termos-e-condicoes" class="container-fluid">
		
		<div class="container">
			<div class="row">
				<div id="wrap" class="col-lg-6 col-lg-offset-3">
					<h2>
						<span id="linha1">Cartão de Saúde</span> 
						<span id="traco">-</span> 
						<span id="linha2">Termos e Condições</span>
					</h2>
					<p>A forma de pagamento será sempre acordada entre o usuário do <strong class="nome-empresa">Cartão de Saúde</strong> e o fornecedor do produto ou serviço.</p>
					<p>O estabelecimento terá a obrigação contratual de praticar o preço com os descontos indicados nesse site.</p>
					<p>O portador do <strong class="nome-empresa">Cartão de Saúde</strong>, terá por obrigação a realização do pagamento  — com o devido desconto — no ato do uso do cartão.</p>
					<a id="close" href="#" class="influencia-bt red">Endendi</a>
				</div>
			</div>
		</div>

	</section>

</section>

<?php get_footer(); ?>