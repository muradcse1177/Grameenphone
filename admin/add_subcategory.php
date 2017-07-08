<?php
include 'class/add_subcategory.php';
$subcategory_obj=new add_subcategory();
if(isset($_POST["submit"])){
	$uploadresult=$subcategory_obj->fn_add_subcategory();
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
    <?php include("navgation_top.php");?>
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
                <li class="has-sub"><a href="javascript:;" class=""><span class="icon-box"><i class="icon-picture"></i></span> Contents <span class="arrow"></span></a>
                    <ul class="sub">
						<li><a class="" href="./upload_content.php"><i class="icon-upload"></i> Upload</a></li>
                        <li><a class="" href="./view_content.php"><i class="icon-th"></i> View</a></li>
                    </ul>
                </li>
				<li class="has-sub active"><a href="javascript:;" class=""><span class="icon-box"><i class="icon-th"></i></span> Categorization <span class="arrow"></span></a>
                    <ul class="sub">
                        <li><a class="active" href="./add_subcategory.php"><i class="icon-plus"></i> Add subcategory</a></li>
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
                        <h3 class="page-title"> Add Subcategory</h3>
                        <ul class="breadcrumb">
                            <li><a href="index.php"><i class="icon-home"></i></a><span class="divider">&nbsp;</span></li>
                            <li><a href="#">Category</a><span class="divider">&nbsp;</span></li>
                            <li><a href="add_subcategory.php">Add Subcategory</a><span class="divider-last">&nbsp;</span></li>
                        </ul>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="widget">
    <div class="widget-title">
        <h4><i class="icon-reorder"></i>Add Subcategory</h4>
        <span class="tools">
                           <a href="javascript:;" class="icon-chevron-down"></a>
                           <a href="javascript:;" class="icon-remove"></a>
                        </span>
    </div>
    <div class="widget-body form">
        <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal"> 
			<div class="controls">
                <?php 
				if(isset($uploadresult)){
					if($uploadresult)
					{
						?> <p style="color:green;"><b><?php echo $uploadresult;?></b></p> <?php
					}
				}
				?>
            </div>
			<div class="control-group">
				<label class="control-label">Category *</label>
				<div class="controls">
					<select class="span6" id="category_id" name="category" tabindex="1" required="">
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
                    <input type="text" class="span6 " name="subcategory" placeholder="Enter subcategory" tabindex="2" required="">
                </div>
            </div>                    

            <div class="controls">
                <input type="submit" value="Add Subcategory" name="submit">	
               <!-- <button type="button" class="btn"></button> -->
				<a href="add_subcategory.php" class="btn">Cancel</a>
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