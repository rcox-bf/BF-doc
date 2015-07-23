# Bluefin HASH Authentication

A hash function is an algorithm that transforms (hashes) an arbitrary set of data elements, such as a text
string or file, into a single fixed length value (the hash). The computed hash value is a means of
protecting sensitive data. Bluefin has included this functionality in to its API’s, and it uses a Secure Hash
Algorithm (SHA-256) type of hash.

There are two pieces that are tied to sending a hash; the hash value and the “hash_key” value (string),
although the “hash_key” is not always required. A description of each REQUIRED parameter in any HASH
is included below.

| Parameter  | Required? | Description |
| :-------------: | :-------------: | :------------- |
| **account_id**  | **Yes** | This is the merchant account ID. For any hash, this MUST be included and be the first parameter |
| **api_accesskey** | **Yes** | This is the merchants unique “key”. It should NEVER be given out to anyone. For any hash, this MUST be included and be the second parameter.<br>**NOTE: The parameter "api_accesskey" is NOT to be sent as a separate variable when using transparent redirect. Doing so compromises the integrity of the data, PCI compliancy, and will result in a "security violation" error.**|
| **timestamp**  | **Yes** | This is a 10-digit UNIX timestamp representing the number of seconds since Epoch (00:00:00 on January 1, 1970) and should represent the time this transaction occurs. For any hash, this MUST be included and be the third parameter. |


It is possible in any transaction type to use the HASH method for more than just the required fields
(listed above). This is strictly up to the vendor/merchant, but it is recommended by Bluefin to do so. If
the merchant wishes to include other data values in the hash, they can be appended to the hash value,
but another element must be sent, called the “hash_key”, which is explained below.

| Parameter  | Required? | Description |
| :-------------: | :-------------: | :------------- |
| **hash_key**  | **No** | A string containing a comma delimited list of parameters used to build the hash. This list should NOT include the three parameters above, or other parameters that are used in transparent redirect (see the Transparent Redirect section for more information). |

**NOTE**: All HASH parameters are case sensitive.<br>
**NOTE**: When using the transparent redirect method, the HASH method is REQUIRED.

##Example 1: This is the bare minimum to utilize HASH authentication. 
Given the following variables:

*account_id*: 123456789012<br>
*api_accesskey*: e6f157d2-66cf-43d5-8a56-c4c57d5760d7<br>
*timestamp*: 1360870400

The string to be hashed would be: 123456789012,e6f157d2-66cf-43d5-8a56-c4c57d5760d7,1360870400

And example of how this could be done using PHP is below:
```php
<?php
//Assign your variables the necessary values. 
	$account_id = "123456789012";//You must put your account_id here
	$api_accesskey = "e6f157d2-66cf-43d5-8a56-c4c57d5760d7";//You must put your api_accesskey here
	$timestamp = 1360870400;

//The $hash_string concatenates your three required parameters that will be hashed.
	$hash_string = $account_id.",".$api_accesskey.",".$timestamp;
	
//The $hash_value is the variable you will post to PayConex.
	$hash_value = hash("sha256",$hash_string);
?>
```

##Example 2: This example outlines how to use HASH authentication with an added variable (transaction_amount)

Given the following variables:

*account_id*: 123456789012<br>
*api_accesskey*: e6f157d2-66cf-43d5-8a56-c4c57d5760d7<br>
*timestamp*: 1360870400<br>
*transaction_amount*: 100

The string to be hashed would be: 123456789012,e6f157d2-66cf-43d5-8a56-c4c57d5760d7,1360870400,100

And example of how this could be accomplished using PHP is below:

```php
<?php
//Assign your variables the necessary values. 
	$account_id = "";//You must put your account_id here
	$api_accesskey = "";//You must put your api_accesskey here
	$timestamp = 1360870400;
	$transaction_amount = 100;

//The $hash_string concatenates your three required parameters that will be hashed. If you are using transparent redirect you must also add your success and decline URLs. 
	$hash_string = $account_id.",".$api_accesskey.",".$timestamp.",".$transaction_amount;
	
//The $hash_value is the variable you will post to PayConex.
	$hash_value = hash("sha256",$hash_string);
?>
```
**NOTE*: You will also have to pass hash_key="transaction_amount" in your Transparent Redirect Request.

##Example 3: This example outlines how to use HASH authentication for Transparent Redirect

Given the following variables:

*account_id*: 123456789012<br>
*api_accesskey*: e6f157d2-66cf-43d5-8a56-c4c57d5760d7<br>
*timestamp*: 1360870400<br>
*success_url*: http://your-url.com/success.php<br>
*decline_url*: http://your-url.com/decline.php<br>

The string to be hashed would be: 123456789012,e6f157d2-66cf-43d5-8a56-c4c57d5760d7,1360870400,http://your-url.com/success.php,http://your-url.com/decline.php

And example of how this could be accomplished using PHP is below:

```php
<?php
//Assign your variables the necessary values. 
	$account_id = "";//You must put your account_id here
	$api_accesskey = "";//You must put your api_accesskey here
	$success_url = "http://your-url.com/success.php";//Your success URL goes here
	$decline_url = "http://your-url.com/decline.php";//your decline URL goes here
	$timestamp = 1360870400;

//The $hash_string concatenates your three required parameters that will be hashed. If you are using transparent redirect you must also add your success and decline URLs. 
	$hash_string = $account_id.",".$api_accesskey.",".$timestamp.",".$success_url.",".$decline_url;
	
//The $hash_value is the variable you will post to PayConex.
	$hash_value = hash("sha256",$hash_string);
?>
```

For more information on Transparent Redirect please [click here](/PayConex/Transparent-Redirect) for documentation.
