<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="row justify-content-md-center">
    <div class="align-sel-center col-md-6">
        <h3 class="text-center mt-5 mb-4">Alterar Álbum</h3>
        <?php
			if ($this->session->flashdata('Success') !="") {
				echo "<p class='alert alert-success text-center'>" .$msg. "</p>";
			} elseif ($this->session->flashdata('Error') !="") {
				echo "<p class='alert alert-danger text-center'>" .$msg. "</p>";
			}

            foreach ($album as $value => $a) {

        ?>
        <form action="<?= site_url()?>/Galeria/AlteraGaleria" method="post" enctype="multipart/form-data">
        <div class="form-row">
            <div class="form-group col-md-7">
            </div>
            <div class="form-group col-md-3">
                <a href="<?= site_url('Galeria/AlteraNovasFotos/'.$album[$value]->id_album)?>" class="btn btn-info">INSERIR E ALTERAR FOTOS</a>
            </div>
            <div class="form-group col-md-2">
            </div>
        </div>
            <div class="form-group">
                <label for="TitBanner">Titulo do álbum:</label>
                <input type="hidden" name="id" value="<?= $album[$value]->id_album;?>">
                <input type="text" name="titulo" class="form-control" id="TitBanner" value="<?= $album[$value]->titulo_album;?>">
            </div>
            <div class="form-group">
                <img src="<?= base_url($album[$value]->img_album);?>" class="img-fluid capas popupimage" alt="">
                <label for="UpBanner">Alterar Capa:</label>
                <input type="hidden" name="capa" value="<?= $album[$value]->img_album;?>">
                <input type="file" name="img" class="form-control" id="UpBanner" >
            </div>
        
            <div class="form-group text-center">
                <input type="submit" name="" class="btn btn-success" value="ALTERAR ÁLBUM">
            </div>
        <?php
            }
        ?>
        </form>
    </div>
</div>