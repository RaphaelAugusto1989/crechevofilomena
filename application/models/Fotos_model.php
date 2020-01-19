<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fotos_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	#MOSTRA OS BANNER CADASTRADOS
	public function MostraFotos() {
		return $this->db->get('fotos_album')->result();
	}

	#MOSTRA OS DADOS DO BANNER
	public function DetalheFotos($idFotos) {
		$this->db->where('id_foto', $idFotos);
		return $this->db->get('fotos_album')->result();

	}

    #INSERE DADOS DO BANNER NO BANCO DE DADOS
	public function GravaFotos ($Gravar) {
        $this->db->insert('fotos_album', $Gravar);
	}
	
	#ALTERA O BANNER NO BANCO DE DADOS
	public function AlteraFotos ($idFotos, $Alterar) {
		$this->db->where('id_fotos', $idFotos);
		$this->db->update('fotos_album', $Alterar);
		return TRUE;
    }
    
    #EXCLUÍ TODAS AS FOTOS DO ALBUM NO BANCO DE DADOS
	public function DeletaFotos ($idGaleria) {
		$this->db->where('fk_id_album', $idGaleria);
		$this->db->delete('fotos_album');
		return TRUE;
	}

	#EXCLUÍ UMA UNICA FOTO DO ALBUM NO BANCO DE DADOS
	public function DeletaFoto ($idFotos) {
		$this->db->where('id_foto', $idFotos);
		$this->db->delete('fotos_album');
		return TRUE;
	}
    
}