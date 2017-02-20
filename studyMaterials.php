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
		<div id="top"><img src="com.jpg" style="display:inline-block; float:left; margin-top:5px; margin-left:50px;"><p>DEPARTMENT OF COMPUTER SCIENCE</p></div>
		<hr style="color:#e5e5e0; margin-top:20px; width:1200px;"></hr>
		<div id="login" onclick="login()"><p style="margin-top:8px;"><b>Login</b></p></div>
		<div id="logout" onclick="logout()"><p style="margin-top:8px;"><b>Logout</b></p></div>
		
		<div id="nav">
			<a href="index.php"><div id="techInfo">Tech Info</div></a>
			<a href="news.php"><div id="news">News</div></a>
			<a href="activities.php"><div id="activities">Activities</div></a>
			<div id="studyMaterials" style="border-bottom:4px solid yellow;">Study Materials</div>
			<a href="http://www.e-shu.comxa.com"><div id="issues">Issues</div></a>
			<a href="tutorials.php"><div id="tutorials">Tutorials</div></a>
			<a href="about.php"><div id="about">About</div></a>
		</div>
		<script type="text/javascript" src="hack.js"></script>
		<div id="sem" style="margin-left:170px; margin-top:50px;">
				<ul><li class="selTab" id="s34sem" onclick="s34sem()">III/IV SEM</li><li id="s56sem" onclick="s56sem()">V/VI SEM</li><li id="s78sem" onclick="s78sem()">VII/VIII SEM</li></ul>
		</div>
		<h1 style="font-family:Calibri; text-align:center; margin-top:40px; margin-bottom:2px;">YOUR STUDY MATERIALS</h1><hr style="color:black; width:300px; margin-top:-1px;"></hr>
		
		
		<!--PHP for study materials display -->
		<?php
			?> <?php include 'data.php'; ?> <?php
			
			
			
			$i=1;
			$j=1;
			$data_handle=mysql_connect($server,$username,$password);
			$db_con=mysql_select_db($database,$data_handle);
			if($db_con)
			{
				$insert="SELECT * FROM studymaterials ORDER BY Id DESC";
				$res=mysql_query($insert);
				if($res)
				{
					?>
					<div id="s34semNews">
					<?php
					while($row=mysql_fetch_assoc($res))
					{
						
						if($row['Sem']==='3' || $row['Sem']==='4'){
							if($i%($j*10+1)==0)
								$j++;
							?>
							<div class="page34<?php echo $j ?>">
							<form method="POST" name="del" >
							<input type="submit" name="deletei<?php echo $i?>" id="del34" class="delt" value="delete" style="background:none; margin-top:50px; border:2px solid black; width:90px; height:30px; float:right; cursor:pointer;">
							</form>
							<div id="Topi34<?php echo $i ?>" class="topic" style="" onclick="topicSel(<?php echo $i ?>,'34')"><?php echo $i; echo ". "; echo $row['Topic']; ?></div>
							<div id="Tex34<?php echo $i ?>" class="content" style="" onclick="contentSel(<?php echo $i ?>,'34')">
							
								<div style="display:block; margin-bottom:30px;"> <?php echo $row['Text']; ?> </div> <?php
								$path1=$row['File']; 
							
							
								if(strlen($path1)!=0){
								?>
								File: <a href="<?php echo $path1; ?>" class="studyFile" download><?php echo $path1; ?></a>
							
								<?php
								}
								?>
							
							
							</div>
						
							</div>
							<?php
							if(isset($_POST['deletei'.$i])){
								dele($row['Topic']);
							}
								
							$i++;
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
								<li id="pageButton34<?php echo $i ?>" onclick="pageButtonClick(<?php echo $i ?>,<?php echo $j ?>,34)"><?php echo $i ?></li>
								<script>$(".page34"+<?php echo $i ?>).hide(); </script> 
								<?php
							}
						}
					?>
					</ul>
					</div>
					</div>
					
					<div id="s56semNews">
					<?php
					$i=1;
					$j=1;
					$res=mysql_query($insert);
					while($row=mysql_fetch_assoc($res))
					{
						if($row['Sem']==='5' || $row['Sem']==='6'){
							
							if($i%($j*10+1)==0)
								$j++;
							?>
							<div class="page56<?php echo $j ?>">
							<form method="POST" name="del" >
							<input type="submit" name="deletej<?php echo $i ?>" id="del56" class="delt" value="delete" style="background:none; margin-top:50px; border:2px solid black; width:90px; height:30px; float:right; cursor:pointer;">
							</form>
							<div id="Topi56<?php echo $i ?>" class="topic" style="" onclick="topicSel(<?php echo $i ?>,'56')"><?php echo $i; echo ". "; echo $row['Topic']; ?></div>
							<div id="Tex56<?php echo $i ?>" class="content" style="" onclick="contentSel(<?php echo $i ?>,'56')">
							
							<div style="display:block; margin-bottom:30px;"> <?php echo $row['Text']; ?> </div> <?php
								$path1=$row['File']; 
							
							
								if(strlen($path1)!=0){
								?>
								File: <a href="<?php echo $path1; ?>" class="studyFile" download><?php echo $path1; ?></a>
							
								<?php
								}
								?>
							
							
							
							</div>
							</div>
							<?php
							if(isset($_POST['deletej'.$i])){
								dele($row['Topic']);
							}
							$i++;
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
								<li id="pageButton56<?php echo $i ?>" onclick="pageButtonClick(<?php echo $i ?>,<?php echo $j ?>,56)"><?php echo $i ?></li>
								<script>$(".page56"+<?php echo $i ?>).hide(); </script> 
								<?php
							}
						}
					?>
					</ul>
					</div>
					</div>
					
					<div id="s78semNews">
					<?php
					$i=1;
					$j=1;
					$res=mysql_query($insert);
					while($row=mysql_fetch_assoc($res))
					{
						
						if($row['Sem']==='7' || $row['Sem']==='8'){
							
							if($i%($j*10+1)==0)
								$j++;
							
							?>
							<div class="page78<?php echo $j ?>">
							<form method="POST" name="del" >
							<input type="submit" name="deletek<?php echo $i ?>" id="del78" class="delt" value="delete" style="background:none; margin-top:50px; border:2px solid black; width:90px; height:30px; float:right; cursor:pointer;">
							</form>
							<div id="Topi78<?php echo $i ?>" class="topic" style="" onclick="topicSel(<?php echo $i ?>,'78')"><?php echo $i; echo ". "; echo $row['Topic']; ?></div>
							<div id="Tex78<?php echo $i ?>" class="content" style="" onclick="contentSel(<?php echo $i ?>,'78')">
							
							<div style="display:block; margin-bottom:30px;"> <?php echo $row['Text']; ?> </div> <?php
								$path1=$row['File'];
							
							
								if(strlen($path1)!=0){
								?>
								File: <a href="<?php echo $path1; ?>" class="studyFile" download><?php echo $path1; ?></a>
							
								<?php
								}
								?>
							
							</div>
							</div>
							<?php
							if(isset($_POST['deletek'.$i])){
								dele($row['Topic']);
							}
							$i++;
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
								<li id="pageButton78<?php echo $i ?>" onclick="pageButtonClick(<?php echo $i ?>,<?php echo $j ?>,78)"><?php echo $i ?></li>
								<script>$(".page78"+<?php echo $i ?>).hide(); </script> 
								<?php
							}
						}
					?>
					</ul>
					</div>
					</div>
						
					
					
					<?php
				}
				mysql_close($data_handle);
			}
			
			?>
			
			
			<script src="hack.js"></script>
			
			<script>
						$(".content").hide();
						$("#s56semNews").hide();
						$("#s78semNews").hide();
			</script>
		
		<!--PHP ends -->
	
	
		<hr style="color:#e5e5e0; width:1200px; margin-top:30px; margin-bottom:20px;"></hr>
		<div id="new">
			<h1 style="font-family:Calibri; text-align:center; margin-top:40px; margin-bottom:2px;">UPLOAD STUDY MATERIALS</h1><hr style="color:black; width:330px; margin-top:-1px;"></hr>
			<form method="POST" name="new" enctype="multipart/form-data">
			
				<input type="text" style="margin-top:30px;" id="newsTopic" name="newsTopic" placeholder="Topic" />
				
				<input type="text" id="newsSemester" name="newsSemester" placeholder="Semester:1/2/3/4/5/6/7/8" />
				<input style="margin-left:367px; margin-bottom:17px;" type="file" name="upload" value="upload"/>
				<textarea type="text" id="newsText" placeholder="Enter details of study material" name="newsText"></textarea>
				<input name="newsButton" type="submit" value="submit" id="newsButton" />
				
				
				<!--PHP for news submission-->
				<?php

					?> <?php include 'data.php'; ?> <?php
					
					
					
					$data_handle=mysql_connect($server,$username,$password);
					$db_con=mysql_select_db($database,$data_handle);
					if(isset($_POST['newsButton']))
					{
						
						if(isset($_SESSION['login'])){
						if($_SESSION['login']=='1'){
							$topic=$_POST['newsTopic'];
							$sem=$_POST['newsSemester'];
							$text=$_POST['newsText'];
							$file1=$_FILES["upload"]["tmp_name"];
							$file2=$_FILES["upload"]["name"];
							if($db_con)
							{
								if(is_uploaded_file($file1)){$insert="INSERT INTO studymaterials(Topic,Text,File,Sem) VALUES('$topic','$text','$file2','$sem')";}
								else{$insert="INSERT INTO studymaterials(Topic,Text,Sem) VALUES('$topic','$text','$sem')";}
								$res=mysql_query($insert);
								if(is_uploaded_file($file1)){move_uploaded_file($file1,$file2);}
								if($res){
									?>
									<script>
										$("#dia").fadeIn(1000);
										$("#dia").fadeOut(4000);
									</script>
									<?php
								}
							}
						}
						else if($_SESSION['login']=='2'){
							?>
								<script>
									document.getElementById('dia').innerHTML="Oops!Not allowed!";
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
				
				
				<?php 
					
					function dele($x)
					{
						?> <?php include 'data.php'; ?> <?php
						
						
						
						$data_handle=mysql_connect($server,$username,$password);
						$db_con=mysql_select_db($database,$data_handle);
						if($db_con)
							{
								$del=mysql_query("SELECT File FROM studymaterials WHERE Topic='".$x."'");
								$element= mysql_fetch_assoc($del);
								$path=$element['File'];
								if($path!=null)
								unlink($path);
								$deles=mysql_query("DELETE FROM studymaterials WHERE Topic='".$x."'");
									
									if($deles){
										echo "DEleted";
									}
									else
										echo "not deleted";
							}
					}
					?>
				<!-- PHP ends-->
				
				
				<hr style="color:#e5e5e0; width:1200px; margin-top:30px; margin-bottom:20px;"></hr>
			</form>
		</div>
		
		</div>
			<?php include 'commonLayout.php';?>
			<?php 
			if(isset($_SESSION['login'])){ 
					if($_SESSION['login']!='1'){ ?> <script> $(".delt").hide(); </script> <?php }
					if($_SESSION['login']=='1' || $_SESSION['login']=='2'){ ?> <script> $("#login").hide(); $("#logout").show(); </script> <?php }
			}
			else{ 
				?> <script> $(".delt").hide(); $("#logout").hide();</script> <?php 
			}
			?>
			
	</body>
</html>