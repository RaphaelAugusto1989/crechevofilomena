<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('America/Sao_Paulo');

class Creche extends CI_Controller {

	function __construct() {
		parent::__construct(); 
	}
   
    public function verQuemSomos() {
        $this->load->model('Creche_model');
        $lista = $this->Creche_model->MostraQuemSomos();

        $dados = array('titulo' =>'Quem Somos - Creche Núcleo Bandeirante Vó Filomena', 'creche' => $lista);
        
        $this->load->view('s_header', $dados);
        $this->load->view('s_creche_visualizar', $dados);
        $this->load->view('s_footer');
	}

    public function NovoQuemSomos() {
        $msg = null;
		if ($this->session->flashdata('Success') !="") {
			$msg = $this->session->flashdata('Success');
		} else {
			$msg = $this->session->flashdata('Error');
        }

        $dados = array('titulo' =>'Cadastrar Texto - Creche Núcleo Bandeirante Vó Filomena', 'msg' => $msg);
        
        $this->load->view('s_header', $dados);
        $this->load->view('s_creche_cadastro', $dados);
        $this->load->view('s_footer');
	}

	       
    public function CadastrarTexto() {
        $Gravar = array (
            'titulo_quemsomos'  => $this->input->post('titulo'),
            'texto_quemsomos' => $this->input->post('texto'),
            'create_quemsomos' => date('Y-m-d H:m:s'),
        );
        
        $this->load->model('Creche_model');
        $this->Creche_model->GravaTexto($Gravar);

        if (!empty($Gravar)) {
            $this->session->set_flashdata('Success', 'Texto Cadastrado com Sucesso');
            redirect(site_url('NovoQuemSomos'));
        } else {
            $this->session->set_flashdata('Error', 'Ocorreu algum problema, verifique os dados e tente novamente!');
            redirect(site_url('NovoQuemSomos'));
        }
    }

	public function AlterarQuemSomos() {
        $msg = null;
		if ($this->session->flashdata('Success') !="") {
			$msg = $this->session->flashdata('Success');
		} else {
			$msg = $this->session->flashdata('Error');
        }

        $idTexto = $this->uri->segment(3);

        $this->load->model('Creche_model');
        $lista = $this->Creche_model->DetalheTexto($idTexto);
        
        $dados = array('titulo' =>'Alterar Quem Somos - Creche Núcleo Bandeirante Vó Filomena', 'texto' => $lista, 'msg' => $msg);
        
        $this->load->view('s_header', $dados);
        $this->load->view('s_creche_alterar', $dados);
        $this->load->view('s_footer');
    }
        
    public function AlterarTexto() {
        $idTexto = $this->input->post('id');

        $Alterar = array (
            'titulo_quemsomos'  => $this->input->post('titulo'),
            'texto_quemsomos' => $this->input->post('texto'),
            'alter_quemsomos' => date('Y-m-d H:m:s'),
        );

        $this->load->model('Creche_model');
        $this->Creche_model->AlteraTexto($idTexto, $Alterar);

        if (!empty($Alterar)) {
            $this->session->set_flashdata('Success', 'Texto Alterado com Sucesso');
            redirect('Creche/AlterarQuemSomos/'.$idTexto);
        } else {
            $this->session->set_flashdata('Error', 'Ocorreu algum problema, verifique os dados e tente novamente!');
            redirect('Creche/AlterarQuemSomos/'.$idTexto);
        }
    }

    public function InserirCapa() {
        $idQuemSomos = $this->uri->segment(3);

        $msg = null;
		if ($this->session->flashdata('Success') !="") {
			$msg = $this->session->flashdata('Success');
		} else {
			$msg = $this->session->flashdata('Error');
        }

        $dados = array('titulo' =>'Inserir Capa - Creche Núcleo Bandeirante Vó Filomena', 'msg' => $msg, 'id' => $idQuemSomos);
        
        $this->load->view('s_header', $dados);
        $this->load->view('s_creche_cadastro_capa', $dados);
        $this->load->view('s_footer');
    }
    
    public function CadastrarCapa() {
        $idTexto = $this->input->post('id');
        $namefoto = $this->input->post('img');

        $config['allowed_types'] = "jpg|jpeg|png";
        $config['max_size'] = 100;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;

        $caminhoCompleto = "assets/img/".$_FILES["img"]["name"];
        $tipoArquivo = 'jpg'; //pathinfo($caminhoCompleto, PATHINFO_EXTENSION);
        $novo_nome = "capa_".date("dmYhis").".".$tipoArquivo;
        $caminhoCompleto2 = "assets/img/".$novo_nome;

        if(move_uploaded_file($_FILES["img"]["tmp_name"], $caminhoCompleto)) {
            if(!rename($caminhoCompleto,  $caminhoCompleto2)){
                echo "ERRO AO RENOMEAR A IMAGEM DO BANNER";exit;
            }
        } else {
            echo 'ERRO AO COPIAR A IMAGEM AO SERVIDOR, ENTRE EM CONTATO COM O RESPONSÁVEL PELO SITE!'; exit;
        }

        $Alterar = array (
            'img_quemsomos'  => $caminhoCompleto2,
        );

        $this->load->model('Creche_model');
        $this->Creche_model->AlteraTexto($idTexto, $Alterar);

        if (!empty($Alterar)) {
            $this->session->set_flashdata('Success', 'Capa Inserida com Sucesso');
            redirect('Creche/InserirCapa');
        } else {
            $this->session->set_flashdata('Error', 'Ocorreu algum problema, verifique os dados e tente novamente!');
            redirect('Creche/InserirCapa');
        }
    }

    
    public function ExcluirTexto() {
        $idUsuario = $this->uri->segment(3);
                
        $this->load->model('Creche_model');
        $true = $this->Creche_model->DeletaTexto($idUsuario);

        if ($true == TRUE) {
            echo "<script> alert('TEXTO EXCLUÍDO COM SUCESSO!') </script>";
            echo "<script> location.href=('../verQuemSomos')</script>";
        }
    }
}
