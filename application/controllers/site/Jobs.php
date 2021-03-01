<?php
class Jobs extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('pagination');
		$this->load->library('functions');
		$this->load->model('site/Job_model','jobs');
	}
	//------------------------------------------------
	public function index()
	{
		$count = $this->jobs->CountAll();
		$per_page_record =5;
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$url= base_url("site/jobs/index");
		$config =$this->functions->paginationConfig($url,$count,$per_page_record);
		$config['uri_segment'] = 4;
		
		$this->pagination->initialize($config);
		
		$data['records']=$this->jobs->GetAll($per_page_record,$page);	
		$this->load->view('site/jobs', $data);	
	}
	//------------------------------------------------
	public function job_layout($Type='',$Val='')
	{	
		$this->session->unset_userdata('job_search');
		$this->session->unset_userdata('job_industry');
		$this->session->unset_userdata('job_location');
		$this->session->unset_userdata('job_role');
		//------------------------
		if($Type=='loc')
			$this->session->set_userdata('job_location',$Val);
		else
			$data['locations']=$this->jobs->GetLocations();	
		//------------------------
		if($Type=='ind')
			$this->session->set_userdata('job_industry',$Val);
		else
			$data['industries']=$this->jobs->GetIndustries();	
		//------------------------
		if($Type=='role')
			$this->session->set_userdata('job_role',$Val);
		//------------------------
		$this->load->view('site/job_layout',$data);
	}
	//--------------------------------------------------
	function search()
	{
		$this->session->set_userdata('job_search',$this->input->post('job_search'));
		if($this->input->post('job_industry'))
		$this->session->set_userdata('job_industry',$this->input->post('job_industry'));
		if($this->input->post('job_location'))
		$this->session->set_userdata('job_location',$this->input->post('job_location'));
	}
}
?>