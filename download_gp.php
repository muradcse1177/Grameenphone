<?php
$conn = new mysqli("localhost", "root", "", "content");
if(isset($_GET['content_id']) && isset($_GET['category'])&& isset($_GET['subcategory'])&& isset($_GET['msisdn'])&& isset($_GET['name'])){
	$content_id=$_GET['content_id'];
	$category=$_GET['category'];
	$subcategory=$_GET['subcategory'];
	$msisdn=$_GET['msisdn'];
	$name=$_GET['name'];
	$sql="select * from contents where category ='$category' and content_id='$content_id' order by downloaded desc";
	$result = mysqli_query($conn,$sql);
}
if(isset($_GET['successUrl'])){
	$content_id=$_GET['content_id'];
	$category=$_GET['category'];
	$subcategory=$_GET['subcategory'];
	$msisdn=$_GET['msisdn'];
	$name=$_GET['name'];
	echo "Your file is downloading soon...";
}
else if(isset($_GET['failureUrl'])){
	$content_id=$_GET['content_id'];
	$category=$_GET['category'];
	$subcategory=$_GET['subcategory'];
	$msisdn=$_GET['msisdn'];
	$name=$_GET['name'];
	echo "Your balace is low..";
}
else if(isset($_GET['cancelUrl'])){
	$content_id=$_GET['content_id'];
	$category=$_GET['category'];
	$subcategory=$_GET['subcategory'];
	$msisdn=$_GET['msisdn'];
	$name=$_GET['name'];
	echo "You are not permited for downloading!!";
}
 if(isset($_GET['success'])){
	$content_id=$_GET['content_id'];
	$category=$_GET['category'];
	$subcategory=$_GET['subcategory'];
	$msisdn=$_GET['msisdn'];
	$name=$_GET['name'];
	include 'class/gp_operation.php';
	$gp_operation = new gp_operation();
	$download_obj =  $gp_operation->fn_gp_operation($content_id,$category,$subcategory,$name,$msisdn);
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Value Added Services</title>
	<link rel="icon" type="image/ico" href="images/favicon.ico">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<link href="http://wap.chl-bd.com/main_css4.css" rel="stylesheet" type="text/css" media="screen">
	<style>
		ul.pagination {
			display: inline-block;
		}

		div.center {text-align: center;}
	</style>
	</head>

<body oncontextmenu="return false">
<style>
#txtsearch{
	border-style: solid;
	border-color: #fe1a00;
	height:25px;
	color:black;
	border-radius: 5px 0px 0px 5px;
	padding-left: 5px;
}
#btnsearch{
	border-style: solid;
	border-color: #fe1a00;
	background-color:#fe1a00;
	color:white;
	height:30px;
	border-radius: 0px 5px 5px 0px;
}
.mySlides {display:none;}
</style>

<center> <img src="http://wap.chl-bd.com/images/banner.gif" width="100%" height="100%" > </center>	
<!--Banner image
	<a href="index" > <img src="images/6feb6fc2c1a0b247d0c8550f4b8c52.gif" width="100%" height="100%" > </a>
	<iframe id="slider" width="100%" frameborder="0" height="auto" src="http://wap.chl-bd.com/slider/slide.php"> </iframe>

<center>
<div style="width:100%; height:70%">
  <img class="mySlides" src="/slider/in.jpg" style="width:100%; height:70%">
  <img class="mySlides" src="/slider/in1.jpg" style="width:100%; height:70%">
  <img class="mySlides" src="/slider/in2.jpg" style="width:100%; height:70%">
</div>
</center>
-->

<!--Menu buttons-->
<p style="margin-top:-2px;"></p>

	<table class="index_table" border="1" width="100%" style="background-color: ">
		<tbody>
		   <tr>
				<td width="33%" height="30" align="center"  bgcolor="#fe1a00">
					<a href="./index" class="myButton-group-justified">Subscription Service</a>
				</td>				
				<td width="33%" height="30" align="center" bgcolor="">
					<a href="./ondemand" class="myButton-group-justified">Pay & Download</a>
				</td>		
									<td width="33%" height="30" align="center" bgcolor="">
						<a href="./gp_myaccount" class="myButton-group-justified">My Account</a>
					</td>	
						   </tr>   
		</tbody>
	 </table>
	 
<!--Marquee text
Subscription charge TK. 2.44/day(autorenew) with daily 2 FREE downloads and after daily 2 free download charge will be Tk 2.44 for every next downloads. For Pay & Download each content price is 2.44 Tk and no daily subscription fee. To Unsubscribe send STOP WP to 16437-->
<!--Search box and button-->
<table width="100%">
		<tbody>
	
			<tr>
				<td width="95%">
					<input id='txtsearch' style="width:100%;" name='txtsearch' placeholder='Search' type='text'/>
				</td>
				<td width="5%">
					<button id='btnsearch' style="width:100%;" type='submit' onclick="search_content();">Search</button>
				</td>
			</tr>
		</tbody>

	</table>
	<center>
		<img id="ajax-loader" src="http://wap.chl-bd.com/images/ajax-loading.gif" style="display:none;" />
    <center>
<br/>
<!--Search results-->
 <div id="search-result"> </div>
 
 <script>
document.getElementById("txtsearch")
    .addEventListener("keyup", function(event) {
    event.preventDefault();
    if (event.keyCode == 13) {
        document.getElementById("btnsearch").click();
    }
});
 </script>
<script>

</script><p class="white_spacer_divider"></p><br/>

	
			<table width="100%">
				<tbody>
				   <tr>
						<td  align="center">
															
							
							<p>This video is free for you.</p>	
							<p style="color:red;"></p>
							<br/>
							<?php 
								if ($result->num_rows > 0) {
									while($row = $result->fetch_assoc()) {
										?>
											<a href="#"><img src="<?php echo $row['preview_link'];?>" width="150" height="150"></a><br/>				
											<p><b><?php echo $name;?></b></p>
											<p>Price: 0.00 tk.</p>
											<p>Category: <?php echo $category;?></p>
											<p>Data browsing charge applicable</p>
										<?php
									}
								}
							?>
							<!--download button	-->
							<form action="" method="GET" >		
								<input name="msisdn"  type="hidden"  value="<?php echo $msisdn;?>"> 
								<input name="content_id"  type="hidden"  value="<?php echo $content_id;?>">
								<input name="category"  type="hidden"  value="<?php echo $category;?>">
								<input name="subcategory"  type="hidden"  value="<?php echo $subcategory;?>">
								<input name="name"  type="hidden"  value="<?php echo $name;?>">
								<input name="success"  type="submit" id="success" class="myButton" role="button" value="Download">
							</form>
							<br/><br/>
						</td>		
				   </tr>	  
				</tbody>
			 </table>	
	
<br/><br/>
<!-- footer -->
<br/><br/>
<footer>
	
	<p align="center" style="font-size:17px; background-color:grey; font-weight:bold;"><a href="index" style="color:#de1a00;">Home</a> | <a href="faq" style="color:#de1a00;">FAQ</a> | <a href="tel:+8801787659321" style="color:#de1a00;">Helpline</a></p>
	<p style="background-color:grey;"> <b>To stop send STOP WP to 16437</b></p>
	
					<table class="index_table" border="0" width="100%">
				  <tbody>
					<tr>
						<td align="center" > 
							<button class="myButton" style="background-color:black; width:130px;" onMouseOver="this.style.color='#D9ED14'"  onMouseOut="this.style.color='white'" onclick="location.href='gp_unsub_confirm.php?back=/download_gp.php?MSISDN=8801755680869&category=video&ContentId=ebb57f2b28579d0585bb1272d88db6&download=Download';">STOP Service</button>
							<!--
								<button class="myButton" style="background-color:black;  width:100px;" onMouseOver="this.style.color='#D9ED14'"  onMouseOut="this.style.color='white'" onclick="location.href='sms:16437?body=STOP%20WP';">STOP-SMS</button>
							-->
						</td>       
					</tr>
				  </tbody>
				</table>
			
					
	
	<p class="footerP"> <b>© Content House 2017 - All rights reserved.</b></p>
</footer>


<!--Detect visitor's device and save to visitor counter-->
<script type="text/javascript" src="//wurfl.io/wurfl.js"></script>
<script type="text/javascript">
function search_content() {
	document.getElementById('ajax-loader').style.display = 'block';
	var txt = document.getElementById("txtsearch").value;
	if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	} else {// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById('ajax-loader').style.display = 'none';
			document.getElementById("search-result").innerHTML = this.responseText;
		}
	};
	xmlhttp.open("GET","ajax/search_content.php?page=/download_gp.php&txt="+txt,true);
	xmlhttp.send();
}

if(WURFL.form_factor != "Smartphone"){
		
   document.getElementById("slider").style.height = "450px";  
 }
else if(WURFL.form_factor == "Smartphone"){
   document.getElementById("slider").style.height = "200px";  
 }

</script>
</body>
</html>
<!--Detect visitor's device and save to visitor counter-->
<script type="text/javascript" src="//wurfl.io/wurfl.js"></script>
<script type="text/javascript">
	var device = WURFL.form_factor + " | " + WURFL.complete_device_name;
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	} else {
		// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			;
			//document.getElementById("txtHint").innerHTML = this.responseText;
		}
	};
	xmlhttp.open("GET","ajax/savevisitorinfo.php?device="+device+"&msisdn=8801755680869&ip=182.160.118.50&page=/download_gp.php?MSISDN=8801755680869&category=video&ContentId=ebb57f2b28579d0585bb1272d88db6&download=Download",true);
	xmlhttp.send();
</script>