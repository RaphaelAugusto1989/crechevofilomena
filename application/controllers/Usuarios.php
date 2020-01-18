<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('America/Sao_Paulo');

class Usuarios extends CI_Controller {

	function __construct() {
                parent::__construct(); 
                // $this->ValidaLogin->TimerExpired();
	}

	public function login() {
                $msg = null;

		if ($this->session->flashdata('Success') !="") {
			$msg = $this->session->flashdata('Success');
		} else {
			$msg = $this->session->flashdata('Error');
                }

		$dados = array('titulo' =>'Login- Creche Núcleo Bandeirantes Vó Filomena', 'msg' => $msg);
		$this->load->view('Login', $dados);
        }

        public function AutenticaLogin()	{
		$login = $this->input->post('login');
		$pass = md5($this->input->post('senha'));

		$this->load->model('Usuario_model');
                $user = $this->Usuario_model->OpenUser($login, $pass);
                
                if(!empty($user)) {
                        $this->session->set_userdata('timer', time() + (60 * 1)); //1 minuto
                        $this->session->set_userdata('idUsuario', $user[0]->id_usuario);
                        $this->session->set_userdata('nome', $user[0]->nome_usuario);

                        redirect(site_url('Sistema'));
                } else {                       
                        $this->session->set_flashdata('Error', 'Usuário ou Senha Incorreto!');
                        redirect(site_url('Login'));
                }	
        }
    
        public function Sistema() {

                $dados = array('titulo' =>'Site- Creche Núcleo Bandeirantes Vó Filomena');
                
                $this->load->view('s_header', $dados);
                $this->load->view('sistema', $dados);
                $this->load->view('s_footer');
        }
        
        public function verUsuarios() {
                $this->load->model('Usuario_model');
                $ContUsuario = $this->Usuario_model->MostraTodosUsuarios();
                $NumReg = 8; #QTD DE REGISTROS A SER MOSTRADO POR PÁGINA

		$pg = isset($_GET["pg"]) ? $_GET["pg"] : 1;
		$Inicial = ($pg * $NumReg) - $NumReg;

		$TotalReg = count($ContUsuario);

                $lista = $this->Usuario_model->MostraUsuarios($Inicial, $NumReg);

                $dados = array('titulo' =>'Usuários - Creche Núcleo Bandeirantes Vó Filomena', 'usuarios' => $lista);
                
                $this->load->view('s_header', $dados);
                $this->load->view('s_usuarios_visualizar', $dados);
                $this->load->view('s_footer');
	}

	public function NovoUsuario() {
                $msg = null;
		if ($this->session->flashdata('Success') !="") {
			$msg = $this->session->flashdata('Success');
		} else {
			$msg = $this->session->flashdata('Error');
                }
                
                $dados = array('titulo' =>'Novo Usuário - Creche Núcleo Bandeirantes Vó Filomena', 'msg' => $msg);
                
                $this->load->view('s_header', $dados);
                $this->load->view('s_usuario_cadastro', $dados);
                $this->load->view('s_footer');
        }
        
        public function CadastraUsuario() {
                //DETERMINA OS CARACTERES QUE CONTERÃO A SENHA
                $Caracteres = "0123456789abcdefghijklmnopqrstuvwxyz@#$%&!+";
                //EMBARALHA OS CARACTERES E PEGA APENAS OS 10 PRIMEIROS
                $Password = substr(str_shuffle($Caracteres),0,10);
                //EXIBE O RESULTADO
                $Senha = $Password;

                $Gravar = array (
                        'nome_usuario'  => $this->input->post('nome'),
                        'email_usuario' => $this->input->post('email'),
                        'cpf_usuario'   => $this->input->post('cpf'),
                        'login_usuario' => $this->input->post('login'),
                        'senha_usuario' => md5($Senha),
                        'create_usuario' => date('Y-m-d H:m:s'),
                );
             
                $this->load->model('Usuario_model');
                $this->Usuario_model->GravaUsuario($Gravar);

                //INICIO ENVIO DO EMAIL PARA USUÁRIO CADASTRADO
                $Nome = $this->input->post('nome');
		$To = $this->input->post('email');
                $Subject = "Dados de acesso ao site!";

                $Message = "<html lang='pt-br'>
                                <body style='font-family: arial; font-size: 14px; background-color: #D3D3D3; padding: 20px 0 20px 0;'>
                                <div style='margin: 0 auto; border: 0 solid; width: 70%; padding: 20px; border: 1px solid #000000; background-color: #ffffff;'>
                                        <div style='text-align: center;'>
                                        <img src='https://http://crechevofilomena.com.br/assets/img/logo.png' style='width: 10%; min-width: 110px;'>
                                        </div>
                                        <div>
                                        <p>Olá, ".$Nome.". </p>
                                        <p>Seu acesso ao site da Creche Vó Filomena está liberado!</p>
                                        <p>Você pode acessar tanto com seu e-mail cadastrado quanto com o login, segue a baixo os dados de acesso:</p>
                                        <p>Acessar: <a href='http://www.crechevofilomena.com.br/Login' target='_blank'>www.crechevofilomena.com.br/Login</p>
                                        <p>Login: <b>".$this->input->post('email')."</b> ou <b>".$this->input->post('login')."</b></p>
                                        <p>Senha: <b>".$Senha."</b></p>
                                        <p>Aconcelhamos que ao acessar, troque sua senha!</p>
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
                
                $Enviado = mail($To, $Subject, $Message, $Headers);

                if (!empty($Gravar)) {
			$this->session->set_flashdata('Success', 'Usuario Cadastrado com Sucesso');
			redirect(site_url('NovoUsuario'));
		} else {
			$this->session->set_flashdata('Error', 'Ocorreu algum problema, verifique os dados e tente novamente!');
			redirect(site_url('NovoUsuario'));
		}
        }

	public function AlterarUsuario() {
                $msg = null;

		if ($this->session->flashdata('Success') !="") {
			$msg = $this->session->flashdata('Success');
		} else {
			$msg = $this->session->flashdata('Error');
                }

                $idUsuario = $this->uri->segment(3);

                $this->load->model('Usuario_model');
                $lista = $this->Usuario_model->DetalheUsuario($idUsuario);
                
                $dados = array('titulo' =>'Novo Usuário - Creche Núcleo Bandeirantes Vó Filomena', 'usuario' => $lista, 'msg' => $msg);
                
                $this->load->view('s_header', $dados);
                $this->load->view('s_usuario_alterar', $dados);
                $this->load->view('s_footer');
        }
        
        public function AlterUsuario() {
                $idUsuario = $this->input->post('id');

                $Alterar = array (
                        'nome_usuario'  => $this->input->post('nome'),
                        'email_usuario' => $this->input->post('email'),
                        'cpf_usuario'   => $this->input->post('cpf'),
                        'login_usuario' => $this->input->post('login'),
                        'alter_usuario' => date('Y-m-d H:m:s'),
                );

                $this->load->model('Usuario_model');
                $this->Usuario_model->AlteraUsuario($idUsuario, $Alterar);

                if (!empty($Alterar)) {
                        $this->session->set_flashdata('Success', 'Usuario Alterado com Sucesso');
                        echo "<script> location.href = document.referrer;</script>";
			//redirect('Usuarios/AlterarUsuario/'.$idUsuario);
		} else {
			$this->session->set_flashdata('Error', 'Ocorreu algum problema, verifique os dados e tente novamente!');
			redirect('Usuarios/AlterarUsuario/'.$idUsuario);
		}
        }
        
        public function ExcluirUsuario() {
                $idUsuario = $this->uri->segment(3);
                
		$this->load->model('Usuario_model');
		$true = $this->Usuario_model->DeletaUsuario($idUsuario);

		if ($true == TRUE) {
			echo "<script> alert('USUÁRIO EXCLUÍDO COM SUCESSO!') </script>";
			echo "<script> location.href=('../verUsuarios')</script>";
		}
        }

        //ABRE A PÁGINA DOS DADOS DO USUÁRIO LOGADO
        public function MeusDados() {
                $msg = null;
		if ($this->session->flashdata('Success') !="") {
			$msg = $this->session->flashdata('Success');
		} else {
			$msg = $this->session->flashdata('Error');
                }

                $idUsuario = $this->session->userdata('idUsuario');

                $this->load->model('Usuario_model');
                $lista = $this->Usuario_model->DetalheUsuario($idUsuario);
                
                $dados = array('titulo' =>'Meus Dados - Creche Núcleo Bandeirantes Vó Filomena', 'msg' => $msg, 'usuario' => $lista);
                
                $this->load->view('s_header', $dados);
                $this->load->view('s_meus_dados_alterar', $dados);
                $this->load->view('s_footer');
        }

        //ABRE A PÁGINA PARA ALTERAR A SENHA DO USUÁRIO LOGADO
        public function NovaSenha() {
                $msg = null;
		if ($this->session->flashdata('Success') !="") {
			$msg = $this->session->flashdata('Success');
		} else {
			$msg = $this->session->flashdata('Error');
                }

                $idUsuario = $this->session->userdata('idUsuario');

                $this->load->model('Usuario_model');
                $lista = $this->Usuario_model->DetalheUsuario($idUsuario);
                
                $dados = array('titulo' =>'Alterar Senha - Creche Núcleo Bandeirantes Vó Filomena', 'msg' => $msg, 'usuario' => $lista);
                
                $this->load->view('s_header', $dados);
                $this->load->view('s_senha_alterar', $dados);
                $this->load->view('s_footer');
        }

        public function AlterarSenha() {
                $idUsuario = $this->input->post('id');
                $senhaAntiga = md5($this->input->post('senha_antiga'));
                $NovaSenha1 = md5($this->input->post('nova_senha'));
                $NovaSenha2 = md5($this->input->post('nova_senha2'));

                $this->load->model('Usuario_model');
                $lista = $this->Usuario_model->DetalheUsuario($idUsuario);

                foreach($lista as $v => $us) {
                        if ($senhaAntiga != $lista[$v]->senha_usuario) {
                                $this->session->set_flashdata('Error', 'Senha antiga não confere!');
                                echo "<script> location.href = document.referrer;</script>";
                                exit;
                        }

                        if ($NovaSenha1 != $NovaSenha2) {
                                $this->session->set_flashdata('Error', 'Confirmação da senha não é identica com a nova senha!');
                                echo "<script> location.href = document.referrer;</script>";
                                exit;
                        }
                }

                $Alterar = array (
                        'senha_usuario' => $NovaSenha2,
                        'alter_usuario' => date('Y-m-d H:m:s'),
                );

                $this->Usuario_model->AlteraUsuario($idUsuario, $Alterar);

                if (!empty($Alterar)) {
                        $this->session->set_flashdata('Success', 'Senha Alterada com Sucesso');
                        echo "<script> location.href = document.referrer;</script>";
			//redirect('Usuarios/AlterarUsuario/'.$idUsuario);
		} else {
			$this->session->set_flashdata('Error', 'Ocorreu algum problema, verifique os dados e tente novamente!');
			redirect('Usuarios/AlterarUsuario/'.$idUsuario);
		}
        }

        //PAGINA PARA RECUPERAR A SENHA
        public function RecuperarSenha() { 
                $msg = null;
		if ($this->session->flashdata('Success') !="") {
			$msg = $this->session->flashdata('Success');
		} else {
			$msg = $this->session->flashdata('Error');
                }

                $dados = array('titulo' =>'Recuperar minha senha - Creche Núcleo Bandeirantes Vó Filomena', 'msg' => $msg);
                
                $this->load->view('EsqueciMinhaSenha', $dados);
        }

        //CONFIRMA A RECUPERAÇÃO DA SENHA
        public function ConfirmaRecuperaSenha() { 
                $email = $this->input->post('email');
                $cpf = $this->input->post('cpf');

                $this->load->model('Usuario_model');
                $lista = $this->Usuario_model->ConirmaUsuarioRecuperaSenha($email, $cpf);

                if (!empty($lista)) {
                        foreach($lista as $v => $us) {
                                if ($email == $lista[$v]->email_usuario && $cpf == $lista[$v]->cpf_usuario) {
                                        redirect('Usuarios/AlterarRecuperarSenha/'.$lista[$v]->id_usuario.'');
                                }
                        }
                } else {
                        $this->session->set_flashdata('Error', 'E-mail e/ou CPF não cadastrados, verifique os dados novamente!');
                        redirect('Usuarios/RecuperarSenha/'.$lista[$v]->id_usuario);
                        //echo "<script> location.href = document.referrer;</script>";
                }
        }

        //PAGINA PARA ALTERAR A SENHA RECUPERADA
        public function AlterarRecuperarSenha() { 
                $msg = null;
		if ($this->session->flashdata('Success') !="") {
			$msg = $this->session->flashdata('Success');
		} else {
			$msg = $this->session->flashdata('Error');
                }

                $idUsuario = $this->uri->segment(3);

                $this->load->model('Usuario_model');
                $lista = $this->Usuario_model->DetalheUsuario($idUsuario);

                $dados = array('titulo' =>'Recuperar minha senha - Creche Núcleo Bandeirantes Vó Filomena', 'msg' => $msg, 'usuario' => $lista);
                
                $this->load->view('AlterarSenha', $dados);
        }

        public function AlterarSenhaEsquecida() {
                $idUsuario = $this->input->post('id');
                $NovaSenha1 = md5($this->input->post('nova_senha'));
                $NovaSenha2 = md5($this->input->post('nova_senha2'));

                $this->load->model('Usuario_model');
                $lista = $this->Usuario_model->DetalheUsuario($idUsuario);

                if ($NovaSenha1 != $NovaSenha2) {
                        $this->session->set_flashdata('Error', 'Confirmação da senha não é identica com a nova senha!');
                        redirect('Usuarios/AlterarRecuperarSenha/'.$idUsuario);
                        // echo "<script> location.href = document.referrer;/$idUsuario</script>";
                        exit;
                }

                $Alterar = array (
                        'senha_usuario' => $NovaSenha2,
                        'alter_usuario' => date('Y-m-d H:m:s'),
                );

                $this->Usuario_model->AlteraUsuario($idUsuario, $Alterar);

                if (!empty($Alterar)) {
                        echo "<script> alert('Senha Alterada com Sucesso!')</script>";
                        echo "<script> location.href = ('https://crechevofilomena.com.br/index.php/Login');</script>";
		} else {
                        $this->session->set_flashdata('Error', 'Ocorreu algum problema, verifique os dados e tente novamente!');
                        echo "<script> location.href = document.referrer;</script>";
		}
        }
        
        public function Logout() {
                session_start();
                $_SESSION = array();
                session_unset ();
                session_destroy ();
                redirect(site_url().'/Login');
        }
}
