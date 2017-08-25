<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profesores extends CI_Model {
	
	public function login($usuario, $contrasena) {
		
		$this->db->where('prof_email', $usuario);
		$this->db->where('prof_contrasena', $contrasena);
		
		return $this->db->get('profesores')->first_row();
	}
}

