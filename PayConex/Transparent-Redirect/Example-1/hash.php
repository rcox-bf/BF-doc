<?php
//Assign your variables the necessary values. 
    $account_id = "";//You must put your account_id here
    $api_accesskey = "";//You must put your api_accesskey here
    $success_url = "http://your-url.com/success.php";//Your success URL goes here
    $decline_url = "http://your-url.com/decline.php";//your decline URL goes here
    $timestamp = time();

//The $hash_string concatenates your three required parameters that will be hashed. If you are using transparent redirect you must also add your success and decline URLs. 
    $hash_string = $account_id.",".$api_accesskey.",".$timestamp.",".$success_url.",".$decline_url;

//The $hash_value is the variable you will post to PayConex.
    $hash_value = hash("sha256",$hash_string);
?>
