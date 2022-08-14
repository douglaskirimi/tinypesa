<?php
// ob_start();
session_start();
$url = "https://tinypesa.com/api/v1/express/initialize";
 if(isset($_POST['make_payment'])) {
    $phone = $_POST['p-number'];
    $amount = $_POST['amount'];

if(strlen($phone)<12)
{
  
    $_SESSION["errors"]="The phone number provided is invalid";
    header("location:index.php");
   
}
else{
   
session_destroy(); 
session_start();
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "ApiKey: o4gX18UN9y5",
   "Content-Type: application/x-www-form-urlencoded",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = "amount=$amount&msisdn=$phone";

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
$json=json_decode($resp);

$_SESSION['init']=$json->success;
$_SESSION['phone']=$phone;
header("location: receive_response.php");
}}
?>

