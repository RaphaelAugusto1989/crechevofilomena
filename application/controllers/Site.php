<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('America/Sao_Paulo');

class Site extends CI_Controller {

	function __construct() {
		parent::__construct(); 
	}

	public function index() {
		$msg = null;

		if ($this->session->flashdata('Success') !="") {
			$msg = $this->session->flashdata('Success');
		} else {
			$msg = $this->session->flashdata('Error');
		}
		
		$NumReg = 3;
		//MODEL BANNER
		$this->load->model('Banner_model');
		$banners = $this->Banner_model->MostraBanner();

		//MODEL CRECHE
		$this->load->model('Creche_model');
		$creche = $this->Creche_model->MostraQuemSomos();

		//MODEL GALERIA
		$this->load->model('Galeria_model');
		$galeria = $this->Galeria_model->MostraAlbumSite($NumReg);

		//MODEL NOTICIAS
		$this->load->model('Noticia_model');
		$noticias = $this->Noticia_model->MostraNoticiaSite($NumReg);
		
		$dados = array('titulo' =>'Creche Núcleo Bandeirante Vó Filomena', 
					   'banner' => $banners, 
					   'creche' => $creche, 
					   'galeria' => $galeria,
					   'noticias' => $noticias,
					   'msg' => $msg,
						);

		$this->load->view('index', $dados);
	}
	
	public function EnviaContato() {
		// echo 'aqui';exit;
        // print_r($Gravar); exit;
		$Gravar = array (
			'nome_contato' 		=> $this->input->post('nome'),
			'email_contato' 	=> $this->input->post('email'),
			'assunto_contato'   => $this->input->post('assunto'),
			'msg_contato' 		=> $this->input->post('msg'),
			'data_contato'      => date('Y-m-d'),
            'hora_contato'      => date('H:m:s'),
            'create_contato'    => date('Y-m-d H:m:s'),
		);
	
		$this->load->model('Contatos_model');
		$this->Contatos_model->GravaContato($Gravar);

		if (!empty($Gravar)) {
			$this->session->set_flashdata('Success', 'Mensagem Enviada com Sucesso!<br /> Aguarde que entraremos em contato!');
			redirect(site_url('Site/index#Contatos'));
		} else {
			$this->session->set_flashdata('Error', 'Ocorreu algum problema, verifique os dados e tente novamente!');
			redirect(site_url('Site/index#Contatos'));
		}
	}

	public function Galeria() {
		$NumReg = 16;

		//MODEL GALERIA
		$this->load->model('Galeria_model');
		$galeria = $this->Galeria_model->MostraAlbumSite($NumReg);
		
		$dados = array('titulo' =>'Galeria - Creche Núcleo Bandeirante Vó Filomena', 'galeria' => $galeria);

		$this->load->view('galeria', $dados);
	}

	public function Album() {
		$idGaleria = $this->uri->segment(3);

		//MODEL GALERIA
		$this->load->model('Galeria_model');
		$galeria = $this->Galeria_model->DetalheAlbum($idGaleria);
		$fotos = $this->Galeria_model->DetalheAlbumFotos($idGaleria);
		
		$dados = array('titulo' =>'Álbum - Creche Núcleo Bandeirante Vó Filomena', 'galeria' => $galeria, 'foto' => $fotos);

		$this->load->view('AlbumCompleto', $dados);
	}

	public function Noticias() {
		$NumReg = 16;

		//MODEL GALERIA
		$this->load->model('Noticia_model');
		$noticia = $this->Noticia_model->MostraNoticiaSite($NumReg);
		
		$dados = array('titulo' =>'Noticias - Creche Núcleo Bandeirante Vó Filomena', 'noticias' => $noticia);

		$this->load->view('noticias', $dados);
	}

	public function Noticia() {
		$idNoticia = $this->uri->segment(3);

		//MODEL GALERIA
		$this->load->model('Noticia_model');
		$noticia = $this->Noticia_model->DetalheNoticia($idNoticia);
	
		$dados = array('titulo' =>'Noticia - Creche Núcleo Bandeirante Vó Filomena', 'noticias' => $noticia);

		$this->load->view('noticia', $dados);
	}
	
}
