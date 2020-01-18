<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css');?>" rel="stylesheet">

    <title><?= $titulo; ?></title>
</head>
<body>

<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-lg-4 mt-5 text-center">
            <img src="<?= base_url('assets/img/logo_creche.png');?>" alt="" class="img-fluid" width="50%">
        </div>
    </div>
    
    <div class="row justify-content-md-center">
        <div class="col align-sel-center col-md-4 login">
        <?php
			if ($this->session->flashdata('Success') !="") {
				echo "<p class='alert alert-success text-center'>" .$msg. "</p>";
			} elseif ($this->session->flashdata('Error') !="") {
				echo "<p class='alert alert-danger text-center'>" .$msg. "</p>";
			}
		?>
            <form action="Usuarios/AutenticaLogin" method="post">
                <p class="text-center">Área Restrita</p>
                <div class="form-group">
                    <input type="text" name="login" id="" class="form-control" placeholder="Login ou E-mail">
                </div>
                <div class="form-group">
                    <input type="password" name="senha" id="" class="form-control" placeholder="Senha">
                </div>
                <div class="form-group">
                    <input type="submit" name="" id="" value="Entrar" class="btn btn-block btn-success btn-lg">
                </div>
                <div class="form-group">
                    <a href="Usuarios/RecuperarSenha" class="text-white">Esqueci minha senha!</a>
                </div>
            </form>
        </div>
    </div>
</div>
    
</body>
</html>