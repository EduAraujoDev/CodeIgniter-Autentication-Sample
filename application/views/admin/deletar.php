<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title><?php echo $titulo;?></title>
	</head>
	<body>
		<h1><?php echo $titulo;?></h1>

		<?php 
			echo validation_errors();

			echo form_open("admin/deletarUsuario/$usuario->UsuarioID");

			echo form_label('Nome do usuário', 'login');

			$arrayInput = array(
				'type' => 'text', 
				'name' => 'login',
				'id' => 'login'
				);
			echo form_input($arrayInput, set_value('login', $usuario->LOGIN), 'disabled="disabled"');

			echo "<br>";

			echo form_label('Perfil', 'descPerfil');
			
			$list = array();
			$list[''] = 'Selecione um perfil';
			foreach ($tiposPerfis as $tiposPerfil) {
				$list[$tiposPerfil->TipoPerfilID] = ucfirst(htmlspecialchars($tiposPerfil->DescricaoTipoPerfis));
			}

			echo form_dropdown('perfil', $list, set_value('login', $usuario->TipoPerfil), 'disabled="disabled"');

			echo "<br>";

			$arrayButton = array(
				'type' => 'submit',
				'value' => 'Deletar',
				'content' => 'Deletar'
				);
			echo form_button($arrayButton);

			echo form_close();
		?>			
	</body>
</html>