<?php
if(!isset($_GET['vmsisdn'])){
	include 'class/msisdn.php';
	$msisdn_obj= new msisdn();
	$vmsisdn =  $msisdn_obj->msisdnDetect();
}
else {
	$vmsisdn = $_GET['vmsisdn'];
	$referenceCode=$_GET['referenceCode'];
}
$category[]="";
$subcategory[]="";
$content_id[]="";
$name[]="";
$preview_link[]="";
$file_link[]="";
$conn = new mysqli("localhost", "root", "", "content");
$sql="select * from contents where portal ='wap' group by category order by downloaded desc";
$result = mysqli_query($conn,$sql);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$category[]=$row['category'];
		$subcategory[]=$row['subcategory'];
		$content_id[]=$row['content_id'];
		$name[]=$row['name'];
		$preview_link[]=$row['preview_link'];
		$file_link[]=$row['file_link'];
	}
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Home | WAP</title>
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

<p style="margin-top:-2px;"></p>

	<table class="index_table" border="1" width="100%" style="background-color: ;">
		<tbody>
		   <tr>
				<td width="30%" height="30" align="center" bgcolor="">
					<a href="http://wap.chl-bd.com/index" class="myButton-group-justified">Home</a>
				</td>
				<td width="30%" height="30" align="center" bgcolor="#fe1a00">
					<a href="http://wap.chl-bd.com/TopDownloads" class="myButton-group-justified">Popular</a>
				</td>
				<td width="30%" height="30" align="center" bgcolor="#fe1a00">
					<a href="http://wap.chl-bd.com/RecentlyAdded" class="myButton-group-justified">New</a>
				</td>
		   </tr>
		</tbody>
	 </table>
	 

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
</script><table class="special_links" width="100%">
	<tbody>
		<tr>
			<td class="titlebar" width="100%">			
				<a href="http://wap.chl-bd.com/TopDownloads.php">Most Popular</a>
			</td>
		</tr>
	</tbody>
</table> 

<p class="white_spacer_divider"></p><br/>
<table border="0" width="100%">
	<tbody>
	   <tr>
			<td width="50%" align="center">
				<p>Videos</p>		
				<a href="download_gp.php?msisdn=<?php echo $vmsisdn;?>&category=<?php echo $category[0];?>&subcategory=<?php echo $subcategory[0];?>&name=<?php echo $name[0];?>&content_id=<?php echo $content_id[0];?>"> <img src="<?php echo $preview_link[0];?>" width="170" height="170"> </a>		
				<br/>
				<a href="download_gp.php?msisdn=<?php echo $vmsisdn;?>&category=<?php echo $category[0];?>&subcategory=<?php echo $subcategory[0];?>&name=<?php echo $name[0];?>&content_id=<?php echo $content_id[0];?>" class="myButton">Download</a>	
				<br/><br/>

			<td width="50%" align="center">
				<p>Videos</p>		
				<a href="download_gp.php?msisdn=<?php echo $vmsisdn;?>&category=<?php echo $category[1];?>&subcategory=<?php echo $subcategory[1];?>&name=<?php echo $name[1];?>&content_id=<?php echo $content_id[1];?>"> <img src="<?php echo $preview_link[1];?>" width="170" height="170"> </a>		
				<br/>
				<a href="download_gp.php?msisdn=<?php echo $vmsisdn;?>&category=<?php echo $category[1];?>&subcategory=<?php echo $subcategory[1];?>&name=<?php echo $name[1];?>&content_id=<?php echo $content_id[1];?>" class="myButton">Download</a>	
				<br/><br/>
			</td>

	  </tr>
	  <tr>

			<td width="50%" align="center">
				<p>Videos</p>		
				<a href="download_gp.php?msisdn=<?php echo $vmsisdn;?>&category=<?php echo $category[2];?>&subcategory=<?php echo $subcategory[2];?>&name=<?php echo $name[2];?>&content_id=<?php echo $content_id[2];?>"> <img src="<?php echo $preview_link[2];?>" width="170" height="170"> </a>		
				<br/>
				<a href="download_gp.php?msisdn=<?php echo $vmsisdn;?>&category=<?php echo $category[2];?>&subcategory=<?php echo $subcategory[2];?>&name=<?php echo $name[2];?>&content_id=<?php echo $content_id[2];?>" class="myButton">Download</a>	
				<br/><br/>
			</td>

			<td width="50%" align="center">
				<p>Videos</p>		
				<a href="download_gp.php?msisdn=<?php echo $vmsisdn;?>&category=<?php echo $category[3];?>&subcategory=<?php echo $subcategory[3];?>&name=<?php echo $name[3];?>&content_id=<?php echo $content_id[3];?>"> <img src="<?php echo $preview_link[3];?>" width="170" height="170"> </a>		
				<br/>
				<a href="download_gp.php?msisdn=<?php echo $vmsisdn;?>&category=<?php echo $category[3];?>&subcategory=<?php echo $subcategory[3];?>&name=<?php echo $name[3];?>&content_id=<?php echo $content_id[3];?>?" class="myButton">Download</a>	
				<br/><br/>
			</td>
	
	  </tr>
		<tr>
			<td colspan="3" align="right"> 
				<a href="http://wap.chl-bd.com/TopDownloads">  More...»</a>
			</td>
		</tr>
	  
	</tbody>
 </table><br/>
<p class="white_spacer_divider"></p>

 <table class="special_links" width="100%">
	<tbody>
		<tr>
			<td class="titlebar">			
				<a href="http://wap.chl-bd.com/RecentlyAdded.php">Recently Added</a>
			</td>
		</tr>
	</tbody>
</table> 
<br/>
<p class="white_spacer_divider"></p>
<table border="0" width="100%">
	<tbody>
	   <tr>
			<td width="50%" align="center">
				<p>Wallpapers</p>					
								<a href="download_gp.php"> <img src="http://wap.chl-bd.com/demo/Wallpaper/Celebrity/ac8310c4f7029d4c42e79ab7da24c3.jpg" width="170" height="170"> </a>		
				<br/>
					<a href="download_gp.php" class="myButton">Download</a>	
				<br/><br/>	
			</td>
			<td width="50%" align="center">
				<p>Animations</p>	
								<a href="download_gp.php"> <img src="http://wap.chl-bd.com/demo/Animation/21st February/8402b031ed4a68450f2eae644fc1ec.gif" width="170" height="170"> </a>		
				<br/>
					<a href="download_gp.php" class="myButton">Download</a>	
				<br/><br/>
			</td>
					
	   </tr>
	   <tr>
			<td width="50%" align="center">
				<p>Videos</p>				
								<a href="download_gp.php"> <img src="http://wap.chl-bd.com/demo/Video/Love/44c92e4e3b355de7ebd0f43fea1676.PNG" width="170" height="170"> </a>		
				<br/>
				<a href="download_gp.php" class="myButton">Download</a>	
				<br/><br/>	
			</td>	
			<td width="50%" align="center">
				<p>Games & Apps</p>				
								<a href="download_gp.php"> <img src="http://wap.chl-bd.com/demo/games/Runner/ef372b208f83537cc47e75c545ef38.gif" width="170" height="170"> </a>		
				<br/>
				<a href="download_gp.php" class="myButton">Download</a>	
				<br/><br/>
			</td>
		</tr>
		<tr>
			<td width="50%" align="center">
				<p>Music</p>				
								<a href="download_gp.php"> <img src="http://wap.chl-bd.com/demo/Music/Bangla Music/6220b7b29d2253ac1fecf7d68b7f8a.JPG" width="170" height="170"> </a>		
				<br/>
				<a href="download_gp.php" class="myButton">Download</a>	
				<br/><br/>			
			</td>
			<td width="50%" align="center">
				<p>Ringtones</p>				
								<a href="download_gp.php"> <img src="http://wap.chl-bd.com/demo/Ringtone/Bangla Rington/dfe7bd6df9b1ed5d1432ff77802379.jpg" width="170" height="170"> </a>		
				<br/>
				<a href="download_gp.php" class="myButton">Download</a>	
				<br/><br/>			
			</td>							
	  </tr>
		<tr>
			<td colspan="3" align="right"> 
				<a href="RecentlyAdded">  More...»</a> 
			</td>
		</tr>
	  
	</tbody>
 </table>
<br/>
<p class="white_spacer_divider"></p> 

<table class="special_links" width="100%">
	<tbody>
		<tr>
			<td class="titlebar">			
				<a href="#">All Category</a>
			</td>
		</tr>
	</tbody>
</table> 
<br/>
<p class="white_spacer_divider"></p>
<table class="index_table" border="0" width="100%">
  <tbody>
   <tr>	
		<td width="50%" align="center"><a href="http://wap.chl-bd.com/wallpaper"><img src="http://wap.chl-bd.com/images/wallpaper-icon.jpg" alt="Wallpapers" width="170" height="170"><br>Wallpapers</a> <br/><br/></td>        
		<td width="50%" align="center"><a href="http://wap.chl-bd.com/animation"><img src="http://wap.chl-bd.com/images/animation-icon.gif" alt="Animations" width="170" height="170"><br>Animations</a><br/><br/></td>
   </tr>
   <tr>
		<td width="50%" align="center"><a href="http://wap.chl-bd.com/video"><img src="http://wap.chl-bd.com/images/videos-icon.jpg" alt="Videos" width="170" height="170"><br>Videos</a><br/><br/></td>	   
		<td width="50%" align="center"><a href="http://wap.chl-bd.com/games"><img src="http://wap.chl-bd.com/images/games-icon.jpg" alt="Games & Apps" width="170" height="170"><br>Games & Apps</a><br/><br/></td>        
    </tr>
	<tr>
		<td width="50%" align="center"><a href="http://wap.chl-bd.com/music"><img src="http://wap.chl-bd.com/images/music-icon.jpg" alt="Music" width="170" height="170"><br>Music</a><br/><br/></td>
		<td width="50%" align="center"><a href="http://wap.chl-bd.com/ringtone"><img src="http://wap.chl-bd.com/images/ringtone-icon.jpg" alt="Ringtones" width="170" height="170"><br>Ringtones</a><br/><br/></td>	
	</tr>
 </tbody>
 </table>
 

<!-- footer -->

<br/><br/>
<footer>
	
	<p align="center" style="font-size:17px; background-color:grey; font-weight:bold;"><a href="index" style="color:#de1a00;">Home</a> | <a href="faq" style="color:#de1a00;">FAQ</a> | <a href="tel:+8801787659321" style="color:#de1a00;">Helpline</a></p>
	<p style="background-color:grey;"> <b>To stop send STOP WP to 16437</b></p>
	
			
	
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
	xmlhttp.open("GET","ajax/search_content.php?page=/index.php&txt="+txt,true);
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

<script type="text/javascript">
	var device = WURFL.form_factor + " | " + WURFL.complete_device_name;
	// if(WURFL.form_factor != "Smartphone"){
		
	   // document.getElementById("slider").style.height = "450px";  
	 // }
	// else if(WURFL.form_factor == "Smartphone"){
	   // document.getElementById("slider").style.height = "200px";  
	 // }
	 
	 
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
	xmlhttp.open("GET","ajax/savevisitorinfo.php?device="+device+"&msisdn=Undefined Number&ip=182.160.118.50&page=/",true);
	xmlhttp.send();	
</script>