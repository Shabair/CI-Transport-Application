<?php
class Job_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	//============  CountAll Function ===================
    
    function CountAll()
    {		
		$this->db->select('employer_job_post.*');
		$this->db->from('employer_job_post');
		$filterData = $this->session->userdata('job_search');
		$where = "(	title like '%$filterData%' )";
		$this->db->where($where);
		if($this->session->userdata('job_industry')!='')
		$this->db->where('industry',$this->session->userdata('job_industry'));
		if($this->session->userdata('job_location')!='')
		$this->db->where('country',$this->session->userdata('job_location'));
		if($this->session->userdata('job_role')!='')
		$this->db->where('role',$this->session->userdata('job_role'));
        
		$query = $this->db->get();
        return $query->num_rows();
    }
	
    //============  GetAll Function ===================
    
    function GetAll($limit, $offset)
    {
		$this->db->select('employer_job_post.*');
		$this->db->from('employer_job_post');
		$filterData = $this->session->userdata('job_search');
		$where = "(	title like '%$filterData%' )";
		$this->db->where($where);
		if($this->session->userdata('job_industry')!='')
		$this->db->where('industry',$this->session->userdata('job_industry'));
		if($this->session->userdata('job_location')!='')
		$this->db->where('country',$this->session->userdata('job_location'));
		if($this->session->userdata('job_role')!='')
		$this->db->where('role',$this->session->userdata('job_role'));
		
		$this->db->limit($limit, $offset);
		$this->db->order_by("employer_job_post.job_id", "DESC");
		$query = $this->db->get();
        $module = array();
        if ($query->num_rows() > 0) 
        {
            $module = $query->result_array();
        }
        return $module;
    } 
	//======================================
    
    function GetLocations()
    {
		$this->db->select('DISTINCT(country)');
		$this->db->from('employer_job_post');
		$this->db->order_by("employer_job_post.country", "ASC");
		$query = $this->db->get();
        $module = array();
        if ($query->num_rows() > 0) 
        {
            $module = $query->result_array();
        }
        return $module;
    } 
	//======================================
    
    function GetIndustries()
    {
		$this->db->select('industry_name');
		$this->db->from('industries_tbl');
		$this->db->order_by("industries_tbl.industry_name", "ASC");
		$query = $this->db->get();
        $module = array();
        if ($query->num_rows() > 0) 
        {
            $module = $query->result_array();
        }
        return $module;
    } 
}
?>