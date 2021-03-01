<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function server_processing($data, $sql_details, $table, $primaryKey, $columns, $whereResult, $whereAll=null) {
   

    /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
     * If you just want to use the basic configuration for DataTables with PHP
     * server-side, there is no need to edit below this line.
     */

    require( 'ssp.class.php' );

    echo json_encode(
        SSP::complex( $data, $sql_details, $table, $primaryKey, $columns, $whereResult, $whereAll=null )
    );
}



function getState($value){
    $states = [
                    'AB'    =>  'Alberta',
                    'BC'    =>  'British',
                    'MB'    =>  'Manitoba',
                    'NB'    =>  'New',
                    'NL'    =>  'Newfoundland',
                    'NT'    =>  'Northwest',
                    'NS'    =>  'Nova',
                    'NU'    =>  'Nunavut',
                    'ON'    =>  'Ontario',
                    'PE'    =>  'Prince',
                    'QC'    =>  'Quebec',
                    'SK'    =>  'Saskatchewan',
                    'YT'    =>  'Yukon'
    ];
    return (isset($states[$value]))?$states[$value]:null;
}
function getUSState($value){
    $states = [
                    'AL'    =>  'Alabama',
                    'AK'    =>  'Alaska',
                    'AZ'    =>  'Arizona',
                    'AR'    =>  'Arkansas',
                    'CA'    =>  'California',
                    'CO'    =>  'Colorado',
                    'CT'    =>  'Connecticut',
                    'DE'    =>  'Delaware',
                    'FL'    =>  'Florida',
                    'GA'    =>  'Georgia',
                    'HI'    =>  'Hawaii',
                    'ID'    =>  'Idaho',
                    'IL'    =>  'Illinois',
                    'IN'    =>  'Indiana',
                    'IA'    =>  'Iowa',
                    'KS'    =>  'Kansas',
                    'KY'    =>  'Kentucky',
                    'LA'    =>  'Louisiana',
                    'ME'    =>  'Maine',
                    'MD'    =>  'Maryland',
                    'MA'    =>  'Massachusetts',
                    'MI'    =>  'Michigan',
                    'MN'    =>  'Minnesota',
                    'MS'    =>  'Mississippi',
                    'MO'    =>  'Missouri',
                    'MT'    =>  'Montana',
                    'NE'    =>  'Nebraska',
                    'NV'    =>  'Nevada',
                    'NH'    =>  'New Hampshire',
                    'NJ'    =>  'New Jersey',
                    'NM'    =>  'New Mexico',
                    'NY'    =>  'New York',
                    'NC'    =>  'North Carolina',
                    'ND'    =>  'North Dakota',
                    'OH'    =>  'Ohio',
                    'OK'    =>  'Oklahoma',
                    'OR'    =>  'Oregon',
                    'PA'    =>  'Pennsylvania',
                    'RI'    =>  'Rhode Island',
                    'SC'    =>  'South Carolina',
                    'SD'    =>  'South Dakota',
                    'TN'    =>  'Tennessee',
                    'TX'    =>  'Texas',
                    'UT'    =>  'Utah',
                    'VT'    =>  'Vermont',
                    'VA'    =>  'Virginia',
                    'WA'    =>  'Washington',
                    'WV'    =>  'West Virginia',
                    'WI'    =>  'Wisconsin',
                    'WY'    =>  'Wyoming'
    ];
    return (isset($states[$value]))?$states[$value]:null;
}

    function getposition($value){
        $positions = [
                        'local'    =>  'City Driver',
                        'long_haul'    =>  'long Haul',
                        'owner_operator'    =>  'Owner Operator',
                        'driver_of_owner'   => 'Driver Of Owner Operator'
        ];
        return (isset($positions[$value]))?$positions[$value]:null;
    }



    function taginput_date($data){
        if($data == null  || empty($data))
            return null;

        $remarks = explode(',',$data);
        for($i = 0;$i <count($remarks);$i++){
            if(strpos($remarks[$i], '(')!==false && strpos($remarks[$i], ')')!==false && strpos($remarks[$i], '/')!==false){
                $temp = explode(')',$remarks[$i],2);
                $re[$i] = [$temp[0].')',$temp[1]];
            }else{
                $re[$i] = ['('.date("M/d/Y").')',$remarks[$i]];
            }
        }
        return serialize($re);

    }

    function get_date_taginput($data){
        if($data == null || empty($data))
            return null;

        $arr=unserialize($data);
        for ($i=0; $i < count($arr); $i++) { 
            $str[] = $arr[$i][0].' '.trim($arr[$i][1]);
        }
        $remarks = implode(',', $str);

        return $remarks;
    }

    function get_table_remarks($data){
        if($data == null || empty($data))
        return null;

        $arr=unserialize($data);

        
        $lastdata = $arr[count($arr)-1][1];
        // $remarks = implode(',', $str);
        $remarks = substr($lastdata, 0,20).((strlen($lastdata) > 20)?'...':null);

        return $remarks;
    }


    function remove_duplicated_values($array1,$array2){
        $newArray = array();
        $is_in = false;
        foreach ($array1 as $key1 => $value1) {
            foreach ($array2 as $key2 => $value2) {
                if($value1 == $value2){
                    $is_in = true;
                }
            }
            if(!$is_in){
                $newArray[] = $value1;
            }
            $is_in = false;
        }
        return $newArray;
    }
    function getDriverFullName($id){
        $CI = &get_instance();
        // $result = $CI->db->query("CALL GetDriverName(".$id.");")->row_array();
        $result = $CI->db->query("SELECT CONCAT_WS(' ',`first_name`,`middle_name`,`last_name`) as Name FROM drivers where id  = ?;",[$id])->row_array();
        return $result['Name'];
    }

    function getTruckUnit($id){
        $CI = &get_instance();
        $result = $CI->db->query("SELECT unit_no From `truck` WHERE id='".$id."'");
        return ($result->num_rows()> 0)?$result->row()->unit_no:null;
    }

    function getTrailerUnit($id){
        $CI = &get_instance();
        $result = $CI->db->query("SELECT unit_no From `trailer` WHERE id='".$id."'");
        return ($result->num_rows()> 0)?$result->row()->unit_no:null;
    }




    function url_generator($URLlength = 7){
        $charray = array_merge(range('A','Z'), range('0','9'));
        $max = count($charray) - 1;
        $url = null;
        for ($i = 0; $i < $URLlength; $i++) {
            $randomChar = mt_rand(0, $max);
            $url .= $charray[$randomChar];
        }

        return $url;
    }



    function get_user_email_by_id($id){
        $CI = &get_instance();
        $sql = "SELECT email FROM `users` WHERE id = ?";
        $result = $CI->db->query($sql,array($id));
        return $result->row()->email;
    }

    function get_username_by_id($id){
        $CI = &get_instance();
        $sql = "SELECT username FROM `users` WHERE id = ?";
        $result = $CI->db->query($sql,array($id));
        return $result->row()->username;
    }



    function history($data){
        $CI =&get_instance();
        $CI->db->insert('history',$data); 
        if($CI->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }



    // function get_from($table,$column,$where = null,$notSingle = false){
    //     $CI=&get_instance();
    //     $result = $CI->db->select($column)->where($where)->get($table);
    //     return (($result->num_rows() > 0 )?
    //         (($notSingle)?$result-> result_array():$result-> row()->$column) 
    //         : false);
    // }

    // function get_from($table,$column,$where=[]){
    //     $CI=&get_instance();
    //     $result = $CI->db->select($column)->where($where)->get($table);
    //     return (($result->num_rows() > 0 )?
    //         (($result->num_rows()==1)?(count((array)$result->row())>1? $result->row():$result->row()->$column) :$result-> result_array()) 
    //         : false);
    // }

    function get_from($table,$column="*",$where=[]){
        $CI=&get_instance();
        if($column != '*'){
            $result = $CI->db->select($column)
                        ->where($where)
                        ->get($table);
            return (($result->num_rows() > 0 )?
                        (($result->num_rows()==1)?
                            (count((array)$result->row())>1? 
                                $result->row_array():$result->row()->$column) 
                            :$result-> result_array()) 
                        : null);
        }else if($column == '*'){

            $result = $CI->db->query("SELECT `tbl_col`,`tbl_val` FROM `extra_data` where tbl_item_id ='".$where['id']."' AND tbl_name = '".$table."'")->result_array();
            $data_from = array();
            foreach ($result as  $value) {
                $data_from[]= "'".$value['tbl_val'] ."' as '".$value['tbl_col']."'";
            }

            $result = $CI->db->select($table.'.'.$column)->select(implode(' , ', $data_from))->where($where)->get($table);
            return (($result->num_rows() > 0 )?
                (($result->num_rows()==1)?(count((array)$result->row())>1? $result->row_array():$result->row()->$column) :$result-> result_array()) 
                : null);
        }
        
    }

    function meta_data($table,$column,$tbl_item_id,$value=null){
        $CI=&get_instance();

        if(empty($value)){
            $returnData = $CI->db->select('tbl_val')
                            ->where('tbl_name',$table)
                            ->where('tbl_col',$column)
                            ->where('tbl_item_id',$tbl_item_id)
                            ->get('extra_data')->row();
            if(count($returnData)){
                return $returnData->tbl_val;
            }else{
                return null;
            }

        }else if($value!==null){
            // die('aasxaxs');
            $data = [
                'tbl_val'=>$value
            ];

            $CI->db->where('tbl_name', $table);
            $CI->db->where('tbl_col', $column);
            $CI->db->where('tbl_item_id', $tbl_item_id);
            $CI->db->update('extra_data', $data);
            if(!$CI->db->affected_rows()){
                $data = array(
                        'tbl_item_id' => $tbl_item_id,
                        'tbl_name' => $table,
                        'tbl_col' => $column,
                        'tbl_val' => $value,
                );

                $CI->db->insert('extra_data', $data);
            }

        }

    }

/*
$returnData = $CI->db->select('tbl_val')
                            ->where('tbl_name',$table)
                            ->where('tbl_col',$column)
                            ->where('tbl_item_id',$tbl_item_id)
                            ->get('extra_data')->row();

*/
    function extra_data($where,$value=null){
        $CI=&get_instance();

            // die('aasxaxs');
            // $data = [
            //     'tbl_val'=>$value
            // ];

            // $CI->db->where($where);
            // $CI->db->update('extra_data', $data);
            // if(!$CI->db->affected_rows()){
            //     $data = array(
            //             'tbl_item_id' => $where['tbl_item_id'],
            //             'tbl_name' => $where['tbl_name'],
            //             'tbl_col' => $where['tbl_col'],
            //             'tbl_val' => $value,
            //     );

            //     $CI->db->insert('extra_data', $data);
            // }
            $CI->db->query("INSERT INTO extra_data (id,tbl_item_id,tbl_name,tbl_col,tbl_val) VALUES 
                ('".$where['id']."','".$where['tbl_item_id']."','".$where['tbl_name']."','".$where['tbl_col']."','".$where['tbl_val']."') 
                ON DUPLICATE KEY UPDATE tbl_val='".$where['tbl_val']."',tbl_col='".$where['tbl_col']."'");

    

    }

    function get_rec_meta_data($data){
        $CI =&get_instance();

        $CI->db->select('tbl_val')
                ->from('extra_data')
                ->where($data)
                ->order_by('id','desc')
                ->limit(1);

        $result = $CI->db->get();
        if($result->num_rows() > 0){
            return $result->row()->tbl_val;
        }else{
            return null;
        }
    }

    function create_action_token($user_id,$action_on,$action,$rand){
        $CI =&get_instance();

        $dateTime = date("Y-m-d H:i:s");

        $data = [
            'user_id'       => $user_id ,
            'action_on'     => $action_on ,
            'action'        => $action ,
            'rand'          => $rand ,
            'date'          => $dateTime ,

        ];

        $CI->db->insert('action_tokens',$data);

        $CI->load->library('encrypt');
        // $text = $user_id.'::'.$action_on.'::'.$action.'::'.$rand.'::'.$dateTime;
        $text = serialize($data);
        return $CI->encrypt->encode($text);
    }

    function check_action_token($index){

        $CI =&get_instance();
        $cipher = $CI->input->post_get($index);

        if(!empty($cipher)){
            $CI->load->library('encrypt');
            $data = @unserialize($CI->encrypt->decode($cipher));
            $result = $CI->db->select('action,action_on,id')->where('user_id',$CI->get_user_id())->where('rand',$data['rand'])->where('date',$data['date'])
                    ->get('action_tokens');
            if($result->num_rows() > 0){
                $data = $result->row();
                // action token work one time
                $CI->db->where('id',$data->id);
                $CI->db->delete('action_tokens');

                return $data;
            }
        }

        return null;

    }    

    function delete_action_token($cipher){
        $CI =&get_instance();
        $CI->load->library('encrypt');
        $data = @unserialize($CI->encrypt->decode($cipher));

        $CI->session->unset_userdata('action_token');
        $CI->db->where('user_id',$CI->get_user_id())->where('rand',$data['rand'])->where('date',$data['date']);
        return $CI->db->delete('action_tokens');

    }


    function get_date_style($date){
        if($date){
            return date("m/d/Y",strtotime($date));
        }else{
            return null;
        }
    }

    function setDateInDB($date = null,$returnformat = 'Y-m-d'){
        // 15-Feb-2009 => d-M-Y
        // if(!empty($date)){
        //     return DateTime::createFromFormat('d-M-Y', $date)->format($returnformat);
        // }else{
        //     return $date;
        // }
        
        $returnDate = DateTime::createFromFormat('d-M-Y', $date);
        if($returnDate){
            return $returnDate->format($returnformat);
        }else{
            return $date;
        }
    }

    function getDateFromDB($date = null,$returnformat = 'd-M-Y'){

        $returnDate = DateTime::createFromFormat('Y-m-d', $date);
        if($returnDate){
            return $returnDate->format($returnformat);
        }else{
            return $date;
        }

    }