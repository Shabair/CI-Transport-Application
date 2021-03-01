<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function invoice( $id, $field = 'id' )
    {
        $CI =& get_instance();
        
		$CI->load->model("payment_model");
        
        $settings = $CI->payment_model->getInvoice($id);
        
        return $settings->$field;
    } 
	

function getpages(){
	
	$CI = &get_instance();
	$result= $CI->db->get('pages');
	return $result->result_array();
}
	
	
function getpermissionids($user_id){
	
	$CI = &get_instance();
	$CI->db->select('permission_id')->from('admin')->where('id',$user_id);
	return unserialize($CI->db->get()->row()->permission_id);
	
	
}	
	
	
function getpermissionname($id){
	
	 $CI = &get_instance();
	 $CI->db->select('permissions')->from('permissions')->where('id',$id);
	 return $CI->db->get()->row()->permissions;
	
}

function getrolename($id){
	
	$CI = &get_instance();
	$CI->db->select('role_name')->from('roles')->where('id',$id);
	return $CI->db->get()->row()->role_name;
	
	
}

function getDriverName($id){
	$CI = &get_instance();
	return $CI->driver_model->getDriverName($id);
}

function isDriverActive($id){
	$CI = &get_instance();
	$result = $CI->db->query("SELECT `id` From `drivers` WHERE id='".$id."' AND `deactive` = '0'  ");

	if($result->num_rows() > 0){
		return true;
	}

	return false;	
}


function check_permission($permission_id){
	
	$CI = &get_instance();
	$user_id=$CI->session->userdata['logged_in']['id'];
	$CI->db->select('permission_id')->from('admin1')->where('id',$user_id);
	return in_array($permission_id,unserialize($CI->db->get()->row()->permission_id));
	
	
}


function valid_company($table,$column,$id){// also checking is active r deactive

	$CI = &get_instance();
	
	if(($CI->db->select($column)->where('id',$id)->get($table)->row()->company_id != $CI->get_company_id()) ){

		$CI->session->set_flashdata('error', 'Error in Accessing.');
		return redirect(base_url());
	}
	// if(($CI->db->select('deactive')->where('id',$id)->get($table)->row()->deactive == 1) ){

	// 	$CI->session->set_flashdata('error', 'Error in Accessing Because it is deactivated.');
	// 	return redirect(base_url());
	// }
}

function delete_image($table,$column,$id){
	$CI = &get_instance();

	$data = $CI->db->select($column)->where('id',$id)->get($table)->row();

	$img = './uploads/'.basename($data->$column);

	if(is_file($img)){
		unlink($img);
	}
}


function set_data($data){
	$CI = &get_instance();
	// set data member of class
	$CI->data = $data;
}

/*
function get_data($str){
	$CI = &get_instance();
	return (set_value($str))?set_value($str):((isset($CI->data[$str]))?$CI->data[$str]:null);
}*/

function get_data($str,$file = false,$isFilter = true){// second para for switch
	$CI = &get_instance();
	if(!$file){
		$Rdata = (set_value('submit') || set_value('update'))?set_value($str):((isset($CI->data[$str]))?$CI->data[$str]:null);
		if(is_array($Rdata)){
                        
			return ($isFilter)?filter_var_array ($Rdata):$Rdata;
//			return $Rdata;
		}else{
			return (!empty($Rdata))?(($isFilter)?filter_var($Rdata,FILTER_SANITIZE_STRING):$Rdata):null;
//			return $Rdata;
		}
		// return (set_value($str))?set_value($str):((isset($CI->data[$str]))?$CI->data[$str]:null);
	}
	else{		// if switch unchecked
		// die('hvj');
		return (set_value($str))?set_value($str):((isset($CI->data[$str]))?$CI->data[$str]:null);
	}
}

function filter_data($data,$filterType){

	switch ($filterType) {
		case 'string':
			$filterType = FILTER_SANITIZE_STRING;
			break;

		case 'int':
			$filterType = FILTER_VALIDATE_INT;
			break;

		case 'float':
			$filterType = FILTER_VALIDATE_FLOAT;
			break;

		case 'bool':
			$filterType = FILTER_VALIDATE_BOOLEAN;
			break;

		case 'email':
			$filterType = FILTER_VALIDATE_EMAIL;
			break;
		
		default:
			# code...
			break;
	}
	return filter_var($data, $filterType, FILTER_NULL_ON_FAILURE);

}

	function image_upload($file,$config,$id,$table){
		$CI = &get_instance();
		$data = null;
		if(!empty($_FILES[$file]['name'])&&!empty($_FILES[$file]['size'])){

			$config['file_name']  = md5(microtime()).'_'.str_replace("_","",$file);

			$CI->load->library('upload', $config);
			$CI->upload->initialize($config);

			if ( ! $CI->upload->do_upload($file))
			{
				$data['errors'] = $CI->upload->display_errors(); 
		 	}
			else
			{ 
				if($id != 0 ){ // delete the file if update, data_helper
		 			delete_image($table,$file,$id);
		 		}
			
				$imgdata = array('upload_data' => $CI->upload->data());
				// $owner_ship_pdf = base_url().'uploads/'.$imgdata['upload_data']['file_name'];
				$owner_ship_pdf = $imgdata['upload_data']['file_name'];
				
				$data['image'] 		= 	$owner_ship_pdf;
		 	}
		}

		if(!is_array($_FILES[$file])){
		 	delete_image($table,$file,$id);
		 	$data['image'] = '';
		}

		return $data;
	}//function end




// list of column key and their name for history

	function get_column_name_history($key){
		$arr = [
			'license'								=> 'License',
			'reminder_1' 							=> 'Reminder 1',
			'reminder_2' 							=> 'Reminder 2',
			'reminder_3' 							=> 'Reminder 3',
			'extra_data_license' 					=> 'TEMP REC\'VD',
			'extra_data_medical_expiry' 			=> 'CVOR PULLED',
			'completed_date' 						=> 'Completed Date',
			'is_completed' 							=> 'Is Completed',
			'received_pm_sheet' 					=> 'Received PM Sheet',
			'received_mechinic_invoice' 			=> 'Received Mechinic Invoice',
		];

		return $arr[$key];
	}
