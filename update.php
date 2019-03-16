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
  .switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
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
  </style>
</head>

<body>
<?php
require 'connect.inc.php';
session_start();
ob_start();
        $id = mysqli_real_escape_string($connect,$_GET['id']);
        $name = mysqli_real_escape_string($connect,$_GET['name']);

        $duration=0;


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
         
          
          <li class="nav-item">
            <a class="nav-link" href="rooms.php" target="_blank">Enter details</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="#" target="_blank">Update usage</a>
          </li>
         
          <li class="nav-item">
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
                <form name="" action=<?php echo'"updatedb.php?id='.$id.'"'?> method="post"> 
                  <!-- Heading -->
                  <div class="row">
                  <h3 class="dark-grey-text text-center">
                    <strong>Select appliances that are currently in use, unselect once done using.</strong>
                  </h3>
                  <hr>
                  </div>
                  <div class="row">

                  <div class="col 6">
                 
                  <!-- Default inline 1-->
                  <?php $user_id=$_SESSION['user_id'];
                  $_SESSION['current_usage']=array(8);
                        $update_query="SELECT * FROM `appliances` WHERE `user_id`='$user_id' AND `room_id`='$id' ";

                        if($update_query_run=mysqli_query($connect,$update_query))
							{
								$rows=mysqli_num_rows($update_query_run);
								if($rows==0)
								{
									echo '<div class="message">Please choose the availability of appliances first.</div>';
								}
								else 
								{
									$i=1;
									//$user_id=mysql_result($login_query_run,0,'id');
									while($row = mysqli_fetch_assoc($update_query_run)) 
									{
                    $appliance_id=$row['appliance_id'];
                    $update_query2="SELECT * FROM `entries` WHERE `appliance_id`='$appliance_id' AND `user_id`='$user_id'  ";
                    $update_query_run2=mysqli_query($connect,$update_query2);
                   $row2 = mysqli_fetch_assoc($update_query_run2) ;


                    $appliance_name=$row['appliance_name'];
                    $duration=$row2['duration'];

echo'
<div class="custom-control custom-checkbox custom-control-inline">
<input type="checkbox" name="usagelist[]" value="'.$appliance_id.'" class="custom-control-input" 
 checked="checked" 
id="defaultInline'.$i.'">
<label class="custom-control-label" for="defaultInline'.$i.'">'.$appliance_name.' id: '.$appliance_id.'
</label>
'; $i++; }}}
?>
</div>
</div>
<div class="row">
      <div class="text-center">
                    <button class="btn btn-indigo">Submit</button>
                    <hr>
                 
                  </div>

                </form>
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
