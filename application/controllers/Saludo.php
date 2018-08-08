<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class saludo extends CI_Controller {
	  function __construct(){
		parent::__construct();
  }//FIN contructor
	public function index(){
		 	$this->load->view('saludo/bienvenida');
	}//FIN INDEX
	public function despedida(){
			$this->load->view('saludo/despedida');
	}//FIN INDEX
}//FIN CLASE
