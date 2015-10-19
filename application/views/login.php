<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title><?php echo $titulo;?></title>
    </head>
    <body>
        <div class="container">
            <?php
                echo "<h1>".$titulo."</h1>";

                echo form_open('login/validacao');

                echo "<h2>Digite o login e senha</h2>";

                echo validation_errors();

                $data = array(
                    'type' => 'text',                    
                    'name' => 'usuario', 
                    'autocomplete' => 'off', 
                    'placeholder' => 'Login'
                );

                echo form_input($data);

                echo "<br>";

                $data = array(
                    'type' => 'password',
                    'name' => 'senha', 'autocomplete' => 'off', 
                    'placeholder' => 'Senha'
                );

                echo form_password($data);

                echo "<br>";

                $data = array(
                    'name' => 'acessar', 
                    'value' => 'Acessar'                    
                );

                echo form_submit($data);
                echo form_close();
            ?>
        </div>
    </body>
</html>