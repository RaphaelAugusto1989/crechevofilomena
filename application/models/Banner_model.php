<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	#MOSTRA OS BANNER CADASTRADOS
	public function MostraBanner() {
		return $this->db->get('banners')->result();
	}

	#MOSTRA OS DADOS DO BANNER
	public function DetalheBanner($idBanner) {
		$this->db->where('id_banner', $idBanner);
		return $this->db->get('banners')->result();

	}

    #INSERE DADOS DO BANNER NO BANCO DE DADOS
	public function GravaBanner ($Gravar) {
        $this->db->insert('banners', $Gravar);
	}
	
	#ALTERA O BANNER NO BANCO DE DADOS
	public function AlteraBanner ($idBanner, $Alterar) {
		$this->db->where('id_banner', $idBanner);
		$this->db->update('banners', $Alterar);
		return TRUE;
    }
    
    #EXCLUÍ O BANNER NO BANCO DE DADOS
	public function DeletaBanner ($idBanner) {
		$this->db->where('id_banner', $idBanner);
		$this->db->delete('banners');
		return TRUE;
	}
    
}