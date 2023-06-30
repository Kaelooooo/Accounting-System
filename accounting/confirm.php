<?php
include('controller/database.php');



$email = $_GET['email'];
$name  = $_GET['name'];

$mysqli->query("UPDATE pos_customer set is_active = 1 where email='$email'");

?>

<html lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>DACI</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicons/favicon.png">
    <link rel="manifest" href="assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="assets/css/theme.css" rel="stylesheet" />
	<body>

  <main>
    <div class="">

        <div class="">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-4 justify-content-center">

              <div class="d-flex justify-content-center py-4">
               <img src="assets/img/blue 2.png" width="200px">
              </div><!-- End Logo -->

              <div class="card">

                <div class="card-body">
				<center>
					<br><br>
					Your Account is confirmed!
					<br>
					<br>
					Login using your account details!
					<br>
					<br>
					
					Thank You!
					
					<br>
					<br>
					<a href="login.php"> LOGIN </a>
					<br>

                </div>
              </div>

             

            </div>
          </div>
        </div>


    </div>
  </main><!-- End #main -->

</body>

</html>