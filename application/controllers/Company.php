<?php

class Company extends MY_Controller{
	
	
	function __construct(){
		
		parent::__construct();
		
		$this->load->helper('pdf_helper');
		$this->load->model("company_model");
		$this->load->helper('sendemail');
	}
	
	
	public function index(){
		$this->load->model('companies_model');

		set_data($this->companies_model->getCompanyById($this->company_id));
		$data['title'] = 'Admin Detail : TDMA';
		$data['view']  = 'admin/companies/companies_view';
		$this->load->view('company/layout', $data);
	}
	
		
	public function add($id = null){

		// var_dump($this->input->post());
		// die();
		$this->load->model('companies_model');

		if(!$this->input->post('update')){

			$this->form_validation->set_rules('username','Username','trim|required|alpha_numeric|is_unique[users.username]');
			$this->form_validation->set_rules('email','E-Mail','required|trim|htmlspecialchars|min_length[3]|max_length[50]|valid_email|is_unique[users.email]');
			$this->form_validation->set_rules('password','Password','required|min_length[3]|max_length[50]');

		}else{

			$this->form_validation->set_rules('email','E-Mail',"required|trim|htmlspecialchars|min_length[3]|max_length[50]|valid_email|callback_email_check[$id]");
		}

		$this->form_validation->set_rules('first_name','First Name','required|trim|htmlspecialchars|min_length[3]|max_length[50]|regex_match[/^[a-zA-Z ]+$/]',array(
                                                    'regex_match' => 'In %s Alphabets and Spaces only allowed.',
                                            ));

		if($this->input->post('password_changed')){
			$this->form_validation->set_rules('password','Password','required|min_length[3]|max_length[50]');
		}
		// $this->form_validation->set_rules('gender','Gender','required|in_list[male,female]');
		$this->form_validation->set_rules('address','Address','required|trim');
		$this->form_validation->set_rules('contact_no','Contact No','required|trim');
        $this->form_validation->set_error_delimiters('<div>', '</div>');

        if ($this->form_validation->run('admin_register') == FALSE)
        {   
           	$data =[
			'view' => 'admin/companies/companies_add',
			'titile'=>'Add New Admin'
			];

			return $this->load->view('admin/layout',$data);
        }
        else
        {
        	$userTable = [

				'first_name' 			=>	$this->input->post('first_name'),
				'email' 				=>	$this->input->post('email'),
				'contact_no' 			=> 	$this->input->post('contact_no'),
				'cell' 					=> 	$this->input->post('cell'),
				'fax' 					=> 	$this->input->post('fax'),
				'address' 				=> 	$this->input->post('address'),
				'mailing_address' 		=> 	$this->input->post('mailing_address'),
				'city' 					=> 	$this->input->post('city'),
				'state' 				=> 	$this->input->post('state'),
				'postal_code' 			=> 	$this->input->post('postal_code'),

        	];

			$data= array(

				'dot_no' 				=> 	$this->input->post('dot_no'),
				'mc_no' 				=> 	$this->input->post('mc_no'),
				'cvor_no' 				=> 	$this->input->post('cvor_no'),
				'cvor_exp' 				=> 	$this->input->post('cvor_exp'),
				'ins_company' 			=> 	$this->input->post('ins_company'),
				'ins_no' 				=> 	$this->input->post('ins_no'),
				'ins_exp' 				=> 	$this->input->post('ins_exp'),
				'broker_name' 			=> 	$this->input->post('broker_name'),
				'broker_phone' 			=> 	$this->input->post('broker_phone'),
				'broker_fax' 			=> 	$this->input->post('broker_fax'),
				'broker_email' 			=> 	$this->input->post('broker_email'),
				'general_limit' 		=> 	$this->input->post('general_limit'),
				'cargo_limit' 			=> 	$this->input->post('cargo_limit'),
				'accident_limit' 		=> 	$this->input->post('accident_limit'),
				'deductable_cargo' 		=> 	$this->input->post('deductable_cargo'),
				'dedicatable_accident' 	=> 	$this->input->post('dedicatable_accident'),
				'drug_test' 			=> 	$this->input->post('drug_test'),
				'drug_test_dot' 		=> 	$this->input->post('drug_test_dot'),
				'drug_test_ndot' 		=> 	$this->input->post('drug_test_ndot'),
				'prepass_account' 		=> 	$this->input->post('prepass_account'),
				'nmfta_scacode' 		=> 	$this->input->post('nmfta_scacode'),
				'nmfta_exp' 			=> 	$this->input->post('nmfta_exp'),
				'nmfta_scacode2' 		=> 	$this->input->post('nmfta_scacode2'),
				'ifta' 					=> 	$this->input->post('ifta'),
				'ifta2' 				=> 	$this->input->post('ifta2'),
				'ifta3' 				=> 	$this->input->post('ifta3'),
				'ifta4' 				=> 	$this->input->post('ifta4'),
				'ifta5' 				=> 	$this->input->post('ifta5'),
				'new_mexico' 			=> 	$this->input->post('new_mexico'),
				'mexico_exp' 			=> 	$this->input->post('mexico_exp'),
				'orgen' 				=> 	$this->input->post('orgen'),
				'orgen_exp' 			=> 	$this->input->post('orgen_exp'),
				'transponder' 			=> 	$this->input->post('transponder'),
				'transponder_exp' 		=> 	$this->input->post('transponder_exp'),
				'msc' 					=> 	$this->input->post('msc'),
				'ambassador_bridge' 	=> 	$this->input->post('ambassador_bridge'),
				'ucr_exp' 				=> 	$this->input->post('ucr_exp'),
				'quebec_form' 			=> 	$this->input->post('quebec_form'),
				'cali_air_res' 			=> 	$this->input->post('cali_air_res'),
				'wsib' 					=> 	$this->input->post('wsib'),
				'kentucky' 				=> 	$this->input->post('kentucky'),
				'kentucky2' 			=> 	$this->input->post('kentucky2'),
				'kentucky3' 			=> 	$this->input->post('kentucky3'),
				'kentucky4' 			=> 	$this->input->post('kentucky4'),

			); 


          	if(!$this->input->post('update')){ // during insert the admin
          		
          		$userTable['id'] 		= 	url_generator();
          		$userTable['username']  = 	$this->input->post('username');
          		$userTable['password']  = 	md5($this->input->post('password'));
          		$userTable['type']  	= 	'company';

          		$userTableResult = $this->companies_model->addInUsers($userTable);
          		
          		$data['company_id'] 	= 	$userTable['id'];

          		$result = $this->companies_model->add($data);

          		$this->session->set_flashdata('success','User Registered Successfully.');

          	}else if($this->input->post('update')){ // during update the admin
          		
          		if($this->input->post('password_changed')){
          			$userTable['password'] = md5($this->input->post('password'));
          		}//die();

          		$userTableResult = $this->companies_model->updateUsers($userTable,$id);
          		$result = $this->companies_model->update($data,$id);
          		if($result > 0 || $userTableResult > 0){
          			$this->session->set_flashdata('success','User Updated Successfully.');
          		}
          	}

          	if(!empty($this->db->error()['message'])){


          		$this->session->set_flashdata('error',$this->db->error()['message']);
          		$this->session->set_flashdata('success',false);
          		$data = [
					'view'	=>	'admin/companies/companies_add',
					'title' =>	'Add New Admin'
				];


				return $this->load->view('admin/layout',$data);
          	}else{
          		
          		return redirect('company');
          	}
			
		}

	}

	public function check_email(){
		$email = $this->input->post('email');
		$userid = $this->input->post('userid');
		if(empty($userid)){
			$sql = "SELECT id FROM `users` WHERE email = ? ";
			$result = $this->db->query($sql,array($email));
		}else{
			$sql = "SELECT id FROM `users` WHERE email = ? and id != ?";
			$result = $this->db->query($sql,array($email,$userid));
		}
		
		if(!empty($email)){
			if($result->num_rows() > 0){
				// echo $this->db->last_query();

				echo 'false';
			}else{
				// echo $this->db->last_query();

				echo 'true';
			}
		}
	}	

	public function email_check($newEmail,$id){
		$sql = "SELECT id FROM `users` WHERE email = ? and id != ?";
		$result = $this->db->query($sql,array($newEmail,$id));
		if(!empty($newEmail)){
			if($result->num_rows() > 0){ // >
				$this->form_validation->set_message('email_check', "This E-Mail (".$newEmail.") Already Taken");
				return false;
			}else{
				return true;
			}
		}
	}

	public function edit($id = 0){

		$this->load->model('companies_model');

		$userData = $this->companies_model->getCompanyById($this->company_id);
		$userData['update'] = $userData['id'];
		set_data($userData);
		$data['title'] 		= 'Edit Admin : TDMA';
		$data['view']  		= 'admin/companies/companies_add';
		$this->load->view('company/layout', $data);
		
		
	}
	
	public function active($id=0)
	{
		$data = array(
			't_id' 			=> $id,
			't_role' 		=> 'active',
			'modify_date' 	=> date('Y-m-d'),
			'created_date'  => date('Y-m-d')
		);
		$result = $this->company_model->activecompany($data,$id);
		if ($result) 
		{
			$this->session->set_flashdata('success', 'company has been active successfully.');
			redirect('company');
		} 
	}
	public function inactive($id=0)
	{
		$data = array(
			't_id' 			=> $id,
			't_role' 		=> 'inactive',
			'modify_date' 	=> $this->input->post('modify_date'),
			'created_date'  => date('Y-m-d')
		);

		$result = $this->company_model->inactivecompany($data,$id);
		if ($result) 
		{
			$this->session->set_flashdata('success', 'company has been inactive successfully.');
			redirect('company');
		} 
	}
		
	
}


?>