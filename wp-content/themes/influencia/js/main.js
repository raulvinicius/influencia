$(document).ready(function() {


	$( window ).scroll(function() 
	{
		setTimeout(showInAnimation,400);
		changeMenu();
	});
	$( window ).trigger('scroll');


	$( window ).resize(function(e) 
	{
		//do something
	});
	$( window ).trigger('resize');


	initializeMap();
	hashchange();


	//-----------------MASONRY-----------------//

	var grid = $('.grid').masonry({
	  // options
	  itemSelector: '.grid-item',
	  columnWidth: '.col-xs-3'
	});

	function callMasonry ()
	{
		grid.masonry();
	}
	
	setInterval( callMasonry, 2000 );

	//-----------------MASONRY-----------------//




	//-----------------ACTIVE CURRENT PAGE/SUBPAGE-----------------//

	activedPage();

	//-----------------ACTIVE CURRENT PAGE/SUBPAGE-----------------//




	$( 'body' ).on( 'click', 'button.dead', function(){ return false; } );
	
	if( $( '#map-canvas' ).length > 0 )
	{
		initializeMap();
	}


	$('.segredo').remove();


	//incluindo o nono dígito
	var maskBehavior = function (val) {
		return val.replace(/\D/g, '').length === 11 ? '00 00000 0000' : '00 0000 00009';
	}

	options = {
		onKeyPress: function(val, e, field, options) {
			field.mask(maskBehavior.apply({}, arguments), options);
		},
		placeholder: "__ ____ ____"
	};
	 
	$('.telefone').mask(maskBehavior, options);

	$( '.data' ).mask('00/00/0000', {placeholder: "__/__/____"});

	$('form.js').submit(function(e){return false;e.preventDefault();});

	$('form.js input[type="submit"]').bind('click', 
		function()
		{
			$(this).closest('form').validate({
				submitHandler: function(form)
				{
					$(form).find('#notificacoes')
						.css('pointer-events', 'auto');

					$(form).find('#notificacoes #processando')
						.css('margin-left', '0');

					$(form).find('input[type=submit]')
						.addClass('disabled')
						.attr('disabled', 'disabled');

					$(form).ajaxSubmit({
						type: 'post',
						success: contatoOk
					});

				}, 
				rules: {
					nm: {
						required: true
					},
					ml: {
						email: true,
						required: true
					},
					msgm: {
						required: true
					}
				},
				messages: {
					nm: {
						required: 'Informe seu nome'
					},
					ml: {
						email: 'Este e-mail parece estar incorreto',
						required: 'Precisamos saber seu e-mail'
					},
					mnsg: {
						required: 'Deixe sua mensagem'
					}
				}
			});
		}
	)







	$('.alert button').bind('click', function()
	{
		$(this).closest('.alert').hide();
	})




	//-----------------AUTO COMPLETAR-----------------//

	$('.onde-encontrar #busca form #autocompletar').hide();
	$('.onde-encontrar #busca form #autocompletar li').hide();
	$('.onde-encontrar #busca form #autocompletar').removeClass('hidden');

	$('.onde-encontrar #busca form #termo').on('input', function(e)
	{
		autoCompletarBuscaOEShow(e);
	})

	// $('.onde-encontrar #busca form #termo').on('focusout', function(e)
	// {
	// 	$('.onde-encontrar #busca form #autocompletar').hide();
	// 	$('.onde-encontrar #busca form #autocompletar li').hide();
	// });

	$('.onde-encontrar #busca form #termo').on('focusin', function(e)
	{
		autoCompletarBuscaOEShow(e);
	});

	$('.onde-encontrar #busca form #autocompletar #categoria li').on('click', function()
	{
		$(this).closest('form').find('#termo').val($(this).text());
	});

	//-----------------AUTO COMPLETAR-----------------//





	//-----------------FORM BUSCA ONDE ENCONTRAR-----------------//

	if( $('#fm-onde-encontrar').length > 0 )
	{

		var vRegiaoBusca = $('#fm-onde-encontrar #regiao').attr('data-s');

		if( vRegiaoBusca )
		{
			$('#fm-onde-encontrar #regiao option[value="' + vRegiaoBusca + '"]').attr('selected', 'selected')
		}
		else
		{
			$('#fm-onde-encontrar #regiao option[value=""]').attr('selected', 'selected')
		}

		lockFormBuscaOE();
		$('#fm-onde-encontrar #regiao').on('change', function(e) 
		{
			lockFormBuscaOE();
		});

		$('#fm-onde-encontrar #termo').on('input', function(e) 
		{
			lockFormBuscaOE();
		});
	}

	//-----------------FORM BUSCA ONDE ENCONTRAR-----------------//




	//-----------------CAROUSEL HOME-----------------//

	preInitIntervalCasesHome();

	if ( $('.home #novidades ul li').length > 1 ) 
	{
		initIntervalCasesHome();
	};

	$('.home #novidades ul li:first-child').addClass('highlight')
		.css('z-index', '1');

	$('.home #novidades button#seta-esq').on('click', function()
	{
		passaCaseHome('tras');
		clearInterval(intervalCase);
		initIntervalCasesHome();
	})
	$('.home #novidades button#seta-dir').on('click', function()
	{
		passaCaseHome('frente');
		clearInterval(intervalCase);
		initIntervalCasesHome();
	})


	//-----------------CAROUSEL HOME-----------------//




	//-----------------ONDE ENCONTRAR-----------------//

	$('.onde-encontrar form input[type="submit"]').on('click', function() 
	{
		window.location.replace("http://localhost/influencia/busca");
	});










	//BUSCA CATEGORIAS/////////////
	$('.busca aside #wrap-busca-rapida input').on('input', function(e)
	{
		if($(this).val() != '')
		{
			$(this).closest('section').find('li').hide();
			$(this).closest('section').find('li:containsIN('+ $(this).val() +')').show();
			$(this).closest('section').find('#limpar').show();
		}
		else
		{
			$(this).closest('section').find('li').show();
		}
	});

	$('.busca aside #wrap-busca-rapida #limpar').on('click', function(e)
	{
		$(this).hide();
		$(this).closest('section').find('input').val('');
		$(this).closest('section').find('li').show();
	});
	//-----------------ONDE ENCONTRAR-----------------//




	//-----------------CONTATO-----------------//

	$('form #notificacoes #fecha-notificacao').on('click', function() 
	{
		console.log($(this))
		$(this).closest('#notificacoes').find('#processando')
			.css('margin-left', '100%');
		$(this).closest('#notificacoes').find('#sucesso')
			.css('margin-left', '100%');
		$(this).closest('#notificacoes').find('#erro')
			.css('margin-left', '100%');
		$(this).closest('#notificacoes').css('pointer-events', 'none');
		$(this).closest('form').find('input[type="submit"]')
			.removeAttr('disabled')
			.removeClass('disabled');
	});

	$('.contato form #assunto label').on('click', function(){
		$('.contato form #assunto input').removeAttr('checked');
		$('.contato form #assunto label').attr({
			id: ''
		});
		$(this).attr('id', 'checked');
		$('.contato form #assunto label[for="' + $(this).attr('for') + '"]').attr('checked', 'checked')
	})

	$('.auto-resize').on('keydown', function ()
	{
		if( $(this)[0].scrollHeight < 300 )
		{
			$(this).css('height', $(this)[0].scrollHeight + 'px');
		}
	})

	$('.auto-resize').on('keyup', function ()
	{
		$(this).trigger('keydown')
	})


	//-----------------CONTATO-----------------//








	//-----------------TOGGLE SUBMENU-----------------//


	$('nav.fechado #toggle-menu').bind('click', function(e) 
	{
		if ( $(this).closest('.fechado').length > 0 )
		{
			$(this)
				.closest('nav')
				.removeClass('fechado')
				.addClass('aberto');
				showMenu(e);
		}
		else
		{
			$(this)
				.closest('nav')
				.removeClass('aberto')
				.addClass('fechado');
			$("#" + $(this).attr('data-target')).hide();
		}
	});


	//-----------------TOGGLE SUBMENU-----------------//





});

function autoCompletarBuscaOEShow (e)
{
	// if($(e.target).closest('form').find('#termo').val() != '')
	// {
	// 	$(e.target).closest('form').find('#autocompletar').show();
	// 	$('.onde-encontrar #busca form #autocompletar li').hide();
	// 	$('.onde-encontrar #busca form #autocompletar li:containsIN('+ $(e.target).closest('form').find('#termo').val() +')').show();
	// }
	// else
	// {
	// 	$('.onde-encontrar #busca form #autocompletar li').hide();
	// }

	// $('body').on('click', function (e)
	// {
	// 	if( $(e.target).attr('id') != 'autocompletar' && $(e.target).closest('#autocompletar').attr('id') != 'autocompletar' && $(e.target).attr('id') != 'termo' )
	// 	{
	// 		e.stopPropagation();
	// 		$(this).off(e);
	// 		autoCompletarBuscaOEHide();
	// 	}
	// });

}

function showMenu (ev)
{
	var toggleTarget = $(ev.target).attr('data-target');
	var idTrigger = $(ev.target).attr('id');

	$(ev.target)
		.closest('nav')
		.find("#" + toggleTarget)
		.removeClass('hidden')
		.show();

	$('body').on('click', function (e)
	{
		if( $(e.target).attr('id') != idTrigger )
		{
			e.stopPropagation();
			$(this).off(e);
			$(ev.target)
				.closest('nav')
				.removeClass('aberto')
				.addClass('fechado')
				.find('#' + toggleTarget)
				.hide();
		}
	});
}

function autoCompletarBuscaOEHide ()
{
	$('.onde-encontrar #busca form #autocompletar').hide();
	$('.onde-encontrar #busca form #autocompletar li').hide();
}

var iCaseHome = 0,
	qtdCasesHome = $('.home #novidades ul li').length,
	timeCasesHome = 7000,
	espacoContadorCasesHome = $('.home #novidades #contador').height(),
	intervalCase;
	
function preInitIntervalCasesHome ()
{
	$('.home #novidades #contador').css('width', qtdCasesHome*espacoContadorCasesHome + 'px');
	$('.home #novidades #contador #marca')
	.css({
		'left': ( (iCaseHome * espacoContadorCasesHome) + 3 ) + 'px',
		'right': ( (qtdCasesHome * espacoContadorCasesHome) - 3 - ( iCaseHome * espacoContadorCasesHome ) - 10 ) + 'px'
	})
}

function initIntervalCasesHome ()
{
	intervalCase = setInterval(function()
	{
		passaCaseHome('frente');
	}, timeCasesHome);
}

function passaCaseHome (direcao)
{
	$('.home #novidades ul li.highlight').removeClass('highlight');

	$('.home #novidades button').blur();

	if(direcao == 'frente')
	{
		if(iCaseHome < qtdCasesHome - 1)
		{
			iCaseHome++;
		}
		else
		{
			iCaseHome = 0;
		}
	}
	else
	{
		if(iCaseHome > 0)
		{
			iCaseHome--;
		}
		else
		{
			iCaseHome = qtdCasesHome - 1;
		}
	}

	//CONTADOR

	$('.home #novidades #contador').css('width', qtdCasesHome*espacoContadorCasesHome + 'px');
	$('.home #novidades #contador #marca')
	.css({
		'left': ( (iCaseHome * espacoContadorCasesHome) + 3 ) + 'px',
		'right': ( (qtdCasesHome * espacoContadorCasesHome) - 3 - ( iCaseHome * espacoContadorCasesHome ) - 10 ) + 'px'
	})

	//BG HOME

	// $('.home #novidades ul').css( 'background', '#' + $('.home #novidades ul li:nth-child(' + ( iCaseHome + 1) + ')').attr('data-b') );

	setTimeout(function ()
	{

		$('.home #novidades ul li').css('z-index', '-1');
		$('.home #novidades ul li:nth-child(' + ( iCaseHome + 1) + ')')
			.addClass('highlight')
			.css('z-index', '1');
	}, 300)

}

function contatoOk (data, data1, data2, data3)
{

	if( data == 'sucesso')
	{
		$('.contato form #notificacoes #sucesso')
			.css('margin-left', '0');

		$('.contato form')[0].reset();
	}
	else
	{
		$('.contato form #notificacoes #erro')
			.css('margin-left', '0');
	}

}

function URLize (s) 
{
    var r=s.toLowerCase();
    r = r.replace(new RegExp(/\s/g),"");
    r = r.replace(new RegExp(/[àáâãäå]/g),"a");
    r = r.replace(new RegExp(/æ/g),"ae");
    r = r.replace(new RegExp(/ç/g),"c");
    r = r.replace(new RegExp(/[èéêë]/g),"e");
    r = r.replace(new RegExp(/[ìíîï]/g),"i");
    r = r.replace(new RegExp(/ñ/g),"n");                
    r = r.replace(new RegExp(/[òóôõö]/g),"o");
    r = r.replace(new RegExp(/œ/g),"oe");
    r = r.replace(new RegExp(/[ùúûü]/g),"u");
    r = r.replace(new RegExp(/[ýÿ]/g),"y");
    r = r.replace(new RegExp(/\W/g),"");
    return r;
};

function pluralize (s, p, n)
{
	if( n != 1)
	{
		return p;
	}
	else
	{
		return s;
	}
}

function showInAnimation () 
{

	$('.hided').each(function()
	{
		if( $( window ).scrollTop() + ( $( window ).height() * 0.8 ) > $(this).offset().top - 300 )
		{
			$(this).addClass('appeared').removeClass('hided');
		}
	})
}

$.extend($.expr[":"], {
	"containsIN": function(elem, i, match, array) {
		return (elem.textContent || elem.innerText || "").toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
	}
});

function initializeMap()
{

	if( $('.empresa #infos #endereco').length > 0)
	{

		var geocoder = new google.maps.Geocoder();

		var address = $('.empresa #infos #endereco').text() + ', Brasil';
		var myLatLgn = new google.maps.LatLng( -15.7217621,-47.9382362 );

		var mapCanvas = document.getElementById( 'map-perfil-empresa' );
		var mapOptions = {
			center: myLatLgn,
			zoom: 16,
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			backgroundColor: 'd5d5d5',
			scrollwheel: false,
			draggable: false,
			disableDoubleClickZoom: true,
			disableDefaultUI: true,
			streetViewControl: false,

			zoomControl: false,
			mapTypeControl: false,
			scaleControl: false,
			rotateControl: false
		}
		var map = new google.maps.Map( mapCanvas, mapOptions );

		if (geocoder) {
		      geocoder.geocode( { 'address': address}, function(results, status) {
		        if (status == google.maps.GeocoderStatus.OK) {
		          if (status != google.maps.GeocoderStatus.ZERO_RESULTS) {
		          map.setCenter(results[0].geometry.location);

		            var infowindow = new google.maps.InfoWindow(
		                { content: '<b>'+address+'</b>',
		                  size: new google.maps.Size(150,50)
		                });

		            var marker = new google.maps.Marker({
		                position: results[0].geometry.location,
		                map: map, 
		                title:address
		            }); 
		            google.maps.event.addListener(marker, 'click', function() {
		                infowindow.open(map,marker);
		            });

		          } else {
		            alert("No results found");
		          }
		        } else {
		          alert("Geocode was not successful for the following reason: " + status);
		        }
		      });
		    }

		var marker = new google.maps.Marker({
		    position: myLatLgn,
		    map: map
		});

	}
}

function hashchange()
{
	activedPage();

	//-----------------MENU TERMOS E CONDICOES-----------------//


	if( window.location.href.indexOf('termos-e-condicoes') != -1 )
	{
		$('.cartao-saude #termos-e-condicoes').show();
	}
	else
	{
		$('.cartao-saude #termos-e-condicoes').hide();
	}

	//-----------------MENU TERMOS E CONDICOES-----------------//


}

function activedPage ()
{
	if( window.location.href.indexOf('localhost') )
	{
		var pages = window.location.href
					.split('localhost');
		pages.shift();
		pages.toString();
		pages = pages + "";
		pages = pages.substring(1).split('/');
		pages.shift();
		$('.current').removeClass('current');

		for (var i = 0; i < pages.length; i++) {

			console.log(pages[i])

			//verifica se o fragmento de url tem '#'
			if (pages[i].indexOf('#') < 0)
			{
				//se não tiver, compara normalmente
				$('nav a[href*="' + pages[i] + '"]').each(function()
				{
					if( $(this).attr('href').indexOf('#') < 0 )
					{
						$(this).addClass('current');
					}
				});
			}
			else
			{
				//se tiver, compara só com os elementos <a> que tenham '#' nos HREFs
				$('nav a[href*="' + pages[i] + '"]').each(function()
				{
					if( $(this).attr('href').indexOf('#') >= 0 )
					{
						$(this).addClass('current');
					}
				});
				
			}
		};
	}
}

function lockFormBuscaOE ()
{
	if ( $('#fm-onde-encontrar #regiao').val() == '' || $('#fm-onde-encontrar #termo').val() == '' || $('#fm-onde-encontrar #termo').val().length < 3)
	{
		$('#fm-onde-encontrar').addClass('locked').find('input[type="submit"]').attr('disabled', 'disabled');
	}
	else
	{
		$('#fm-onde-encontrar').removeClass('locked').find('input[type="submit"]').removeAttr('disabled');
	}
}

function changeMenu () 
{
	if( $(window).scrollTop() > 140 )
	{
		$('#menu').addClass('fixtop');
		$('.submenu').addClass('fixtop');
	}
	else
	{
		$('#menu').removeClass('fixtop');
		$('.submenu').removeClass('fixtop');
	}
}

function toggleMenu (menu)
{
}