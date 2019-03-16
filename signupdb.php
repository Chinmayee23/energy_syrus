 <?php
require 'connect.inc.php';
if(isset($_POST['name'])&&isset($_POST['email'])&&isset($_POST['state'])&&isset($_POST['city'])&&isset($_POST['no_of_rooms'])&&isset($_POST['phone_no'])&&isset($_POST['password']))
{
	
	$name=$_POST['name'];
	$email=$_POST['email'];
	$phone_no=$_POST['phone_no'];
	$password=$_POST['password'];
  $state=$_POST['state'];
  $city=$_POST['city'];
  $bill_limit=$_POST['bill_limit'];

  $no_of_rooms=$_POST['no_of_rooms'];
	if(!empty($name)&&!empty($email)&&!empty($phone_no))
	{	
					$signup_query = "INSERT INTO users (`name`,`email`,`state`,`city`,`phone_no`,`no_of_rooms`,`password`,`bill_limit`) VALUES ('$name','$email','$state','$city','$phone_no','$no_of_rooms','$password','$bill_limit')";
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
					
					
					
					header('Location:home.php');
					
				
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