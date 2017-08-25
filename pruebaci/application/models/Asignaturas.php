<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asignaturas extends CI_Model {
	
	public function asig_prof($prof_id) {
		
		$this->db->where('ap_prof_id', $prof_id);
		
		return $this->db->get('asig_prof_text')->result_array();
	}

}
