<?php
class Maintenance_Model extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	function get_trucks()
	{
		$this->db->select('id, unit_no, vin_no, make, year');
		$trucks = $this->db->get('truck');
		return $trucks->result();
	}
	function get_trailers()
	{
		$this->db->select('id, unit_no, vin_no, make, year');
		$trailers = $this->db->get('trailer');
		return $trailers->result();
	}
}
?>