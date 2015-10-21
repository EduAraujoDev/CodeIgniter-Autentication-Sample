<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title><?php echo $titulo;?></title>
	</head>
	<body>
		<h1><?php echo $titulo;?></h1>

		<?php
		    echo form_open('login/logout');

		    $data = array(
		        'type' => 'submit',
		        'value' => 'Sair',
		        'content' => 'Sair',
		    );
		    echo form_button($data);
		    echo form_close();
		?>
		
	</body>
</html>		