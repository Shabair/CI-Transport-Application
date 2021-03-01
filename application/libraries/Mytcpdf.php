<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once realpath(dirname(__FILE__)).'/tcpdf/tcpdf.php';
class Mytcpdf extends TCPDF {
		
	public function __construct() {
		
		
		
		//$pdf = new FPDF();
		//$pdf->AddPage();
		//parent::__construct();
		$CI =& get_instance();
		//$CI->fpdf = $pdf;
		
	}
	
}