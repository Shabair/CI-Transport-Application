<?php

include realpath(dirname(__FILE__)).'/Dashboard.php';

class History extends dashboard {


	function __construct()
	{
		parent::__construct();

	}


	function index(){
		
		$this->session->unset_userdata('user_search_from');
		$this->session->unset_userdata('user_search_to');

		$data['title'] = 'Admin History : DMS';
		$data['view']  = 'admin/history';

		$this->load->view('admin/layout', $data);
	}

	function datatable_json(){

		$Records = $this->history_search();

		$data = array();
        $count = 1;
        foreach ($Records['data']  as $r)
		{  

			$data[]= array(
				$count++,
				implode(' ',get_from('users','first_name,middle_name,last_name',['id'=>$r['user_id']])),
				get_from('users','email',['id'=>$r['user_id']]),
				$r['action'],
				$r['action_place'],
				$r['action_on'],
				$r['action_date'],
			);
        }
		
		
		$Records['data']	=	$data;
        echo json_encode($Records);	
        // echo json_encode($data);
	}

	public function search()
	{
		$this->session->set_userdata('user_search_from',$this->input->post('user_search_from'));
		$this->session->set_userdata('user_search_to',$this->input->post('user_search_to'));
	}

	function history_search(){

		$wh =array();

		if($this->session->userdata('user_search_from')!='')
			$wh[]=" `action_date` >= '".date('Y-m-d', strtotime($this->session->userdata('user_search_from')))."'";
		if($this->session->userdata('user_search_to')!='')
			$wh[]=" `action_date` <= '".date('Y-m-d', strtotime($this->session->userdata('user_search_to')))."'";

		$SQL ='SELECT h.* FROM history as h ';
		
			$wh[]=" h.company_id = 'adminhis'";
			$WHERE = implode(' and ',$wh);
			return $this->LoadJson($SQL,$WHERE);
		

	}


	function LoadJson($SQL,$EXTRA_WHERE='')
	{
		if(!empty($_GET['search']['value']) || $_GET['order'][0]['column'] != 6){
			$SQL.='inner join users as u on h.user_id = u.id inner join users as u2 on h.action_id = u2.id';
		}

		if(!empty($EXTRA_WHERE))
		{
			$SQL.= " WHERE ( $EXTRA_WHERE )";
		}

		$query = $this->db->query($SQL);
		$Total = $query->num_rows();
		//------------------------------------------------
		if(!empty($_GET['search']['value']))
		{
			$qry = array();
			foreach($_GET['columns'] as $cl)
			{
				if($cl['searchable']=='true' && !empty($cl['name']))
				$qry[] =" ".$cl['name']." like '%".$_GET['search']['value']."%' ";
			}
			$SQL.= " AND ( ";
			$SQL.= implode("OR",$qry);
			$SQL.= " ) ";	
		}

		$query = $this->db->query($SQL);
		$Filtered = $query->num_rows();

		$SQL.= " ORDER BY ";
		$SQL.= $_GET['columns'][$_GET['order'][0]['column']]['name']." ";
		$SQL.= $_GET['order'][0]['dir'];
		$SQL.= " LIMIT ".$_GET['length']." OFFSET ".$_GET['start']." ";

		$query = $this->db->query($SQL);
		$Data = $query->result_array();
			// return $this->db->last_query();
		return array("recordsTotal"=>$Total,"recordsFiltered"=>$Filtered,'data' => $Data);
	}

}// end of history class