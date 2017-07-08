<?php
header("Content-Type:application/json");
$rawinput=file_get_contents('php://input');
//file_put_contents('dpdp/'.date('Y-m-d-H-i-s').'.'.rand(100000,999999).'.txt', $rawinput);

$data = json_decode($rawinput,true);
$referenceCode=$data['charge']['referenceCode'];
$successUrl=$data['productInfo']['successUrl'];
$success_data = array (
						'statusInfo' => array (
							'statusCode' => '200',
							'referenceCode' => $referenceCode,
							'serverReferenceCode' => '2583468',
							'chargeRedirectUrl' => $successUrl,
					    ),
				);
$data_string = json_encode($success_data);	
echo $data_string;	
$error_data = array (
					'statusInfo' => array (
						'statusCode' => '500',
						'referenceCode' => $referenceCode,
						'serverReferenceCode' => '12649',
						'errorInfo' => 
							array (
							  'errorCode' => '12',
							  'errorDescription' => 'hahahahah',
							),
					),
			);  
				
// $data_string = json_encode($error_data);	
// echo $data_string;