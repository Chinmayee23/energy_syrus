<?php
require 'connect.inc.php';
session_start();
ob_start();

$room_id = mysqli_real_escape_string($connect,$_GET['id']);

$name = mysqli_real_escape_string($connect,$_GET['name']);

$user_id=$_SESSION['user_id'];
$list=array("100w_light_bulb","tv","kettle","dvd","fridge","ac","microwave","washing_machine","geyser");
foreach($_POST['applist'] as $selected) {
    for($j=0;$j<count($list);$j++){
    if($selected==$list[$j]&&$_POST[$selected]>0){
        for($i=0;$i<$_POST[$selected];$i++){
        $app_query = "INSERT INTO appliances (`appliance_name`,`room_id`,`user_id`) VALUES ('$selected','$room_id','$user_id')";
        if(!mysqli_query($connect,$app_query))
        {
            echo 'appliance not inserted';
        }}
    }}
}
header('Location:appliances.php?id='.$id.'&name='.$name.'');

?>