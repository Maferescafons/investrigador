<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SAE extends CI_Controller {

	function __construct() {
		parent::__construct();
		
		$this->load->helper('html');
	}

	
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('session');
		
		if(isset($this->session->prof_id))
		{
			redirect('asignaturas/');
		}
		else
		{
			$data = array(
				'view' => 'home',
				'error' => $this->session->flashdata('error'),
			);
			
			$this->load->view('template', $data);
		}
	}
	
	
	public function login()
	{
		$this->load->database();
		$this->load->library('session');
		$this->load->model('Profesores');
		$this->load->helper('url');

		if($this->input->post('usuario') != '' && $this->input->post('contrasena') != '')
		{
			$profesor = $this->Profesores->login($this->input->post('usuario'), $this->input->post('contrasena'));
			
			if(empty($profesor))
			{
				$this->session->set_flashdata('error', 'El usuario no existe');
				
				redirect("/");
			}
			else
			{
				$this->session->prof_id = $profesor->prof_id;
				redirect("asignaturas/");
			}
		}
		else
		{
			$this->session->set_flashdata('error', 'Escribe el nombre de usuario y la contraseña');
			
			redirect("/");
		}
	}
	
	
	public function asignaturas()
	{
		$this->load->library('session');
		$this->load->helper('url');
		if(!$this->is_logged())
		{
			redirect("/");
		}
		
		
		$this->load->database();
		$this->load->model('Asignaturas');
		
		$data = array(
			'view' => 'asignaturas',
			'title' => 'Asignaturas',
			'asignaturas' => $this->Asignaturas->asig_prof($this->session->prof_id),
		);
		
		$this->load->view('template', $data);
	}
	
	
	public function estudiantes($asig_id)
	{
		$this->load->library('session');
		$this->load->helper('url');
		if(!$this->is_logged())
		{
			redirect("/");
		}
		
		
		$this->load->database();
		$this->load->model('Estudiantes');
		
		$data = array(
			'view' => 'estudiantes',
			'title' => 'Estudiantes',
			'estudiantes' => $this->Estudiantes->get($asig_id),
			'mensaje' => $this->session->flashdata('mensaje'),
		);
		
		$this->load->view('template', $data);
	}


	public function estudiante($est_id)
	{
		$this->load->library('session');
		$this->load->helper('url');
		if(!$this->is_logged())
		{
			redirect("/");
		}
		
		
		$this->load->database();
		$this->load->model('Estudiantes');
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('nombre', 'Nombre', 'required');
		$this->form_validation->set_rules('apellidos', 'Apellidos', 'required');
		$this->form_validation->set_rules('email', 'Correo electrónico', 'required|valid_email');
		
		if($this->form_validation->run())
		{
			// Validación correcta
			$estudiante = array(
				'est_nombre' => $this->input->post('nombre'),
				'est_apellidos' => $this->input->post('apellidos'),
				'est_fechanac' => $this->input->post('fechanac'),
				'est_sexo' => $this->input->post('sexo'),
				'est_direccion' => $this->input->post('direccion'),
				'est_email' => $this->input->post('email'),
				);			
			
			$this->Estudiantes->update($est_id, $estudiante);
			
			$ejercicios = $this->Estudiantes->ejercicios($this->input->post('asignatura'));
			
	
			foreach($ejercicios as $e)
			{
				$this->Estudiantes->nota($this->input->post('asignatura'),
										$e["ejer_numero"],
										$est_id,				
										$this->input->post('e' . $e["ejer_numero"]));
			}
			
			
			$this->session->set_flashdata('mensaje', 'Se han actualizado los datos de ' . $this->input->post('nombre') . ' ' . $this->input->post('apellidos'));
			
			redirect('estudiantes/' . $this->input->post('asignatura'));
			return;
		}
		else
		{
			// Validación incorrecta o la primera vez
			if($this->input->post('actualizar') != '')
			{
				$estudiante = array(
					'est_nombre' => $this->input->post('nombre'),
					'est_apellidos' => $this->input->post('apellidos'),
					'est_fechanac' => $this->input->post('fechanac'),
					'est_sexo' => $this->input->post('sexo'),
					'est_direccion' => $this->input->post('direccion'),
					'est_email' => $this->input->post('email'),
					'est_asignatura' => $this->input->post('asignatura'),
				);
			}
			else
			{
				// La primera vez que se muestra la página
				$estudiante = $this->Estudiantes->get_one($est_id);
				$notas = $this->Estudiantes->ejercicios_notas($estudiante['est_asignatura'], $est_id);
			}

			$data = array(
				'view' => 'estudiante',
				'title' => 'Estudiante',
				'estudiante' => $estudiante,
				'notas' => $notas,
			);
		}
		
		$this->load->view('template', $data);
	}
	
	 
	public function salir()
	{
		$this->load->library('session');
		$this->load->helper('url');
		
		$this->session->sess_destroy();
		
		redirect("/");
	}
	
	
	private function is_logged()
	{
		return isset($this->session->prof_id);
	}
}






