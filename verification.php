<?php
$msisdn="";
if(isset($_POST['enduserid'])){
	$msisdn=$_POST['enduserid'];
	include 'class/referencecode.php';
	$referencecode_obj=new referencecodeGeneretor();
	$referencecode=$referencecode_obj->pushotp();
	include 'class/pushotp.php';
	$pushotp_obj=new pushotp();
	$pushotp_obj=$pushotp_obj->fn_pushotp($msisdn,$referencecode);
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Value Added Services</title>
	<link rel="icon" type="image/ico" href="images/favicon.ico">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<link href="main_css.css" rel="stylesheet" type="text/css" media="screen">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>

<body>

<table border="0" width="100%">
  <tbody>
	<tr>
		<td colspan="3" align="center" > 
			<a href="index"> <img src="http://wap.chl-bd.com/images/6feb6fc2c1a0b247d0c8550f4b8c52.gif" width="100%" height="100%"> </a>
		</td>       
	</tr>
  </tbody>
</table>		

 <!--Menu buttons-->

<table class="index_table" border="1" width="100%" style="background-color: ">
	<tbody>
	   <tr>
			<td width="33%" height="30" align="center" bgcolor="#D3D3D3">
				<div class="btn-group btn-group-justified">
					<a href="http://wap.chl-bd.com/index" class="btn btn-inverse"><strong>Home</strong></a>
				</div>
			</td>
			<td width="33%" height="30" align="center">
				<div class="btn-group btn-group-justified">
					<a href="http://wap.chl-bd.com/TopDownloads" class="btn btn-inverse">Top Downloads</a>
				</div>
			</td>
			<td width="33%" height="30" align="center">
				<div class="btn-group btn-group-justified">
					<a href="http://wap.chl-bd.com/RecentlyAdded" class="btn btn-inverse">Recently added</a>
				</div>
			</td>			
	   </tr>   
	  
	</tbody>
 </table>
<p class="white_spacer_divider"></p>
<SCRIPT language=Javascript>
function isNumberKey(evt)
{
  var charCode = (evt.which) ? evt.which : evt.keyCode;
  if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
   return false;
  else
  {
	  
	/* var InputNumber=document.getElementById('txtChar').value;
	 alert(InputNumber.length);
	 if(InputNumber.length>3)
	 {			 
	  var UserNumber=InputNumber.substring(0,3);
	// alert(InputNumber);
	 //alert(UserNumber);
	 if(UserNumber!='019')
	  return false
	 else 
	  return true;
	 }*/
	 return true;
  }   
}
</SCRIPT>
	
<form action="download.php" method="post" enctype="multipart/form-data" id="user" name="PINForm">
          <input type="hidden" name="MobileNoVal" value="880" />
<p class="white_spacer_divider"></p>
        <table border="0" width="100%">
        <tbody>
            <tr><td style="font-size:14px;" align="center"><?php echo "A PIN Number has been sent to +88".$msisdn?></td>
            </tr>  
       			<tr><td style="font-size:14px;" align="center"><p class="white_spacer_divider"></p>  </td></tr>
                <tr><td align="center" style="font-size:14px;">Enter The  PIN Number : </td>
                    <tr><td align="center" ><input id="myInput" required="" name="PINNumber" type="text" value="" maxlength="6" size="25" ></td>
                </tr>
                <tr><td align="center" style="font-size:14px;">(GP Users Only)<br/>	
				
				<input name="category"  type="hidden"  value="">
				<input name="ContentId"  type="hidden"  value="">
				<input name="ISSDN"  type="hidden"  value="+8801755670573">		
				
                <input name="submit2"  type="submit"  value="PIN Submit">
				
				
                </td>
                </tr>
            </tbody>
        </table>
 		</form>


 
<br/><br/><br/><br/>
<!-- footer -->
<div class="panel panel-default">
  <div class="panel-footer" align="center">© Content House 2015 - All rights reserved.</div>
</div>

	   
</body>
</html>