<?php
class gp_operation{
	public function fn_gp_operation(){
		date_default_timezone_set('Asia/Dhaka');
		$cur_time = date("Y-m-d H:i:s");
		$cur_date = date("Y-m-d");
		if(isset($_GET['content_id'])&& isset($_GET['name'])&& isset($_GET['msisdn'])&& isset($_GET['category'])&& isset($_GET['subcategory'])){
			$content_id=$_GET['content_id'];
			$name=$_GET['name'];	
			$msisdn=$_GET['msisdn'];
			$category=$_GET['category'];
			$subcategory=$_GET['subcategory'];
		}
		$conn = new mysqli("localhost", "root","","gp");
		$sql_subscription = "SELECT subscriptionstatus, flag FROM gp_subscription where enduserid = '$msisdn' order by id desc limit 1";
		$result_subscription = $conn->query($sql_subscription);
		if ($result_subscription->num_rows > 0) {
			$row= mysqli_fetch_array($result_subscription);
			$status = $row['subscriptionstatus'];		
			$flag = $row['flag'];
			if($status =="subscribed" && $flag > 0){
				$sql_insert = "INSERT INTO downloaded (msisdn,category,subcategory,name,content_id)VALUES('$msisdn','$category','$subcategory','$name','$content_id')";
				mysqli_query($conn,$sql_insert);
				$conn = new mysqli("localhost", "root","","content");
				$sql_update = "UPDATE contents SET downloaded= (downloaded+1) WHERE category='$category' and content_id='$content_id'";
				mysqli_query($conn,$sql_update);
				$conn = new mysqli("localhost", "root","","gp");
				$sql_free = "SELECT * FROM downloaded where msisdn = '$msisdn' and category = '$category' and content_id = '$content_id' and substring(time,1,10) = '$cur_date'";
				$result_free = mysqli_query($conn,$sql_free);
				if ($result_free->num_rows > 0) {
					$free_download=1;
					$sql = "UPDATE gp_subscription SET flag = (flag-1) WHERE enduserid = '$msisdn'";
				    mysqli_query($conn,$sql);
				}
				//header('Location: http:download.apk');
				//header("Location: http://localhost/index.php");
				echo "Your file is downloading soon...";
			}
			else if($status == "subscribed" && $flag<1){
				echo "murad";
			$sql_free = "SELECT * FROM downloaded where msisdn = '$msisdn' and category = '$category' and content_id = '$content_id' and substring(time,1,10) = '$cur_date'";
			$result_free= $conn->query($sql_free);
				if ($result_free->num_rows > 0) {
					$download_status=1;
					$free_download=1;
				}
				else{
					$more_use_download = 1;
					$msg = "Download limit exceeded.";
				}
			}
			else{ 
				include 'referencecode.php';
				$referencecode_obj= new referencecodeGeneretor();
				$referencecode =  $referencecode_obj->getchargingurl();
				$download_new=1;
				$msg = "Subscription charge 2.44 Tk with 2 free download daily (autorenew).";
				$conn = new mysqli("localhost", "root","","content");
				$sql="Select * from contents where content_id='$content_id'";
				$result = mysqli_query($conn,$sql);
				if ($result->num_rows > 0) {
					$row= mysqli_fetch_array($result);
					$file_link=$row['file_link'];
					$type=substr($file_link,-3);
					$thumbnailUrl="http://localhost/download_gp.php?msisdn=".$msisdn."&content_id=".$content_id."&category=".$category."&subcategory=".$subcategory."&name=".$name."&success=Download";
					$successUrl=$thumbnailUrl."&successUrl=success";
					$failureUrl=$thumbnailUrl."&failureUrl=failure";
					$cancelUrl=$thumbnailUrl."&cancelUrl=cancel";
					$downloadUrl="http://localhost/".$file_link;
					$data = array (
							  'accesInfo' => array (
									'servicekey' => '1234',
									'accesschannel' => 'Web',
								),
							  'charge' => array (
									'code' => 's4de5frgt67hy8juhy7t6g5fr',
									'amount' => '2.44',
									'taxAmount' => '0.0',
									'description' => $name,
									'currency' => 'BDT',
									'referenceCode' => $referencecode,
								),
							  'productInfo' => array (
									'id' => $content_id,
									'type' => $type,
									'title' => $name,
									'thumbnailUrl' => $thumbnailUrl,
									'successUrl' => $successUrl,
									'failureUrl' => $failureUrl,
									'cancelUrl' => $cancelUrl,
									'notifyUrl' => 'http://localhost/DPDP/GETchargingUrl/recv_data.php',
									'downloadUrl' => $downloadUrl,
									'validity' => '1 days',
								)
						); 
				}
				$servicekey=$data['accesInfo']['servicekey'];
				$accesschannel=$data['accesInfo']['accesschannel'];
				$code=$data['charge']['code'];
				$amount=$data['charge']['amount'];
				$taxAmount=$data['charge']['taxAmount'];
				$description=$data['charge']['description'];
				$currency=$data['charge']['currency'];
				$referenceCode=$data['charge']['referenceCode'];
				$contentid=$data['productInfo']['id'];
				$type=$data['productInfo']['type'];
				$title=$data['productInfo']['title'];
				$thumbnailUrl=$data['productInfo']['thumbnailUrl'];
				$successUrl=$data['productInfo']['successUrl'];
				$failureUrl=$data['productInfo']['failureUrl'];
				$cancelUrl=$data['productInfo']['cancelUrl'];
				$notifyUrl=$data['productInfo']['notifyUrl'];
				$downloadUrl=$data['productInfo']['downloadUrl'];
				$validity=$data['productInfo']['validity'];

																		  
				$data_string = json_encode($data);   
				$ch = curl_init();
				$url="http://localhost/DPDP/GETchargingUrl/recv_data.php";

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
					$chargeRedirectUrl=$data_array['statusInfo']['chargeRedirectUrl'];
					$errorCode="NULL";
					$errorDescription="NULL";
				}

				if($data_array['statusInfo']['statusCode']==500){
					$statusCode=$data_array['statusInfo']['statusCode'];
					$referenceCode=$data_array['statusInfo']['referenceCode'];
					$serverReferenceCode=$data_array['statusInfo']['serverReferenceCode'];
					$chargeRedirectUrl="NULL";
					$errorCode=$data_array['statusInfo']['errorInfo']['errorCode'];
					$errorDescription=$data_array['statusInfo']['errorInfo']['errorDescription'];
				}

				$conn=mysqli_connect("localhost","root","","gp");
				$sql_insert="Insert into gp_chargingurl (servicekey,channel,code,amount,tax,description,currency,referenceCode,contentid, type,tittle,
					  thumbnailUrl,successUrl,failureUrl,cancelUrl,notifyUrl,downloadUrl,validity,statuscode,serverReferenceCode,
					  chargeRedirectUrl,errorcode,errordescription)  values('$servicekey','$accesschannel','$code','$amount','$taxAmount',
					  '$description','$currency','$referenceCode','$contentid','$type','$title','$thumbnailUrl','$successUrl','$failureUrl',
					  '$cancelUrl','$notifyUrl','$downloadUrl','$validity','$statusCode','$serverReferenceCode',
					  '$chargeRedirectUrl','$errorCode','$errorDescription')";
				$conn->query($sql_insert);
				
				//dpdp art 8.1.2 notify charging status
				$data = array (
								'statusInfo' => array (
												'statusCode' => '200',
												'referenceCode' => $referenceCode,
												'serverReferenceCode' => '1552251',
												'serverBatchReferenceCode' => '2584422',
												'totalAmountCharged' => '2.44'
											)
						);                                                   
				$data_string = json_encode($data);   
				$ch = curl_init();
				$url="http://localhost/DPDP/Notifychargingstatus/recv_data.php";
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($data_string)));
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
				curl_setopt($ch, CURLOPT_POSTFIELDS,$data_string);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				$response  = curl_exec($ch);
				curl_close($ch);
				//header("Location: {$chargeRedirectUrl}");
			}			
		}
		else{
			echo "fghjkgfghjklkjhghjkjhgghkhgjkjhgbnkhg";
			$download_new=1;
			$msg = "Subscription charge 2.44 Tk with 2 free download daily (autorenew).";
			include 'referencecode.php';
			$referencecode_obj= new referencecodeGeneretor();
			$referencecode =  $referencecode_obj->getchargingurl();
			$download_new=1;
			$conn = new mysqli("localhost", "root","","content");
			$sql="Select * from contents where content_id='$content_id'";
			$result = mysqli_query($conn,$sql);
			if ($result->num_rows > 0) {
				$row= mysqli_fetch_array($result);
				$file_link=$row['file_link'];
				$type=substr($file_link,-3);
				$thumbnailUrl="http://localhost/download_gp.php?msisdn=".$msisdn."&content_id=".$content_id."&category=".$category."&subcategory=".$subcategory."&name=".$name."&success=Download";
				$successUrl=$thumbnailUrl."&successUrl=success";
				$failureUrl=$thumbnailUrl."&failureUrl=failure";
				$cancelUrl=$thumbnailUrl."&cancelUrl=cancel";
				$downloadUrl="http://localhost/".$file_link;
				$data = array (
						  'accesInfo' => array (
								'servicekey' => '1234',
								'accesschannel' => 'Web',
							),
						  'charge' => array (
								'code' => 's4de5frgt67hy8juhy7t6g5fr',
								'amount' => '2.44',
								'taxAmount' => '0.0',
								'description' => $name,
								'currency' => 'BDT',
								'referenceCode' => $referencecode,
							),
						  'productInfo' => array (
								'id' => $content_id,
								'type' => $type,
								'title' => $name,
								'thumbnailUrl' => $thumbnailUrl,
								'successUrl' => $successUrl,
								'failureUrl' => $failureUrl,
								'cancelUrl' => $cancelUrl,
								'notifyUrl' => 'http://localhost/DPDP/GETchargingUrl/recv_data.php',
								'downloadUrl' => $downloadUrl,
								'validity' => '1 days',
							)
					); 
			}
			$servicekey=$data['accesInfo']['servicekey'];
			$accesschannel=$data['accesInfo']['accesschannel'];
			$code=$data['charge']['code'];
			$amount=$data['charge']['amount'];
			$taxAmount=$data['charge']['taxAmount'];
			$description=$data['charge']['description'];
			$currency=$data['charge']['currency'];
			$referenceCode=$data['charge']['referenceCode'];
			$contentid=$data['productInfo']['id'];
			$type=$data['productInfo']['type'];
			$title=$data['productInfo']['title'];
			$thumbnailUrl=$data['productInfo']['thumbnailUrl'];
			$successUrl=$data['productInfo']['successUrl'];
			$failureUrl=$data['productInfo']['failureUrl'];
			$cancelUrl=$data['productInfo']['cancelUrl'];
			$notifyUrl=$data['productInfo']['notifyUrl'];
			$downloadUrl=$data['productInfo']['downloadUrl'];
			$validity=$data['productInfo']['validity'];

																	  
			$data_string = json_encode($data);   
			$ch = curl_init();
			$url="http://localhost/DPDP/GETchargingUrl/recv_data.php";

			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($data_string)));
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
			curl_setopt($ch, CURLOPT_POSTFIELDS,$data_string);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$response  = curl_exec($ch);
			echo $response;
			curl_close($ch);
			$data_array = json_decode($response,true);
			if($data_array['statusInfo']['statusCode']==200){
				$statusCode=$data_array['statusInfo']['statusCode'];
				$referenceCode=$data_array['statusInfo']['referenceCode'];
				$serverReferenceCode=$data_array['statusInfo']['serverReferenceCode'];
				$chargeRedirectUrl=$data_array['statusInfo']['chargeRedirectUrl'];
				$errorCode="NULL";
				$errorDescription="NULL";
			}

			if($data_array['statusInfo']['statusCode']==500){
				$statusCode=$data_array['statusInfo']['statusCode'];
				$referenceCode=$data_array['statusInfo']['referenceCode'];
				$serverReferenceCode=$data_array['statusInfo']['serverReferenceCode'];
				$chargeRedirectUrl="NULL";
				$errorCode=$data_array['statusInfo']['errorInfo']['errorCode'];
				$errorDescription=$data_array['statusInfo']['errorInfo']['errorDescription'];
			}

			$conn=mysqli_connect("localhost","root","","gp");
			$sql_insert="Insert into gp_chargingurl (servicekey,channel,code,amount,tax,description,currency,referenceCode,contentid, type,tittle,
				  thumbnailUrl,successUrl,failureUrl,cancelUrl,notifyUrl,downloadUrl,validity,statuscode,serverReferenceCode,
				  chargeRedirectUrl,errorcode,errordescription)  values('$servicekey','$accesschannel','$code','$amount','$taxAmount',
				  '$description','$currency','$referenceCode','$contentid','$type','$title','$thumbnailUrl','$successUrl','$failureUrl',
				  '$cancelUrl','$notifyUrl','$downloadUrl','$validity','$statusCode','$serverReferenceCode',
				  '$chargeRedirectUrl','$errorCode','$errorDescription')";
			$conn->query($sql_insert);
			//dpdp art 8.1.2 notify charging status
			$data = array (
							'statusInfo' => array (
											'statusCode' => '200',
											'referenceCode' => $referenceCode,
											'serverReferenceCode' => '1552251',
											'serverBatchReferenceCode' => '2584422',
											'totalAmountCharged' => '2.44'
										)
					);                                                   
			$data_string = json_encode($data);   
			$ch = curl_init();
			$url="http://localhost/DPDP/Notifychargingstatus/recv_data.php";
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($data_string)));
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
			curl_setopt($ch, CURLOPT_POSTFIELDS,$data_string);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$response  = curl_exec($ch);
			curl_close($ch);
			
			//header("Location: {$successUrl}");
			
	    }		
	}
}
