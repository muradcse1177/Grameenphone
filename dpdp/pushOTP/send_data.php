<?php
//dpdp art 9.2.2 Format
$data = array (
				'accesInfo' => array (
										'servicekey' => '1234',
										'endUserId' => 'String',
										'accesschannel' => 'Web',
										'referenceCode' => 'String',
							    ),
				'charge' => array (
								'code' => 'String',
								'amount' => '2.44',
								'taxAmount' => '0.0',
								'description' => 'String',
								'currency' => 'String',
								'referenceCode' => 'String',
						    ),
		); 

$servicekey=$data['accesInfo']['servicekey'];
$endUserId=$data['accesInfo']['endUserId'];
$accesschannel=$data['accesInfo']['accesschannel'];
$referenceCode=$data['accesInfo']['referenceCode'];
$code=$data['charge']['code'];
$amount=$data['charge']['amount'];
$taxAmount=$data['charge']['taxAmount'];
$description=$data['charge']['description'];
$currency=$data['charge']['currency'];
$referenceCode=$data['charge']['referenceCode'];
                                                         
$data_string = json_encode($data);   
$ch = curl_init();
$url="http://localhost/DPDP/pushOTP/recv_data.php";

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($data_string)));
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_POSTFIELDS,$data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response  = curl_exec($ch);
curl_close($ch);
$data_array = json_decode($response,true);
if($data_array['statusInfo']['statusCode']==200){
	$statusCode=$data_array['statusInfo']['statusCode'];
	$referenceCode=$data_array['statusInfo']['referenceCode'];
	$serverReferenceCode=$data_array['statusInfo']['serverReferenceCode'];
	$OTPTransactionId=$data_array['statusInfo']['OTPTransactionId'];
	$errorCode="NULL";
	$errorDescription="NULL";
}

if($data_array['statusInfo']['statusCode']==500){
	$statusCode=$data_array['statusInfo']['statusCode'];
	$referenceCode=$data_array['statusInfo']['referenceCode'];
	$serverReferenceCode=$data_array['statusInfo']['serverReferenceCode'];
	$OTPTransactionId="NULL";
	$errorCode=$data_array['statusInfo']['errorInfo']['errorCode'];
	$errorDescription=$data_array['statusInfo']['errorInfo']['errorDescription'];
}
$conn=mysqli_connect("localhost","root","","gp");
$sql="Insert into gp_pushotp (servicekey,msisdn,accesschannel,code,amount,taxAmount,description,currency,
	   referenceCode,statuscode,serverReferenceCode,otptransactionid,errorcode,errordescription)
	   values('$servicekey','$endUserId','$accesschannel','$code','$amount','$taxAmount','$description',
	   '$currency','$referenceCode','$statusCode','$serverReferenceCode','$OTPTransactionId','$errorCode',
	   '$errorDescription')"; 
$conn->query($sql);


