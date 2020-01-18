<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="row justify-content-md-center">
    <div class="align-sel-center col-md-6">
        <h3 class="text-center mt-5 mb-4">Nova Notícia</h3>
        <?php
			if ($this->session->flashdata('Success') !="") {
				echo "<p class='alert alert-success text-center'>" .$msg. "</p>";
			} elseif ($this->session->flashdata('Error') !="") {
				echo "<p class='alert alert-danger text-center'>" .$msg. "</p>";
			}
		?>
        <form action="Noticia/CadastrarNoticia" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="UpBanner">Capa:</label>
                <input type="file" name="img" class="form-control" id="UpBanner">
            </div>
            <div class="form-group">
                <label for="UpBanner">Titulo da Notícia:</label>
                <input type="text" name="titulo" class="form-control" id="UpBanner">
            </div>
            <div class="form-group">
                <label for="UpBanner">Data:</label>
                <input type="text" name="data" class="form-control data" id="UpBanner">
            </div>
            <div class="form-group">
                <label for="UpBanner">Notícia:</label>
                <textarea name="noticia" class="form-control" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group text-center">
                <input type="submit" name="" class="btn btn-success" value="CADASTRAR">
            </div>
        </form>
    </div>
</div>