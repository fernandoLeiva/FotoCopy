<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Colegio extends CI_Controller {
	function __construct()
        {
		parent::__construct();
		$this->load->model('Colegios');
	}
	public function index($permission)
	{
		$data['list'] = $this->Colegios->Listado_Colegios();
		$data['permission'] = $permission;
		$this->load->view('Colegios/list', $data);
	}
public function Obtener_Colegio(){
		$id=$_POST['id'];
		$result = $this->Colegios->Obtener_Colegios($id);
		print_r($result);
		return $result;

	}
public function Guardar_Colegio(){


	    $nombre=$this->input->post('nombre');
	    $direccion=$this->input->post('direccion');
	    $telefono=$this->input->post('telefono');
	    $email=$this->input->post('email');
	    $data = array(
						    'nombre' => $nombre,
						    'direccion' => $direccion,
						    'telefono' => $telefono,
						    'email' => $email
	    );
	    $sql = $this->Colegios->Guardar_Colegios($data);
	    print_r($sql);

  	}
	  	public function Modificar_Colegio(){
  		$id=$this->input->post('id');
	    $nombre=$this->input->post('nombre');
	    $direccion=$this->input->post('direccion');
	    $telefono=$this->input->post('telefono');
	    $email=$this->input->post('email');
	    $data = array(
	    	    		   'id' => $id,
						    'nombre' => $nombre,
						    'direccion' => $direccion,
						    'telefono' => $telefono,
						    'email' => $email
					   );
	    $sql = $this->Colegios->Modificar_Colegios($data);
	    print_r($sql);

  	}
	public function Eliminar_Colegio(){

		$id=$_POST['id'];
		$result = $this->Colegios->Eliminar_Colegios($id);
		print_r($result);

	}
}

?>
