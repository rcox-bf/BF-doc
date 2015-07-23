#Example: Transparent Redirect Payment Page using PHP and HTML

This is the same PHP code from [Example 3 from the the HASH](/HASH-Authentication) documentation. 

hash.php
```php
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
```

index.php
```php
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
```

success.php
```php
<?php

$response = urldecode($_SERVER['QUERY_STRING']);

$response_decode = json_decode($response);

$params = $response_decode[0];

?>
<!DOCTYPE html>
<html>
<head>
	<title>Receipt Page!</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div id='transaction-result'>
	<div id='message'>
		<h1>Transaction was successful!</h1>
	</div>

	<div id='transaction-details'>
	<div id='trans-table'>
	<h4>Transaction Details:</h4>
	<table>		
		<tr>
			<td class='key'>Transaction ID:</td>
			<td class='value'><?=$params->transaction_id?></td>
		</tr>
		<tr>
			<td class='key'>Date/Time:</td>
			<td class='value'><?=$params->transaction_timestamp?></td>
		</tr>
		<tr>
			<td class='key'>Tender Type:</td>
			<td class='value'><?=$params->tender_type?></td>
		</tr>
		<tr>
			<td class='key'>Transaction Type:</td>
			<td class='value'><?=$params->transaction_type?></td>
		</tr>
		<tr>
			<td class='key'>Transaction Amount:</td>
			<td class='value'>$<?=$params->transaction_amount?></td>
		</tr>
		<tr>
			<td class='key'>Message:</td>
			<td class='value'><?=$params->authorization_message?></td>
		</tr>
	</table>
	</div>
	</div>

	<div id='customer-details'>
	<table>
		<h4>Customer Details:</h4>

		<tr>
			<td class='key'>Customer Name:</td>
			<td class='value'><?=$params->first_name?> <?=$params->last_name?> </td>
		</tr>
	</table>
	</div>

</div>
</body>
</html>
```

decline.php
```php
<?php
$response = urldecode($_SERVER['QUERY_STRING']);

$response_decode = json_decode($response);

$params = $response_decode[0];

?>
<!DOCTYPE html>
<html>
<head>
	<title>Receipt Page!</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div id='transaction-result'>
	<div id='message'>
		<h1>Transaction was DECLINED!</h1>
	</div>

	<div id='transaction-details'>
	<div id='trans-table'>
	<h4>Transaction Details:</h4>
	<table>		
		<tr>
			<td class='key'>Error Code:</td>
			<td class='value'><?=$params->error_code?></td>
		</tr>
		<tr>
			<td class='key'>Message:</td>
			<td class='value'><?=$params->authorization_message?></td>
		</tr>
	</table>
	</div>
	</div>
</div>
</body>
</html>
```
[Go Back - To Transparent Redirect](/README.md)
