 <?php
					if (isset ($_POST['email'])&&isset ($_POST['password']))
					{
                        //echo 'ok';
                        require 'connect.inc.php';

						$email=$_POST['email'];
						$password=$_POST['password'];
						
						if(!empty($email)&&!empty($password))
						{
							$login_query="SELECT * FROM `users` WHERE `email`='$email' AND `password`='$password' ";
							
							if($login_query_run=mysqli_query($connect,$login_query))
							{
								$rows=mysqli_num_rows($login_query_run);
								if($rows==0)
								{
									echo '<div class="message">Enter valid username and password combination</div>';
								}
								else if($rows==1)
								{
									
									//$user_id=mysql_result($login_query_run,0,'id');
									while($row = mysqli_fetch_assoc($login_query_run)) 
									{
										$id=$row['user_id'];
									   $name=$row['name'];
									   $email=$row['email'];
									   $city=$row['city'];
									   
                                       $phone_no=$row['phone_no'];
                                       $no_of_rooms=$row['no_of_rooms'];
                                       session_start();
					                    ob_start();
									   $_SESSION['name']=$name;
									$_SESSION['email']=$email;
									$_SESSION['city']=$city;
									$_SESSION['user_id']=$id;
									$_SESSION['phone_no']=$phone_no;
                                    $_SESSION['no_of_rooms']=$no_of_rooms;
									}
									
									
									
									/*echo 'session set';
									echo $user_id;*/
									//header('Location:loggedin_inc.php');
									if(isset ($_SESSION['name'])&& !empty($_SESSION['name'])&& isset ($_SESSION['email'])&& !empty($_SESSION['email']))
									{
										
										header('Location:rooms.php');	
										
									}
									else
									{
										echo 'Not logged in';
									}
								}
							}
							else
							{
									echo 'query not run';
							}
							
							
						}
						else
						{
							echo '<div class="message">Enter username and password </div><br>';
						}
					}
					
					?>  
 