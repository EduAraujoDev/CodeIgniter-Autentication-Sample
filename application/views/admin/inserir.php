<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title><?php echo $titulo;?></title>
	</head>
	<body>
		<h1><?php echo $titulo;?></h1>

		<?php 
			echo validation_errors();

			echo form_open('admin/inserirNovoUsuario');	

			echo form_label('Nome do usuário', 'login');

			$arrayInput = array(
				'type' => 'text', 
				'name' => 'login',
				'id' => 'login'
				);
			echo form_input($arrayInput);

			echo "<br>";

			echo form_label('Perfil', 'descPerfil');
			
			$list = array();
			$list[''] = 'Selecione um perfil';
			foreach ($tiposPerfis as $tiposPerfil) {
				$list[$tiposPerfil->TipoPerfilID] = ucfirst(htmlspecialchars($tiposPerfil->DescricaoTipoPerfis));
			}

			echo form_dropdown('perfil', $list);

			echo "<br>";

			echo form_label('Digite a senha', 'senha1');

			$arrayInput = array(
				'type' => 'password', 
				'name' => 'senha1',
				'id' => 'senha1'
				);
			echo form_input($arrayInput);

			echo "<br>";

			echo form_label('Confirme a senha', 'senha2');

			$arrayInput = array(
				'type' => 'password', 
				'name' => 'senha2',
				'id' => 'senha2'
				);
			echo form_input($arrayInput);

			echo "<br>";			

			$arrayButton = array(
				'type' => 'submit',
				'value' => 'Cadastrar',
				'content' => 'Cadastrar'
				);
			echo form_button($arrayButton);

			echo form_close();
		?>			
	</body>
</html>				