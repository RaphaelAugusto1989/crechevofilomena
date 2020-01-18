<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	#LOGA O USUARIO NO SISTEMA
	public function OpenUser($login, $pass) {
		$this->db->where('email_usuario', $login);
		$this->db->or_where('login_usuario', $login);
		$this->db->where('senha_usuario', $pass);
		$user = $this->db->get('usuarios')->result();
		return $user;
	}

	#MOSTRA OS USUARIOS CADASTRADOS
	public function MostraTodosUsuarios() {
		return $this->db->get('usuarios')->result();
	}

	#MOSTRA OS DADOS DO USUÁRIO
	public function DetalheUsuario($idUsuario) {
		$this->db->where('id_usuario', $idUsuario);
		return $this->db->get('usuarios')->result();
	}

    #MOSTRA OS USUARIOS CADASTRADOS
	public function MostraUsuarios ($Inicial, $NumReg) {
		$this->db->limit($NumReg, $Inicial);
		$this->db->order_by('nome_usuario', 'ASC');
		return $this->db->get('usuarios')->result();
	}

    #INSERE DADOS DO USUARIO NO BANCO DE DADOS
	public function GravaUsuario ($Gravar) {
        $this->db->insert('usuarios', $Gravar);
	}
	
	#ALTERA O USUARIO NO BANCO DE DADOS
	public function AlteraUsuario ($idUsuario, $Alterar) {
		$this->db->where('id_usuario', $idUsuario);
		$this->db->update('usuarios', $Alterar);
		return TRUE;
	}

	#MOSTRA OS DADOS DO USUÁRIO
	public function ConirmaUsuarioRecuperaSenha($email, $cpf) {
		$this->db->where('email_usuario', $email);
		$this->db->where('cpf_usuario', $cpf);
		return $this->db->get('usuarios')->result();
	}

	#EXCLUÍ O USUARIO NO BANCO DE DADOS
	public function DeletaUsuario ($idUsuario) {
		$this->db->where('id_usuario', $idUsuario);
		$this->db->delete('usuarios');
		return TRUE;
	}
    
}