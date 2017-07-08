<?php
include 'class/view.php';
$view_obj=new view_content;
if(isset($_GET["view"])) 
	$get_content=$view_obj->fn_view_content();
else if(isset($_GET["delete"]))  
	$get_content=$view_obj->fn_delete_content();
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
                <li class="has-sub active"><a href="javascript:;" class=""><span class="icon-box"><i class="icon-picture"></i></span> Contents <span class="arrow"></span></a>
                    <ul class="sub">
						<li><a class="" href="./upload_content.php"><i class="icon-upload"></i> Upload</a></li>
                        <li><a class="active" href="./view_content.php"><i class="icon-th"></i> View</a></li>
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
                        <h3 class="page-title"> View Content</h3>
                        <ul class="breadcrumb">
                            <li><a href="index.php"><i class="icon-home"></i></a><span class="divider">&nbsp;</span></li>
                            <li><a href="#">Content</a><span class="divider">&nbsp;</span></li>
                            <li><a href="view_content.php">View Content</a><span class="divider-last">&nbsp;</span></li>
                        </ul>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="widget">
    <div class="widget-title">
        <h4><i class="icon-reorder"></i>View content</h4>
        <span class="tools">
		   <a href="javascript:;" class="icon-chevron-down"></a>
		   <a href="javascript:;" class="icon-remove"></a>
        </span>
    </div>
    <div class="widget-body">
		<div id="sample_1_wrapper" class="dataTables_wrapper form-inline" role="grid">
			<div class="row-fluid">
				<div class="span3">
					<div id="sample_1_length" class="dataTables_length">
						<label>
							<select size="1" name="sample_1_length" aria-controls="sample_1" class="input-mini">
								<option value="10" selected="selected">10</option>
								<option value="25">25</option>
								<option value="50">50</option>
								<option value="100">100</option>
							</select> records per page</label>
					</div>
				</div>
				<form action="" method="GET" enctype="multipart/form-data" class="form-horizontal">  
					<div class="span3">
						<div id="sample_1_length" class="dataTables_length">
							
								<select class="" id="category_id" name="category" tabindex="1" required ="">
									<option value="">Select category</option>
									<option value="wallpaper"<?php  echo "selected";?>>Wallpaper </option>
									<option value="animation" <?php echo "selected";?>>Animation </option>
									<option value="video" <?php echo "selected";?>>Video </option>
									<option value="games" <?php echo "selected";?>>Games & Apps </option>
									<option value="music" <?php echo "selected";?>>Music </option>
									<option value="ringtone" <?php echo "selected";?>>Ringtone </option>
								</select>
						</div>
					</div>					
					                   
					<div class="span3">
						<input type="submit" value="View" name="view">	
					</div>						
					
					<div class="span3">
						<div class="dataTables_filter" id="sample_1_filter">
							<label>Search:
								<input type="text" aria-controls="sample_1" class="input-medium">
							</label>
						</div>
					</div>
					
				</form>
			</div>
			<table class="table table-striped table-bordered dataTable" id="sample_1" aria-describedby="sample_1_info">
				<thead>
					<tr role="row">
						<th style="width:20px;" class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="#: activate to sort column ascending">#</th>
						<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 137px;">Name</th>
						<th class="hidden-phone sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label="wallpaper: activate to sort column ascending" style="width: 195px;">Content</th>
						<th class="hidden-phone sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending" style="width: 115px;">Category</th>
						<th class="hidden-phone sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending" style="width: 115px;">Subcategory</th>
						<th class="hidden-phone sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 80px;">Status</th>
						<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label=": activate to sort column ascending" style="width: 200px;">Edit/ Hide/ Delete</th>
					</tr>
				</thead>
				
				<tbody role="alert" aria-live="polite" aria-relevant="all">
					<?php
						$i=0;
						if(isset($get_content)){
							foreach($get_content as $row){
								?><tr class="gradeX odd">
									<td class=" sorting_1"><?php echo ++$i;?></td>
									<td class=" "><?php echo $row["name"]; ?></td>
									<td class="hidden-phone ">
										<!-- Content Type-->
										<img src="<?php echo $row["preview_link"]; ?>" title="<?php echo $row["name"]; ?>" alt="<?php echo $row["name"]; ?>" style="width:80px;height:50px;">
									</td>
									<td class="hidden-phone "><?php echo $row['category'];?></td>
									<td class="hidden-phone "><?php echo $row["subcategory"];?></td>
									<td class="hidden-phone ">
										<font color="<?php if($row["status"]=="Published") echo "green"; else echo "red"; ?>"><?php echo $row["status"]; ?></font>
									</td>
									<td class="hidden-phone ">
										<a target="_blank" href="edit_content_panel.php?name=<?php echo $row["name"];?>&ContentId=<?php echo $row["content_id"];?>&category=<?php echo $row["category"];?>&subcategory=<?php echo $row["subcategory"];?>&status=<?php echo $row["status"];?>&link=<?php echo $row["file_link"];?>" style="color:green;"><i class="icon-edit"></i> Edit</a> &nbsp;&nbsp;&nbsp;&nbsp;										
										<a href="view_content.php?hide=true&ContentId=<?php echo $row["content_id"];?>&category=<?php echo $row["category"];?>&link=<?php echo $row["file_link"];?>" style="color:blue;" onclick="return confirm('Do you really hide to delete this file?');"><i class="icon-adjust"></i> Hide</a> &nbsp;&nbsp;&nbsp;&nbsp;
										<a href="view_content.php?delete=true&ContentId=<?php echo $row["content_id"];?>&category=<?php echo$row["category"];?>&link=<?php echo $row["file_link"];?>" style="color:red;" onclick="return confirm('Do you really want to delete this file?');"><i class="icon-trash"></i> Delete</a> &nbsp;&nbsp;&nbsp;&nbsp;
									</td>
								</tr> <?php
							}
						}
					?>
					
				</tbody>
			</table>
			<div class="row-fluid">
				<div class="span6">
					<div class="dataTables_info" id="sample_1_info">Showing 1 to 5 of 5 entries</div>
				</div>
				<div class="span6">
					<div class="dataTables_paginate paging_bootstrap pagination">
						<ul>
							<li class="prev disabled"><a href="#">← Prev</a></li>
							<li class="active"><a href="#">1</a></li>
							<li class="next disabled"><a href="#">Next → </a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
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