<?php

defined('BASEPATH') OR exit('No direct script access allowed');
	

include realpath(dirname(__FILE__)).'/Dashboard.php';

	
class Admins extends dashboard
{


	function __construct(){
		parent::__construct();
		// to allow subadmin access admins class for editing, viewing, profile
		if($this->user_id !== 'BGIKTYP' &&  ($this->uri->uri_string()!=='admin/admins/view/'.$this->get_user_id() && $this->uri->uri_string()!=='admin/admins/edit/'.$this->get_user_id() && $this->uri->uri_string()!=='admin/admins/check_email' && $this->uri->uri_string()!=='admin/admins/remote_username_check' && $this->uri->uri_string()!=='admin/admins/add/'.$this->get_user_id())){

			return redirect('/');
		}
		$this->load->model('admins_model');
	}


	public function index(){

		$data =[
			'view' => 'admin/admins/admins_list',
			'titile'=>'Admin | Dashboard'
		];

		return $this->load->view('admin/layout',$data);

	}

	public function datatable_json()
	{
		
		$Records = $this->admins_model->GetAll();

        $data = array();
        $count = 1;
        foreach ($Records['data']  as $r)
		{
			if($r['deactive'] == 0){
				$activeState = '<a class="btn btn-xs btn-danger pull-right" style="margin-right:5px;" href="'.base_url('admin/admins/delete/'.$r['id']).'"> <i class="fa fa-trash-o"></i></a>';
			}else{
				$activeState = '<a class="btn btn-xs btn-success pull-right" style="margin-right:5px;" href="'.base_url('admin/admins/activate/'.$r['id']).'"> <i class="fa fa-plus"></i></a>';
			}
			$data[]= array(
				$count++,
                $r['first_name'],
                $r['middle_name'],
                $r['last_name'],
                $r['username'],
                $r['email'],
				
				'<a class="btn btn-xs btn-success pull-right" style="margin-right:5px;" href="'.base_url('admin/admins/view/'.$r['id']).'"> <i class="fa fa-eye"></i></a>
				<a class="btn btn-xs btn-info pull-right" style="margin-right:5px;" href="'.base_url('admin/admins/edit/'.$r['id']).'"> <i class="fa fa-pencil-square-o"></i></a>'.$activeState,
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

		// var_dump($this->input->post());
		// die();
			
		if(!$this->input->post('update')){
			// die();
			$this->form_validation->set_rules('username','Username','trim|required|alpha_numeric|is_unique[users.username]');
			$this->form_validation->set_rules('email','E-Mail','required|trim|htmlspecialchars|min_length[3]|max_length[50]|valid_email|is_unique[users.email]');

		}else{
			// die();
			$oldemail = get_user_email_by_id($this->input->post('update'));
			$this->form_validation->set_rules('email','E-Mail',"required|trim|htmlspecialchars|min_length[3]|max_length[50]|valid_email|callback_email_check[$oldemail]");
		}

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
           	$data =[
			'view' => 'admin/admins/admins_add',
			'titile'=>'Add New Admin'
			];

			return $this->load->view('admin/layout',$data);
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
				  'type'			=>	'admin'
          	];


          	if(!$this->input->post('update')){ // during insert the admin
          		$data['id'] = url_generator();
          		$data['username'] = $this->input->post('username');
          		$data['password'] = md5($this->input->post('password'));

          		$result = $this->admins_model->add($data);
          		$this->session->set_flashdata('success','User Registered Successfully.');

          	}else if($this->input->post('update')){ // during update the admin
          		
          		if($this->input->post('password_changed')){
          			$data['password'] = md5($this->input->post('password'));

          		}//die();

          		$result = $this->admins_model->update($data,$id);
          		if($result > 0){
          			$this->session->set_flashdata('success','User Updated Successfully.');
          		}
          	}

          	if(!empty($this->db->error()['message'])){

          		$this->session->set_flashdata('error',$this->db->error()['message']);
          		$this->session->set_flashdata('success',false);
          		$data = [
					'view'	=>	'admin/admins/admins_add',
					'title' =>	'Add New Admin'
				];


				return $this->load->view('admin/layout',$data);
          	}else{
          		
          		return redirect('admin/dashboard');
          	}
			
		}

	}

		//------------------------ Truck Detail Function ------------------------//
	public function view($id=0)
	{	
		set_data($this->admins_model->getAdminById($id));
		$data['title'] = 'Admin Detail : TDMA';
		$data['view']  = 'admin/admins/admins_view';
		$this->load->view('admin/layout', $data);
	}

	//------------------------ Truck Edit Function ------------------------//
	public function edit($id=0)
	{	$userData = $this->admins_model->getAdminById($id);
		$userData['update'] = $userData['id'];
		set_data($userData);
		$data['title'] 		= 'Edit Admin : TDMA';
		$data['view']  		= 'admin/admins/admins_add';
		$data['email']  	= get_data('email');
		$this->load->view('admin/layout', $data);
	}

	public function activate($id){
		if($this->admins_model->activate($id)){
      		$this->session->set_flashdata('success','User Activate Successfully');
      		$data = [
				'view'	=>	'admin/admins/admins_list',
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

		
		if($this->admins_model->delete($id)){
      		$this->session->set_flashdata('success','User Deleted Successfully');
      		$data = [
				'view'	=>	'admin/admins/admins_list',
				'title' =>	'Admin List| Dashboard'
			];

			return $this->load->view('admin/layout',$data);
      	}else{
      		$this->session->set_flashdata('error','User Not Deleted Successfully There is Some Error');
      		return redirect('admin/admins');
      	}	

		

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
				// echo $this->db->last_query();

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