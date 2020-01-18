<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="row justify-content-md-center">
    <div class="col-lg-12">
        <h3 class="text-center mt-5 mb-4">BANNERS CADASTRADOS</h3>
    </div>
    <div class="col-lg-12 mb-3 text-right">
        <a href="<?= site_url('NovoBanner')?>" class="btn btn-success"><i class="fas fa-pen"></i> Novo Banner</a>
    </div>
    <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">BANNER</th>
                    <th scope="col">TITULO</th>
                    <!-- <th scope="col" class="text-center">ALTERAR</th> -->
                    <th scope="col" class="text-center">EXCLUIR</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                foreach ($banner as $value => $bn) {
                    if(empty($banner)) {
                        echo "
                            <tr>
                                <td colspan='4' class='text-center'>NENHUM BANNER CADASTRADO!</td>
                            </tr>
                        ";
                    }
            ?>
                <tr>
                    <td><img src="<?= base_url('assets/img/banners/'.$banner[$value]->img_banner);?>" alt="" width="15%"></td>
                    <td><?= $banner[$value]->titulo_banner;?></td>
                    <!-- <td class="text-center custon_icon_table"><a href="<?= site_url() ?>/Banners/AlterarBanner/<?= $banner[$value]->id_banner;?>" title="ALTERAR"><i class="fas fa-pen-square text-warning"></i></a></td> -->
                    <td class="text-center custon_icon_table"><a href="<?= site_url() ?>/Banners/ExcluirBanner/<?= $banner[$value]->id_banner;?>" title="EXCLUIR"><i class="fas fa-trash-alt text-danger"></i></a></td>
                </tr>
            <?php
                }
            ?>
            </tbody>
            </table>
</div>