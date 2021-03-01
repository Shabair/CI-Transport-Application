<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');




function sendEmail($to = '', $subject  = '', $body = '', $attachment = '', $cc = '')
    {
		$controller =& get_instance();
        
       	$controller->load->library('email');
       	$controller->load->helper('path'); 
       	
       	// Configure email library
			
		$controller->email->from( 'noreply@hrgulf.com' , 'HR-GULF' );
		
		$controller->email->to( $to );
		
		$controller->email->subject( $subject );
		
		$controller->email->message( $body );
		
		if($cc != '') 
		{	
			$controller->email->cc($cc);
		}	
		
		if($attachment != '')
		{
			$controller->email->attach(base_url()."pdfs/" . $attachment );
		 
		}
			
		if($controller->email->send()){
			return true;
		}
		  
        
    }
	
	
	function sendNamePasswordBody($name, $password){
		return '
			<h2 style="text-align:center; width:100%;">Welcome '.$name.' to <strong>HR-GULF</strong></h2>
				<table cellpadding="20" align="center" style="background-color:#1E3E63; border:0; width:50%; font-family:Segoe, Segoe UI, DejaVu Sans, Trebuchet MS, Verdana, sans-serif">
				
			  <caption>
				<h3 style="color:#1E3E63; margin-bottom:10px;">You are successfully registered to <a href="http://www.hrgulf.com/">HR-GULF</a></h3>
			  </caption>
			  <tbody style="color:#ffffff; border:1px solid #FFFFFF;">
				<tr>
				  <th scope="col">User Name</th>
				  <th scope="col">Password</th>
				</tr>
				<tr style="text-align:center;">
				  <td scope="col">'.$name.'</td>
				  <td scope="col">'.$password . '</td>
				</tr>
			  </tbody>
			</table>
			';
	}

?>