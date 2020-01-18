<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Noticia_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	#MOSTRA OS BANNER CADASTRADOS
	public function MostraNoticia() {
		return $this->db->get('noticias')->result();
	}

	#MOSTRA OS BANNER CADASTRADOS
	public function MostraNoticiaSite($NumReg) {
		$this->db->limit($NumReg);
		return $this->db->get('noticias')->result();
	}

	#MOSTRA OS DADOS DO BANNER
	public function DetalheNoticia($idNoticia) {
		$this->db->where('id_noticia', $idNoticia);
		return $this->db->get('noticias')->result();

	}

    #INSERE DADOS DO BANNER NO BANCO DE DADOS
	public function GravaNoticia ($Gravar) {
        $this->db->insert('noticias', $Gravar);
	}
	
	#ALTERA O BANNER NO BANCO DE DADOS
	public function AlteraNoticia ($idNoticia, $Alterar) {
		$this->db->where('id_noticia', $idNoticia);
		$this->db->update('noticias', $Alterar);
		return TRUE;
    }
    
    #EXCLUÍ O BANNER NO BANCO DE DADOS
	public function DeletaNoticia ($idNoticia) {
		$this->db->where('id_noticia', $idNoticia);
		$this->db->delete('noticias');
		return TRUE;
	}
    
}