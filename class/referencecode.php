<?php
class referencecodeGeneretor{
	public function getchargingurl(){
		date_default_timezone_set("Asia/Dhaka");
		$date=date("YmdHis");
		$transactionDate=date("Y-M-D H:i:s");
		$randNumber=md5( rand(10000000, 999999999));
		$referenceCode="getcrgurl".$date.substr($randNumber,-25);
		return $referenceCode;
	}
	public function pushotp(){
		date_default_timezone_set("Asia/Dhaka");
		$date=date("YmdHis");
		$transactionDate=date("Y-M-D H:i:s");
		$randNumber=md5( rand(10000000, 999999999));
		$referenceCode="pushotp".$date.substr($randNumber,-25);
		return $referenceCode;
	}
}