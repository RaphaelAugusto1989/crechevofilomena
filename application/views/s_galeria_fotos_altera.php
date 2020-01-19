<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="row justify-content-md-center">
    <div class="align-sel-center col-md-6">
        <h3 class="text-center mt-5 mb-4">INSERIR NOVAS FOTOS NO ÁLBUM</h3>
        <form action="<?= site_url();?>/Galeria/CadastrarFotos" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="UpBanner">Inserir Fotos:</label>
                <input type="hidden" name="id_album" value="<?= $id_album ?>">
                <input type="file" name="img[]" multiple accept="image/*" class="form-control" id="UpBanner">
            </div>
            <div class="form-group text-center">
                <input type="submit" name="" class="btn btn-success" value="CADASTRAR MAIS FOTOS">
            </div>
        </form>
    </div>

    <div class="row mt-5 p-3 bg_fundo justify-content-md-center">
        <?php
            foreach($galeria as $value => $gl) {
        ?>
        <h3 class="text-warning"><?= $galeria[$value]->titulo_album; ?></h3>
        <?php
            }
        ?>
        <div class="row text-center">
        <?php
            foreach($foto as $value => $f) {
                // echo '<pre>';
                // print_r($foto); exit;
        ?>
            <div class="col-sm-12 col-lg-3 border border-info rounded p-3 m-2 bg-white">
                <a href="<?= site_url() ?>/Galeria/ExcluirFoto/<?= $foto[$value]->id_foto;?>" title="EXCLUIR" class="text-danger excluirfoto"><i class="fas fa-trash-alt"></i></a>
                <a href="<?= base_url($foto[$value]->img_foto);?>" data-lightbox='roadtrip'>
                    <img src="<?= base_url($foto[$value]->img_foto);?>" class="img-fluid capas popupimage" alt="">
                </a>
            </div>
        <?php
            }  //FIM FOREACH GALERIA
        ?>
        </div>
    </div>
</div>