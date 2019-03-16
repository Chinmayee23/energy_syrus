 <?php
require 'connect.inc.php';
session_start();
ob_start();

if(isset($_POST['rname']))
{
	$id=$_SESSION['user_id'];

	$name=$_POST['rname'];

	if(!empty($name))
	{	
					$signup_query = "INSERT INTO rooms (`room_name`,`user_id`) VALUES ('$name','$id')";
					if(!mysqli_query($connect,$signup_query))
					{
						//echo 'not inseted';
					}
					else
					{
					//echo 'inserted';
					//session_start();
					//ob_start();
					//$_SESSION['name']=$name;
					//$_SESSION['email']=$email;
					//Not be written
					/*echo 'session set';
					echo $user_id;*/
					//header('Location:loggedin_inc.php');
					
					
					
					header('Location:rooms.php');
					
				
					}
		
		
		
	}
	else
	{
		echo "<div class='message'><br>Fill all fields.</div></div></div></div>";
	}
	
}
//else{echo "nooo";}
	
//header("refresh:0;url=signuptemp.php");	
?>