<?php 

	if ( is_numeric( $_POST['empresa'] ) ) 
	{

		$val = get_field('validade', $_POST['empresa']);
		$pt1 = substr($val, 0, strpos($val, " / "));
		$pt1 = ucfirst( substr($pt1, 0, 3) );
		$val = $pt1 . substr($val, strpos($val, " / "));
		$pt1 = null;

		$funcionarios = get_field('funcionarios', $_POST['empresa']);
		$cartao['empresa'] = strtoupper( get_the_title( $_POST['empresa'] ) );
		$cartao['validade'] = $val;

		for ($i=0; $i < count($funcionarios); $i++)
		{
			$funcionarios[$i]['slug'] = slugify( $funcionarios[$i]['nome'] . '-' . $i );
			$funcionarios[$i]['val'] = $val;
		}

		$cartao['funcionarios'] = $funcionarios;
		
		echo json_encode( $cartao );

	}
