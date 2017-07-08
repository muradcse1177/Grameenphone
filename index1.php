<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Home | Video channel</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="css/ie10-viewport-bug-workaround.css" type="text/css" media="all">
    <script type="text/javascript" src="js/ie-emulation-modes-warning.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" media="all">
	 <script type="text/javascript" src="js/bootstrap-hover-dropdown.min.js"></script>
	<link rel="stylesheet" href="css/ul.img_list.css" type="text/css">
</head>
	<body>
		<head>
			<style type="text/css">
				body {
					background: #000000 !important;

				}
				div {
					text-align: justify;
				}

				.img {
					display: inline-block;
					width: 100px;
					height: 100px;
				}

				div:after {
					content: '';
					display: inline-block;
					width: 100%;
				}
				#play{
					background-color:#cb0003;
					display:block;
					height:4%;
					width:100%;
				}
				table, th, td {
					border: 1px solid black;
					border-collapse: collapse;
				}
				.index_table {
					color:black;
					background-color:#;
					padding: -0px 0px 0px 0px;
					margin: 0;
					font-size:14px;
					border-collapse: collapse;
				}
				.index_table a:link {
					text-decoration:none;
					color:black;
					background-color:#;
					padding: 0px 0px 0px 0px;
					margin: 0;
				}
				.index_table a:visited {
					text-decoration:none;
					font-weight:bold;
					color:black;
					background-color:#;
					padding: 0px 0px 3px 0px;
					margin: 0;
				}
				.index_table a:hover{
					text-decoration:none;
					font-weight:bold;
					color:black;
					background-color:#;
					padding: 0px 0px 0px 0px;
					margin: 0;
				}
				.myButton-group-justified {
					display: table;
					width: 100%;
					table-layout: fixed;
					border-collapse: collapse;
				}


			</style>
			<style>
				#cbp-spmenu-s1 {
					font-weight: bolder !important;
				}

				.accordion {
					overflow: visible !important;
				}

				.input-group {
					margin-bottom: 5%;
				}
				input[type=text] {
					width: 130px;
					box-sizing: border-box;
					border: 2px solid #ccc;
					border-radius: 4px;
					font-size: 16px;
					background-color: white;
					background-image: url('searchicon.png');
					background-position: 10px 10px;
					background-repeat: no-repeat;
					padding: 12px 20px 12px 40px;
					-webkit-transition: width 0.4s ease-in-out;
					transition: width 0.4s ease-in-out;
				}

				input[type=text]:focus {
					width: 100%;
				}
				a:hover {background-color: yellow;}

				.circular--square {
				  border-radius: 50%;
				}

				.circular--square {
				  border-top-left-radius: 50% 50%;
				  border-top-right-radius: 50% 50%;
				  border-bottom-right-radius: 50% 50%;
				  border-bottom-left-radius: 50% 50%;
				}
			</style>

		</head>

		<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="js/jssor.slider.mini.js"></script>
		<script type="text/javascript" src="js/slide.js"></script>
		<link rel="stylesheet" href="css/jssor_slide.css" type="text/css">
		<div id="desktop">
			<?php include 'slide.php';?>
			<?php include 'search.php';?>
			<table class="index_table" border="1" width="100%" style="background-color:red ">
				<tbody>
				   <tr>
						<td width="33%" height="30" align="center"  bgcolor="blue">
							<a href="" class="myButton-group-justified">Subscription based</a>
						</td>
						<td width="33%" height="30" align="center" bgcolor="#cb0003">
							<a href="" class="myButton-group-justified">Pay & Download</a>
						</td>
						<td width="33%" height="30" align="center" bgcolor="#cb0003">
							<a href="" class="myButton-group-justified">My Account</a>
						</td>
				   </tr>
				</tbody>
			</table>

			<footer style=" background-color:#cb0003; height:8%;width:100%; ">
				<h5 style="color:black; text-align:center; padding-top:15px;"> Copyright © Video channel.mobi</h5>
			</footer>
		</div>
	</body>
</html>

<script type="text/javascript" src="//wurfl.io/wurfl.js"></script>
<script type="text/javascript">
	var platform = WURFL.form_factor;
	var device = WURFL.complete_device_name;
	if(platform=="Smartphone"){
		 // document.getElementById("desktop").style.width = "auto";
		 // document.getElementById("desktop").style.marginLeft = '0';
         // document.getElementById("table").style.display = 'block';
		 // document.getElementById("tabl").style.display = 'none';
	}
	else{
		 // document.getElementById("desktop").style.marginLeft = '10%';
		 // document.getElementById("desktop").style.marginRight = '10%';
		 // document.getElementById("table").style.display = 'none';
		 // document.getElementById("nav").style.marginLeft = '10%';
		 // document.getElementById("nav").style.marginRight = '10%';
	}
</script>

<script>
    $(document).ready(function () {

        var value = 0;
        $("#cssmenu").hide();

        $(".searchicone").click(function () {
                $("#cssmenu").hide();
                $(".input-group").toggle();

        });
        $(".headerimg").click(function () {
            $(".input-group").hide();
                $("#cssmenu").animate({
                    width: "toggle"
                });
            });
    });
</script>
