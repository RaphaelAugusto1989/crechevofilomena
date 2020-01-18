<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('America/Sao_Paulo');

class Noticia extends CI_Controller {

	function __construct() {
		parent::__construct(); 
	}
   
    public function verNoticias() {
        $this->load->model('Noticia_model');
        $lista = $this->Noticia_model->MostraNoticia();

        $dados = array('titulo' =>'Noticias - Creche Núcleo Bandeirante Vó Filomena', 'noticia' => $lista);
        
        $this->load->view('s_header', $dados);
        $this->load->view('s_noticias_visualizar', $dados);
        $this->load->view('s_footer');
	}

    public function NovaNoticia() {
        $msg = null;
		if ($this->session->flashdata('Success') !="") {
			$msg = $this->session->flashdata('Success');
		} else {
			$msg = $this->session->flashdata('Error');
        }

        $dados = array('titulo' =>'Cadastrar Noticia - Creche Núcleo Bandeirante Vó Filomena', 'msg' => $msg);
        
        $this->load->view('s_header', $dados);
        $this->load->view('s_noticia_cadastro', $dados);
        $this->load->view('s_footer');
	}

	       
    public function CadastrarNoticia() {
        $Titulo = mb_strtolower($this->input->post('titulo'), "utf-8"); //TRANFORMA TODAS AS LETRAS EM MINUSCULAS
        $NomeImg = preg_replace('/[ -]+/', '_' , $Titulo).'_'.date("dmYhis"); //SUBSTITUI OS ESPAÇOS EM UNDERLINE _

        $namefoto = $this->input->post('img');
        $DataNoticia = explode('/', $this->input->post('data')); 
        $DataFormatada = $DataNoticia[2].'-'.$DataNoticia[1].'-'.$DataNoticia[0];

        $config['allowed_types'] = "jpg|jpeg|png";
        $config['max_size'] = 100;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;

        $caminhoCompleto = "assets/img/noticias/".$_FILES["img"]["name"];
        $tipoArquivo = 'jpg'; //pathinfo($caminhoCompleto, PATHINFO_EXTENSION);
        $novo_nome = $NomeImg.".".$tipoArquivo;
        $caminhoCompleto2 = "assets/img/noticias/".$novo_nome;

        if(move_uploaded_file($_FILES["img"]["tmp_name"], $caminhoCompleto)) {
            if(!rename($caminhoCompleto,  $caminhoCompleto2)){
                echo "ERRO AO RENOMEAR A IMAGEM DO BANNER";exit;
            }
        } else {
            echo 'ERRO AO COPIAR A IMAGEM AO SERVIDOR, ENTRE EM CONTATO COM O RESPONSÁVEL PELO SITE!'; exit;
        }

        $Gravar = array (
            'titulo_noticia'    => $this->input->post('titulo'),
            'texto_noticia'     => $this->input->post('noticia'),
            'img_noticia'       => $caminhoCompleto2,
            'data_noticia'      => $DataFormatada,
            'create_noticia'    => date('Y-m-d H:m:s'),
        );
        
        $this->load->model('Noticia_model');
        $this->Noticia_model->GravaNoticia($Gravar);

        if (!empty($Gravar)) {
            $this->session->set_flashdata('Success', 'Noticia Cadastrada com Sucesso');
            redirect(site_url('NovaNoticia'));
        } else {
            $this->session->set_flashdata('Error', 'Ocorreu algum problema, verifique os dados e tente novamente!');
            redirect(site_url('NovaNoticia'));
        }
    }

	public function AlterarNoticia() {
        $msg = null;
		if ($this->session->flashdata('Success') !="") {
			$msg = $this->session->flashdata('Success');
		} else {
			$msg = $this->session->flashdata('Error');
        }

        $idNoticia = $this->uri->segment(3);

        $this->load->model('Noticia_model');
        $lista = $this->Noticia_model->DetalheNoticia($idNoticia);
        
        $dados = array('titulo' =>'Alterar Noticia - Creche Núcleo Bandeirante Vó Filomena', 'texto' => $lista, 'msg' => $msg);
        
        $this->load->view('s_header', $dados);
        $this->load->view('s_noticia_alterar', $dados);
        $this->load->view('s_footer');
    }
        
    public function AlterNoticia() {
        $idNoticia = $this->input->post('id');

        $Alterar = array (
            'titulo_noticia'  => $this->input->post('titulo'),
            'texto_noticia' => $this->input->post('texto'),
            'alter_noticia' => date('Y-m-d H:m:s'),
        );

        // echo '<pre>';
        // print_r($Alterar); exit;

        $this->load->model('Noticia_model');
        $this->Noticia_model->AlteraNoticia($idNoticia, $Alterar);

        if (!empty($Alterar)) {
            $this->session->set_flashdata('Success', 'Noticia Alterada com Sucesso');
            redirect('Noticia/AlterarNoticia/'.$idNoticia);
        } else {
            $this->session->set_flashdata('Error', 'Ocorreu algum problema, verifique os dados e tente novamente!');
            redirect('Noticia/AlterarNoticia/'.$idNoticia);
        }
    }
    
    public function ExcluirNoticia() {
        $idNoticia = $this->uri->segment(3);
                
        $this->load->model('Noticia_model');
        $true = $this->Noticia_model->DeletaNoticia($idNoticia);

        if ($true == TRUE) {
            echo "<script> alert('NOTÍCIA EXCLUÍDO COM SUCESSO!') </script>";
            echo "<script> location.href=('../verNoticias')</script>";
        }
    }
}
