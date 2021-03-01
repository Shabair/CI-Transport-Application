<?php
class Test extends MY_Controller {
	
	function __construct()
	{
		parent::__construct();
	}

	
	function date(){ //d-M-Y
		echo setDateInDB('20-Feb-2018');
	}



}