<!-- 


FALTA
 - trazer os funcionários da empresa que foi escolhida no select box
 - gerar uma página para funcionar como impressão



 -->


 <?php 

 // var_dump(get_field('funcionarios', 545) );

  ?>


<div id="imprimir-cartoes">

	<?php $templateUrl = get_bloginfo('template_url'); ?>

	<style type="text/css">

	@media print {

		*
		{
			float: none !important;
		}

		*, *:before, *:after
		{
		    -webkit-box-sizing: border-box;
		    -moz-box-sizing: border-box;
		    box-sizing: border-box;
		}


		h1,
		.update-nag,
		#adminmenumain,
		#wpfooter,
		#campo-empresa,
		#funcionarios #cabecalho,
		#alerta,
		input
		{
			display: none !important;
			width: 0 !important;
			height: 0 !important;
			margin: 0 !important;
			padding: 0 !important;
		}

		html.wp-toolbar
		{
			padding-top: 0 !important;
		}

		#wpcontent,
		#wpfooter,
		.wrap
		{
			margin: 0 !important;
			padding: 0 !important;
		}

		#funcionarios
		{
			margin: 0;
			padding: 0;
			border: none;
		}

		#funcionarios ul
		{
			margin: 0;
			padding: 0;
		}

		#funcionarios ul#lista-funcionarios li
		{
			display: none;
			width: 325px;
			height: 205px;
			margin: 0;
			padding: 0;
			position: relative;
			page-break-after: always;
			break-after: always;
		}

		#funcionarios ul#lista-funcionarios li.ckd
		{
			display: block;
		}

		#funcionarios ul#lista-funcionarios li label
		{
			text-align: left;
			position: absolute;
			bottom: 35px;
			font-family: Arial, sans-serif;
			font-size: 13px;
			padding: 0;
			margin: 0;
			margin-top: 92px;
			padding-left: 25px;
			padding-right: 25px;
			width: 100%;
		}

		#funcionarios ul#lista-funcionarios li label p
		{
			margin: 0;
			display: block;
			line-height: 1.2;
		}

		#funcionarios ul#lista-funcionarios li label .extra-info
		{
			display: inline;
		}

	}

	.ani-02
	{
	    -webkit-transition: 0.2s all cubic-bezier(0.34, 0, 0, 1);
	    -moz-transition: 0.2s all cubic-bezier(0.34, 0, 0, 1);
	    -o-transition: 0.2s all cubic-bezier(0.34, 0, 0, 1);
	    -ms-transition: 0.2s all cubic-bezier(0.34, 0, 0, 1);
	    transition: 0.2s all cubic-bezier(0.34, 0, 0, 1);
	}

	.ani-04
	{
	    -webkit-transition: 0.4s all cubic-bezier(0.34, 0, 0, 1);
	    -moz-transition: 0.4s all cubic-bezier(0.34, 0, 0, 1);
	    -o-transition: 0.4s all cubic-bezier(0.34, 0, 0, 1);
	    -ms-transition: 0.4s all cubic-bezier(0.34, 0, 0, 1);
	    transition: 0.4s all cubic-bezier(0.34, 0, 0, 1);
	}

	.ani-06
	{
	    -webkit-transition: 0.6s all cubic-bezier(0.34, 0, 0, 1);
	    -moz-transition: 0.6s all cubic-bezier(0.34, 0, 0, 1);
	    -o-transition: 0.6s all cubic-bezier(0.34, 0, 0, 1);
	    -ms-transition: 0.6s all cubic-bezier(0.34, 0, 0, 1);
	    transition: 0.6s all cubic-bezier(0.34, 0, 0, 1);
	}

	.clearfix:before,
	.clearfix:after
	{
		display: table;
		content: " ";
	}
	.clearfix:after
	{
		clear: both;
	}


	.grupo
	{
		background: white;
		margin-top: 24px;
		border-radius: 4px;
		border: 1px solid #ccc;
		padding: 8px;
		margin-bottom: 24px;
	}

	label,
	#loading
	{
		display: block;
		vertical-align: bottom;
		margin: 8px 0;
	}

	#loading
	{
		display: block;
		display: none;
		margin: 16px 0;
		text-align: center;
		margin-left: 16px;
	}

	label p
	{
		margin-bottom: 10px;
		margin-top: 10px;
	}

	#campo-empresa label select
	{
		width: 300px;
		padding: 8px;
		height: auto;
		outline: none;
		color: black;
	}

	#funcionarios
	{
		display: none;
	}

	#funcionarios #vazio
	{
		padding: 8px;
		font-style: italic;
	}

	#funcionarios ul li
	{
		width: 24%;
		display: inline-block;
		margin: 0;
	}

	#funcionarios ul li label
	{
		margin: 8px;
		padding: 16px 8px;
	}

	#funcionarios ul li.ckd label
	{
		background: #eee;
	}

	#funcionarios ul li.ckd label:hover
	{
		background: #ccc;
	}

	#funcionarios ul li label:hover
	{
		background: #ddd;
	}

	#funcionarios ul li label .extra-info
	{
		display: none;
	}

	#funcionarios ul li input
	{
		margin-left: 8px;
		/* margin-right: 16px; */
		display: inline-block;
		position: relative;
		margin-left: -32px;
		left: 40px;
		vertical-align: middle;
	}

	#funcionarios ul li label p
	{
		display: inline-block;
		margin-left: 56px;
		vertical-align: middle;
	}

	#cabecalho
	{
		border-bottom: 1px solid #ddd;
		margin: 0 8px;
		padding-bottom: 16px;
	}

	#cabecalho .sessao
	{
		padding: 8px 16px 8px 0;
		display: inline-block;
	}

	#cabecalho .sessao:first-child label
	{
		border-right: 1px solid #ddd;
		padding-right: 16px;
	}

	#cabecalho .sessao label,
	#cabecalho .sessao #wrap-button
	{
		display: inline-block;
	}

	#cabecalho .sessao label input,
	#cabecalho .sessao #wrap-button
	{
		padding: 8px;
	}

	#cabecalho .sessao#acoes label
	{
		padding: 10px 0;
		margin-right: 32px;
	}

	#cabecalho .sessao #wrap-button
	{
		vertical-align: bottom;
		padding: 0;
		margin: 8px 0;
	}

	#cabecalho .sessao #wrap-button button
	{
		text-transform: uppercase;
		color: #666;
		font-size: 12px;
		font-weight: bolder;
		padding: 8px 8px;
		border-radius: 4px;
		box-shadow: none;
		border: 1px solid #bbb;
		background: #ddd;
		outline: none;
	}

	#cabecalho .sessao #wrap-button button:hover
	{
		background: #bbb;
	}

	label[for="pesquisa"]
	{
		position: relative;
	}

	#cabecalho .sessao label input#pesquisa
	{
		padding-right: 40px;
	}

	#alerta
	{
		display: none;
		margin: 8px;
		padding: 8px;
		background: #E94C1E;
		border-radius: 4px;
	}

	#alerta p
	{
		color: white;
		margin: 8px;
		font-style: italic;
		text-shadow: 1px 1px 0px #c81d22;
	}

	.bt-limpa-pesquisa
	{
		width: 40px;
		height: 38px;
		position: absolute;
		bottom: 0;
		right: 16px;
		border: none;
		outline: none;
		background: url(<?php echo $templateUrl; ?>/img/revista-influencia-bt-limpa-campo.gif) no-repeat center top;
		z-index: 100;
		display: none;
	}

	.bt-limpa-pesquisa:hover
	{
		background-position: center bottom;
	}

	</style>

	<div id="campo-empresa" class="grupo">

		<form action="<?php bloginfo('url') ?>/busca-empresa-cartao-saude">
			<label for="empresa">
				<p>Escolha uma empresa</p>
				<select id="empresa" name="empresa">
					<option value=""></option>
					<?php

					$args = array(
						'orderby' => array(
							'title' => 'ASC',
						),
					);
					$empresas = get_post_by_type('empresas', 'ASC', -1, NULL, NULL, NULL, $args);


					while ( $empresas->have_posts() )
					{
						$empresas->the_post();

						echo '<option value="' . get_the_ID() . '">' . get_the_title() . '</option>';

					}

					?>
				</select>
			</label>

			<span id="loading">
				<img src="<?php bloginfo('template_url') ?>/img/revista-influencia-loading-loop.gif">
			</span>
		</form>

	</div>

	<div id="funcionarios" class="grupo">

		<div id="alerta">

			<p>Atenção:</p>
			
		</div>

		<div id="cabecalho">

			<span id="sessao-pesquisa" class="sessao">
				<label for="pesquisa">
					<p>Pesquisar por</p>
					<input id="pesquisa" name="pesquisa" type="text">
					<button class="bt-limpa-pesquisa"></button>
				</label>
			</span>
			<span class="sessao" id="acoes">
				<label for="todos">
					<input id="todos" name="todos" type="checkbox" checked> Selecionar/Desselecionar todos
				</label>

				<span id="wrap-button">
					<button id="inverte" class="ani-04"> Inverter seleção </button>
				</span>
			</span>
			
		</div>
		
		<ul id="lista-funcionarios">
	
			

		</ul>

	</div>


    <script src="<?php bloginfo('template_url') ?>/js/jquery.form.js"></script>

	<script type="text/javascript">
	
		//mostra os funcionários com o nome parecido com o que está sendo digitado
		jQuery('#empresa')
			.focus();
		jQuery('#pesquisa').on('input', function()
		{
			jQuery('#funcionarios ul li').hide();
			jQuery('#funcionarios ul li p:Contains(' + jQuery(this).val() + ')')
				.closest('li')
				.show();

			if( jQuery(this).val() != '' )
			{
				jQuery(this)
					.closest('label')
					.find('.bt-limpa-pesquisa')
					.show();
			}
			else
			{
				jQuery(this)
					.closest('label')
					.find('.bt-limpa-pesquisa')
					.hide();
			}
		})

		//botão que limpa campo pesquisa
		jQuery('.bt-limpa-pesquisa').on('click', function()
		{
			jQuery(this)
				.closest('label')
				.find('input')
				.val('')
				.focus();

			jQuery(this)
				.closest('label')
				.find('input')
				.trigger('input');
		});
		

		//fundo dos funcionários muda conforme status do checkbox
		jQuery('body').on('change', '#funcionarios ul li input', function()
		{
			atualizaClasseCheckFuncionarios();
		})

		//ação que acontece ao escolher uma empresa no select box
		jQuery('#empresa').on('change', function()
		{

			if( jQuery(this).val() != '' )
			{
				jQuery(this)
					.closest('form')
					.ajaxSubmit({
						type: 'post',
						dataType: 'json',
						success: mostraFuncionarios
					});

				mostraLoading();

			}
		})

		//comportamento do checkbox selecionar/deselecionar todos
		jQuery('#todos').on('change', function()
		{
			jQuery('#funcionarios input').attr('checked', jQuery(this).prop('checked'))
			atualizaClasseCheckFuncionarios()
		})

		//comportamento do checkbox inverter seleção
		jQuery('#inverte').on('click', function()
		{
			jQuery('#funcionarios #lista-funcionarios input').each(function(index, el) 
			{
				jQuery(this).attr('checked', !jQuery(this).prop('checked'))
			});
			atualizaClasseCheckFuncionarios()
		})


		//classe usada para atualizar a cor de cada funcionário baseado em seu checkbox
		function atualizaClasseCheckFuncionarios ()
		{
			jQuery('#funcionarios input')
				.closest('li')
				.removeClass('ckd');

			jQuery('#funcionarios input:checked')
				.closest('li')
				.addClass('ckd');
		}

		jQuery.expr[':'].Contains = function(a, i, m) {
		  return jQuery(a).text().toUpperCase()
		      .indexOf(m[3].toUpperCase()) >= 0;
		};

		//mostra os funcionários ao carregar o ajaxsubmit
		function mostraFuncionarios (obj)
		{

			jQuery('ul#lista-funcionarios')
				.html('<p id="vazio">Ainda não há funcionários desta empresa cadastrados no Cartão Saúde</p>');

			if(obj.funcionarios && jQuery.type(obj) == 'object' && obj.funcionarios.length > 0 )
			{

				jQuery('ul#lista-funcionarios')
					.html('');

				for (var i = 0; i < obj.funcionarios.length; i++)
				{

					jQuery('ul#lista-funcionarios')
						.append('<li class="ckd"><label for="' + obj.funcionarios[i].slug + '" class="ani-04"><input id="' + obj.funcionarios[i].slug + '" name="' + obj.funcionarios[i].slug + '" type="checkbox" value="' + obj.funcionarios[i].nome + '" checked><span class="extra-info"><p><strong>' + obj.empresa + '</strong><br/><br/></p></span><p>' + obj.funcionarios[i].nome + '</p> <span class="extra-info"> <p>CPF: ' + obj.funcionarios[i].cpf + '</p> <p>Val.: ' + obj.validade + '</p> </span> </label></li>')

				};

				//erro
				someLoading(true);
			}
			else
			{
				//erro
				someLoading();
			}



			//verifica se a data de validade está chegando
			var meses = {
				'Jan': 0,
				'Fev': 1,
				'Mar': 2,
				'Abr': 3,
				'Mai': 4,
				'Jun': 5,
				'Jul': 6,
				'Ago': 7,
				'Set': 8,
				'Out': 9,
				'Nov': 10,
				'Dez': 11,
			}
			var hoje = new Date();
			var validade = obj.validade;
			validade = validade.split(" / ");
			validade = new Date(validade[1], meses[ validade[0] ], 1);

			if (hoje > new Date(validade.getFullYear(), validade.getMonth() - 2, 2))
			{
				var tempoRestante = new Date(validade - hoje);
				tempoRestante = Math.floor( tempoRestante/1000/60/60/24 );
				alertaValidade( tempoRestante );
			};

			/////////////


		}

		//mostra a animação de loading, e esconde os funcionários
		//enquanto busca no banco
		function mostraLoading()
		{
			jQuery('#campo-empresa label')
				.hide()
				
			jQuery('#campo-empresa #loading')
				.css('display', 'block');

			jQuery('#funcionarios #cabecalho').hide();
			jQuery('#funcionarios #alerta').hide();
			jQuery('#funcionarios').hide();
		}

		//esconde a animação de loading e mostra os funcionários
		//e se "elFuncionarios" for true ele mostra o cabeçalho da lista 
		function someLoading( elFuncionarios )
		{

			if(elFuncionarios == undefined)
				elFuncionarios = false;

			jQuery('#campo-empresa label')
				.show();

			jQuery('#campo-empresa #loading')
				.css('display', 'none');

			if(elFuncionarios)
			{
				jQuery('#funcionarios #cabecalho').show();
			}

			jQuery('#funcionarios').show();

		}

		//mostra alerta de validad do Cartão
		function alertaValidade( tempoRestante )
		{

			if( tempoRestante > 30 )
			{
				jQuery('#alerta p').html('<strong>Atenção:</strong> falta <strong>um mês</strong> e <strong>' + tempoRestante%30 + '</strong> dias para o fim da validade desses cartões.')
			}
			else if( tempoRestante > 1 )
			{
				jQuery('#alerta p').html('<strong>Atenção:</strong> faltam <strong>' + tempoRestante + '</strong> dias para o fim da validade desses cartões.')
			}
			else if ( tempoRestante == 1)
			{
				jQuery('#alerta p').html('<strong>Atenção:</strong> esses cartões perdem a validade <strong>amanhã</strong>.')
			}
			else if ( tempoRestante == 0)
			{
				jQuery('#alerta p').html('<strong>Atenção:</strong> esses cartões perdem a validade <strong>hoje</strong>.')
			}
			else if ( tempoRestante == -1)
			{
				jQuery('#alerta p').html('<strong>Atenção:</strong> esses cartões perderam a validade <strong>ontem</strong>.')
			}
			else if ( tempoRestante < 1)
			{
				jQuery('#alerta p').html('<strong>Atenção:</strong> esses cartões não são válidos há <strong>' + Math.abs( tempoRestante ) + '</strong> dias.')
			}

			jQuery('#alerta')
				.css('display', 'block');

		}

	</script>


</div>