<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeria_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	#MOSTRA OS ALBUNS CADASTRADOS
	public function MostraAlbum() {
		return $this->db->get('album')->result();
	}

	#MOSTRA 4 ALBUNS NO INDEX
	public function MostraAlbumSite($NumReg) {
		$this->db->limit($NumReg);
		return $this->db->get('album')->result();
	}

	#MOSTRA OS DADOS DA album
	public function DetalheAlbum($idGaleria) {
		$this->db->where('id_album', $idGaleria);
		return $this->db->get('album')->result();
	}

	#MOSTRA OS DADOS DA album
	public function DetalheAlbumFotos($idGaleria) {
		$this->db->where('fk_id_album', $idGaleria);
		return $this->db->get('fotos_album')->result();
	}

    #INSERE DADOS DA album NO BANCO DE DADOS
	public function GravaAlbum ($Gravar) {
		$this->db->insert('album', $Gravar);
		return $id = $this->db->insert_id();
	}

	#INSERE DADOS DA album NO BANCO DE DADOS
	public function GravaFotos ($Gravar) {
		$this->db->insert('fotos_album', $Gravar);
		return $this->db->insert_id();
	}
	
	#ALTERA A album NO BANCO DE DADOS
	public function AlteraAlbum ($idAlbum, $Alterar) {
		$this->db->where('id_album', $idAlbum);
		$this->db->update('album', $Alterar);
		return TRUE;
    }
    
    #EXCLUÍ A album NO BANCO DE DADOS
	public function DeletaAlbum ($idGaleria) {
		$this->db->where('id_album', $idGaleria);
		$this->db->delete('album');
		return TRUE;
	}
    
}