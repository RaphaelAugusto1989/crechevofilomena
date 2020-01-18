<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="row justify-content-md-center">
    <div class="align-sel-center col-md-6">
        <h3 class="text-center mt-5 mb-4">Alterar Minha Senha</h3>
        <?php
			if ($this->session->flashdata('Success') !="") {
				echo "<p class='alert alert-success text-center'>" .$msg. "</p>";
			} elseif ($this->session->flashdata('Error') !="") {
				echo "<p class='alert alert-danger text-center'>" .$msg. "</p>";
			}

            foreach ($usuario as $value => $user) {
        ?>
        <form action="<?= site_url();?>/Usuarios/AlterarSenha" method="post">
            <div class="form-group">
                <label for="email">Senha Antiga:</label>
                <input type="hidden" name="id" value="<?= $usuario[$value]->id_usuario;?>">
                <input type="password" name="senha_antiga" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Nova Senha:</label>
                <input type="password" name="nova_senha" class="form-control">
            </div>
            <div class="form-group">
                <label for="cpf">Confirme a Nova Senha:</label>
                <input type="password" name="nova_senha2" class="form-control">
            </div>
            <div class="form-group text-center">
                <input type="submit" name="" class="btn btn-success" value="ALTERAR SENHA">
            </div>
        <?php
            }
        ?>
        </form>
    </div>
</div>