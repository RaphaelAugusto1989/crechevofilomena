<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="row justify-content-md-center">
    <div class="align-sel-center col-md-6">
        <h3 class="text-center mt-5 mb-4">RESPONDER CONTATO</h3>
        <?php            
            foreach ($contato as $value => $cont) {
		?>
        <form action="<?= site_url()?>/Contatos/EnviarRespostaContato" method="post">
            <div class="form-group">
                <label for="">Assunto:</label>
                <input type="hidden" name="id" value="<?=  $contato[$value]->id_contato;?>">
                <input type="text" name="assunto" id="" class="form-control bg-white" disabled placeholder="Digite o assunto" value="Resposta - <?=  $contato[$value]->assunto_contato;?>">
            </div>
            <div class="form-group">
                <label for="">Responder:</label>
                <textarea name="resposta" id="" cols="20" rows="10" class="form-control bg-white" placeholder="Responder Mensagem"></textarea>
            </div>
            <div class="form-group text-right">
                <a href="#" class="btn btn-info pl-5 pr-5" onclick="voltar()"><i class="fas fa-arrow-left"></i> Voltar </a>
                <input type="submit" value="Responder" class="btn btn-success pl-5 pr-5">
            </div>
        </form>
        <?php
            }
        ?>
    </div>
</div>
