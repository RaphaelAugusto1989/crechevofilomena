<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="row justify-content-md-center">
    <div class="col-lg-12">
        <h3 class="text-center mt-5 mb-4">ÁLBUNS CADASTRADOS</h3>
    </div>
    <div class="col-lg-12 mb-3 text-right">
        <a href="<?= site_url('NovaGaleria')?>" class="btn btn-success"><i class="fas fa-pen"></i> Novo Álbum</a>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ÁLBUM</th>
                <th scope="col" class="text-center">ALTERAR</th>
                <th scope="col" class="text-center">EXCLUIR</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach ($galeria as $value => $gl) {
                    if(empty($galeria)) {
                        echo "
                            <tr>
                                <td colspan='4' class='text-center'>NENHUM ALBUM CADASTRADO!</td>
                            </tr>
                        ";
                    }
            ?>
            <tr>
                <td><?= $galeria[$value]->titulo_album; ?></td>
                <td class="text-center custon_icon_table"><a href="<?= site_url() ?>/Galeria/AlterarGaleria/<?= $galeria[$value]->id_album;?>" title="ALTERAR" class="text-warning"><i class="fas fa-pen-square"></i></a></td>
                <td class="text-center custon_icon_table"><a href="<?= site_url() ?>/Galeria/ExcluirGaleria/<?= $galeria[$value]->id_album;?>" title="EXCLUIR" class="text-danger"><i class="fas fa-trash-alt"></i></a></td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</div>