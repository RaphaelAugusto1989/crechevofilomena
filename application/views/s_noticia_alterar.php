<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="row justify-content-md-center">
    <div class="align-sel-center col-md-6">
        <h3 class="text-center mt-5 mb-4">Alterar Notícia</h3>
        <?php
			if ($this->session->flashdata('Success') !="") {
				echo "<p class='alert alert-success text-center'>" .$msg. "</p>";
			} elseif ($this->session->flashdata('Error') !="") {
				echo "<p class='alert alert-danger text-center'>" .$msg. "</p>";
			}

            foreach ($texto as $value => $t) {

        ?>
        <div class="col text-right">
            <a href="<?= site_url('Noticia/AlterarCapaNoticia')?>" class="btn btn-info"> <i class="fas fa-pen-square"></i>  Alterar Capa</a>
        </div>
        <form action="<?= site_url('Noticia/AlterNoticia');?>" method="post">
            <div class="form-group">
                <input type="hidden" name="id" value="<?= $texto[$value]->id_noticia;?>">
            </div>
            <div class="form-group">
                <label for="UpBanner">Titulo da Notícia:</label>
                <input type="text" name="titulo" class="form-control" id="UpBanner"  value="<?= $texto[$value]->titulo_noticia;?>">
            </div>
            <div class="form-group">
                <label for="UpBanner">Notícia:</label>
                <textarea name="texto" class="form-control" id="" cols="30" rows="10"><?= $texto[$value]->texto_noticia;?></textarea>
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