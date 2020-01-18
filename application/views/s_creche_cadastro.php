<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="row justify-content-md-center">
    <div class="align-sel-center col-md-6">
        <h3 class="text-center mt-5 mb-4">Quem Somos</h3>
        <?php
			if ($this->session->flashdata('Success') !="") {
				echo "<p class='alert alert-success text-center'>" .$msg. "</p>";
			} elseif ($this->session->flashdata('Error') !="") {
				echo "<p class='alert alert-danger text-center'>" .$msg. "</p>";
			}
		?>
        <form action="Creche/CadastrarTexto" method="post">
            <!-- <div class="form-group">
                <label for="CapQuemSomos">Capa:</label>
                <input type="file" name="capa" class="form-control" id="CapQuemSomos">
            </div> -->
            <div class="form-group">
                <label for="TitQuemSomos">Titulo:</label>
                <input type="text" name="titulo" class="form-control" id="TitQuemSomos">
            </div>
            <div class="form-group">
                <label for="TexQuemSomos">Quem Somos:</label>
                <textarea name="texto" class="form-control" id="TexQuemSomos" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group text-center">
                <input type="submit" name="" class="btn btn-success" value="CADASTRAR">
            </div>
        </form>
    </div>
</div>
