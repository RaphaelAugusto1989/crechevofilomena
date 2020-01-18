<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contatos_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	#MOSTRA OS BANNER CADASTRADOS
	public function MostraContatos() {
		return $this->db->get('contatos')->result();
	}

	#MOSTRA OS DADOS DO BANNER
	public function DetalheContato($idContato) {
		$this->db->where('id_contato', $idContato);
		return $this->db->get('contatos')->result();
	}

    #INSERE DADOS DO BANNER NO BANCO DE DADOS
	public function GravaContato ($Gravar) {
        $this->db->insert('contatos', $Gravar);
	}
   
    #EXCLUÍ O BANNER NO BANCO DE DADOS
	public function DeletaContato ($idContato) {
		$this->db->where('id_contato', $idContato);
		$this->db->delete('contatos');
		return TRUE;
	}

	#GRAVA RESPOSTA NO BANCO
	public function GravaResposta($Gravar) {
		$this->db->insert('resposta_contato', $Gravar);
	}

	#MOSTRA OS RESPOSTA DO CONTATO FEITO
	public function DetalheRespostaContato($idContato) {
		$this->db->where('fk_id_contato', $idContato);
		return $this->db->get('resposta_contato')->result();
	}

	#EXCLUÍ O RESPOSTA DO CONTATO NO BANCO DE DADOS
	public function DeletaResposta ($idContato) {
		$this->db->where('fk_id_contato', $idContato);
		$this->db->delete('resposta_contato');
		return TRUE;
	}
    
}