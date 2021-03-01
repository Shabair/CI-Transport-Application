<?php
class Maintenance extends MY_Controller {
	
	function __construct()
		{
			parent::__construct();
			$this->load->helper('pdf_helper');
			$this->load->model("truck_model");
			$this->load->model("trailer_model");
			$this->load->model("Maintenance_model");
		}
	public function index()
		{
			$data['title'] = 'Maintenance : TDMA';
			$data['view']  = 'company/maintenance/main';
			$this->load->view('company/layout', $data);	
		}
	public function get_vehicles()
	{
		$Records = $this->truck_model->GetAll();
        $data = array();
        foreach ($Records['data']  as $r) 
		{  
			$data[]= array(
				$r['id'],
                $r['unit_no'],
				$r['vin_no'],
				$r['make'],
				$r['year'],
				'Truck',	
				'Active',				
				'<a class="btn btn-xs btn-success" href="'.base_url('truck/view/'.$r['id']).'"> Do Maintenance</a>
				
				 ',
			);
        }
		$Records= array("data" => $data,"draw" => 1,"recordsTotal"=>count($data),"recordsFiltered"=> count($data));
        echo json_encode($Records);						   

	}
	
	public function get_trailers()
	{
		$Records = $this->trailer_model->GetAll();
        $data = array();
        foreach ($Records['data']  as $r) 
		{  
			$data[]= array(
				$r['id'],
                $r['unit_no'],
				$r['vin_no'],
				$r['make'],
				$r['year'],
				'Trailer',	
				'Active',				
				'<a class="btn btn-xs btn-success" href="'.base_url('truck/view/'.$r['id']).'"> Do Maintenance</a>
				
				 ',
			);
        }
		$Records= array("data" => $data,"recordsTotal"=>count($data),"recordsFiltered"=> count($data));
        echo json_encode($Records);						   

	}
	
	public function vehicle()
	{
		$data['title'] = 'Vehivle Service : TDMA';
		$data['view']  = 'company/maintenance/vehicle';
		$this->load->view('company/layout', $data);
	}
	
	public function schedule_service()
	{
		echo $this->input->post('repeatDayType');
	}

}
?>