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
