<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Creche_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	#MOSTRA OS TEXTO CADASTRADOS
	public function MostraQuemSomos() {
		return $this->db->get('quem_somos')->result();
	}

	#MOSTRA OS DADOS DO TEXTO
	public function DetalheTexto($idTexto) {
		$this->db->where('id_quemsomos', $idTexto);
		return $this->db->get('quem_somos')->result();

	}

    #INSERE DADOS DO TEXTO NO BANCO DE DADOS
	public function GravaTexto ($Gravar) {
        $this->db->insert('quem_somos', $Gravar);
	}
	
	#ALTERA O TEXTO NO BANCO DE DADOS
	public function AlteraTexto ($idTexto, $Alterar) {
		$this->db->where('id_quemsomos', $idTexto);
		$this->db->update('quem_somos', $Alterar);
		return TRUE;
    }
    
    #EXCLUÍ O TEXTO NO BANCO DE DADOS
	public function DeletaTexto ($idTexto) {
		$this->db->where('id_quemsomos', $idTexto);
		$this->db->delete('quem_somos');
		return TRUE;
	}
    
}