		
		
		<div id="login1">LOGIN<hr style="color:#e5e5e0; width:70px; margin-top:-1px;"></hr>
		<table>
			<form method="POST" name="logs">
			
			
			<!-- PHP for login -->
			<?php

			?> <?php include 'data.php'; ?> <?php
			
			
			
			$use='g';
			$uerSuc=0;
			$passSuc=0;
			$key="Keys";
		
			
			if(isset($_POST['loginButton']))
			{
				$user=$_POST['Username'];
				$pas=$_POST['Password'];
	
				$data_handle=mysql_connect($server,$username,$password);
				$db_con=mysql_select_db($database,$data_handle);
				if($db_con)
				{
				
					$insert="SELECT * FROM login";
					$res=mysql_query($insert);
					while($arr=mysql_fetch_assoc($res))
					{
						
						
						if($user===$arr['Username'])
						{ 
							$enc="SELECT Password FROM login WHERE Username='".$user."'";
							$encryp=mysql_query($enc); //remember this always!
							$encrypt=mysql_fetch_assoc($encryp);
							$encrypted= $encrypt['Password'];
							//decryption
							
							$data = base64_decode($encrypted);
							$iv = substr($data, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC));

							$decrypted = rtrim(
							mcrypt_decrypt(
							MCRYPT_RIJNDAEL_128,
							hash('sha256', $key, true),
							substr($data, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC)),
							MCRYPT_MODE_CBC,
							$iv
							),
							"\0"
							); 
							
							$userSuc=1;
							if($pas==$decrypted){
							
								$passSuc=1;
								if($arr['Username']=="Students_DSCE"){
									$use='s';
									$_SESSION['login']='2';
								}
								else{
									$use='t';
									$_SESSION['login']='1';
								}
								
								
								//echo '<script>alert("Login successfull Teacher");</script>';
							}	
						}
					}
					
				}
				mysql_close($data_handle);
				?>
					<script>
						var Ele=document.getElementById("dia");
						<?php
						if($use=="s"){
							?>
							Ele.innerHTML="Login Successful Student";
							<?php
						}
						else if($use=="t"){
							?>
							$(".del").show();
							Ele.innerHTML="Login Successful Teacher";
							<?php
						}
						else{
							?>
							Ele.innerHTML="Login UnSuccessful";
							<?php
						}
						?>
						$("#dia").fadeIn(1000);
						$("#dia").fadeOut(4000);
					</script>
					
				<?php
				//echo '<script>alert(document.getElementById("dia").innerHTML);</script>';
					
			}
			
			?>
			
			<!--PHP ends -->
			
			
			<div id="log">
			<input type="text" name="Username" placeholder="Username" class="use"/><br>
			<input type="password" name="Password" placeholder="Password" class="pass"/><br>
			<input type="submit" name="loginButton" value="Login" class="login2" onclick="crossed()"/>
			</div>
			</form>
			</table>
		</div>