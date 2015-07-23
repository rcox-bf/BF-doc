<?php
/*This includes the hash.php file so that you can use the variables you assigned for 
procesing transactions*/
include_once('hash.php');
?>

<html>
    <link rel="stylesheet" type="text/css" href="style.css">
<head>
    <title>ACH Sale</title>
</head>

<body>
<!--This is the url you will use to post transactions to. In this case we are using our cert.payconex.net for testing-->
<form action="https://cert.payconex.net/api/qsapi/3.8/" method="post">

<!--Here we grab all necessary values from the hash.php file -->
<input name="hash" type="hidden" value="<?=$hash_value?>">
<input name="timestamp" type="hidden" value="<?=$timestamp?>">
<input name="account_id" type="hidden" value="<?=$account_id?>">
<input name="success_url" type="hidden" value="<?=$success_url?>">
<input name="decline_url" type="hidden" value="<?=$decline_url?>">

<!--A couple more hidden inputs so we can get the tender_type and response_format how we like. -->
<input type="hidden" name="response_format" value="FORM">
<input type="hidden" name="tender_type" value="ACH">
<input type="hidden" name="transaction_type" value="SALE">

<!--These are all the form fields that will make up the request-->
<div>
    <label for="first_name" id="first_name">First Name:
        <input type="text" name="first_name" value="Bluefin"/>
    </label> 

    <label for="last_name" id="last_name">Last Name:
        <input type="text" name="last_name" value="Test"/>
    </label> 

    <label for="transaction_amount" id="transaction_amount">Transaction Amount:
        <input type="text" name="transaction_amount" value="1.00"/>
    </label> 

    <label for="bank_account_number" id="card_number">Bank Account Number:
        <input type="text" name="bank_account_number" value="123456789">
    </label>

    <label for="bank_routing_number" id="bank_routing_number">Card Expiration:
        <input type="text" name="bank_routing_number" value="123123123">
    </label> 

    <input type="submit" value="Submit Payment"/>
</div>
</form>
</body>
</html>
