<?php 
// require_once 'dbserver_connect.php';
require "sms.php";
$sms=new sms();
$json = file_get_contents('php://input');


 echo "<script>
        alert('Holla Customer');
 </script>";


if($json!=null)
{
$data = json_decode($json);
$res_code = $data->Body->stkCallback->ResultCode;

if($res_code==0) {
 $amount = $data->Body->stkCallback->CallbackMetadata->Item[0]->Value;
 $MpesaReceiptNumber = $data->Body->stkCallback->CallbackMetadata->Item[1]->Value;
 $PhoneNumber = $data->Body->stkCallback->CallbackMetadata->Item[4]->Value;
 $message = "TRANSACTION SUCCESSFUL! Confirmed payment of Ksh. $amount to JTS completed successfully. Receipt number is $MpesaReceiptNumber";
 $sms->send($PhoneNumber,$message);

 $_SESSION['amount'] = $amount;
 $_SESSION['mpesa_number'] = $PhoneNumber;
 $_SESSION['receipt_number'] = $MpesaReceiptNumber;
 $_SESSION['message'] = $message;
}
elseif($res_code==1032){ 
	$amount = $data->Body->stkCallback->Amount;
    $PhoneNumber = $data->Body->stkCallback->Msisdn;
    $message = "FAILED! You cancelled the payment of Ksh. $amount to JTS. Try again later!";
    $sms->send($PhoneNumber,$message);
 $_SESSION['amount'] = $amount;
 $_SESSION['mpesa_number'] = $PhoneNumber;
 $_SESSION['receipt_number'] = $MpesaReceiptNumber;
 $_SESSION['message'] = $message;
  }

elseif($res_code==1037){ 
	$amount = $data->Body->stkCallback->Amount;
    $PhoneNumber = $data->Body->stkCallback->Msisdn;
    $message = "TRANSACTION FAILED! An error occured while processing the request.";
    $sms->send($PhoneNumber,$message);

 $_SESSION['amount'] = $amount;
 $_SESSION['mpesa_number'] = $PhoneNumber;
 $_SESSION['receipt_number'] = $MpesaReceiptNumber;
 $_SESSION['message'] = $message;
  }
  else{
  	
  }
}

?> 

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Transactions</title>

        <style>
        table, td, th {
            border: 1px solid #ddd;
            text-align: left;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 15px;
        }
    </style>

</head>
<body>
    <h1>Display Transactions</h1>
    <table border="1px" style="width:600px; line-height:40px;">
        <thead>
            <tr>
                <th>Phone</th>
                <th>Amount</th>
                <th>ReceiptNumber</th>
                <th>Message</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td><?php echo $_SESSION['mpesa_number']; ?></td>
                    <td><?php echo $_SESSION['amount']; ?></td>
                    <td><?php echo $_SESSION['receipt_number']; ?></td>
                    <td><?php echo $_SESSION['message']; ?></td>
                </tr>
        </tbody>
    </table>
</body>
</html>