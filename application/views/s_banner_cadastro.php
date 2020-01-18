<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="row justify-content-md-center">
    <div class="align-sel-center col-md-6">
        <h3 class="text-center mt-5 mb-4">Novo Banner</h3>
        <?php
			if ($this->session->flashdata('Success') !="") {
				echo "<p class='alert alert-success text-center'>" .$msg. "</p>";
			} elseif ($this->session->flashdata('Error') !="") {
				echo "<p class='alert alert-danger text-center'>" .$msg. "</p>";
			}
		?>
        <form action="Banners/CadastrarBanner" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="TitBanner">Titulo do Banner:</label>
                <input type="text" name="titulo" class="form-control" id="TitBanner">
            </div>
            <div class="form-group">
                <label for="UpBanner">Banner:</label>
                <input type="file" name="img" class="form-control" id="UpBanner">
            </div>
            <div class="form-group text-center">
                <input type="submit" name="" class="btn btn-success" value="INSERIR BANNER">
            </div>
        </form>
    </div>
</div>