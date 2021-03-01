<?php 

// init the resource
$ch = curl_init();
curl_setopt_array(
    $ch, array( 
    CURLOPT_URL => 'http://truck.shabair.com/dashboard/crontask',
    CURLOPT_RETURNTRANSFER => true
));

$output = curl_exec($ch);
echo $output;
?>