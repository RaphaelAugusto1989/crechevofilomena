<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="row justify-content-md-center">
    <div class="col-lg-12">
        <h3 class="text-center mt-5 mb-4">USUÁRIOS CADASTRADOS</h3>
    </div>
    <div class="col-lg-12 mb-3 text-right">
        <a href="<?= site_url('NovoUsuario')?>" class="btn btn-success"><i class="fas fa-pen"></i> Novo Usuário</a>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">NOME</th>
                <th scope="col">E-MAIL</th>
                <th scope="col" class="text-center">ALTERAR</th>
                <th scope="col" class="text-center">EXCLUIR</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach ($usuarios as $value => $user) {
                    if(empty($user)) {
                        echo "
                            <tr>
                                <td colspan='4' class='text-center'>NENHUM ÚSUARIO CADASTRADO!</td>
                            </tr>
                        ";
                    }
            ?>
            <tr>
                <td><?= $usuarios[$value]->nome_usuario; ?></td>
                <td><?= $usuarios[$value]->email_usuario; ?></td>
                <td class="text-center custon_icon_table"><a href="<?= site_url() ?>/Usuarios/AlterarUsuario/<?= $usuarios[$value]->id_usuario;?>" title="ALTERAR"><i class="fas fa-pen-square text-warning"></i></a></td>
                <td class="text-center custon_icon_table"><a href="<?= site_url() ?>/Usuarios/ExcluirUsuario/<?= $usuarios[$value]->id_usuario;?>" title="EXCLUIR"><i class="fas fa-trash-alt text-danger"></i></a></td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</div>
