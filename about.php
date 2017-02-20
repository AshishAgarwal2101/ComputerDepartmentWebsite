<!DOCTYPE html>
<?php session_start();?>
<html>
	<head>
		<link type="text/css" rel="stylesheet" href="hack.css" />
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	</head>
	<body>
		
		
		<div id="dia"> Submission successfull!	</div>
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
		<div id="top"><img src="com.jpg" style="display:inline-block; float:left; font-family:Calibri; margin-top:5px; margin-left:50px;"><p>DEPARTMENT OF COMPUTER SCIENCE</p></div>
		<hr style="color:#e5e5e0; margin-top:20px; width:1200px;"></hr>
		<div id="login" onclick="login()"><p style="margin-top:8px;"><b>Login</b></p></div>
		<div id="logout" onclick="logout()"><p style="margin-top:8px;"><b>Logout</b></p></div>
		
		<div id="nav">
			<a href="index.php"><div id="techInfo">Tech Info</div></a>
			<a href="news.php"><div id="news">News</div></a>
			<a href="activities.php"><div id="activities">Activities</div></a>
			<a href="studyMaterials.php"><div id="studyMaterials">Study Materials</div></a>
			<a href="http://www.e-shu.comxa.com"><div id="issues">Issues</div></a>
			<a href="tutorials.php"><div id="tutorials">Tutorials</div></a>
			<div id="about" style="border-bottom:4px solid yellow;">About</div>
			
		</div>
		<script type="text/javascript" src="hack.js"></script>
		
		<br>

        

		<center>
			<img src="dsi.jpeg"></img>

		</center>
  
    

		<hr style="color:#e5e5e0; width:1200px; margin-top:30px;"></hr>
        <center><div style="width:500px; font-family:Calibri; font-size:22px; "><p>
This website is a step towards making Computer Science and Engineering branch of Dayananda Sagar College of Engineering, Bangalore digitally advanced. 
This website will work as a platform for presenting notes, assignments, global news and much more interesting stuff!<br></br><br></br>
There is a <b>Tech Info</b> section wherein you can discover the world of technology. This section is open to submissions by students and teachers of Dayananda Sagar College of Engineering.<br></br>
The <b>News</b> section has all the latest news related to the department. Only teachers of the department are allowed to post in this section.<br></br>
The <b>Activities</b> section is also open to submissions by only teachers, where all the upcoming activities will be scheduled.<br></br>
The <b>Study Materials</b> section is a treasure trove of all the notes by the teachers.<br></br>
The <b>Issues</b> section redirects you to a website wherein you can add all the issues related to the department.<br></br>
The <b>Tutorials</b> section will soon be flooded with the best tutorial videos you can find for very subject.<br></br>
There also exists a <b>Delete</b> button for every submission. But don't wonder if you can't see it! It's visible only to our teachers which means you are actually being monitored all the time!<br></br>
<br><b>So buckle up your seatbelt and look ahead!</b><br> Hope you enjoy your ride.</p></div>
		</center>

		
		</div>
		<?php include 'commonLayout.php';?>
		<?php if(isset($_SESSION['login'])){ 
					if($_SESSION['login']=='1' || $_SESSION['login']=='2'){ ?> <script> $("#login").hide(); $("#logout").show(); </script> <?php }
		}
			else{ ?> <script> $("#logout").hide();</script> <?php }
		?>
		
	</body>
</html>
