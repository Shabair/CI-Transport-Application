<?php

defined('BASEPATH') OR exit('No direct script access allowed');
	
	
	
class Users extends MY_Controller
{
		
	function __construct(){
		
		parent ::__construct();
		
		$this->load->model('admin_model');
		$this->load->model('company_model');



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
		
		
	function index()
	{
		// check the your already logged in
		if($this->session->userdata('user')){

			return redirect('/');

		}

		if($this->form_validation->run('company_login'))
		{

		    $formdata['username']=$this->input->post("username");
			
		    $formdata['password']=$this->input->post("password");


			$result=$this->company_model->login($formdata);

			if($result)
			{
				if($this->input->post("rememberme")){
			    	$this->load->library('encrypt');
			    	
			    	$cookie = array(
					    'name'   => 'rememberme',
					    'value'  => $this->encrypt->encode($result['id']."<>".$_SERVER['REMOTE_ADDR']),
					    'expire' => 86400*15
					);
			    	$this->input->set_cookie($cookie);

		    	}
				
				$this->session->set_userdata('user', $result);	

				redirect('dashboard', 'refresh');
			}else
			{
				$data['login_error_company'] = "Invalid username or password";
				$this->load->view("company/login", $data);
			}
			
		}else{
			
			$data['err'] = validation_errors('<span class="error">', '</span>');
			return $this->load->view("company/login", $data);
		}
	}
	//------------------------------------------------

	function check_sess(){
		var_dump($this->session->userdata());
		echo $this->session->userdata('logged_in')['first_name'];
	}
			
	//-----------------------------------------
		
		
	public function logout()
	{
			
		$this->session->unset_userdata('logged_in');
		delete_cookie('rememberme');
		//delete_cookie('rememberme','','/','shaib_');
		session_destroy();
		return redirect('/');
		
	}


		
		

		
}//CLass END
	
	
?>