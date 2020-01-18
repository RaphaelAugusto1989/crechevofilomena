<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="row justify-content-md-center">
    <h3 class="col col-lg-12 text-center mt-5 mb-4">QUEM SOMOS</h3>
    <div class="col">
        <a href="<?= site_url('NovoQuemSomos')?>" class="btn btn-success"><i class="fas fa-pen"></i> Cadastrar Quem Somos</a>
    </div>
        <?php
            foreach($creche as $value => $cr) {
                if (empty($creche)) {
                    echo "
                        <tr>
                            <td colspan='4' class='text-center'>NENHUM TEXTO CADASTRADO!</td>
                        </tr>
                    ";
                }
        ?>
        <a href="<?= site_url() ?>/Creche/AlterarQuemSomos/<?= $creche[$value]->id_quemsomos;?>" title="ALTERAR" class="btn btn-info mr-2"><i class="fas fa-pen-square"></i> Alterar</a>
        <a href="<?= site_url() ?>/Creche/ExcluirTexto/<?= $creche[$value]->id_quemsomos;?>" title="EXCLUIR" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Excluir</a>
        </div>
        <div class="form-group">
            <!-- <label for="UpBanner">Capa:</label>
            <input type="file" name="" class="form-control border-0" id="UpBanner"> -->
        </div>
        <div class="form-group">
            <input type="text" name="" class="form-control border-0 bg-white" value="<?= $creche[$value]->titulo_quemsomos; ?>" disabled>
        </div>
        <div class="form-group">
            <textarea name="" class="form-control border-0 bg-white" id="" cols="30" rows="10" disabled><?= $creche[$value]->texto_quemsomos; ?></textarea>
        </div>
            <a href="<?= site_url('Creche/InserirCapa/'.$creche[$value]->id_quemsomos)?>" class="btn btn-info">Inserir Capa</a>
            <!-- <a href="" class="btn btn-info">Inserir Fotos Creche</a> -->
        <?php
            }
        ?>
</div>