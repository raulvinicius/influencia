					<div id="autocompletar" class="hidden">
						<div id="empresas">
							<span id="titulo">Empresas<span id="ico-loading"></span></span>
							<ul>
								<li>
									<a href="<?php bloginfo('url') ?>/onde-encontrar/">Padaria Pão de Sal</a>
								</li>
								<li>
									<a href="<?php bloginfo('url') ?>/onde-encontrar/">Expresso Pão</a>
								</li>
								<li>
									<a href="<?php bloginfo('url') ?>/onde-encontrar/">Flor da Serra Panificadora</a>
								</li>
								<li>
									<a href="<?php bloginfo('url') ?>/onde-encontrar/">Padaria Império dos Pães</a>
								</li>
								<li>
									<a href="<?php bloginfo('url') ?>/onde-encontrar/">Panificadora Forno de Minas</a>
								</li>
								<li>
									<a href="<?php bloginfo('url') ?>/onde-encontrar/">Panificadora Pão Nosso</a>
								</li>
								<li>
									<a href="<?php bloginfo('url') ?>/onde-encontrar/">Padaria Belo Pão</a>
								</li>
							</ul>
						</div>
						<div id="categoria">
							<span id="titulo">Categorias<span id="ico-loading"></span></span>
							<ul>

								<?php
									//list terms in a given taxonomy (useful as a widget for twentyten)

									$taxonomy = 'onde-encontrar';
									$tax_terms = get_terms($taxonomy);

									?>
									<ul>

										<?php
											foreach ($tax_terms as $tax_term) {
												echo '<li>' . $tax_term->name .'</li>';
											}
										?>

									</ul>

							</ul>
						</div>
						<div class="clearfix"></div>
					</div>

					<div id="wrap-campos">

						<input id="termo" class="ani-02" type="text" name="b" autocomplete="off" <?php echo ( isset($_GET['b']) ) ? 'value="' . $_GET['b'] . '"' : '' ?>
						><select id="regiao" class="ani-02" name="r" <?php echo ( isset($_GET['r']) ) ? 'data-s="' . $_GET['r'] . '"' : ''; ?>>

							<option value="">Escolha a Região</option>

							<?php 

							$taxonomy = 'onde-encontrar-regioes';
							$tax_terms = get_terms($taxonomy);

							foreach ($tax_terms as $tax_term) {
								echo '<option value="' . $tax_term->slug . '">' . $tax_term->name . '</option>';
							}

							?>
<!-- 
							<option value="aguas-claras">Águas Claras</option>
							<option value="brazlandia">Brazlândia</option>
							<option value="candangolandia">Candangolândia</option>
							<option value="ceilandia">Ceilândia</option>
							<option value="cruzeiro">Cruzeiro</option>
							<option value="fercal">Fercal</option>
							<option value="gama">Gama</option>
							<option value="guara">Guará</option>
							<option value="itapoa">Itapoã</option>
							<option value="jardim-botanico">Jardim Botânico</option>
							<option value="lago-norte">Lago Norte</option>
							<option value="lago-sul">Lago Sul</option>
							<option value="nucleo-bandeirante">Núcleo Bandeirante</option>
							<option value="paranoa">Paranoá</option>
							<option value="park-way">Park Way</option>
							<option value="planaltina">Planaltina</option>
							<option value="plano-piloto" selected>Plano Piloto</option>
							<option value="recanto-das-emas">Recanto das Emas</option>
							<option value="riacho-fundo">Riacho Fundo</option>
							<option value="riacho-fundo-ii">Riacho Fundo II</option>
							<option value="samambaia">Samambaia</option>
							<option value="santa-maria">Santa Maria</option>
							<option value="sao-sebastiao">São Sebastião</option>
							<option value="sia">SIA</option>
							<option value="sobradinho">Sobradinho</option>
							<option value="sudoeste-octogonal">Sudoeste/Octogonal</option>
							<option value="taguatinga">Taguatinga</option>
							<option value="varjao">Varjão</option>
							<option value="vicente-pires">Vicente Pires</option>						</select>
 -->
						</select><input class="ani-02" id="submit" type="submit" value="Buscar">
						<?php if ( isset($_GET['c']) ): ?>
							<input type="hidden" name="c" value="<?php echo $_GET['c']?>">
						<?php endif ?>
						
					</div>

