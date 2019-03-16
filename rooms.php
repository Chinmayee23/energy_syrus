<html>
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
  </style>
</head>
<body>
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
              
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="rooms.php">Enter details
              
            </a>
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
    <div class="mask  d-flex justify-content-center align-items-center">

      <!-- Content -->
      <div class="container">

        <!--Grid row-->
        <div class="row wow fadeIn">

          <!--Grid column-->
          <div class="col-md-0 mb-4 white-text text-center text-md-left">

           <!-- <h1 class="display-4 font-weight-bold">Learn Bootstrap 4 with MDB</h1>-->

            <hr class="hr-light">
            </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-md-0 col-xl-0 mb-4">

          <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>

<!-- Grid column -->
<div class="col-md-12">
<br/>
            
  <!-- Card columns -->
  <div class="card-columns">
<?php 
require 'connect.inc.php';
session_start();
ob_start();
$nr=$_SESSION['no_of_rooms'];
$id=$_SESSION['user_id'];
$rooms_query="SELECT * FROM `rooms` WHERE `user_id`='$id' ";
if($rooms_query_run=mysqli_query($connect,$rooms_query))
							{
								$rows=mysqli_num_rows($rooms_query_run);
								if($rows<$nr){
                                    for($i=0;$i<$nr-$rows;$i++){
                                       echo '                 <form name="" action="roomdb.php" method="post"> 
                                       <div class="d-flex align-content-between flex-wrap"><input type="text" id="form8" placeholder="Enter name of room '.($i+1).'" name="rname"class="md-textarea"></input></div>
                                       <div class="text-center">
                    <button class="btn btn-indigo">Submit</button></div></form>
                    <hr>';



                                    }
                                }
                            }





    while($row = mysqli_fetch_assoc($rooms_query_run)) 
    {
    echo'
    
    <!-- Card -->

    <div class="card shadow mb-4">

      <!-- Card img -->
      <img class="card-img" src="bedroom.jpg" alt="Card image">

      <!-- Card img-overlay -->
      <div class="card-img-overlay p-3 text-white" style="background-color:rgba(0,0,0,.45)">


        <!-- Title -->
        <h4 style="font-size:40px;" class="card-title">'.$row['room_name'].'</h4>

       

       

        <!-- Link -->
        <a href="roomchooseaction.php?name='.$row['room_name'].'&id='.$row['room_id'].'" style="font-family:Arial; font-size:30px; color:black; text-decoration:none;" class="card-link">
          Pick appliances
          <i class="mi mi-ChevronRight"></i>
        </a>

      </div>
      <!-- Card img-overlay -->

    </div>
    <!-- Card -->';}
?>
  

  </div>
  <!-- Card columns -->

</div>
<!-- Grid column -->

</div>
          </div>
          <!--Grid column-->

        </div>
        <!--Grid row-->

      </div>
      <!-- Content -->

    </div>
    <!-- Mask & flexbox options-->

  </div>
  <!-- Full Page Intro 
                    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  Bootstrap tooltips -->
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