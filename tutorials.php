<!DOCTYPE html>
<?php session_start();?>
<html>
	<head>
		<link type="text/css" rel="stylesheet" href="hack.css" />
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	</head>
	<body>
		
		<div id="trans">
			<div id="backgr">
			<div class="im1"><b> UNIX</b></div>
			<div class="im2"><b> GOOGLE</b></div>
			<div class="im3"><b> MICROSOFT</b></div>
			<div class="im4"><b> HP</b></div>
			<div class="im5"><b> DELL</b></div>
			<div class="im6"><b> INTEL</b></div>
			<div class="im7"><b> APPLE</b></div>
			<div class="im8"><b> PYTHON</b></div>
			<div class="im9"><b> JAVA</b></div>
			<div class="im10"><b> CSE</b></div>
			<div class="im11"><b> DSCE</b></div>
			<div class="im12"><b> HACKATHON</b></div>
		</div>
		<div id="top"><img src="com.jpg" style="display:inline-block; float:left; margin-top:5px; margin-left:50px;"><p>DEPARTMENT OF COMPUTER SCIENCE</p></div>
		<hr style="color:#e5e5e0; margin-top:20px; width:1200px;"></hr>
		<div id="login" onclick="login()"><p style="margin-top:8px;"><b>Login</b></p></div>
		<div id="logout" onclick="logout()"><p style="margin-top:8px;"><b>Logout</b></p></div>
		
		<div id="nav">
			<a href="index.php"><div id="techInfo">Tech Info</div></a>
			<a href="news.php"><div id="news">News</div></a>
			<a href="activities.php"><div id="activities">Activities</div></a>
			<a href="studyMaterials.php"><div id="studyMaterials">Study Materials</div></a>
			<a href="issues.php"><div id="issues">Issues</div></a>
			<div id="tutorials" style="border-bottom:4px solid yellow;">Tutorials</div>
			<a href="about.php"><div id="about">About</div></a>
		</div>
		
		<script type="text/javascript" src="hack.js"></script>
		</div>
		<?php include 'commonLayout.php';?>
		<?php if(isset($_SESSION['login'])){ 
					if($_SESSION['login']=='1' || $_SESSION['login']=='2'){ ?> <script> $("#login").hide(); $("#logout").show(); </script> <?php }
		}
			else{ ?> <script> $("#logout").hide();</script> <?php }
		?>
	</body>
</html>
