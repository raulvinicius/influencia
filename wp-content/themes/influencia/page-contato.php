<?php get_header(); ?>

<section class="contato pagina container-fluid ani-02">

	<div class="container">
		<div class="row">
			
			<form class="js col-lg-6 col-lg-offset-3" action="<?php bloginfo('url')?>/envia-email" method="POST" role="form">
				<legend>Fale com a gente</legend>
			
				<div class="form-group" id="assunto">

					<label for="input-ssnt1" class="ani-04" id="checked">Fale com a gente</label><!-- <label for="input-ssnt2" class="ani-04">Peça um orçamento</label> -->

					<input type="radio" name="ssnt" id="input-ssnt1" value="contato" checked="checked" />
					<input type="radio" name="ssnt" id="input-ssnt2" value="mediakit" />
				</div>

				<p>Ficaremos contentes em responder qualquer dúvida, assim como receber sugestões ou aplausos para saber onde podemos melhorar e em que pontos estamos indo bem.</p>
				<p>Fique a vontade e deixe sua mensagem.</p>

				<div class="form-group" id="dados">
					<div id="campo-nome" class="linha">
						<label class="" for="input-nm">Nome</label>
						<div id="w-input" class="required">
							<input type="text" class=" required" id="input-nm" name="nm">
						</div>
					</div>
					<div id="campo-email" class="linha">
						<label class="" for="input-ml">E-mail</label>
						<div id="w-input" class="required">
							<input type="text" class=" required" id="input-ml" name="ml">
						</div>
					</div>
					<div id="campo-telefone" class="linha">
						<label class="" for="input-tlfn">Telefone</label>
						<div id="w-input">
							<input type="text" class="telefone" id="input-tlfn" name="tlfn"/>
						</div>
					</div>
					<div id="campo-mensagem" class="linha">
						<label class="" for="input-mnsg">Mensagem</label>
						<div id="w-input" class="required">
							<textarea name="mnsg" id="input-mnsg" class="auto-resize required"></textarea>
						</div>
					</div>
					<div class="clearfix"></div>	
				</div>
			
				<input type="submit" class="ani-04 influencia-bt red" value="Enviar minha Mensagem">

				<div id="notificacoes">
					
					<div id="processando" class="ani-04">

						<span>Enviando seu e-mail...</span>
						<div>
							<img src="<?php bloginfo('template_url') ?>/img/revista-influencia-loading.gif">
						</div>
						
					</div>

					<div id="sucesso" class="ani-04">

						<span><span id="green">Obrigado pelo contato.</span> Seu e-mail foi enviado, responderemos em breve.</span>
						<button type="button" id="fecha-notificacao" class="influencia-bt red">OK</button>
						
					</div>

					<div id="erro" class="ani-04">

						<span>Houve um erro ao enviar seu e-mail, por favor, tente novamente.</span>
						<button type="button" id="fecha-notificacao" class="influencia-bt red">OK</button>
						
					</div>

				</div>

			</form>

		</div>
	</div>

</section>

<?php get_footer(); ?>