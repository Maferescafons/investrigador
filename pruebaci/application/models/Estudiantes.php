<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estudiantes extends CI_Model {
	
	public function get($asig_id)
	{
		$this->db->where('est_asignatura', $asig_id);
		$this->db->order_by('est_apellidos');
		$this->db->order_by('est_nombre');
		
		return $this->db->get('estudiantes')->result_array();
	}
	
	public function get_one($est_id)
	{
		$this->db->where('est_id', $est_id);
		
		return $this->db->get('estudiantes')->first_row('array');
	}
	
	public function update($est_id, $estudiante)
	{
		$this->db->where('est_id', $est_id);
		$this->db->update('estudiantes', $estudiante);
	}
	
	public function ejercicios_notas($asig_id, $est_id)
	{
		return $this->db->query("SELECT * FROM ejercicios LEFT JOIN notas ON ejercicios.ejer_asig_id = notas.nota_asig_id AND ejercicios.ejer_numero = notas.nota_ejer_numero AND nota_est_id = $est_id WHERE ejer_asig_id = $asig_id ORDER BY ejer_numero")->result_array();
	}
	
	public function ejercicios($asig_id)
	{
		$this->db->where('ejer_asig_id', $asig_id);
		$this->db->order_by('ejer_numero');
		
		return $this->db->get('ejercicios')->result_array();
	}
	
	public function nota($nota_asig_id, $nota_ejer_numero, $nota_est_id, $nota_valor)
	{
		$data = array(
				'nota_asig_id' => $nota_asig_id,
				'nota_ejer_numero'  => $nota_ejer_numero,
				'nota_est_id'  => $nota_est_id,
				'nota_valor' => $nota_valor,
		);

		$this->db->replace('notas', $data);
	}
}




