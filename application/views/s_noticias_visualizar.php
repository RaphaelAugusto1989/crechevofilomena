<div class="row justify-content-md-center">
    <div class="col-lg-12">
        <h3 class="text-center mt-5 mb-4">NOTÍCIAS CADASTRADAS</h3>
    </div>
    <div class="col-lg-12 mb-3 text-right">
        <a href="<?= site_url('NovaNoticia')?>" class="btn btn-success"><i class="fas fa-pen"></i> Nova Notícia</a>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">TITULO</th>
                <th scope="col">DATA</th>
                <th scope="col" class="text-center">ALTERAR</th>
                <th scope="col" class="text-center">EXCLUIR</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach ($noticia as $value => $not) {
                    if(empty($noticia)) {
                        echo "
                            <tr>
                                <td colspan='4' class='text-center'>NENHUMA NOTÍCIA CADASTRADA!</td>
                            </tr>
                        ";
                    }
            ?>
            <tr>
                <td><?= $noticia[$value]->titulo_noticia; ?></td>
                <td><?= date('d/m/Y', strtotime($noticia[$value]->data_noticia)); ?></td>
                <td class="text-center custon_icon_table"><a href="<?= site_url() ?>/Noticia/AlterarNoticia/<?= $noticia[$value]->id_noticia;?>" title="ALTERAR"><i class="fas fa-pen-square text-warning"></i></a></td>
                <td class="text-center custon_icon_table"><a href="<?= site_url() ?>/Noticia/ExcluirNoticia/<?= $noticia[$value]->id_noticia;?>" title="EXCLUIR"><i class="fas fa-trash-alt text-danger"></i></a></td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</div>
