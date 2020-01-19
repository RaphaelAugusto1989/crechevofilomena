<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('America/Sao_Paulo');

class Galeria extends CI_Controller {

	function __construct() {
		parent::__construct(); 
	}
   
    public function verGaleria() {
        $this->load->model('Galeria_model');
        $lista = $this->Galeria_model->MostraAlbum();

        $dados = array('titulo' =>'Galeria - Creche Núcleo Bandeirante Vó Filomena', 'galeria' => $lista);
        
        $this->load->view('s_header', $dados);
        $this->load->view('s_galeria_visualizar', $dados);
        $this->load->view('s_footer');
	}

    public function NovaGaleria() {
        $msg = null;
		if ($this->session->flashdata('Success') !="") {
			$msg = $this->session->flashdata('Success');
		} else {
			$msg = $this->session->flashdata('Error');
        }

        $dados = array('titulo' =>'Cadastrar Albúm - Creche Núcleo Bandeirante Vó Filomena', 'msg' => $msg);
        
        $this->load->view('s_header', $dados);
        $this->load->view('s_galeria_cadastro', $dados);
        $this->load->view('s_footer');
	}

	       
    public function CadastrarGaleria() {
        $Titulo = mb_strtolower($this->input->post('titulo'), "utf-8"); //TRANFORMA TODAS AS LETRAS EM MINUSCULAS
        
        $NomePasta = preg_replace('/[ -]+/', '_' , $Titulo).'_'.date("dmYhis"); //SUBSTITUI OS ESPAÇOS EM UNDERLINE _
        $pastaCriada = mkdir('assets/img/albuns/'.$NomePasta.'',  0777, true); //CRIA A PASTA DO ALBUM A SER CADASTRADO
        
        if ($pastaCriada) {
            $namefoto = $this->input->post('img');

            $config['allowed_types'] = "jpg|jpeg|png";
            $config['max_size'] = 100;
            $config['max_width'] = 1024;
            $config['max_height'] = 768;

            $caminhoCompleto = "assets/img/albuns/".$NomePasta."/".$_FILES["img"]["name"];
            $tipoArquivo = 'jpg'; //pathinfo($caminhoCompleto, PATHINFO_EXTENSION);
            $novo_nome = "capa_".date("dmYhis").".".$tipoArquivo;
            $caminhoCompleto2 = "assets/img/albuns/".$NomePasta."/".$novo_nome;

            if(move_uploaded_file($_FILES["img"]["tmp_name"], $caminhoCompleto)) {
                if(!rename($caminhoCompleto,  $caminhoCompleto2)){
                    echo "ERRO AO RENOMEAR A IMAGEM DO BANNER";exit;
                }
            } else {
                echo 'ERRO AO COPIAR A IMAGEM AO SERVIDOR, ENTRE EM CONTATO COM O RESPONSÁVEL PELO SITE!'; exit;
            }
        
            $Gravar = array (
                'titulo_album'  => $this->input->post('titulo'),
                'img_album'     => $caminhoCompleto2,
                'pasta_album'   => $NomePasta,
                'create_album'  => date('Y-m-d H:m:s'),
            );
            
            $this->load->model('Galeria_model');
            $idGaleria = $this->Galeria_model->GravaAlbum($Gravar);
            
            if (!empty($Gravar)) {
                //$this->session->set_flashdata('Success', 'Albúm Cadastrado com Sucesso');
                redirect(site_url('NovasFotos/'.$idGaleria)); //REDIRECIONA PARA A FUNÇÃO CADASTRAR FOTOS DO ALBUM
            } else {
                $this->session->set_flashdata('Error', 'Ocorreu algum problema, verifique os dados e tente novamente!');
                redirect(site_url('NovoGaleria'));
            }
        } else {
            $this->session->set_flashdata('Error', 'PASTA PARA CRIAÇÃO DO ALBUM NÃO PODE SER CRIADA, O PROBLEMA COM O RESPONSAVEL PELO SITE!');
            redirect(site_url('NovoGaleria'));
        }
    }

	public function AlterarGaleria() {
        $msg = null;
		if ($this->session->flashdata('Success') !="") {
			$msg = $this->session->flashdata('Success');
		} else {
			$msg = $this->session->flashdata('Error');
        }

        $idGaleria = $this->uri->segment(3);

        $this->load->model('Galeria_model');
        $lista = $this->Galeria_model->DetalheAlbum($idGaleria);
        
        $dados = array('titulo' =>'Alterar Albúm - Creche Núcleo Bandeirante Vó Filomena', 'album' => $lista, 'msg' => $msg);
        
        $this->load->view('s_header', $dados);
        $this->load->view('s_galeria_alterar', $dados);
        $this->load->view('s_footer');
    }
        
    public function AlteraGaleria() {
        $idGaleria = $this->input->post('id'); 
        $NomeCapa = $this->input->post('capa'); 

        // echo '<pre>';
        // print_r($_FILES["img"]); exit;

        if ($_FILES["img"]["name"] == "") {
            $Alterar = array (
                'titulo_album'  => $this->input->post('titulo'),
                'alter_album' => date('Y-m-d H:m:s'),
            );
        } else {
            $nomeImg = explode('/', $NomeCapa);
            $pasta = $nomeImg[3]; //PEGA O NOME DA PASTA DO ALBUM 
            $Capa = $nomeImg[4]; //PEGA O NOME DA CAPA JÁ CADASTRADA

            $config['allowed_types'] = "jpg|jpeg|png";
            $config['max_size'] = 100;
            $config['max_width'] = 1024;
            $config['max_height'] = 768;

           $caminhoCompleto = "assets/img/albuns/".$pasta."/".$_FILES["img"]["name"];
           $novo_nome = $Capa; 
           $caminhoCompleto2 = "assets/img/albuns/".$pasta."/".$novo_nome;

            if(move_uploaded_file($_FILES["img"]["tmp_name"], $caminhoCompleto)) {
                if(!rename($caminhoCompleto,  $caminhoCompleto2)){
                    echo "ERRO AO RENOMEAR A IMAGEM DO BANNER";exit;
                }
            } else {
                echo 'ERRO AO COPIAR A IMAGEM AO SERVIDOR, ENTRE EM CONTATO COM O RESPONSÁVEL PELO SITE!'; exit;
            }

            $Alterar = array (
                'titulo_album'  => $this->input->post('titulo'),
                'img_album' => $caminhoCompleto2,
                'alter_album' => date('Y-m-d H:m:s'),
            );
        }

        $this->load->model('Galeria_model');
        $this->Galeria_model->AlteraAlbum($idGaleria, $Alterar);

        if (!empty($Alterar)) {
            $this->session->set_flashdata('Success', 'Albúm Alterado com Sucesso');
            redirect('Galeria/AlterarGaleria/'.$idGaleria);
        } else {
            $this->session->set_flashdata('Error', 'Ocorreu algum problema, verifique os dados e tente novamente!');
            redirect('Galeria/AlterarGaleria/'.$idGaleria);
        }
    }
    
    public function ExcluirGaleria() {
        $idGaleria = $this->uri->segment(3);

        $this->load->model('Galeria_model');
        $lista = $this->Galeria_model->DetalheAlbum($idGaleria);
        $true = $this->Galeria_model->DeletaAlbum($idGaleria);

        if ($true == true) {
            $this->load->model('Fotos_model');
            $true = $this->Fotos_model->DeletaFotos($idGaleria);
        }

        if ($true == TRUE) {
            foreach ($lista as $value => $list) {
               $dir = 'assets/img/albuns/'.$lista[$value]->pasta_album;
                if($x = opendir($dir)){
                    while(false !== ($file = readdir($x))){
                        if($file != '.' && $file != '..'){
                            $path = $dir.'/'.$file;
                                if(is_dir($path)){
                                    self::excluiDir($path);
                                    //RemoveDir($path);
                                }else if(is_file($path)){
                                    unlink($path);
                                }
                        }
                    }
                    closedir($x);
                }
                rmdir($dir);
            }

            echo "<script> alert('ALBÚM EXCLUÍDO COM SUCESSO!') </script>";
            echo "<script> location.href=('../verGaleria')</script>";
        } else {
            echo "<script> alert('ERRO AO EXCLUIR ÁBUM, TENTE NOVAMENTE MAIS TARDE!') </script>";
            echo "<script> location.href=('../verGaleria')</script>";
        }
    }

    public function NovasFotos() {
        $idAlbum = $this->uri->segment(2);

        $dados = array('titulo' =>'Cadastrar Fotos - Creche Núcleo Bandeirante Vó Filomena', 'id_album' => $idAlbum );

        $this->load->view('s_header', $dados);
        $this->load->view('s_galeria_fotos_cadastro', $dados);
        $this->load->view('s_footer');
	}

    public function CadastrarFotos() {
        $idGaleria = $this->input->post('id_album');
        $Gravar = null;

        $this->load->model('Galeria_model');
        $lista = $this->Galeria_model->DetalheAlbum($idGaleria);

        foreach ($lista as $value => $l) {
            $NomePasta = $lista[$value]->pasta_album; //ENDEREÇO DA PASTA PARA ONDE VAI AS FOTOS
        
           // echo'<pre>'; print_r($_FILES); exit;
            foreach ($_FILES['img']['name'] as $f => $foto) {
                
                $config['allowed_types'] = "jpg|jpeg|png";
                $config['max_size'] = 100;
                $config['max_width'] = 1024;
                $config['max_height'] = 768;

                $caminhoCompleto = "assets/img/albuns/".$NomePasta."/".$_FILES["img"]["name"][$f];
                $tipoArquivo = 'jpg'; //pathinfo($caminhoCompleto, PATHINFO_EXTENSION);
                $novo_nome = "foto".$f."_".$idGaleria."_".date("dmYhis").".".$tipoArquivo;
                $caminhoCompleto2 = "assets/img/albuns/".$NomePasta."/".$novo_nome;

                if(move_uploaded_file($_FILES["img"]["tmp_name"][$f], $caminhoCompleto)) {
                    //echo'<pre>'; print_r($c); exit;
                    if(!rename($caminhoCompleto,  $caminhoCompleto2)){
                        echo "ERRO AO RENOMEAR A IMAGEM DO BANNER";exit;
                    }
                } else {
                    echo 'ERRO AO COPIAR A IMAGEM AO SERVIDOR, ENTRE EM CONTATO COM O RESPONSÁVEL PELO SITE!'; exit;
                }

                $Gravar = array (
                    'fk_id_album'  => $idGaleria,
                    'img_foto' => $caminhoCompleto2,
                    'create_foto' => date('Y-m-d H:m:s'),
                );
                
                $Gravar = $this->Galeria_model->GravaFotos($Gravar);
          
            }//FIM FOREACH FOTOS
        }//FIM FOREACH LISTA

            if (!empty($Gravar)) {
                $this->session->set_flashdata('Success', 'Albúm Cadastrado com Sucesso');
                redirect(site_url('NovaGaleria')); 
            } else {
                $this->session->set_flashdata('Error', 'Ocorreu algum problema, verifique os dados e tente novamente!');
                redirect(site_url('NovaGaleria'));
            }
        
    }

    public function AlteraNovasFotos() {
        $idGaleria = $this->uri->segment(3);

        $this->load->model('Galeria_model');
		$galeria = $this->Galeria_model->DetalheAlbum($idGaleria);
        $fotos = $this->Galeria_model->DetalheAlbumFotos($idGaleria);
        
        $dados = array('titulo' =>'Cadastrar Fotos - Creche Núcleo Bandeirante Vó Filomena', 'id_album' => $idGaleria, 'foto' => $fotos);

        $this->load->view('s_header', $dados);
        $this->load->view('s_galeria_fotos_altera', $dados);
        $this->load->view('s_footer');
    }
    
    public function ExcluirFoto() {
        $idFotos = $this->uri->segment(3);

        $this->load->model('Fotos_model');
        $lista = $this->Fotos_model->DetalheFotos($idFotos);
        $true = $this->Fotos_model->DeletaFoto($idFotos);

            foreach ($lista as $value => $list) {
                $dir = $lista[$value]->img_foto;

                if ($true == true) {
                    $Excluido = unlink($dir);
                } else {
                    echo "<script> alert('PROBLEMA AO EXCLUIR FOTO, TENTE NOVAMENTE!') </script>";
                    echo "<script> location.href=('".site_url()."/Galeria/AlteraNovasFotos/".$lista[$value]->fk_id_album."')</script>";
                } 
               
            }
            if ($Excluido == true) {
                echo "<script> alert('FOTO EXCLUÍDA COM SUCESSO!') </script>";
                echo "<script> location.href=('".site_url()."/Galeria/AlteraNovasFotos/".$lista[$value]->fk_id_album."')</script>";
            }
    }
}
