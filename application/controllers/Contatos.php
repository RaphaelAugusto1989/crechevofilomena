<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('America/Sao_Paulo');

class Contatos extends CI_Controller {

	function __construct() {
		parent::__construct(); 
	}
   
    public function verContatos() {
        $this->load->model('Contatos_model');
        $lista = $this->Contatos_model->MostraContatos();

        $dados = array('titulo' =>'Contatos - Creche Núcleo Bandeirante Vó Filomena', 'contatos' => $lista);
        
        $this->load->view('s_header', $dados);
        $this->load->view('s_contatos_visualizar', $dados);
        $this->load->view('s_footer');
    }  
     
    public function ExcluirContato() {
        $idContato = $this->uri->segment(3);
                
        $this->load->model('Contatos_model');
        $true = $this->Contatos_model->DeletaContato($idContato);
        $resp = $this->Contatos_model->DetalheRespostaContato($idContato);

        if ($resp == true) {
            $this->Contatos_model->DeletaResposta($idContato);
        }

        if ($true == TRUE) {
            echo "<script> alert('CONTATO EXCLUÍDO COM SUCESSO!') </script>";
            echo "<script> location.href=('../verContatos')</script>";
        }
    }

    //INICIA PROCESSO DE RESPOSTA DO CONTATO
    public function VisualizarContato() {
        $idContato = $this->uri->segment(3);
        $msg = null;

		if ($this->session->flashdata('Success') !="") {
			$msg = $this->session->flashdata('Success');
		} else {
			$msg = $this->session->flashdata('Error');
        }

        $this->load->model('Contatos_model');
        $lista = $this->Contatos_model->DetalheContato($idContato);
        $resp = $this->Contatos_model->DetalheRespostaContato($idContato);

        $dados = array('titulo' =>'Responder Contato - Creche Núcleo Bandeirante Vó Filomena', 'contato' => $lista, 'res' => $resp, 'msg' => $msg);

        $this->load->view('s_header', $dados);
        $this->load->view('s_contato_resposta', $dados);
        $this->load->view('s_footer');
    }

    //INICIA PROCESSO DE RESPOSTA DO CONTATO
    public function ResponderContato() {
        $idContato = $this->uri->segment(3);

        $this->load->model('Contatos_model');
        $lista = $this->Contatos_model->DetalheContato($idContato);
        $resp = $this->Contatos_model->DetalheRespostaContato($idContato);

        $dados = array('titulo' =>'Responder Contato - Creche Núcleo Bandeirante Vó Filomena', 'contato' => $lista, 'res' => $resp);

        $this->load->view('s_header', $dados);
        $this->load->view('s_contato_responder', $dados);
        $this->load->view('s_footer');
    }

    public function EnviarRespostaContato() {
        $idContato = $this->input->post('id');
        $resposta = $this->input->post('resposta');

        $this->load->model('Contatos_model');
        $contato = $this->Contatos_model->DetalheContato($idContato);
    
        $Gravar = array (
            'fk_id_contato'    => $idContato,
            'msg_resposta'      => $resposta,
            'data_resposta'     => date('Y-m-d'),
            'hora_resposta'     => date('H:m:s'), 
            'create_resposta'  => date('Y-m-d H:m:s'),
        );
        
        $lista = $this->Contatos_model->GravaResposta($Gravar);
        
        foreach ($contato as $value => $c) {
            $data = explode('-', $contato[$value]->data_contato);
            $hora = explode(':', $contato[$value]->hora_contato);

        //INICIO ENVIO DO EMAIL PARA USUÁRIO CADASTRADO
        $Nome = 'Creche Vó Filomena';
		$To = $contato[$value]->email_contato;
        $Subject = "Resposta - ".$contato[$value]->assunto_contato;

        $Message = "<html lang='pt-br'>
                        <body style='font-family: arial; font-size: 14px; background-color: #D3D3D3; padding: 20px 0 20px 0;'>
                        <div style='margin: 0 auto; border: 0 solid; width: 70%; padding: 20px; border: 1px solid #000000; background-color: #ffffff;'>
                                <div style='text-align: center;'>
                                <img src='https://crechevofilomena.com.br/assets/img/logo_creche.png' style='width: 10%; min-width: 110px;'>
                                </div>
                                <div>
                                <p>Olá, ".$contato[$value]->nome_contato.". </p>
                                <p>Segue abaixo o resposta do contato que fez para gente!</p>
                                <p>Data do Contato: ".$data[2]."/".$data[1]."/".$data[0]." as ".$hora[0].":".$hora[1]."</p>
                                <p>Mensagem: ".$contato[$value]->msg_contato."</p>
                                <br />
                                <br />
                                <p>Resposta: ".$resposta."</p>
                                <br />
                                <br />
                                <p>Para responder, entre novamente no site e escreva um novo contato:</p>
                                <p>Acesse: <a href='http://crechevofilomena.com.br/#Contatos' target='_blank'>www.crechevofilomena.com.br</a></p>
                                <p>Obrigado pelo contato!</p>
                                <br>
                                <br>  
                                </div>
                        </div>
                        </body>
                    </html>";

            //É necessário indicar que o formato do e-mail é html
            $Headers  = 'MIME-Version: 1.0' . "\r\n";
            $Headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
            $Headers .= 'From: '."Creche Vó Filomena <noreply@crechevofilomena.com.br>";
            //$Headers .= "Bcc: $EmailPadrao\r\n";
        
        }//FIM FOREACH 

        $Enviado = mail($To, $Subject, $Message, $Headers);

        if (!empty($Gravar)) {
			$this->session->set_flashdata('Success', 'E-mail respondido com sucesso!');
			redirect(site_url('Contatos/VisualizarContato/'.$idContato));
		} else {
			$this->session->set_flashdata('Error', 'PROBLEMA AO ENVIAR E-MAIL, TENTE NOVAMENTE MAIS TARDE!');
			redirect(site_url('Contatos/VisualizarContato/'.$idContato));
		}
    }
}
