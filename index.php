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
		<div id="top"><img src="com.jpg" style="display:inline-block; transparent:0.9; float:left; margin-top:5px; margin-left:50px; padding-right:-30px;"><p>DEPARTMENT OF COMPUTER SCIENCE</p></div>
		<hr style="color:#e5e5e0; margin-top:20px; width:1200px;"></hr>
		<div id="login" onclick="login()"><p style="margin-top:8px;"><b>Login</b></p></div>
		<div id="logout" onclick="logout()"><p style="margin-top:8px;"><b>Logout</b></p></div>
		
		<div id="nav">
			<div id="techInfo" style="border-bottom:4px solid yellow;">Tech Info</div>
			<a href="news.php"><div id="news">News</div></a>
			<a href="activities.php"><div id="activities">Activities</div></a>
			<a href="studyMaterials.php"><div id="studyMaterials">Study Materials</div></a>
			<a href="http://www.e-shu.comxa.com"><div id="issues">Issues</div></a>
			<a href="tutorials.php"><div id="tutorials">Tutorials</div></a>
			<a href="about.php"><div id="about">About</div></a>
		</div>
		
		<script type="text/javascript" src="hack.js"></script>
		
		<div id="techInf">
			<h1 style="font-family:Calibri; text-align:center; margin-top:40px; margin-bottom:-5px;">TECH INFO</h1><hr style="color:black; width:110px;"></hr>
		
			
			<!--PHP for Tech Display-->
			<?php
			?> <?php include 'data.php'; ?> <?php
			
			
			
			$i=1;
			$j=1;
			$topic="";
			$data_handle=mysql_connect($server,$username,$password);
			$db_con=mysql_select_db($database,$data_handle);
			if($db_con)
			{
				$insert="SELECT * FROM tech ORDER BY Id DESC";
				$res=mysql_query($insert);
				if($res)
				{
					
					while($row=mysql_fetch_assoc($res))
					{
						if($i%($j*10+1)==0)
							$j++;
						?>
						<div class="page0<?php echo $j ?>">
						<form method="POST" name="del" action="index.php">
						<input type="submit" name="delete<?php echo $i?>"  id="del<?php echo $i?>" class="del" value="Delete" style="background:none; margin-top:50px; border:2px solid black; width:90px; height:30px; float:right; cursor:pointer;">
						</form>
						<div id="Topi<?php echo $i ?>" class="topic" onclick="topicSel(<?php echo $i ?>,'')"><?php echo $i; echo ". "; echo $row['Topic']; ?></div>
						<div id="Tex<?php echo $i ?>" class="content" onclick="contentSel(<?php echo $i ?>,'')"><?php echo $row['Text'];?></div>
						</div>
						<?php
						if(isset($_POST['delete'.$i])){
							dele($row['Topic']);
						}
						$i++;
						
					}
				mysql_close($data_handle);
				}
			}
			?>
			<div id="pagination" style="margin-top:50px;">
				<ul>
					<?php
						//j contain number of pages
						if($j>1)
						{
							for($i=1;$i<=$j;$i++)
							{
								?>
								<li id="pageButton0<?php echo $i ?>" onclick="pageButtonClick(<?php echo $i ?>,<?php echo $j ?>,0)"><?php echo $i ?></li>
								<script>$(".page0"+<?php echo $i ?>).hide(); </script> 
								<?php
							}
						}
					?>
				</ul>
			</div>	
			<script src="hack.js"></script>

			

					<?php 
					
					function dele($x)
					{
					?> <?php include 'data.php'; ?> <?php
					
					
					
					$data_handle=mysql_connect($server,$username,$password);
					$db_con=mysql_select_db($database,$data_handle);
					if($db_con)
						{
							$del=mysql_query("SELECT File FROM tech WHERE Topic='".$x."'");
								$element= mysql_fetch_assoc($del);
								$path=$element['File'];
								if($path!=null)
								unlink($path);
							$deles=mysql_query("DELETE FROM tech WHERE Topic='".$x."'");
									
									if($deles){
									echo "DEleted";
								
									}
									else
										echo "not deleted";
									
						}
					}
					?>
			
			<!--PHP ends-->
			
		
			<hr style="color:#e5e5e0; width:1200px; margin-top:60px; margin-bottom:20px;"></hr>
			<h1 style="font-family:Calibri; text-align:center; margin-top:40px; margin-bottom:-5px;">SHARE LATEST TECHNICAL STUFF</h1><hr style="color:black; width:400px;"></hr>
			<form method="POST" name="tech">
			
				<input type="text" id="techTopic" style="margin-top:30px;" name="techTopic" placeholder="Topic" />
				<textarea type="text" id="techText" placeholder="Give Technical Information here" name="techText"></textarea>
				<input name="techButton" type="submit" value="submit" onclick="sub()" id="techButton" />
				
				
				<!--PHP for tech submission -->
				<?php
				?> <?php include 'data.php'; ?> <?php
				
				
				
				$data_handle=mysql_connect($server,$username,$password);
				$db_con=mysql_select_db($database,$data_handle);
				if(isset($_POST['techButton'])){
					$topic=$_POST['techTopic'];
					$text=$_POST['techText'];
					
					if(isset($_SESSION['login'])){
					if($_SESSION['login']=='1'||$_SESSION['login']=='2'){
						if($db_con){
							$insert="INSERT INTO tech(Topic,Text) VALUES('$topic','$text')";
							$res=mysql_query($insert);
							?>
							<script>
								document.getElementById('dia').innerHTML="Submission Successful!!";
								$("#dia").fadeIn(1000);
								$("#dia").fadeOut(4000);
								
							</script>
							
							<?php
						}	
						
					}
					else{
						?>
						<script>
							document.getElementById('dia').innerHTML="You are not logged in";
							$("#dia").fadeIn(1000);
							$("#dia").fadeOut(4000);
						</script>
						<?php
					}
					}
					else{
						?>
						<script>
							document.getElementById('dia').innerHTML="You are not logged in";
							$("#dia").fadeIn(1000);
							$("#dia").fadeOut(4000);
						</script>
						<?php
					}
				}	
			
				mysql_close($data_handle);	
						
						
				?>
				<!--PHP ends -->
				
				
				<hr style="color:#e5e5e0; width:1200px; margin-top:30px;"></hr>
			</form>
		</div>
		
		</div>
		
		
		<?php include 'commonLayout.php';?>
		
		<?php 
			if(isset($_SESSION['login'])){ 
					if($_SESSION['login']!='1'){ ?> <script> $(".del").hide(); </script> <?php }
					if($_SESSION['login']=='1' || $_SESSION['login']=='2'){ ?> <script> $("#login").hide(); $("#logout").show(); </script> <?php }
			}
			else{ 
				?> <script> $(".del").hide(); $("#logout").hide();</script> <?php 
			}
		?>
		
		
	</body>
</html>
