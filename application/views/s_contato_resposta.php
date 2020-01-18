<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="row justify-content-md-center">
    <div class="align-sel-center col-md-6">
        <h3 class="text-center mt-5 mb-4">CONTATO</h3>
        <?php
			if ($this->session->flashdata('Success') !="") {
				echo "<p class='alert alert-success text-center'>" .$msg. "</p>";
			} elseif ($this->session->flashdata('Error') !="") {
				echo "<p class='alert alert-danger text-center'>" .$msg. "</p>";
            }
            
            foreach ($contato as $value => $cont) {
                $data = explode('-', $contato[$value]->data_contato);
                $hora = explode(':', $contato[$value]->hora_contato);
		?>
            <div class="form-group">
                <label for="">Nome:</label>
                <input type="text" name="nome" id="" class="form-control bg-white" disabled placeholder="Digite seu nome completo" value="<?= $contato[$value]->nome_contato;?>">
            </div>
            <div class="form-group">
                <label for="">E-mail:</label> 
                <input type="email" name="email" id="" class="form-control bg-white" disabled placeholder="Digite seu E-mail" value="<?= $contato[$value]->email_contato;?>">
            </div>
            <div class="form-group">
                <label for="">Assunto:</label>
                <input type="text" name="assunto" id="" class="form-control bg-white" disabled placeholder="Digite o assunto" value="<?= $contato[$value]->assunto_contato;?>">
            </div>
            <div class="form-group">
                <label for="">Data:</label>
                <input type="text" name="datetime" id="" class="form-control bg-white" disabled placeholder="Digite o assunto" value="<?=$data[2].'/'.$data[1].'/'.$data[0].' as '.$hora[0].':'.$hora[1];?>">
            </div>
            <div class="form-group">
                <label for="">Mensagem:</label>
                <textarea name="msg" id="" cols="20" rows="10" class="form-control bg-white" disabled placeholder="Mensagem"><?= $contato[$value]->msg_contato;?></textarea>
            </div>
            <div class="form-group text-right">
                <a href="#" class="btn btn-info pl-5 pr-5" onclick="voltar()"><i class="fas fa-arrow-left"></i> Voltar </a>
                <a href="<?= site_url('Contatos/ResponderContato/'.$contato[$value]->id_contato.'')?>" class="btn btn-success pl-5 pr-5">Responder </a>
            </div>
            <?php
                }
                foreach ($res as $value => $r) {
            ?>
            <div class="form-group">
                <label for="">RESPOSTA:</label>
                <textarea name="resposta" id="" cols="20" rows="10" class="form-control" disabled placeholder="Responder Contato"><?php if ($res == true) { echo $res[$value]->msg_resposta; } else { echo ""; } ?></textarea>
            </div>
            <?php
                }
            ?>
            
    </div>
</div>
