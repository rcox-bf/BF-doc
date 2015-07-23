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
