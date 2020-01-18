<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="row justify-content-md-center">
    <div class="align-sel-center col-md-6">
        <h3 class="text-center mt-5 mb-4">Meus Dados</h3>
        
        <?php
			if ($this->session->flashdata('Success') !="") {
				echo "<p class='alert alert-success text-center'>" .$msg. "</p>";
			} elseif ($this->session->flashdata('Error') !="") {
				echo "<p class='alert alert-danger text-center'>" .$msg. "</p>";
			}

            foreach ($usuario as $value => $user) {
        ?>
        <form action="<?= site_url();?>/Usuarios/AlterUsuario" method="post">
            <div class="form-row">
                <div class="form-group col-md-9">
                </div>
                <div class="form-group col-md-3">
                    <a href="<?= site_url('Usuarios/NovaSenha/'.$usuario[$value]->id_usuario.'') ?>" class="btn btn-info">MUDAR SENHA</a>               
                </div>
            </div>
            <div class="form-group">
                <label for="NomeCompleto">Nome Completo:</label>
                <input type="hidden" name="id" value="<?= $usuario[$value]->id_usuario;?>">
                <input type="text" name="nome" class="form-control" id="NomeCompleto" value="<?= $usuario[$value]->nome_usuario;?>">
            </div>
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" name="email" class="form-control" id="email" value="<?= $usuario[$value]->email_usuario;?>">
            </div>
            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="text" name="cpf" class="form-control cpf" id="cpf" value="<?= $usuario[$value]->cpf_usuario;?>">
            </div>
            <div class="form-group">
                <label for="login">Login:</label>
                <input type="text" name="login" class="form-control" id="login" value="<?= $usuario[$value]->login_usuario;?>">
            </div>
            <div class="form-group text-center">
                <input type="submit" name="" class="btn btn-success" value="ALTERAR">
            </div>
        <?php
            }
        ?>
        </form>
    </div>
</div>