
<div class="row justify-content-md-center">
    <div class="col-lg-12">
        <h3 class="text-center mt-5 mb-4">CONTATOS RECEBIDOS</h3>
    </div>
    <!-- <div class="col-lg-12 mb-3 text-right">
        <a href="s_banner_cadastro.html" class="btn btn-success"><i class="fas fa-pen"></i> Novo Banner</a>
    </div> -->
    <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">NOME</th>
                    <th scope="col">EMAIL</th>
                    <th scope="col">ASSUNTO</th>
                    <th scope="col" class="text-center">VISUALIZAR</th>
                    <th scope="col" class="text-center">EXCLUIR</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach ($contatos as $value => $cont) {
                ?>
                <tr>
                    <td><?= $contatos[$value]->nome_contato; ?></td>
                    <td><?= $contatos[$value]->email_contato; ?></td>
                    <td><?= $contatos[$value]->assunto_contato; ?></td>
                    <td class="text-center custon_icon_table"><a href="<?= site_url() ?>/Contatos/VisualizarContato/<?= $contatos[$value]->id_contato;?>" title="VISUALIZAR" class="text-warning"><i class="fas fa-eye"></i></a></td>
                    <td class="text-center custon_icon_table"><a href="<?= site_url() ?>/Contatos/ExcluirContato/<?= $contatos[$value]->id_contato;?>" title="EXCLUIR" class="text-danger"><i class="fas fa-trash-alt"></i></a></td>
                </tr>
                </tr>
                <?php
                    }
                ?>
            </tbody>
    </table>
</div>

