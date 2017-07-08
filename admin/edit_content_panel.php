<?php
//include('session.php');
$uploadstatus=0;
if(isset($_GET["name"])) {
	$name1=$_GET["name"];
	$ContentId1=$_GET["ContentId"];
	$category1=$_GET["category"];
	$subcategory1=$_GET["subcategory"];	
	$status1=$_GET["status"];
	$link1=$_GET["link"];	
}
if(isset($_POST["submit"])) {
	$name1=$_POST["name1"];
	$ContentId1=$_POST["ContentId1"];
	$category1=$_POST["category1"];
	$subcategory1=$_POST["subcategory1"];	
	$status1=$_POST["status1"];
	$link1=$_POST["link1"];		
	
	$name2=$_POST["name"];	
	$category2=$_POST["category"];
	$subcategory2=$_POST["subcategory"];	
	$status2=$_POST["status"];	
	$target_dir = "uploads/".$category2."/".$subcategory2."/";	
	$link2= $target_dir.$ContentId1.substr($link1, -4);
	if (!is_dir($target_dir)) 
	{
		mkdir($target_dir);
	}
	if(file_exists($link1)){
		if(!file_exists($link2))
			rename($link1, $link2);
	}

	$uploadstatus=1;
	
	// connect to db
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "content";

	// connect to database
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 	
	
	if($category1==$category2 && $subcategory1==$subcategory2 && $name1==$name2 && $status1==$status2)
		$uploadresult="Nothing has been changed.";
	else if($category1==$category2){									
		$sql_new = "UPDATE contents SET name='$name2', subcategory='$subcategory2', file_link='$link2', content_id='$ContentId1', status='$status2' WHERE file_link='$link1'";			
		if ($conn->query($sql_new) === TRUE) {		
			$uploadresult="Congrats! data updated successfully.";
		} 
		else {
			$uploadresult="Sorry! data not updated.";
		}
		
	}		
	else if($category1!=$category2){		
		//delete previous data
		$sql_del = "DELETE FROM contents WHERE file_link='$link1'";
		function getRandomHex($num_bytes=4) {
		  return bin2hex(openssl_random_pseudo_bytes($num_bytes));
		}
		//insert new data	
		// $target_dir_preview = "../demo/".$category2."/".$subcategory2."/";
		// if (!is_dir($target_dir_preview)) 
		// {
			// mkdir($target_dir_preview);
		// }
		
		// //For original file
		// $temp = explode(".", $_FILES["file"]["name"]);
		// $filename = getRandomHex(15); // get a hexadecimal number for filename	
		// $fullfilename = $filename . '.' . end($temp);
		// if(move_uploaded_file($_FILES["file"]["tmp_name"],  $target_dir. $fullfilename))
			// $uploadstatus=1;
		
		// //For preview file
		// $temp_preview = explode(".", $_FILES["file_preview"]["name"]);
		// //$filename = getRandomHex(15); // get a hexadecimal number for filename	
		// $fullfilename_preview = $filename . '.' . end($temp_preview);
		// $target_link_preview="/demo/".$category2."/".$subcategory2."/".$fullfilename_preview;
		// if(move_uploaded_file($_FILES["file_preview"]["tmp_name"],  $target_dir_preview. $fullfilename_preview))
			// $uploadstatus=1;
		$sql_new = "INSERT INTO contents (category,subcategory,content_id,name,preview_link,file_link, uploded_by, downloaded,status,remarks)
					VALUES ('$category2', '$subcategory2','$ContentId1','$name2',''$link2','$link2','Murad','0','published','Best')";
		if ($conn->query($sql_new) === TRUE) {
			if ($conn->query($sql_del) === TRUE) 
			$uploadresult="Congrats! data updated successfully."; }
		else 
			$uploadresult="Sorry! data not updated.";				
	}
	$conn->close();
}

?>

<!DOCTYPE html>
<!--[if IE 8]><html lang="en" class="ie8"></html><![endif]-->
<!--[if IE 9]><html lang="en" class="ie9"></html><![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <title> Admin Lab Dashboard</title>
	<?php include("head.html");?>
</head>

<body class="fixed-top">
    <?php include("navigation_top.html");?>
	
    <div id="container" class="row-fluid">
        <div id="sidebar" class="nav-collapse collapse">
            <div class="sidebar-toggler hidden-phone"></div>
            <div class="navbar-inverse">
                <form class="navbar-search visible-phone" />
                <input type="text" class="search-query" placeholder="Search" />
                </form>
            </div>
            <ul class="sidebar-menu">
                <li class="has-sub"><a href="javascript:;" class=""><span class="icon-box"><i class="icon-dashboard"></i></span> Dashboard <span class="arrow"></span></a>
                    <ul class="sub">
                        <li class=""><a class="" href="./index.php">Dashboard</a></li>
                    </ul>
                </li>
                <li class="has-sub active"><a href="javascript:;" class=""><span class="icon-box"><i class="icon-picture"></i></span> Contents <span class="arrow"></span></a>
                    <ul class="sub">
                        <li><a class="active" href="./upload_content.php"><i class="icon-upload"></i> Upload</a></li>
                        <li><a class="" href="./view_content.php"><i class="icon-th"></i> View</a></li>
                    </ul>
                </li>
				<li class="has-sub"><a href="javascript:;" class=""><span class="icon-box"><i class="icon-th"></i></span> Categorization <span class="arrow"></span></a>
                    <ul class="sub">
                        <li><a class="" href="./add_subcategory.php"><i class="icon-plus"></i> Add subcategory</a></li>
						<li><a class="" href="./remove_subcategory.php"><i class="icon-trash"></i> Delete subcategory</a></li>						
                    </ul>
                </li>
				<li class="has-sub"><a href="javascript:;" class=""><span class="icon-box"><i class="icon-cogs"></i></span> Settings <span class="arrow"></span></a>
                    <ul class="sub">
                        <li><a class="" href="./settings.php"><i class="icon-edit"></i> Change settings</a></li>			
                    </ul>
                </li>
                <li><a class="" href="./login.php"><span class="icon-box"><i class="icon-user"></i></span> Login Page</a></li>
            </ul>
        </div>
        <div id="main-content">
            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="span12">
                        <div id="theme-change" class="hidden-phone"><i class="icon-cogs"></i><span class="settings"><span class="text">Theme:</span><span class="colors"><span class="color-default" data-style="default"></span><span class="color-gray" data-style="gray"></span><span class="color-purple" data-style="purple"></span><span class="color-navy-blue" data-style="navy-blue"></span></span>
                            </span>
                        </div>
                        <h3 class="page-title"> Edit Content</h3>
                        <ul class="breadcrumb">
                            <li><a href="index.php"><i class="icon-home"></i></a><span class="divider">&nbsp;</span></li>
                            <li><a href="#">Content</a><span class="divider">&nbsp;</span></li>
                            <li><a href="upload_content.php">Edit Content</a><span class="divider-last">&nbsp;</span></li>
                        </ul>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="widget">
    <div class="widget-title">
        <h4><i class="icon-reorder"></i>Upload content</h4>
        <span class="tools">
                           <a href="javascript:;" class="icon-chevron-down"></a>
                           <a href="javascript:;" class="icon-remove"></a>
                        </span>
    </div>
    <div class="widget-body form">
        <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal"> 
			<div class="controls">
                <?php 
				if($uploadstatus)
				{
					?> <p style="color:green;"><b><?php echo $uploadresult;?></b></p> <?php
				}
				?>
            </div>
			<div class="control-group">
				<label class="control-label">Category *</label>
				<div class="controls">
					<select class="span6" id="category_id" name="category" tabindex="1" required="">
						<option value="<?php echo $_GET["category"];?>"><?php echo $_GET["category"];?></option>
						<option value="">Select category</option>
						<option value="Wallpaper">Wallpaper </option>
						<option value="Animation">Animation </option>
						<option value="Video">Video </option>
						<option value="Games & Apps">Games & Apps </option>
						<option value="Music">Music </option>
						<option value="Ringtone">Ringtone </option>
					</select>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Subcategory *</label>
				<div class="controls">
					<select class="span6" id="category_id" name="subcategory" tabindex="1" required="">
						<option value="<?php echo $_GET["subcategory"];?>"><?php echo $_GET["subcategory"];?></option>
						<option value="">Select subcategory</option>
						<option value="action">Action</option>
						<option value="adventure">Adventure</option>
						<option value="animation">Animation </option>
						<option value="biography">Biography</option>
						<option value="comedy">Comedy</option>
						<option value="crime">Crime</option>
						<option value="documentary">Documentary </option>
						<option value="Drama">Drama</option>
						<option value="Drama Serial">Drama Serial</option>
						<option value="family">Family</option>
						<option value="funny">Funny</option>
						<option value="history">History</option>
						<option value="horror">Horror </option>
						<option value="inspiration">Inspiration</option>
						<option value="Love Story">Love Story</option>
						<option value="musical">Musical</option>
						<option value="mystery">Mystery</option>
						<option value="romance">Romance </option>
						<option value="sci_fi">Sci-Fi </option>
						<option value="sports">Sports</option>
						<option value="Telifilm">Telifilm</option>
						<option value="thriller">Thriller</option>
						<option value="war">War</option>
					</select>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Status *</label>
				<div class="controls">
					<select class="span6" id="category_id" name="status" tabindex="1" required="">
						<option value="<?php echo $_GET["status"];?>"><?php echo $_GET["status"];?></option>
						<option value="published">published</option>						
						<option value="hidden">hidden</option>
					</select>
				</div>
			</div>
            <div class="control-group">
                <label class="control-label">Name *</label>
                <div class="controls">
                    <input type="text" class="span6 " name="name" value="<?php echo $_GET["name"];?>" required="">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Content</label>
                <div class="controls">   					               
					<span class="">
						<img src="<?php echo $_GET["link"];?>" style="max-height:100px;" title="Current Image" alt="Current Image">
					</span>
                </div>
            </div>     			
            <div class="controls">   
					<input type="hidden" name="name1" value="<?php echo $name1;?>">    
					<input type="hidden" name="category1" value="<?php echo $category1;?>">    
					<input type="hidden" name="subcategory1" value="<?php echo $subcategory1;?>">    
					<input type="hidden" name="status1" value="<?php echo $status1;?>">    
					<input type="hidden" name="link1" value="<?php echo $link1;?>">   
					<input type="hidden" name="ContentId1" value="<?php echo $ContentId1;?>"> 
			</div>

            <div class="controls">
                <input type="submit" value="Update" name="submit">	
               <!-- <button type="button" class="btn"></button> -->
				<a href="view_content.php" class="btn">Cancel</a>
            </div>			
			
        </form>
        <!-- END FORM-->
    </div>
</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="footer"> &copy; Content House 2015 - All rights reserved.
        <div class="span pull-right"><span class="go-top"><i class="icon-arrow-up"></i></span></div>
    </div>
    <script src="./js/jquery-1.8.3.min.js"></script>
    <script src="./assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="./js/jquery.blockui.js"></script>
    <!--[if lt IE 9]><script src="./js/excanvas.js"></script><script src="./js/respond.js"></script><![endif]-->
    <script type="text/javascript" src="./assets/uniform/jquery.uniform.min.js"></script>
    <script type="text/javascript" src="./assets/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="./js/jquery.pulsate.min.js"></script>
    <script src="./assets/fancybox/source/jquery.fancybox.pack.js"></script>
    <script type="text/javascript" src="./assets/jslider/js/jshashtable-2.1_src.js"></script>
    <script type="text/javascript" src="./assets/jslider/js/jquery.numberformatter-1.2.3.js"></script>
    <script type="text/javascript" src="./assets/jslider/js/tmpl.js"></script>
    <script type="text/javascript" src="./assets/jslider/js/jquery.dependClass-0.1.js"></script>
    <script type="text/javascript" src="./assets/jslider/js/draggable-0.1.js"></script>
    <script type="text/javascript" src="./assets/jslider/js/jquery.slider.js"></script>
    <script src="./js/scripts.js"></script>
    <script>
        jQuery(document).ready(function() {
            App.init()
        });
    </script>
</body>

</html>