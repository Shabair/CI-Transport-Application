<?php

defined('BASEPATH') OR exit('No direct script access allowed');
	


	
class Dashboard extends CI_Controller
{

	public 		$data 		=	NULL;
	public 		$user_id 	= 	NULL;

	function __construct(){

		parent::__construct();
		if($this->session->userdata('user')['type'] !== 'admin'){
			return redirect('/');
		}

		// $this->user_type = (!empty($this->session->userdata['user']['type']))? $this->session->userdata['user']['type']:NULL;

		$this->user_id 	 = 	(!empty($this->session->userdata['user']['id']))? $this->session->userdata['user']['id']:NULL;
		$this->user_type 	 = 	(!empty($this->session->userdata['user']['type']))? $this->session->userdata['user']['type']:NULL;
		$this->set_user_id($this->user_id);
		$this->set_user_type($this->user_type);

	}
	
	public function index(){

		$data =[
			'view' => 'admin/dashboard/dashboard',
			'titile'=>'Admin | Dashboard'
		];

		return $this->load->view('admin/layout',$data);

	}

	public function logout(){
			
		$this->session->unset_userdata('logged_in');
		delete_cookie('rememberme');
		//delete_cookie('rememberme','','/','shaib_');
		session_destroy();
		return redirect('/');
		
	}

	public function __call($method,$value){
		if(count($value) == 0){
			if(strstr($method,'get_')){
				$var = substr($method,4);
				return $this->$var;
			}
		}else if(count($value) == 1){
			if(strstr($method,'set_')){
				$var = substr($method,4);
				$this->$var = $value[0];
			}
		}

	}


}