<?php
if(isset($_GET['servicekey']) && isset($_GET['transactionDate']) && isset($_GET['referenceCode'])){
	date_default_timezone_set('Asia/Dhaka');
	$cur_time = date("Y-m-d H:i:s");
	$cur_date = date("Y-m-d");
	$servicekey=$_GET['servicekey'];
	$transactionDate=$_GET['transactionDate'];
	$referenceCode=$_GET['referenceCode'];
	$data = array (
				'accesInfo' => array (
										'servciekey' => '1234',
										'endUserId' => '01736363398',
										'language' => 'English',
										'accesschannel' => 'Web',
										'referenceCode' => $referenceCode,
							    ),
				'subscriptionInfo' => array (
												'serviceIdentifier' => '125874',
												'productIdentifier' => '3697442558',
												'subscriptionId' => '2587444',
												'subscriptionStatus' => 'unsubscribed',
												'registrationDate' => $cur_time,
												'activationDate' => $cur_time,
												'lastRenewalDate' => $cur_time,
												'validity' => '1.0',
												'nextRenewalDate' => $cur_time,
												'statusChangedDate' => $cur_time,
												'lastChangedAmount' => '2.44',
									),
		);
                                                 
	$data_string = json_encode($data);   
	$ch = curl_init();
	$url="http://localhost/DPDP/NotifyServiceSubscription/recv_data.php";
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($data_string)));
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
	curl_setopt($ch, CURLOPT_POSTFIELDS,$data_string);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response  = curl_exec($ch);
	echo $response;
	curl_close($ch);
	header("Location: http://localhost/class/msisdn.php?statusCode=200&referenceCode={$referenceCode}&serverReferenceCode=111&endUserId=01736363398");
}
?>