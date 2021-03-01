<?php
class Dashboard extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('dashboard_model');

		
			// if($cookieData = get_cookie('advancetdmsrememberme')){
			// 	$this->load->library('encrypt'); 
			// 	$driver_id = $this->encrypt->decode($cookieData);
			// 	$result  = $this->db->query("SELECT `id`, `name`, `username`, `password` FROM `company` WHERE `id` = '".$driver_id."'")->row_array();
			// 	if(count($result)>0){
			// 		$this->session->set_userdata('logged_in', $result);	
			// 		$this->session->set_userdata('which_login', 'company');		
					
			// 		//redirect('dashboard', 'refresh');
			// 	}
			// }

	}
	//------------------------------------------------
	function index()
	{ 

		$data['total_companys'] 	= $this->dashboard_model->getTotalComapnys($this->get_user_type());
		$data['total_drivers'] 		= $this->dashboard_model->getTotalDrivers($this->get_company_id());
		$data['total_trucks'] 		= $this->dashboard_model->getTotalTrucks($this->get_company_id());
		$data['total_trailers'] 	= $this->dashboard_model->getTotalTrailers($this->get_company_id());
		$data['total_inspections'] 	= $this->dashboard_model->getTotalInspections($this->get_company_id());
		$data['total_citations'] 	= $this->dashboard_model->getTotalCitations($this->get_company_id());
		$data['total_collisions'] 	= $this->dashboard_model->getTotalCollisions($this->get_company_id());
		$data['rating_detail'] 		= $this->dashboard_model->getRatingByID($this->get_company_id());
		$data['graph_data'] 		= $this->dashboard_model->get_graph_data($this->get_company_id());
		$pending_works = $this->dashboard_model->get_pending_works($this->get_company_id());
		$data['current_drug_test'] = $this->get_pending_current_drug_test();
		$data['S_FUIds'] = $this->dashboard_model->getSapAndFollowUpIds(false);
		// var_dump($data['S_FUIds']);
		// die();
		//array_walk($pending_works,array($this, 'removeNulls'));

		$data['pending_works'] 		= $pending_works;
		$data['title'] 		= 'DMS - Admin Panel';
		$data['view'] 		= 'company/dashboard/dashboard';

		$this->load->view('company/layout', $data);
		
	}
	function removeNulls(&$item,$key){
        $item = array_filter($item);
    }
	//------------------------------------------------
	public function add($id=0){
		
		
		$data= array(
			'company_id' 			=>	$this->get_user_id(),
			'unsafedriving' 		=>	$this->input->post('unsafedriving'),
			'crashindicator' 		=>	$this->input->post('crashindicator'),
			'hours_of_service' 		=>	$this->input->post('hours_of_service'),
			'vehicle_maintenance' 	=>	$this->input->post('vehicle_maintenance'),
			'control_sa' 			=>	$this->input->post('control_sa'),
			'hazardousmaterials' 	=>	$this->input->post('hazardousmaterials'),
			'driverfitness' 		=>	$this->input->post('driverfitness'),
			'created_date' 			=>	date('Y-m-d')
		); 
		
		if($this->input->post('submit')){	
			$result = $this->dashboard_model->insertrating($data);
			
			if($result)
			{
				$this->session->set_flashdata('success', 'Rating Inserted Successfully');
			}
			else{
				$this->session->set_flashdata('error','Error Into Insert Rating');
			}
			
			redirect('dashboard');
		}
		
		if($this->input->post('update')){	
		
		
			$result =  $this->dashboard_model->updaterating($data, $id);
			
			if($result){
				$this->session->set_flashdata('success', 'Rating Updated Successfully');
				
			}
			else{
				$this->session->set_flashdata('error','Error Into Updated Rating');
			}
			
			redirect('dashboard');
		
		}
		
	}	

	function get_pending_current_drug_test(){
		$this->db->select('*');
		// $this->db->select("quarter as expiry_date");

		$this->db->where('quarter',$this->current_quarter);
		$this->db->where('company_id',$this->get_company_id());
		$result = $this->db->get('drug')->row_array();
		
		return (count($result))?$result:null;
	}

	function getDrugTestDataById($id){
		$this->db->select('*');
		// $this->db->select("quarter as expiry_date");

		$this->db->where('id',$id);
		$result = $this->db->get('drug')->row_array();
		
		return (count($result))?$result:null;
	}
	public function pending_works(){
		$column = $this->input->post('name');
		$p_type = $this->input->post('p_type');
		$id = $this->input->post('pk');
		$value = $this->input->post('value');
		$is_dual_values = false;

		$old_expiry_date = get_from('pending_works','expiry_date',['id'=>$id,'p_type'=>$p_type]);
		$action_on_id = get_from('pending_works','action_on_id',['id'=>$id]);

		if(is_array($value)){
			meta_data('pending_works',$this->input->post('conform'),$id,$value['conform']);
			$value = setDateInDB($value['date']);
		}
					

		if($column == 'completed_date'){

			$value = setDateInDB($value);
			
			
			if($value <= date('Y-m-d')){
				header('HTTP/1.0 400 Bad Request', true, 400);
        		echo "Please Enter the Correct Date!";
        		return false;
			}

		}else if($column == 'is_completed'){
			$completed_date = get_from('pending_works','completed_date',['id'=>$id,'p_type'=>$p_type]);
			// if($expiry == NULL)
			if($completed_date == null){
				header('HTTP/1.0 400 Bad Request', true, 400);
        		echo "First Enter the Expiry date!";
        		return false;
			}

			$completed_date = get_from('pending_works','completed_date',['id'=>$id]); 
			switch ($p_type) {
				case 'license': //
					$sql = 'UPDATE `driver_detail` set `emp_license_exp_date` = "'.$completed_date.'" WHERE id = "'.$action_on_id.'"';
					$this->db->query($sql);
					break;
				case 'medical_expiry': //
					$sql = 'UPDATE `drivers` set `medical_due` = "'.$completed_date.'" WHERE id = "'.$action_on_id.'"';
					$this->db->query($sql);
					break;
				case 'truck_annual_due': //
					$sql = 'UPDATE `truck` set `annual_safety_due` = "'.$completed_date.'" WHERE id = "'.$action_on_id.'"';
					$this->db->query($sql);
					break;
				case 'trailer_annual_due': //
					$sql = 'UPDATE `trailer` set `annual_safety_due` = "'.$completed_date.'" WHERE id = "'.$action_on_id.'"';
					$this->db->query($sql);
					break;
				case 'driver_annual_review': //
					$sql = 'UPDATE `driver_experience` set `last_annual_review_date` = "'.$completed_date.'" WHERE id = "'.$action_on_id.'"';
					$this->db->query($sql);
					break;
				
				default:
					# code...
					break;
			}
		}

		{
			$set =[
				$column=>$value
			];

			$where=[
				'id' => $id,
				'p_type' => $p_type
			];

			$addOrUpdate = (get_from('pending_works',$column,['id'=>$id])==null?'Add':'Update');

			if($column != 'expiry_date'){
				$result = $this->dashboard_model->pending_works($set,$where);
			}else{
				$result = $this->dashboard_model->pending_works($set,$where);
			}

			if($result){


				meta_data('pending_works',$p_type.'_'.$column.'_time',$id,date('Y-m-d'));
					
			
				$column_name_history = $column;

				switch ($p_type) {
					case 'license': //
						if($column == 'extra_data')
						$column_name_history = $column.'_license';
						$action_place = 'Pending Works of License';

						$action_on_title = get_from('drivers','first_name,middle_name,last_name',['id'=>$action_on_id]);
						$action_on_title =implode(' ', $action_on_title).'\'s '.get_column_name_history($column_name_history);

						break;
					case 'medical_expiry': //
						if($column == 'extra_data')
						$column_name_history = $column.'_medical_expiry';
						$action_place = 'Pending Works of Medical Expiry';

						$action_on_title = get_from('drivers','first_name,middle_name,last_name',['id'=>$action_on_id]);
						$action_on_title =implode(' ', $action_on_title).'\'s '.get_column_name_history($column_name_history);
						break;

					case 'driver_annual_review': //
						// if($column == 'extra_data')
						// $column_name_history = $column.'_driver_annual_review';
						$action_place = 'Pending Works of Driver\'s Annual Review';

						$action_on_title = get_from('drivers','first_name,middle_name,last_name',['id'=>$action_on_id]);
						$action_on_title =implode(' ', $action_on_title).'\'s '.get_column_name_history($column_name_history);
						break;

					case 'truck_annual_due': //
						$action_place = 'Pending Works of Truck Annual Safety Due';

						$action_on_title = get_from('truck','unit_no',['id'=>$action_on_id]);
						$action_on_title =($action_on_title).'\'s '.get_column_name_history($column_name_history);
						break;

					case 'trailer_annual_due': //
						$action_place = 'Pending Works of Trailer Annual Safety Due';

						$action_on_title = get_from('trailer','unit_no',['id'=>$action_on_id]);
						$action_on_title =($action_on_title).'\'s '.get_column_name_history($column_name_history);
						break;
					
					default:
						# code...
						break;
				}

				// 
				
				$historyData = [
					'company_id'	=>	$this->get_company_id(),
					'user_id'		=>	$this->get_user_id(),
					'action_id'		=>	$id,
					'action'		=>	$addOrUpdate,
					'action_on'		=>	$action_on_title,
					'action_place'	=>	$action_place,
				];

				;
				//echo $result;
				echo (history($historyData))?getDateFromDB(date('Y-m-d')):'true';
			}else{
				//echo $result;
				echo 'false'; 
			}
			// meta_data($table,$column,$tbl_item_id,$value='')			
		}
		
	}






	public function add_graph_data(){
		$data=[
			'company_id'=>$this->get_company_id(),
			'user_id'=>$this->get_user_id(),
			'date' => $this->input->post('graph_date'),
			'value' => $this->input->post('graph_value')
		];
		$this->db->insert('graph',$data);
		// echo date('Y-m-d',strtotime($this->input->post('graph_date')));
		return redirect('/');
	}

	public function edit_graph_data(){
		$update = [
			'value' => $this->input->post('graph_value'),
		];
		$cond =[
			'date' => $this->input->post('graph_date'),
			'company_id'=>$this->get_company_id()
		];
		$this->db->where($cond);
		$this->db->update('graph',$update);
		return redirect('/');
	}

	public function delete_graph_data(){
		$cond =[
			'date' => $this->input->post('graph_date'),
			'company_id'=>$this->get_company_id()
		];
		$this->db->where($cond);
		$this->db->delete('graph');
		return redirect('/');
	}

	// public function ajax_date_data(){
	// 	$cond = [
	// 		'date' => $this->input->post('date'),
	// 		'company_id'=>$this->get_company_id(),
	// 	];
	// 	echo $this->db->select('value')->where($cond)->get('graph')->row()->value;
	// }




	function test($driver_id){
		$arr = ['600','601','602','603'];
		foreach ($arr as  $value) {
		echo getDriverFullName($value);
		}
	}
}


?>