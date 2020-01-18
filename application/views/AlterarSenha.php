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
            foreach ($usuario as $value => $us) {
		?>
            <form action="<?= site_url('Usuarios/AlterarSenhaEsquecida') ?>" method="post">
                <p class="text-center">Recuperar sua senha</p>
                <div class="form-group">
                    <input type="hidden" name="id" value="<?= $usuario[$value]->id_usuario?>">
                    <input type="password" name="nova_senha" id="" class="form-control" placeholder="Nova Senha">
                </div>
                <div class="form-group">
                    <input type="password" name="nova_senha2" id="" class="form-control" placeholder="Confirme a Nova Senha">
                </div>
                <div class="form-group">
                    <input type="submit" name="" id="" value="Alterar" class="btn btn-block btn-success btn-lg">
                </div>
            </form>
        </div>
        <?php
            }
        ?>
    </div>
</div>
    
</body>
<script src="<?= base_url('assets/js/jquery-3.4.1.min.js');?>"></script>
<script src="<?= base_url('assets/js/jquery.mask.min.js');?>"></script>
<script src="<?= base_url('assets/js/mask.js');?>"></script>
</html>