<?php

/**
* 
*/
class MY_Controller extends CI_Controller
{
	public 		$data 				=	NULL;
	public 		$viewData 			=	array();
	public 		$user_id 			=	NULL;
	public 		$company_id 		= 	NULL;
	public 		$user_type 			= 	NULL;
	public 		$user_action 		= 	NULL;
	public 		$currentWith1Mth 	= 	NULL;
	public 		$action_id 			=   0;
	public 		$current_quarter 	= null;

	function __construct()
	{

		parent::__construct();

		$this->load->helper('pdf_helper');
		$this->CI = new stdClass;
		$this->current_quarter =  date('Y').'-'.$this->get_quarter(date('m'));
		// $this->current_quarter =  '2018-07';
		//--------------------------------------------------------
		if(!$this->session->userdata('user')){
			if($cookieData = get_cookie('advancetdmsrememberme')){
				$this->load->library('encrypt'); 
				$data = $this->encrypt->decode($cookieData);
				$data = explode('<>', $data);
				// var_dump($this->session->userdata());
				// var_dump($data[1]);
				// die();
				//matching the ip address encrypt in the cookies for security
				if($_SERVER['REMOTE_ADDR'] != @$data[1]){
					delete_cookie('advancetdmsrememberme');
					redirect('/', 'refresh');
				}

				$result  = $this->db->select('id, first_name, username , type, company_id')->where('id', $data[0])->where('deactive','0')->get('users');


				if ($result->num_rows() > 0) {
					
					$this->session->set_userdata('user', $result->row_array());		

				}else{
					// die($this->db->last_query());

					delete_cookie('advancetdmsrememberme');
					redirect('/', 'refresh');
				}
			}
		}
		//--------------------------------------------------------

		$this->user_type = (!empty($this->session->userdata['user']['type']))? $this->session->userdata['user']['type']:NULL;
		$this->set_user_type($this->user_type);

		$this->company_id = $this->user_id 	 = 	(!empty($this->session->userdata['user']['id']))? $this->session->userdata['user']['id']:NULL;

		$this->set_user_id($this->user_id);
		$this->set_company_id($this->company_id);


		if($this->get_user_type() === 'user'){

			$this->set_company_id($this->get_companyId($this->user_id));
		}

		if(!$this->session->userdata('user') && uri_string() != 'users' /*&& $this->uri->segment(2) != 'login'*/){
			// die();
			return redirect('users');

		}

		if($this->user_type === 'admin'){
			return redirect('admin/Dashboard');
		}

		/*for compaire the pending works with incresing 1 month*/
		$CRNTdate = new DateTime(date('Y-m-d'));//date('Y-m-d')
	  	$CRNTdate->add(new DateInterval('P10M'));
      	$this->currentWith1Mth = $CRNTdate->format('Y-m-d');
		/*for compaire the pending works with incresing 1 month end*/
		
	}

	private function get_companyId($id){
		return $this->db->select('company_id')->where('id',$id)->get('users')->row()->company_id;
	}
	
	public function file_download($filename,$unitno){
		$SetFileName = explode('_', $filename);
		$SetFileName = $SetFileName[count($SetFileName)-1];

		$SetFileName = explode('.', $SetFileName);
		$SetFileName = $SetFileName[count($SetFileName)-2];
		$FileNames = [
						// "OS"=>"Owner_Ship",
						// "AS"=>"Annual_Safety",
						// "OL"=>"Own_Leased",
						// "OP"=>"Orgen_Permit",
						// "MP"=>"Maxico_Permit",
						// "NY"=>"New_York",
						// "TRANS"=>"Transponder",
						// "CNT"=>"Contract",
						"socialsecpdf"			=>	'social_sec',
						"emplicensepdf"			=>	'emp_license',
						"passportnumberpdf"		=>	'passport_number',
						"cvordatepdf"			=>	'cvor_date',
						"policereportdatepdf"	=>	'police_report_date',
						"fastdriverpdf"			=>	'fast_driver',
						"warningletterfile"		=>	'warning_letter',
						"statementfile"			=>	'statement',
						"repairbillfile"		=>	'repair_bill',
						"trainingfile"			=>	'training_file',
						"transponderpdf"		=>	'transponder_file',
						"newyorkpdf"			=>	'newyork_file',
						"ownershippdf"			=>	'owner_ship_file',
						"annualsafetypdf"		=>	'annual_safety_file',
						"contractpdf"			=>	'contract_file',
						"ownerleasedpdf"		=>	'owner_leased_file',
						"orgenpermitpdf"		=>	'orgen_permit_file',
						"maxicopermitpdf"		=>	'maxico_permit_file',


		];

		if(!empty($filename)){
		    // Specify file path.
		    $path = './uploads/'; // '/uplods/'
		    $download_file =  $path.$filename;
		    // Check file is exists on given path.
		    if(file_exists($download_file))
		    {
		      // Getting file extension.
		      $extension = explode('.',$filename);
		      $extension = $extension[count($extension)-1];
		      // For Gecko browsers
		      header('Content-Transfer-Encoding: binary');  
		      header('Last-Modified: ' . gmdate('D, d M Y H:i:s', filemtime($path)) . ' GMT');
		      // Supports for download resume
		      header('Accept-Ranges: bytes');  
		      // Calculate File size
		      header('Content-Length: ' . filesize($download_file));  
		      header('Content-Encoding: none');
		      // Change the mime type if the file is not PDF
		      //header('Content-Type: application/'.$extension);  
		      // Make the browser display the Save As dialog
		      if($FileNames[$SetFileName] != ''){
		      	header("Content-Disposition: attachment; filename=\"" .$unitno.'_'.$FileNames[$SetFileName].'.'.$extension . "\";");
		      }else{
		      	header("Content-Disposition: attachment; filename=\"" .$unitno.'.'.$extension . "\";");
		      }  
		      readfile($download_file); 
		      //exit;
		    }
		    else
		    {
		      echo 'File does not exists on given path';
		    }
		}
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



	public function license_date_update($id,$new_date,$table = 'driver_detail',$column = 'emp_license_exp_date'){
		$old_expiry_date = get_from($table,$column,['id'=>$id]);

		$new_date = setDateInDB($new_date);
		
		if($new_date <= date('Y-m-d')){
    		return "Please Enter the Correct Date!";
		}

		$this->db->set($column, $new_date);
		$this->db->where('id', $id);
		$this->db->update($table);
		

		$this->db->select('id');
		$this->db->where('action_on_id', $id);
		$this->db->where('p_type', 'license');
		$this->db->order_by('id', 'DESC');
		$this->db->limit(1);
		$pending_works_id = $this->db->get('pending_works');
		
		if($pending_works_id->num_rows() > 0){

			$pending_works_id = $pending_works_id->row()->id;

			meta_data('pending_works','completed_date_time',$pending_works_id,date('Y-m-d'));

			$this->db->set('completed_date', $new_date);
			// $this->db->where('action_on_id', $id);
			$this->db->where('id', $pending_works_id);
			$this->db->update('pending_works');
		}

		if($this->db->affected_rows() > 0){
			return true ;
		}else{
			// return 'There Is Some Error To Update!';
			return 'There is some error in updation!' ;
		}
	}

	public function get_quarter($month){
		
		if($month >= '01' && $month <= '03'){
			return '01';
		}else if($month >= '04'&& $month <= '06'){
			return '04';
		}else if($month >= '07' && $month <= '09'){
			return '07';
		}else if($month >= '10' && $month <= '12'){
			return '10';
		}else{
			return false;
		}
	}

}//class end
    

    

?>