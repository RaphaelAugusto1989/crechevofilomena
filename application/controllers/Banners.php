<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('America/Sao_Paulo');

class Banners extends CI_Controller {

	function __construct() {
		parent::__construct(); 
	}
   
    public function verBanners() {
        $this->load->model('Banner_model');
        $lista = $this->Banner_model->MostraBanner();

        $dados = array('titulo' =>'Banners - Creche Núcleo Bandeirante Vó Filomena', 'banner' => $lista);
        
        $this->load->view('s_header', $dados);
        $this->load->view('s_banners_visualizar', $dados);
        $this->load->view('s_footer');
	}

    public function NovoBanner() {
        $msg = null;
		if ($this->session->flashdata('Success') !="") {
			$msg = $this->session->flashdata('Success');
		} else {
			$msg = $this->session->flashdata('Error');
        }

        $dados = array('titulo' =>'Cadastrar Banner - Creche Núcleo Bandeirante Vó Filomena', 'msg' => $msg);
        
        $this->load->view('s_header', $dados);
        $this->load->view('s_banner_cadastro', $dados);
        $this->load->view('s_footer');
	}

	       
    public function CadastrarBanner() {
        $namefoto = $this->input->post('img');

        $config['allowed_types'] = "jpg|jpeg|png";
        $config['max_size'] = 100;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;

        $caminhoCompleto = "assets/img/banners/".$_FILES["img"]["name"];
        $tipoArquivo = 'jpg'; //pathinfo($caminhoCompleto, PATHINFO_EXTENSION);
        $novo_nome = "banner_".date("dmYhis").".".$tipoArquivo;
        $caminhoCompleto2 = "assets/img/banners/".$novo_nome;

         if(move_uploaded_file($_FILES["img"]["tmp_name"], $caminhoCompleto)) {
            if(!rename($caminhoCompleto,  $caminhoCompleto2)){
                echo "ERRO AO RENOMEAR A IMAGEM DO BANNER";exit;
            }
         } else {
             echo 'ERRO AO COPIAR A IMAGEM AO SERVIDOR, ENTRE EM CONTATO COM O RESPONSÁVEL PELO SITE!'; exit;
         }

        $Gravar = array (
            'titulo_banner' => $this->input->post('titulo'),
            'img_banner'    => $novo_nome,
            'create_banner' => date('Y-m-d H:m:s'),
        );

        // echo '<pre>';
        // print_r($Gravar); exit;
        
        $this->load->model('Banner_model');
        $this->Banner_model->GravaBanner($Gravar);

        if (!empty($Gravar)) {
            $this->session->set_flashdata('Success', 'Banner Cadastrado com Sucesso');
            redirect(site_url('NovoBanner'));
        } else {
            $this->session->set_flashdata('Error', 'Ocorreu algum problema, verifique os dados e tente novamente!');
            redirect(site_url('NovoBanner'));
        }
    }

// 	public function AlterarBanner() {
//         $msg = null;
// 		if ($this->session->flashdata('Success') !="") {
// 			$msg = $this->session->flashdata('Success');
// 		} else {
// 			$msg = $this->session->flashdata('Error');
//         }

//         $idBanner = $this->uri->segment(3);

//         $this->load->model('Banner_model');
//         $lista = $this-Banner_model->DetalheBanner($idBanner);
        
//         $dados = array('titulo' =>'Alterar Banner - Creche Núcleo Bandeirante Vó Filomena', 'texto' => $lista, 'msg' => $msg);
        
//         $this->load->view('s_header', $dados);
//         $this->load->view('s_banner_alterar', $dados);
//         $this->load->view('s_footer');
//     }
        
//     public function AlterarBanner() {
//         $idBanner = $this->input->post('id');

//         $Alterar = array (
//             'titulo_banner'  => $this->input->post('titulo'),
//             'img_banner' => $this->input->post('img'),
//             'alter_banner' => date('Y-m-d H:m:s'),
//         );

//         // echo '<pre>';
//         // print_r($Alterar); exit;

//         $this->load->model('Banner_model');
//         $this->Banner_model->AlteraBanner($idBanner, $Alterar);

//         if (!empty($Alterar)) {
//             $this->session->set_flashdata('Success', 'Banner Alterado com Sucesso');
//             redirect('Banners/AlterarBanner/'.$idBanner);
//         } else {
//             $this->session->set_flashdata('Error', 'Ocorreu algum problema, verifique os dados e tente novamente!');
//             redirect('Banners/AlterarBanner/'.$idBanner);
//         }
//     }
    
    public function ExcluirBanner() {
        $idBanner = $this->uri->segment(3);
                
        $this->load->model('Banner_model');
        $true = $this->Banner_model->DeletaBanner($idBanner);

        if ($true == TRUE) {
            echo "<script> alert('BANNER EXCLUÍDO COM SUCESSO!') </script>";
            echo "<script> location.href=('../verBanners')</script>";
        }
    }
}
