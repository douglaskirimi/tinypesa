<?php 
// require_once 'dbserver_connect.php';
require "sms.php";
$sms=new sms();
$json = file_get_contents('php://input');
if($json!=null)
{
$data = json_decode($json);
$res_code = $data->Body->stkCallback->ResultCode;
if($res_code==0)
{
 $amount = $data->Body->stkCallback->CallbackMetadata->Item[0]->Value;
 $MpesaReceiptNumber = $data->Body->stkCallback->CallbackMetadata->Item[1]->Value;
 $PhoneNumber = $data->Body->stkCallback->CallbackMetadata->Item[4]->Value;
 $message = "Confirmed payment of $amount to Julia Tech Solutions. Receipt number is $MpesaReceiptNumber";
 $sms->send($PhoneNumber,$message);
 
//  $sql = "INSERT INTO mpesa (Amount,Phone_Number, Receipt_Number) VALUES ($amount,$PhoneNumber,$MpesaReceiptNumber";
//  $stmt = $connect->prepare("INSERT INTO mpesa (Amount,Phone_Number, Receipt_Number) VALUES (?,?,?");
// $stmt->bind_param("sss",$amount,$PhoneNumber,$MpesaReceiptNumber);
// $stmt->execute();
 
//  $query = mysqli_query($connect,"INSERT INTO mpesa (Amount,Phone_Number, Receipt_Number) VALUES ($amount,$PhoneNumber,$MpesaReceiptNumber");
//  if($query) {
//      header("Location: index.php?fdb=success");
//      exit();
//  }
//  else{
//      header("Location: index.php?fdb=error");
//      exit();
//  }
}
elseif($res_code==1032) { 
	$amount = $data->Body->stkCallback->CallbackMetadata->Item[0]->Value;
    $MpesaReceiptNumber = $data->Body->stkCallback->CallbackMetadata->Item[1]->Value;
    $PhoneNumber = $data->Body->stkCallback->CallbackMetadata->Item[4]->Value;
    $message = "FAILED! You cancelled the payment of Ksh. $amount to JTS. Try again later!";
 $sms->send($PhoneNumber,$message);
  }
}

?> 