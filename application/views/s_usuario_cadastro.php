<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="row justify-content-md-center">
    <div class="align-sel-center col-md-6">
        <h3 class="text-center mt-5 mb-4">Novo Usuário</h3>
        <?php
			if ($this->session->flashdata('Success') !="") {
				echo "<p class='alert alert-success text-center'>" .$msg. "</p>";
			} elseif ($this->session->flashdata('Error') !="") {
				echo "<p class='alert alert-danger text-center'>" .$msg. "</p>";
			}
		?>
        <form action="Usuarios/CadastraUsuario" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="NomeCompleto">Nome Completo:</label>
                <input type="text" name="nome" class="form-control" id="NomeCompleto">
            </div>
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" name="email" class="form-control" id="email">
            </div>
            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="text" name="cpf" class="form-control cpf" id="cpf">
            </div>
            <div class="form-group">
                <label for="login">Login:</label>
                <input type="text" name="login" class="form-control" id="login">
            </div>
            <div class="form-group text-center">
                <input type="submit" name="" class="btn btn-success" value="CADASTRAR">
            </div>
        </form>
    </div>
</div>