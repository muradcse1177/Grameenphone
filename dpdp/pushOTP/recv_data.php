<?php
header("Content-Type:application/json");
$rawinput=file_get_contents('php://input');
$data = json_decode($rawinput,true);
$referenceCode=$data['accesInfo']['referenceCode'];
$success_data = array (
						'statusInfo' => array (
												'statusCode' => '200',
												'referenceCode' => $referenceCode,
												'serverReferenceCode' => '2554255',
												'OTPTransactionId' => '1177',
									    ),
				);
$data_string = json_encode($success_data);	
echo $data_string;	
$error_data = array (
					'statusInfo' => array (
						'statusCode' => '500',
						'referenceCode' => $referenceCode,
						'serverReferenceCode' => '2554255',
						'errorInfo' => 
							array (
							  'errorCode' => '25541',
							  'errorDescription' => 'hahhahahah',
							),
					),
			);  				
// $data_string = json_encode($error_data);	
// echo $data_string;