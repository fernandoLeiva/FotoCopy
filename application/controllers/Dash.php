<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dash extends CI_Controller {
	private $items;

	function __construct()
    {
		parent::__construct();
		$this->load->model('Groups');
		$this->_init_Menu();	// Inicializa el menu

	}

	/**
	 * Inicializa el Menú: carga la librería y el modelo e inicializa el menu.
	 *
	 * @return	void
	 */
	private function _init_Menu() {
		// Ejecuta la consulta y obtiene el arreglo de datos
		$items = $this->Groups->mnuAll();
		//dump_exit($items);
		//agrego los permisos de ejecucion al menu
		$this->items = $this->addPermisosItemsMenu($items);
		//dump_exit($this->items);
		// Carga la librería y pasa el arreglo de datos
		$this->load->library("multi_menu");
		$this->multi_menu->set_items($this->items);
		$this->multi_menu->render();
	}

	public function index()
	{
		$this->load->view('layout/header');
		// $userdata = $this->session->userdata('user_data');
		//
		// if( !$userdata )
		// {
		// 	redirect( base_url() );
		// }
		// else
		// {
		// 	$data['usrimag']    = $userdata[0]['usrimag'];
		// 	$data['userName']   = $userdata[0]['usrNick'];
		// 	$data['grpId']      = $userdata[0]['grpId'];
			//para el dash x defecto segun grupo de usr
			$data['paginaInicial']    = "Saludo";//$this->Groups->grpDash($userdata[0]['grpId']);
			//$data['permission'] = $this->items['seguridad'];

			$this->load->view('layout/dash', $data);
			$this->load->view('layout/menu');
			$this->load->view('layout/content');
			$this->load->view('layout/footer');
		//}
	}

	/**
	 * agrega los permisos de ejecucion a los items del menu.
	 *
	 * @param 	array 	$items 	Todos los elementos del menu sin permisos.
	 * @return 	array 			Todos los elementos del menu con permisos.
	 */
	public function addPermisosItemsMenu($items)
	{
		$this->items = $items;

		 foreach ($this->items as &$value) {
		// 	$fn = $this->Groups->mnuPermisos($value['id']);
		// 	$n = 0;
		// 	$permissions = "";
		//
		// 	for($i=0; $i<sizeof($fn); $i++) {
		// 		$permissions .= $fn[$i]['actDescription']."-";
		// 	}
			$value['seguridad'] ="Add-Edit-Del-View" ;//$permissions;
		}
		return $this->items;
	}

}
