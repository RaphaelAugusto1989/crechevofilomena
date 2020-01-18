<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="row justify-content-md-center">
    <div class="align-sel-center col-md-6">
        <h3 class="text-center mt-5 mb-4">INSERIR FOTOS DO ÁLBUM</h3>
        <form action="<?= site_url();?>/Galeria/CadastrarFotos" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="UpBanner">Inserir Fotos:</label>
                <input type="hidden" name="id_album" value="<?= $id_album ?>">
                <input type="file" name="img[]" multiple accept="image/*" class="form-control" id="UpBanner">
            </div>
            <div class="form-group text-center">
                <input type="submit" name="" class="btn btn-success" value="CADASTRAR ÁLBUM">
            </div>
        </form>
    </div>
</div>