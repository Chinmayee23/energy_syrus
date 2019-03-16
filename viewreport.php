<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Energy consumption evaluation</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.min.css" rel="stylesheet">
  <style type="text/css">
    html,
    body,
    header,
    .view {
      height: 100%;
    }

    @media (max-width: 740px) {
      html,
      body,
      header,
      .view {
        height: 1000px;
      }
    }

    @media (min-width: 800px) and (max-width: 850px) {
      html,
      body,
      header,
      .view {
        height: 650px;
      }
    }
    @media (min-width: 800px) and (max-width: 850px) {
              .navbar:not(.top-nav-collapse) {
                  background: #1C2331!important;
              }
          }
          .container{
            height: 100%;
  overflow-y: scroll;
          }
  </style>
</head>

<body>
<?php
require 'connect.inc.php';
session_start();
ob_start();
			

?>
  <!-- Navbar -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
    <div class="container">

      <!-- Brand -->
      <a class="navbar-brand" href="#" target="_blank">
        <strong></strong>
      </a>

      <!-- Collapse -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Links -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <!-- Left -->
        <ul class="navbar-nav mr-auto">
          <li class="nav-item ">
            <a class="nav-link" href="home.php">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
         
          
          <li class="nav-item ">
            <a class="nav-link" href="rooms.php" target="_blank">Enter details</a>
          </li>
          
          <li class="nav-item active">
            <a class="nav-link" href="viewreport.php" target="_blank">View energy consumption report</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php" target="_blank">Logout</a>
          </li>
        </ul>

        <!-- Right -->
       

      </div>

    </div>
  </nav>
  <!-- Navbar -->

  <!-- Full Page Intro -->
  <div class="view full-page-intro" style="background-image: url('bg.jpg'); background-repeat: no-repeat; background-size: cover;">

    <!-- Mask & flexbox options-->
    <div class="mask rgba-black-light d-flex justify-content-center align-items-center">

      <!-- Content -->
      <div class="container">

        <!--Grid row-->
        <div class="row wow fadeIn">

          <!--Grid column-->
          <div class="col-md-0 mb-12 white-text text-center text-md-left">


           <!-- <h1 class="display-4 font-weight-bold">Learn Bootstrap 4 with MDB</h1>-->

            <hr class="hr-light">

            <p>
            <!--  <strong>Best & free guide of responsive web design</strong>-->
            </p>

            <p class="mb-4 d-none d-md-block">
             <!--<strong>The most comprehensive tutorial for the Bootstrap 4. Loved by over 500 000 users. Video and written versions
                available. Create your own, stunning website.</strong>-->
            </p>

          <!--  <a target="_blank" href="https://mdbootstrap.com/education/bootstrap/" class="btn btn-indigo btn-lg">Start free tutorial
              <i class="fas fa-graduation-cap ml-2"></i>
            </a>-->

          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-md-12 col-xl-12 mb-12">

            <!--Card-->
            <br/>
            <br/>
            <div class="card">

              <!--Card content-->
              <div class="card-body">

                <!-- Form -->
                  <!-- Heading -->
                  <div class="row">
                  <h3 class="dark-grey-text text-center">
                    <strong>Overall energy consumption:  &nbsp;</strong>
                    <?php
                    require 'connect.inc.php';
                
                    $user_id=$_SESSION['user_id'];
                     $update_query4="SELECT SUM(`power_consumed`) AS `value_sum` FROM `entries` where `user_id`='$user_id' ";
                     $update_query_run4=mysqli_query($connect,$update_query4);
                     $row4 = mysqli_fetch_assoc($update_query_run4);
                     $sum=$row4['value_sum'];

                     $update_query7="SELECT SUM(`bill_estd`) AS `value_sum` FROM `entries` where `user_id`='$user_id' ";
                     $update_query_run7=mysqli_query($connect,$update_query7);
                     $row7 = mysqli_fetch_assoc($update_query_run7);
                     $billtot=$row7['value_sum'];

                     $update_query8="SELECT `bill_limit`  FROM `users` where `user_id`='$user_id' ";
                     $update_query_run8=mysqli_query($connect,$update_query8);
                     $row8 = mysqli_fetch_assoc($update_query_run8);
                     $limit=$row8['bill_limit'];

                     $p=($billtot*100)/$limit;
                     
                     if($billtot>$limit){
                      echo '<h5 style="background-color:#ef9a9a;">Bill limit exceeded!  Total power consumption: '.round($sum).'W <br/>  Estimated bill: '.round($billtot).' </h5>';

                     }

                     else if($p>=0&&$p<=35){
                      echo '<h5 style="background-color:#a5d6a7;">Total power consumption: '.round($sum).'W <br/>  Estimated bill: '.round($billtot).' <br/> You are '.(100-round($p)).'% away from reaching your bill limit. </h5>';

                     }else if($p>35&&$p<=70){
                      echo '<h5 style="background-color:#e6ee9c ">Total power consumption: '.round($sum).'W <br/>  Estimated bill: '.round($billtot).' <br/> You are '.(100-round($p)).'% away from reaching your bill limit.</h5>';

                     }
                     else if($p>70&&$p<=100){
                      echo '<h5 style="background-color:#ef9a9a">Total power consumption: '.round($sum).'W <br/>  Estimated bill: '.round($billtot).' <br/> You are '.(100-round($p)).'% away from reaching your bill limit.</h5>';

                     }
                     echo '<form action="forecast.php">
                      <input type="submit" class="btn btn-deep-purple" value="Forecast energy consumption" />
                  </form>';




                    ?>
                  </h3>
                  <hr>
        </div>
        <div class="row">
                  <div class="col 6">
                      <?php 
                      
                      $update_query="SELECT * FROM `entries` WHERE `user_id`='$user_id'  ";
                                        if($update_query_run=mysqli_query($connect,$update_query))
                                                                {
                                                                    $rows=mysqli_num_rows($update_query_run);
                                                                    if($rows==0)
                                                                    {
                                                                        echo '<div class="message">Please choose the availability of appliances first.</div>';
                                                                    }
                                                                    else 
                                                                    {
                                                                        while($row = mysqli_fetch_assoc($update_query_run) ){
                                                                            if(!empty($row['duration'])&&$row['duration']!=0){
                                                                                $duration=$row['duration'];
                                                                                $appliance_id=$row['appliance_id'];
                                                                                $econs=$row['power_consumed'];
                                                                                $timestamp=$row['timestamp'];
                                                                                $bill=$row['bill_estd'];



                                                                             

                                     

                                      $update_query5="SELECT * FROM `appliances` WHERE `user_id`='$user_id' AND `appliance_id`='$appliance_id' ";
                                      $update_query_run5=mysqli_query($connect,$update_query5);
                                      $row5 = mysqli_fetch_assoc($update_query_run5);
                                      $appliance_name=$row5['appliance_name'];
                                      $room_id=$row5['room_id'];

                                      $update_query6="SELECT * FROM `rooms` WHERE `room_id`='$room_id' AND `user_id`='$user_id' ";
                                      $update_query_run6=mysqli_query($connect,$update_query6);
                                      $row6 = mysqli_fetch_assoc($update_query_run6);
                                      $room_name=$row6['room_name'];

                                      $percent=($econs*100)/$sum;





                                        echo '<div class="card">Room: '.$room_name.'  Appliance: '.$appliance_name.' Date and time: '.$timestamp.'<br/>Power consumption: '.$econs.'W<br/>';

                                        echo 'Percentage of consumption: '.$percent.'</div><br/> Cost: '.$bill.'<br/>';

                                       echo ' <div class="progress">
  <div class="progress-bar" role="progressbar" style="width:'.$percent.'%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>';
                                    }}}}







                                                                            


                                                                        
                                                                    

                                                                        

                      
                      
                      ?>
                 
                  <!-- Default inline 1-->

                <!-- Form -->

              </div>

            </div>
            <!--/.Card-->

          </div>
          <!--Grid column-->

        </div>
        <!--Grid row-->

      </div>
      <!-- Content -->

    </div>
    <!-- Mask & flexbox options-->

  </div>
  <!-- Full Page Intro -->
 
  <!--Footer-->
 
  <!--/.Footer-->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Initializations -->
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();
  </script>
</body>

</html>
