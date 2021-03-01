<?php

defined('BASEPATH') OR exit('No direct script access allowed');
	
include realpath(dirname(__FILE__)).'/Dashboard.php';

	
class Companies extends dashboard
{


	function __construct(){
		parent::__construct();
		$this->load->model('Companies_model');
	}

	function isValid($table,$column,$id){
		
	}


	public function index(){

		$data =[
			'view' => 'admin/companies/companies_list',
			'titile'=>'Admin | Dashboard'
		];

		return $this->load->view('admin/layout',$data);

	}

	public function datatable_json()
	{
		
		$Records = $this->Companies_model->GetAll();

        $data = array();
        $count = 1;
        foreach ($Records['data']  as $r)
		{
			if($r['deactive'] == 0){
				$activeState = '<a class="btn btn-xs btn-danger pull-right" style="margin-right:5px;" href="'.base_url('admin/companies/delete/'.$r['id']).'"> <i class="fa fa-trash-o"></i></a>';
			}else{
				$activeState = '<a class="btn btn-xs btn-success pull-right" style="margin-right:5px;" href="'.base_url('admin/companies/activate/'.$r['id']).'"> <i class="fa fa-plus"></i></a>';
			}
			$data[]= array(
				$count++,
                $r['first_name'],
                $r['contact_no'],
                $r['username'],
                $r['email'],
				
				'<a class="btn btn-xs btn-success pull-right" style="margin-right:5px;" href="'.base_url('admin/companies/view/'.$r['id']).'"> <i class="fa fa-eye"></i></a>
				<a class="btn btn-xs btn-info pull-right" style="margin-right:5px;" href="'.base_url('admin/companies/edit/'.$r['id']).'"> <i class="fa fa-pencil-square-o"></i></a>'.$activeState,
			);
        }

        echo json_encode($data);
	}


	//------------------------ Inspection List ------------------------//
	public function search()
	{
		$this->session->set_userdata('user_search_type',$this->input->post('user_search_type'));
	}

	public function add($id = null){
			
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

          		$userTableResult = $this->Companies_model->addInUsers($userTable);
          		
          		$data['company_id'] 	= 	$userTable['id'];

          		if($this->Companies_model->add($data)){

          			$historydata = [
						'company_id'	=>	'adminhis',
						'user_id'		=>	$this->get_user_id(),
						'action_id'		=>	$userTable['id'],
						'action'		=>	'Add',
						'action_on'		=>	$userTable['first_name'],
						'action_place'	=>	'Company',
					];
					history($historydata);
          			$this->session->set_flashdata('success','Company Registered Successfully.');
          		}else{

          		}


          	}else if($this->input->post('update')){ // during update the admin
          		
          		if($this->input->post('password_changed')){
          			$userTable['password'] = md5($this->input->post('password'));
          		}//die();

          		$userTableResult = $this->Companies_model->updateUsers($userTable,$id);
          		$result = $this->Companies_model->update($data,$id);
          		if($result > 0 || $userTableResult > 0){
          			$company_name = get_from('users','first_name',['id'=>$id]);
          			$historydata = [
						'company_id'	=>	'adminhis',
						'user_id'		=>	$this->get_user_id(),
						'action_id'		=>	$id,
						'action'		=>	'Update',
						'action_on'		=>	$company_name,
						'action_place'	=>	'Company',
					];
					history($historydata);
          			$this->session->set_flashdata('success','Company Updated Successfully.');
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
          		
          		return redirect('admin/companies');
          	}
			
		}

	}

		//------------------------ Truck Detail Function ------------------------//
	public function view($id=0)
	{	
		set_data($this->Companies_model->getCompanyById($id));
		$data['title'] = 'Admin Detail : TDMA';
		$data['view']  = 'admin/companies/companies_view';
		$this->load->view('admin/layout', $data);
	}

	//------------------------ Truck Edit Function ------------------------//
	public function edit($id=0)
	{	
		$userData = $this->Companies_model->getCompanyById($id);
		$userData['update'] = $userData['id'];
		set_data($userData);
		$data['title'] 		= 'Edit Admin : TDMA';
		$data['view']  		= 'admin/companies/companies_add';
		$this->load->view('admin/layout', $data);
	}

	public function activate($id){
		if($this->Companies_model->activate($id)){
			$company_name = get_from('users','first_name',['id'=>$id]);
			$historydata = [
				'company_id'	=>	'adminhis',
				'user_id'		=>	$this->get_user_id(),
				'action_id'		=>	$id,
				'action'		=>	'Active',
				'action_on'		=>	$company_name,
				'action_place'	=>	'Company',
			];
			history($historydata);
      		$this->session->set_flashdata('success','User Activate Successfully');
      		$data = [
				'view'	=>	'admin/companies/companies_list',
				'title' =>	'Admin List| Dashboard'
			];

			return $this->load->view('admin/layout',$data);
      	}else{
      		$this->session->set_flashdata('error','User Not Deleted Successfully There is Some Error');
      		return redirect('admin/admins');
      	}	
	}

	//------------------------ Trailer delete Function ------------------------//
	public function delete($id){

		
		if($this->Companies_model->delete($id)){
			$company_name = get_from('users','first_name',['id'=>$id]);
			$historydata = [
				'company_id'	=>	'adminhis',
				'user_id'		=>	$this->get_user_id(),
				'action_id'		=>	$id,
				'action'		=>	'Delete',
				'action_on'		=>	$company_name,
				'action_place'	=>	'Company',
			];
			history($historydata);
      		$this->session->set_flashdata('success','Company Deleted Successfully');
      		$data = [
				'view'	=>	'admin/companies/companies_list',
				'title' =>	'companies List| Dashboard'
			];

			return $this->load->view('admin/layout',$data);
      	}else{
      		$this->session->set_flashdata('error','Company Not Deleted Successfully There is Some Error');
      		return redirect('admin/admins');
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

	public function remote_username_check(){
		$username = $this->input->get('username');
		$sql = "SELECT id FROM `users` WHERE username = ?";
		$result = $this->db->query($sql,array($username));
		if(!empty($username)){
			if($result->num_rows() > 0){
				echo 'false';
			}else{
				echo 'true';
			}
		}
	}



}//end of class