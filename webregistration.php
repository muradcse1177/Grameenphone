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

<!-- Filter for numerical value input for mobile-->
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
	<!-- http://192.168.5.73:8080/SmWapSite/subscribe/serviceid/104650?CpUrl=wap.chl-bd.com -->
<form action="verification.php" method="post" enctype="multipart/form-data" id="user" name="OnpushPromoForm">
<p class="white_spacer_divider"></p>
        <table border="0" width="100%">
			<tbody>
				<tr><td style="font-size:14px;" align="center">You will be charged 2TK Everyday to Download Free Contents</td> </tr>  
       			<tr><td style="font-size:14px;" align="center"><p class="white_spacer_divider"></p>  </td></tr>
                <tr><td align="center" style="font-size:14px;">Please Enter Your Mobile Number : </td></tr>
                <tr>
                    <td align="center" style="font-size:14px;" >+88
                    <input id="txtChar" required="" onkeypress="return isNumberKey(event)" name="enduserid" type="text"  maxlength="13" size="15" >
					<input type="hidden" name="category" value="" >
					<input type="hidden" name="ContentId" value="" >
                   </td>
                </tr>
                <tr>
					<td align="center" style="font-size:14px;">(GP Users Only)<br/>		
					<input name="submit1"  type="submit"  value="Submit">
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