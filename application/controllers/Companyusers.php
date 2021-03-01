<?php
class Companyusers extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		// $this->load->helper('users');
		$this->load->model("Users_model");

		if ($this->user_type != 'company') {
			redirect('/');
		}

	}

	public function datatable_json()
	{
		
		$Records = $this->Users_model->GetAll($this->get_company_id());

        $data = array();
        $count = 1;
        foreach ($Records['data']  as $r)
		{
			if($r['deactive'] == 0){
				$activeState = '<button class="btn btn-xs btn-danger pull-right" style="margin-right:5px;" onclick="showDetails(this)" data-deleted-id="'.$r["id"].'" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-trash-o"></i></button>';
			}else{
				$activeState = '<a class="btn btn-xs btn-success pull-right" style="margin-right:5px;" href="'.base_url('companyusers/activate/'.$r['id']).'"> <i class="fa fa-plus"></i></a>';
			}
			$data[]= array(
				$count++,
                $r['first_name'],
                $r['middle_name'],
                $r['last_name'],
                $r['username'],
                $r['email'],
				
				'<a class="btn btn-xs btn-success pull-right" style="margin-right:5px;" href="'.base_url('companyusers/view/'.$r['id']).'"> <i class="fa fa-eye"></i></a>
				<a class="btn btn-xs btn-info pull-right" style="margin-right:5px;" href="'.base_url('companyusers/edit/'.$r['id']).'"> <i class="fa fa-pencil-square-o"></i></a>'.$activeState,
			);
        }

        echo json_encode($data);
	}

	function index(){
		
		$this->session->unset_userdata('user_search_type');
		
		$AllCounts = $this->Users_model->count('users');
		$this->viewData += $AllCounts;

		$this->viewData['title'] = 'Users List';
		$this->viewData['view']  = 'company/users/users_list';
		$this->load->view('company/layout', $this->viewData);
		//echo 'this is the user page';
	}

	public function search()
	{
		$this->session->set_userdata('user_search_type',$this->input->post('user_search_type'));
	}

	public function add(){
		$this->actionType = 'add';
		$this->viewData['title'] = 'Add User';
		$this->add_user();
	}
	public function add_user($id = null){

		//this will work only for when we editing the driver
        if($this->input->post('action_token')){
        	$actionByUser = check_action_token('action_token');
        	if(empty($actionByUser)){
        		$this->errors[] = 'Invalid Trailer Identification.';
        	}else if(!empty($actionByUser->action_on) && $this->action_id != $actionByUser->action_on){
        		$this->errors[] = 'Invalid Trailer Identification.';
        	}
        }

		if($this->actionType == 'add'){
			$this->form_validation->set_rules('username','Username','trim|required|alpha_numeric|is_unique[users.username]');
			$this->form_validation->set_rules('email','E-Mail','required|trim|htmlspecialchars|min_length[3]|max_length[50]|valid_email|is_unique[users.email]');

		}else{
			$oldemail = get_user_email_by_id($this->action_id);
			$this->form_validation->set_rules('email','E-Mail',"required|trim|htmlspecialchars|min_length[3]|max_length[50]|valid_email|callback_email_check[$oldemail]");
		}

		$this->form_validation->set_rules('action_token','Invalid Form','required',array(
                                                    'required' => 'Invalid Form.',
                                            ));
		
		$this->form_validation->set_rules('first_name','First Name','required|trim|htmlspecialchars|min_length[3]|max_length[50]|regex_match[/^[a-zA-Z ]+$/]',array(
                                                    'regex_match' => 'In %s Alphabets and Spaces only allowed.',
                                            ));
		$this->form_validation->set_rules('last_name','Last Name','trim|htmlspecialchars|min_length[3]|max_length[50]|regex_match[/^[a-zA-Z ]+$/]',array(
                                                    'regex_match' => 'In %s  Alphabets and Spaces only allowed.',
                                            ));
		$this->form_validation->set_rules('middle_name','Middle Name','trim|htmlspecialchars|min_length[3]|max_length[50]|regex_match[/^[a-zA-Z ]+$/]',array(
                                                    'regex_match' => 'In %s  Alphabets and Spaces only allowed.',
                                            ));
		if($this->input->post('password_changed')){
			$this->form_validation->set_rules('password','Password','required|min_length[4]|max_length[50]');
		}
		$this->form_validation->set_rules('gender','Gender','required|in_list[male,female]');
		$this->form_validation->set_rules('address','Address','required|trim');
		$this->form_validation->set_rules('contact_no','Contact No','required|trim');
        $this->form_validation->set_error_delimiters('<div>', '</div>');

        if ($this->form_validation->run('admin_register') == FALSE)
        {   
        	$this->errors[] = validation_errors();
        }
        else
        {

          	$data = [
   				  'first_name' 		=> 	$this->input->post('first_name'),
   				  'email' 			=> 	$this->input->post('email'),
				  'middle_name' 	=> 	$this->input->post('middle_name'), 
				  'last_name' 		=> 	$this->input->post('last_name'), 
				  'gender' 			=> 	$this->input->post('gender'), 
				  'address' 		=> 	$this->input->post('address'), 
				  'contact_no' 		=> 	$this->input->post('contact_no'),
				  'type'			=>	'user'
          	];

		}
		if(!isset($this->errors)){
	      	if($this->actionType == 'add'){ // during insert the admin
	      		$data['id'] = url_generator();
	      		$data['username'] = $this->input->post('username');
	      		$data['password'] = md5($this->input->post('password'));
	      		$data['company_id']	= $this->get_company_id();
	      		$result = $this->Users_model->insert($data);
	      		if($result)
				{
					$historydata = [
						'company_id'	=>	$this->get_company_id(),
						'user_id'		=>	$this->get_user_id(),
						'action_id'		=>	$this->db->insert_id(),
						'action'		=>	'Add',
						'action_on'		=>	$data['first_name'].' '.$data['middle_name'].' '.$data['last_name'],
						'action_place'	=>	'User',
					];
					history($historydata);
					$this->session->set_flashdata('success', 'User Inserted Successfully');
				}
				else
				{
					$this->session->set_flashdata('error','Error Into Insert User');
				}
	      		$this->session->set_flashdata('success','User Registered Successfully.');

	      	}else if($this->actionType == 'update'){ // during update the admin
	      		
	      		if($this->input->post('password_changed')){
	      			$data['password'] = md5($this->input->post('password'));

	      		}

	      		$result = $this->Users_model->update($data,$this->action_id);
				if($result){

					$historydata = [
						'company_id'	=>	$this->get_company_id(),
						'user_id'		=>	$this->get_user_id(),
						'action_id'		=>	$this->action_id,
						'action'		=>	'Update',
						'action_on'		=>	$data['first_name'].' '.$data['middle_name'].' '.$data['last_name'],
						'action_place'	=>	'User',
					];
					history($historydata);
					$this->session->set_flashdata('success','User Updated Successfully.');
				}
	      	}else{
					$this->session->set_flashdata('errors', 'Trailer Not Added successfully.');
			}
			return redirect('companyusers');
	    }else{
	    	$cipher = (create_action_token($this->get_user_id(),$this->action_id,$this->actionType,url_generator(15)));
				
			$this->viewData['action_token'] = $cipher;

			$this->viewData['view']  = 'company/users/users_add';
			$this->load->view('company/layout', $this->viewData);
	    }

	}

	//------------------------ Truck Detail Function ------------------------//
	public function view($id=0)
	{	
		set_data($this->Users_model->getUserById($id));
		$data['title'] = 'Admin Detail : TDMA';
		$data['view']  = 'company/users/users_view';
		$this->load->view('company/layout', $data);
	}

	//------------------------ Truck Edit Function ------------------------//
	public function edit($id=0)
	{	
		valid_company('users','company_id',$id);
		$this->action_id = $id;
		$this->actionType = 'update';
		$this->viewData['user'] = $this->Users_model->getUserById($this->action_id);
		$this->viewData['title'] = 'Edit User';
		$this->add_user();
	}

	public function activate($id){

		// if($this->Users_model->activate($id)){
  //     		$this->session->set_flashdata('success','User Activate Successfully');
  //     		$data = [
		// 		'view'	=>	'company/users/users_list',
		// 		'title' =>	'Users List| ATDM'
		// 	];

		// 	return $this->load->view('company/layout',$data);
  //     	}else{
  //     		$this->session->set_flashdata('error','User Not Deleted Successfully There is Some Error');
  //     		return redirect('companyusers');
  //     	}	






		valid_company('users','company_id',$id);

		$getRemark = $this->db->query("SELECT `remark` FROM `users` where `id` = '".$id."'")->row()->remark;

		if(!empty($getRemark)){
			$remarks = explode(',', $getRemark);
			foreach ($remarks as $key => $value) {
				if (strpos($value, 'Deactivate:') !== false) {
			    	unset($remarks[$key]);
				}
			}
		}

		$this->db->query("UPDATE `users` SET `remark`= '".implode(',', $remarks)."' where `id` = '".$id."'");

		if($this->Users_model->activate($id)){
			$historydata = [
				'company_id'	=>	$this->get_company_id(),
				'user_id'		=>	$this->get_user_id(),
				'action_id'		=>	$id,
				'action'		=>	'Activate',
				'action_on'		=>	getDriverFullName($id),
				'action_place'	=>	'User',
			];
			history($historydata);
			$this->session->set_flashdata('success', 'User Activated Successfully');

		}else{
			$this->session->set_flashdata('error', 'User Not Activated Successfully');
		}

		return redirect('companyusers');
	}

	//------------------------ Trailer delete Function ------------------------//
	public function delete(){

		$remark = $this->input->post('remark');
		$id = $this->input->post('id');
		
		valid_company('users','company_id',$id);

		if(!empty($remark)){

			$getRemark = $this->db->query("SELECT `remark` FROM `users` where `id` = '".$id."'")->row()->remark;
		
			$this->db->query("UPDATE `users` SET `remark`= '".$getRemark.',Deactivate:'.$remark."' where `id` = '".$id."'");
		}

		if($this->Users_model->delete($id)){
			$historydata = [
				'company_id'	=>	$this->get_company_id(),
				'user_id'		=>	$this->get_user_id(),
				'action_id'		=>	$id,
				'action'		=>	'Deactivate',
				'action_on'		=>	getDriverFullName($id),
				'action_place'	=>	'User',
			];
			history($historydata);
			$this->session->set_flashdata('success', 'User deleted Successfully');

		}else{
			$this->session->set_flashdata('error', 'User Not deleted Successfully');
		}


		return redirect('companyusers');


	}


	public function check_email(){
		$email = $this->input->post('email');
		$oldemail = $this->input->post('oldemail');
		if(empty($oldemail)){
			$sql = "SELECT id FROM `users` WHERE email = ? ";
			$result = $this->db->query($sql,array($email));
		}else{
			$sql = "SELECT id FROM `users` WHERE email = ? and id != ?";
			$result = $this->db->query($sql,array($email,$oldemail));
		}
		
		if(!empty($email)){
			if($result->num_rows() > 0){
				echo 'false';
			}else{

				echo 'true';
			}
		}
	}

	public function email_check($newEmail,$oldEmail){
		$sql = "SELECT id FROM `users` WHERE email = ? and email != ?";
		$result = $this->db->query($sql,array($newEmail,$oldEmail));
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