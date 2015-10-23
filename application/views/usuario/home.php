<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title><?php echo $titulo;?></title>
	</head>
	<body>
		<?php
		    echo form_open('login/logout');

		    $data = array(
		        'type' => 'submit',
		        'value' => 'Sair',
		        'content' => 'Sair',
		    );
		    echo form_button($data);
		    echo form_close();

		    echo "<h1>".$titulo."</h1>";		    
		?>		
	</body>
</html>		