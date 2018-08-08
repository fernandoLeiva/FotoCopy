<?php

defined('BASEPATH') or exit('No direct script access allowed');

class evento extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('eventos');
	}
	public function index($permission)
	{
		$data['list'] = $this->eventos->Listado_eventos();
		$data['permission'] = $permission;
		$this->load->view('Eventos/list', $data);
	}
	public function Obtener_eventos()
	{

		$result = $this->eventos->Listado_eventos();
		echo json_encode($result);
		return $result;

	}
	public function Obtener_evento()
	{
		$id = $_POST['id'];
		$result = $this->eventos->Obtener_eventos($id);
		print_r($result);
		return $result;

	}
	public function Guardar_evento()
	{


		$nombre = $this->input->post('nombre');
		$inicio = $this->input->post('inicio');
		$fin = $this->input->post('fin');
		$color = $this->input->post('color');
		$data = array(
			'nombre' => $nombre,
			'inicio' => $inicio,
			'fin' => $fin,
			'color' => $color
		);
		$result = $this->eventos->Guardar_eventos($data);
		echo json_encode($result);
		return $result;

	}
	public function Modificar_evento()
	{
		$id = $this->input->post('id');
		$fin = $this->input->post('fin');
		$data = array(
			'id' => $id,
			'fin' => $fin
		);
		$result = $this->eventos->Modificar_eventos($data);
		echo json_encode($result);
		return $result;

	}
	public function Transladar_evento()
	{
		$id = $this->input->post('id');
		$inicio = $this->input->post('inicio');
		$fin = $this->input->post('fin');
		$data = array(
			'id' => $id,
			'inicio' => $inicio,
			'fin' => $fin
		);
		$result = $this->eventos->Modificar_eventos($data);
		echo json_encode($result);
		return $result;

	}
	
	public function Eliminar_evento()
	{

		$id = $_POST['id'];
		$result = $this->eventos->Eliminar_eventos($id);
		echo json_encode($result);
		return $result;

	}
}

?>