<?php
class Functions 
{
		
	function Functions()
	{
		$this->obj =& get_instance();
	}
	//===========================================================
	function asDollars($value) 
	{
	  return '$' . number_format($value, 2);
	}
	//============================================================	
	function date_time($datetime) 
	{
	   return date('F j, Y g:i a',strtotime($datetime));
	}
	//=================================================================
	
	function time_ago($date) {

        if(empty($date)) {
            return "No date provided";
        }

        $periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
        $lengths = array("60","60","24","7","4.35","12","10");
        $now = time();
        $unix_date = strtotime($date);

        // check validity of date

        if(empty($unix_date)) {
            return "";
        }

        // is it future date or past date
        if($now > $unix_date) {
            $difference = $now - $unix_date;
            $tense = "ago";
        } else {
            $difference = $unix_date - $now;
            $tense = "from now";
        }
        for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
            $difference /= $lengths[$j];
        }
        $difference = round($difference);
        if($difference != 1) {
            $periods[$j].= "s";
        }

        return "$difference $periods[$j] {$tense}";
    }
	
	
	//============================================================	
	function neat_trim($str, $n, $delim='...') 
	{
	   $len = strlen($str);
	   if ($len > $n) 
	   {
		   preg_match('/(.{' . $n . '}.*?)\b/', $str, $matches);
		   return rtrim($matches[1]) . $delim;
	   }
	   else 
	   {
		   return $str;
	   }
	}
	//============================================================	
	function generate_randomnumber($len)
	{
		$r_str = "";
			$chars = "0123456789";
			for($i=0; $i<$len; $i++) 
				$r_str .= substr($chars,rand(0,strlen($chars)),1);
			return $r_str;
	}
	//============================================================
	function encode($input) 
	{
		return urlencode(base64_encode($input));
	}
	//============================================================
	function decode($input) 
	{
		return base64_decode(urldecode($input) );
	}
	//============================================================
	function cleanURl($string)
	 {
	 
	   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
		   $string = preg_replace('/[^A-Za-z0-9\-]/', '-', $string); // Removes special chars.
	
		   $string = preg_replace('/-+/', '-', $string); //
	
		  return $result = strtolower($string);
	 
	 }
	
	//============================================================
	public function paginationConfig($url,$count,$perpage) 
	{
		$config = array();
		$config["base_url"] = $url;
		$config["total_rows"] = $count;
		$config["per_page"] = $perpage;
		$config['full_tag_open'] = '<ul class="pagination pagination-split">';
		$config['full_tag_close'] = '</ul>';
		$config['prev_link'] = '&lt;';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '&gt;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';

		$config['first_link'] = '&lt;&lt;';
		$config['last_link'] = '&gt;&gt;';
		return $config;
	}

	
}
?>