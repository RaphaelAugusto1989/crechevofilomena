<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="row justify-content-md-center">
    <div class="align-sel-center col-md-6">
        <h3 class="text-center mt-5 mb-4">INSERIR CAPA QUEM SOMOS</h3>
        <?php
			if ($this->session->flashdata('Success') !="") {
				echo "<p class='alert alert-success text-center'>" .$msg. "</p>";
			} elseif ($this->session->flashdata('Error') !="") {
				echo "<p class='alert alert-danger text-center'>" .$msg. "</p>";
			}
		?>
        <form action="<?= site_url();?>/Creche/CadastrarCapa" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="UpBanner">Inserir Capa:</label>
                <input type="hidden" name="id" value="<?= $id ?>">
                <input type="file" name="img" accept="image/*" class="form-control" >
            </div>
            <div class="form-group text-center">
                <input type="submit" name="" class="btn btn-success" value="CADASTRAR CAPA">
            </div>
        </form>
    </div>
</div>