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
  </style>
</head>

<body>
<?php
require 'connect.inc.php';
session_start();
ob_start();
				$id = mysqli_real_escape_string($connect,$_GET['id']);

                $name = mysqli_real_escape_string($connect,$_GET['name']);

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
            <a class="nav-link" href="#" target="_blank">Pick appliances</a>
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
                <form name="" action=<?php echo'"appdb.php?id='.$id.'&name='.$name.'"'?> method="post"> 
                  <!-- Heading -->
                  <div class="row">
                  <h3 class="dark-grey-text text-center">
                    <strong>Pick appliances</strong>
                  </h3>
                  <hr>
                  <div class="col 6">
                 
                  <!-- Default inline 1-->
<div class="custom-control custom-checkbox custom-control-inline">
  <input type="checkbox" name="applist[]" value="100w_light_bulb"class="custom-control-input" id="defaultInline1">
  <label class="custom-control-label" for="defaultInline1">100W light bulb (Incandescent)
</label>
</div>
<div class="md-form">
                    <i class="fas fa-key-alt prefix grey-text"></i>
                    <input type="number" id="form8" name="100w_light_bulb"class="md-textarea"></textarea>
                    <label for="form8">Quantity</label>
                  </div>
<!-- Default inline 2-->
<div class="custom-control custom-checkbox custom-control-inline">
  <input type="checkbox" name="applist[]" value="tv"class="custom-control-input" id="defaultInline2">
  <label class="custom-control-label" for="defaultInline2">32-48 Inch LED TV 
</label>
</div>
<div class="md-form">
                    <i class="fas fa-key-alt prefix grey-text"></i>
                    <input type="number" id="form8" name="tv"class="md-textarea"></textarea>
                    <label for="form8">Quantity</label>
                  </div>
<!-- Default inline 3-->
<div class="custom-control custom-checkbox custom-control-inline">
  <input type="checkbox" name="applist[]" value="kettle"class="custom-control-input" id="defaultInline3">
  <label class="custom-control-label" for="defaultInline3">Electric Kettle
</label>
</div>

<div class="md-form">
                    <i class="fas fa-key-alt prefix grey-text"></i>
                    <input type="number" id="form8" name="kettle"class="md-textarea"></textarea>
                    <label for="form8">Quantity</label>
                  </div>
                 
<div class="custom-control custom-checkbox custom-control-inline">
  <input type="checkbox" name="applist[]" value="dvd"class="custom-control-input" id="defaultInline4">
  <label class="custom-control-label" for="defaultInline4">DVD Player

</label>
</div>
<div class="md-form">
                    <i class="fas fa-key-alt prefix grey-text"></i>
                    <input type="number" id="form8" name="dvd"class="md-textarea"></textarea>
                    <label for="form8">Quantity</label>
                  </div>
<!-- Default inline 2-->
<div class="custom-control custom-checkbox custom-control-inline">
  <input type="checkbox" name="applist[]" value="fridge"class="custom-control-input" id="defaultInline5">
  <label class="custom-control-label" for="defaultInline5">Refrigerator

</label>
</div>
<div class="md-form">
                    <i class="fas fa-key-alt prefix grey-text"></i>
                    <input type="number" id="form8" name="fridge"class="md-textarea"></textarea>
                    <label for="form8">Quantity</label>
                  </div>
                  </div>
                  <div class="col 6">
<!-- Default inline 3-->
<div class="custom-control custom-checkbox custom-control-inline">
  <input type="checkbox" name="applist[]" value="ac"class="custom-control-input" id="defaultInline6">
  <label class="custom-control-label" for="defaultInline6">Home Air Conditioner
</label>
</div>
<div class="md-form">
                    <i class="fas fa-key-alt prefix grey-text"></i>
                    <input type="number" id="form8" name="ac"class="md-textarea"></textarea>
                    <label for="form8">Quantity</label>
                  </div>
<div class="custom-control custom-checkbox custom-control-inline">
  <input type="checkbox" name="applist[]" value="microwave"class="custom-control-input" id="defaultInline7">
  <label class="custom-control-label" for="defaultInline7">Microwave

</label>
</div>
<div class="md-form">
                    <i class="fas fa-key-alt prefix grey-text"></i>
                    <input type="number" id="form8" name="microwave"class="md-textarea"></textarea>
                    <label for="form8">Quantity</label>
                  </div>
<!-- Default inline 2-->
<div class="custom-control custom-checkbox custom-control-inline">
  <input type="checkbox" name="applist[]" value="washing_machine"class="custom-control-input" id="defaultInline8">
  <label class="custom-control-label" for="defaultInline8">Washing Machine
</label>
</div>
<div class="md-form">
                    <i class="fas fa-key-alt prefix grey-text"></i>
                    <input type="number" id="form8" name="washing_machine"class="md-textarea"></textarea>
                    <label for="form8">Quantity</label>
                  </div>

<!-- Default inline 3-->
<div class="custom-control custom-checkbox custom-control-inline">
  <input type="checkbox" name="applist[]" value="geyser"class="custom-control-input" id="defaultInline9">
  <label class="custom-control-label" for="defaultInline9">Hot Water Dispenser
</label>
</div>



                  <div class="md-form">
                    <i class="fas fa-key-alt prefix grey-text"></i>
                    <input type="number" id="form8" name="geyser"class="md-textarea"></textarea>
                    <label for="form8">Quantity</label>
                  </div>
</div>
</div>
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
