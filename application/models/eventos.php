<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class eventos extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function Listado_eventos()
	{
		$this->db->select('id,nombre as title, inicio as start, fin as end,color as backgroundColor,color as borderColor');
		$query = $this->db->get('eventos');

		if ($query->num_rows() != 0) {
			return $query->result_array();
		}

	}
	function Obtener_eventos($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('eventos');

		if ($query->num_rows() != 0) {
			return $query->result_array();
		}
	}
	function Guardar_eventos($data)
	{

		$query = $this->db->insert("eventos", $data);
		return $query;

	}
	function Modificar_eventos($data)
	{
		$query = $this->db->update('eventos', $data, array('id' => $data['id']));
		return $query;
	}
	function Eliminar_eventos($data)
	{
		$this->db->where('id', $data);
		$this->db->delete('eventos');
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}

	}
}

?>