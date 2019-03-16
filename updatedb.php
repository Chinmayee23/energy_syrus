<?php
require 'connect.inc.php';
session_start();
ob_start();
//date_default_timezone_set('Asia/Kolkata');

$id = mysqli_real_escape_string($connect,$_GET['id']);
$name = mysqli_real_escape_string($connect,$_GET['name']);

$user_id=$_SESSION['user_id'];
$_SESSION['current_usage'][]=$_POST['usagelist'];
$t=time();

                            $date = date('Y-m-d H:i:s',$t);
    $update_query2="SELECT * FROM `appliances` WHERE `user_id`='$user_id'  AND `room_id`='$id' ";
    if($update_query_run2=mysqli_query($connect,$update_query2))
							{
								$rows=mysqli_num_rows($update_query_run2);
								if($rows==0)
								{
									echo '<div class="message">Please choose the availability of appliances first!!!!!!!!!</div>';
								}
								else 
								{

									$i=1;
									//$user_id=mysql_result($login_query_run,0,'id');
									while($row2 = mysqli_fetch_assoc($update_query_run2)) 
									{
                                        $appliance_id=$row2['appliance_id'];
                                        $appliance_name=$row2['appliance_name'];

                                        $update_query="SELECT * FROM `entries` WHERE `appliance_id`='$appliance_id' ORDER BY `entry_id` DESC LIMIT 1
                                        ";
                                        if($update_query_run=mysqli_query($connect,$update_query))
                                                                {
                                                                    $rows=mysqli_num_rows($update_query_run);
                                                                    if($rows==0)
                                                                    {
                                                                        echo '<div class="message">Please choose the availability of appliances first.</div>';
                                                                        if($appliance_id==$selected) {
                                                                            echo '<br/>inside 1st if <brr/>'.$selected.'<br/>';
                                                                        
                                                                            echo "1st if";
                                                                            $app_query = "INSERT INTO entries (`appliance_id`,`user_id`,`timestamp`) VALUES ('$selected','$user_id','$date')";
                                                                            if(!mysqli_query($connect,$app_query))
                                                                            {
                                                                                echo 'data not updated';
                                                                            }
                                                                        
                                                                        }
                                                                    }
                                                                    else 
                                                                    {
                                                                        $row = mysqli_fetch_assoc($update_query_run);
                                                                         $duration=$row['duration'];
                                                                         $timestamp=$row['timestamp'];
                                        echo $duration;
                                        echo $appliance_id;
                                        echo $timestamp;

foreach($_POST['usagelist'] as $selected){
    echo $selected;
    global $duration;
    global $timestamp;

if($appliance_id==$selected) {
    echo '<br/>inside 1st if <brr/>'.$selected.'<br/>';

    echo "1st if";
    $app_query = "INSERT INTO entries (`appliance_id`,`user_id`,`timestamp`) VALUES ('$selected','$user_id','$date')";
    if(!mysqli_query($connect,$app_query))
    {
        echo 'data not updated';
    }

}

if($appliance_id!=$selected){
    echo "2nd if";

    if(!empty($timestamp)&&$duration==0){
        echo $date;
        echo $timestamp;
        $diff = (strtotime($date)-strtotime($timestamp));

        $update_query3="SELECT * FROM `power_consumption` WHERE `appliance_name`='$appliance_name'  ";
                                        $update_query_run3=mysqli_query($connect,$update_query3);
                                        $row3 = mysqli_fetch_assoc($update_query_run3);
                                        $power=$row3['power_per_hr'];
                                        echo 'power'.$power.'<br/>';
                                        $econs=($power*$diff)/3600;

                                        
        echo 'difference'.$diff.'<br/>';
        echo 'consumption'.$econs.'<br/>';

        $update_query4="SELECT * FROM `users` WHERE `user_id`='$user_id'  ";
        $update_query_run4=mysqli_query($connect,$update_query4);
        $row4 = mysqli_fetch_assoc($update_query_run4);
        $city=$row4['city'];

        if($city=='mumbai'){
            $kw=$econs/1000;

            if($kw>0&&$kw<=100){
                $bill=$kw*4.5;
            }else if($kw>=101&&$kw<=300){
                $bill=$kw*7.23;

            }
           else if($kw>=301&&$kw<=500){
                $bill=$kw*9.29;

            }else if($kw>500){
                $bill=$kw*11.14;

            }


        }

        echo 'bill'.$bill.'<br/>';





        $app_query = "update  `entries` set  `duration`='$diff',`timestamp`='$date',`power_consumed`='$econs',`bill_estd`='$bill' where `appliance_id`='$appliance_id' AND `user_id`='$user_id' AND `duration`=0";
                                 if(!mysqli_query($connect,$app_query))
                                 {
                                    echo 'data not updated';
                                 }


    }


}
}
                                    }}}}}

// $update_query="SELECT * FROM `entries` WHERE `user_id`='$user_id'  ORDER BY `user_id` DESC ";
//                         if($update_query_run=mysqli_query($connect,$update_query))
// 							{
// 								$rows=mysqli_num_rows($update_query_run);
// 								if($rows==0)
// 								{
// 									echo '<div class="message">Please choose the availability of appliances first.</div>';
// 								}
// 								else 
// 								{

//                                     $appidarr = Array();
// 									$i=1;
// 									//$user_id=mysql_result($login_query_run,0,'id');
// 									while($row = mysqli_fetch_assoc($update_query_run)) 
// 									{
//                     $arr[]=$row;
//                                                         }   $result=array_diff($arr['appliance_id'],(array)$_POST['usagelist']);
//                                                         for($i=0;$i<$rows;$i++){
//                                                             echo "'.$result[$i].'";
//                                                         }
// echo $arr;
//                         for($i=0;$i<$rows;$i++) {
//                         if($arr[$i]['duration']==0){
//                             $t=time();

//                             $date = date('Y-m-d H:i:s',$t);
//                             //$interval = $timestamp[$i]->diff($date);
//                             echo "one'.$date.'";
//                             echo "two'.$arr[$i]['timestamp'].'";
//                             $duration = (($timestamp[$i] - $date)/60);


//                          $app_query = "INSERT INTO entries (`appliance_id`,`user_id`,`duration`) VALUES ('$result[$i]','$user_id','$duration')";
//                          if(!mysqli_query($connect,$app_query))
//                          {
//                             echo 'data not updated';
//                          }
//                     }
//                     }
                    header('Location:update.php?id='.$id.'&name='.$name.'');
//                     }}
                




?>