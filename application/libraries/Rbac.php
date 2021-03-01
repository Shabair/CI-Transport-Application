<?php
class RBAC 
{	
	private $ModuleAccess;
	function __construct()
	{
		$this->obj =& get_instance();
		$this->obj->ModuleAccess = $this->obj->session->userdata('ModuleAccess');
	}
	//-------------------------------------------------------------
	function CheckAuthentication()
	{
		if(!$this->obj->session->userdata('LoginStatus'))
		{
			$Back_To =str_replace("equipment_track/","",$_SERVER['REQUEST_URI']);
			$Back_To = $this->obj->functions->encode($Back_To);
			redirect('login/'.$Back_To);
		}
	}
	//----------------------------------------------------------------
	function SetAccessInSession()
	{
		$this->obj->db->from('role_access');
		$this->obj->db->where('RoleId',$this->obj->session->userdata('RoleId'));
		$query=$this->obj->db->get();
		$data=array();
		foreach($query->result_array() as $v)
		{
			$data[$v['Module']][$v['Operation']]='';
		}
		$this->obj->session->set_userdata('ModuleAccess',$data);
	} 	
	//--------------------------------------------------------------	
	function CheckModulePermission($Module)
	{
		if($this->obj->session->userdata('RoleId') <=10) 
			return 1;
		if(isset($this->obj->ModuleAccess[$Module])) 
			return 1;
		else 
		 	return 0;
	}
	//--------------------------------------------------------------	
	function CheckOperationPermission($Operation)
	{
		if($this->obj->session->userdata('RoleId') <=10) 
			return 1;
		if(isset($this->obj->ModuleAccess[$this->obj->uri->segment(1)][$Operation])) 
			return 1;
		else 
		 	return 0;
	}
	//--------------------------------------------------------------	
	function CheckModuleAccess()
	{
		if(!$this->CheckModulePermission($this->obj->uri->segment(1)))
		{
			$Back_To =str_replace("equipment_track/","",$_SERVER['REQUEST_URI']);
			$Back_To = $this->obj->functions->encode($Back_To);
			redirect('access_denied/'.$Back_To);
		}
	}
	//--------------------------------------------------------------	
	function CheckOperationAccess()
	{
		if(!$this->CheckOperationPermission($this->obj->uri->segment(2)))
		{
			$Back_To =str_replace("equipment_track/","",$_SERVER['REQUEST_URI']);
			$Back_To = $this->obj->functions->encode($Back_To);
			redirect('access_denied/'.$Back_To);
		}
	}
		
}
?>