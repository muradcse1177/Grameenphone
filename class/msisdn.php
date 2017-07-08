<?php
if(isset($_GET['statusCode']) && isset($_GET['referenceCode']) && isset($_GET['referenceCode']) && isset($_GET['serverReferenceCode']) && isset($_GET['endUserId']))
{
	$msisdn_obj= new msisdn();
	$msisdn_obj->msisdnDetect();
}				 
class msisdn{
	public function msisdnDetect(){
		//$_SERVER["REMOTE_ADDR"] = "18.10.11.50";
		if(isset($_SERVER['HTTP_MSISDN'])){
			$msisdn=$_SERVER['HTTP_MSISDN'];
			if(substr($msisdn,0,5)==88019){
				if (isset($msisdn)) {
					$_SESSION["msisdn"] = $msisdn;
					return $msisdn;
				}
				else{
					return FALSE;
				}	
			}
			else if(substr($msisdn,0,5)==88018){
				if (isset($msisdn)) {
					$_SESSION["msisdn"] = $msisdn;
					return $msisdn;
				}
				else{
					return FALSE;
				}
			}
			else if(substr($msisdn,0,5)==88016){
				if (isset($msisdn)) {
					$_SESSION["msisdn"] = $msisdn;
					return $msisdn;
				}
				else{
					return FALSE;
				}
			}
		}

		else if($_SERVER["REMOTE_ADDR"] == "18.10.11.50" || $_SERVER["REMOTE_ADDR"] == "182.160.118.52"){				
				//$url="https://ip:port/digital5/proxy/vmsisdnprocess?servicekey={$servicekey}&transactionDate={$transactionDate}&referenceCode={$referenceCode}";
				
				if(isset($_GET['statusCode']) && isset($_GET['referenceCode']) && isset($_GET['referenceCode']) && isset($_GET['serverReferenceCode']) && isset($_GET['endUserId'])){
					$statusCode=$_GET['statusCode'];
					$referenceCode=$_GET['referenceCode'];
					$serverReferenceCod=$_GET['serverReferenceCode'];
					$endUserId=$_GET['endUserId'];
					setcookie("msisdn", $value);
					setcookie("msisdn", $value, time()+365*24*3600);  /* expire in 1 year */
					header("Location: http://localhost/index.php?vmsisdn={$endUserId}&referenceCode={$referenceCode}");
				}
				else{
					date_default_timezone_set("Asia/Dhaka");
					$date=date("YmdHis");
					$transactionDate=date("Y-M-D H:i:s");
					$randNumber=md5( rand(10000000, 999999999));
					$referenceCode=$date.substr($randNumber,-25);
					header("Location: http://localhost/class/test_send_data.php?servicekey=12345&transactionDate={$transactionDate}&referenceCode={$referenceCode}");
				}		
		}
		else{
			//header("Location: webregistration.php");
		}
	}
}
?>