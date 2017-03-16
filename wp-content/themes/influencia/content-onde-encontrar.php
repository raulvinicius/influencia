<section class="onde-encontrar pagina">

	<nav class="submenu">
		<ul>
			<li><a class="ani-04" href="#o-que-e">O que é</a></li>
			<li><a class="ani-04" href="#por-que-anunciar">Por que anunciar</a></li>
			<?php if (1 == 0): ?>
				<li><a class="ani-04 hidden" href="<?php bloginfo('template_url') ?>/perfil">Criar perfil do meu negócio</a></li>
				<li><a class="ani-04 hidden" href="#">Login</a></li>
			<?php endif ?>
		</ul>
	</nav>

	<section id="busca" class="container-fluid">
		<h2>Onde Encontrar</h2>
		<div class="row-fluid">
			<form id="fm-onde-encontrar" class="col-lg-6 col-lg-offset-3 locked" action="<?php bloginfo('url') ?>/onde-encontrar" method="GET">

				<?php include 'form-busca-onde-encontrar.php'; ?>
				
			</form>
		</div>
		
	</section>

	<section id="querer" clas="container-fluid">
		<div class="row-fluid">
			<h2 class="col-lg-3">
				<span id="linha-1">Quer</span>
				<span id="linha-2">fazer<span>
				<span id="linha-3">o que?</span>
			</h2>
			<ul>
				<li id="me-cuidar" class="col-lg-2">
					<a class="ani-02" href="<?php bloginfo('url') ?>/onde-encontrar/busca/Saúde">
						<i class="ani-04"></i>Me cuidar
					</a>
				</li>
				<li id="presentear" class="col-lg-2">
					<a class="ani-02" href="<?php bloginfo('url') ?>/onde-encontrar/busca/Presentes">
						<i class="ani-04"></i>Presentear
					</a>
				</li>
				<li id="me-divertir" class="col-lg-2">
					<a class="ani-02" href="<?php bloginfo('url') ?>/onde-encontrar/busca/Diversão">
						<i class="ani-04"></i>Me divertir
					</a>
				</li>
				<li id="comer" class="col-lg-2">
					<a class="ani-02" href="<?php bloginfo('url') ?>/onde-encontrar/busca/Alimentação">
						<i class="ani-04"></i>Comer
					</a>
				</li>
				<?php if (1 == 0): ?>
					<li id="mais" class="col-lg-1">
						<a class="ani-02" href="<?php bloginfo('url') ?>/onde-encontrar/#">
							<i class="ani-04"></i>Mais
						</a>
					</li>
				<?php endif ?>
				<div class="clearfix"></div>
			</ul>
		</div>
	</section>

	<section id="categorias">
		<div class="container">
			<div class="row">
				<h2 class="titulo-section">Categorias</h2>
				<ul class="col-lg-10 col-lg-offset-1">
					<div class="row">
						<div class="col-lg-4">
							<?php

								$cats = get_terms( 'onde-encontrar', array('orderby'=>'name') );
								$i = 1;

								foreach ($cats as $key):

								?>

								<?php if ( $i % 7 == 1 && $i != count($cats) && $i != 1 ) : ?>

									</div>
									<div class="col-lg-4">

								<?php endif; ?>

								<li class="ani-02">
									<a href="<?php echo bloginfo('url') ?>/onde-encontrar/<?php echo $key->name ?>">
										<span class="nome-empresa">
											<?php echo $key->name ?>
											<span id="qtd"><?php echo $key->count ?></span>
										</span>
									</a>
								</li>




								<?php

								$i++;
								endforeach;

							?>
<!-- 							<li><a class="ani-02" href="#">Academias</a></li>
							<li><a class="ani-02" href="#">Açougues</a></li>
							<li><a class="ani-02" href="#">Agências de veículos</a></li>
							<li><a class="ani-02" href="#">Auto Escolas</a></li>
							<li><a class="ani-02" href="#">Auto Peças</a></li>
							<li><a class="ani-02" href="#">Clínicas</a></li>
							<li><a class="ani-02" href="#">Construtoras</a></li>
						</div>
						<div class="col-lg-4">
							<li><a class="ani-02" href="#">Drogarias</a></li>
							<li><a class="ani-02" href="#">Escolas</a></li>
							<li><a class="ani-02" href="#">Gráficas</a></li>
							<li><a class="ani-02" href="#">Hipermercados</a></li>
							<li><a class="ani-02" href="#">Hotéis</a></li>
							<li><a class="ani-02" href="#">Imobiliárias</a></li>
							<li><a class="ani-02" href="#">Materiais para Construção</a></li>
						</div>
						<div class="col-lg-4">
							<li><a class="ani-02" href="#">Molduras</a></li>
							<li><a class="ani-02" href="#">Panificadoras</a></li>
							<li><a class="ani-02" href="#">Pizzarias</a></li>
							<li><a class="ani-02" href="#">Restaurantes</a></li>
							<li><a class="ani-02" href="#">Oficinas Mecânicas</a></li>
							<li><a class="ani-02" href="#">Clínicas Odontológica</a></li>
 -->						
						</div>
					</div>
				</ul>
			</div>
		</div>
	</section>

	<section id="o-que-e">
		<div class="container">
			<div class="row">
				<div id="texto" class="col-lg-4">
					<h2>O que é o <span>Onde Encontrar</span></h2>
					<p>Somos um guia prático e de fácil manuseio que oferece acesso rápido a produtos e serviços, de todo o <strong>Distrito Federal</strong>, organizados por categorias e filtros personalizados.</p>
					<a class="ani-02" href="#">Conheça Mais</a>
				</div>
				<ul id="vantagens">
					<li id="empresario" class="col-lg-3 col-lg-offset-1">
						<figure>
							<img src="<?php bloginfo('template_url') ?>/img/revista-influencia-ico-empresario-ganha.png" alt="">
						</figure>
						<h3>O Empresário ganha</h3>
						<p>A visibilidade do negócio e a oportunidade de interação do cliente com a marca são aumentadas.</p>
					</li>
					<li id="consumidor" class="col-lg-3 col-lg-offset-1">
						<figure>
							<img src="<?php bloginfo('template_url') ?>/img/revista-influencia-ico-consumidor-ganha.png" alt="">
						</figure>
						<h3>O consumidor ganha</h3>
						<p>Com a interatividade do Onde Encontrar, fica muito mais fácil achar o serviço / produto procurado.</p>
					</li>
				</ul>
			</div>
		</div>
	</section>

	<section id="por-que-anunciar">
		<div class="container">
			<div class="row">
				<div id="texto" class="col-lg-12">
					<h2>Porque <span>anunciar</span></h2>
					<p class="hidden">A presença online, hoje em dia, é a forma mais eficaz e vantajosa de se alcançar o público alvo do seu negócio. E o <strong>Onde Encontrar</strong> é projetado para que os clientes que chegam até sua marca já seja um público direcionado pra sua empresa, aumentando a conversão de cientes.</p>
				</div>
				<ul id="razoes" class="col-lg-12">
					<div class="row">
						<div class="col-lg-6">
							<li>
								<figure>
									<img src="<?php bloginfo('template_url')?>/img/revista-influencia-icon-razoes-visibilidade.png" alt="Presença Online">
								</figure>
								<h3>Maior visibilidade</h3>
								<p>Ter sua empresa disponível em sites de busca (<strong>Google</strong>, <strong>Yahoo</strong>, etc) ao alcance do mundo inteiro, ou seja, muito mais divulgação com baixo investimento.</p>
							</li>
							<li>
								<figure>
									<img src="<?php bloginfo('template_url')?>/img/revista-influencia-icon-razoes-feedback.png" alt="Mais Clientes">
								</figure>
								<h3>Obter Feedbacks</h3>
								<p>Saber o quanto seus clientes estão satisfeitos com seus produtos ou serviços através da nossa <strong>Ferramenta de Avaliação</strong>.</p>
							</li>
						</div>
						<div class="col-lg-6">
							<li>
								<figure>
									<img src="<?php bloginfo('template_url')?>/img/revista-influencia-icon-razoes-relacionamento.png" alt="Maior Visibilidade">
								</figure>
								<h3>Proximidade com seu público</h3>
								<p>Oportunidade de se relacionar de forma mais direta, através do perfil <strong>Onde Encontrar</strong>, com quem se interessa por seus produtos / serviços.</p>
							</li>
							<li>
								<figure>
									<img src="<?php bloginfo('template_url')?>/img/revista-influencia-icon-razoes-anuncios.png" alt="Maior Alcance">
								</figure>
								<h3>Anúncios segmentados</h3>
								<p>Acesso facilitado ao nosso banco de dados de clientes selecionados e segmentados por ramo de interesse para divulgação de novidades e promoções.</p>
							</li>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

</section>
