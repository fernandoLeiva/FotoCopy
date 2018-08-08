<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Colegios extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

function Listado_Colegios(){

 $query= $this->db->get('colegios');

 if ($query->num_rows()!=0)
{
 return $query->result_array();
}

 }
function Obtener_Colegios($id){
    $this->db->where('id', $id);
    $query=$this->db->get('colegios');

    if ($query->num_rows()!=0)
        {
            return $query->result_array();
        }
}
function Guardar_Colegios($data){

		$query = $this->db->insert("colegios",$data);
                                  return $query;

	}
	function Modificar_Colegios($data){

		$query =$this->db->update('colegios', $data, array('id' => $data['id']));
		print_r($query);
	}
	function Eliminar_Colegios($data){

        $this->db->where('id', $data);
        $this->db->delete('colegios');
        if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;
		}

    }
}

?>
