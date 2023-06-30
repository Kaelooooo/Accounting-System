<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>DACI</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <?php include("controller/register.php");?>
  <!-- Favicons -->
  <link rel="icon" href="assets/img/favicon 3.png">
  <link href="assets/img/logo.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">


<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                  <img src="page/front/img/logo.png" width="250px" alt="">
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">
					
                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                    <p class="text-center small">Enter your personal details to create account</p>
                  </div>

                  <form class="row g-3 needs-validation" method="POST"  >
                    <div class="col-12">
                      <label for="yourName" class="form-label">First Name</label>
                      <input type="text" name="fname" class="form-control" id="yourName" autocomplete="off" required>
                      <div class="invalid-feedback">Please, enter your first name!</div>
                    </div>
					<div class="col-12">
                      <label for="yourName" class="form-label">Last Name</label>
                      <input type="text" name="lname" class="form-control" id="yourName"  autocomplete="off" required>
                      <div class="invalid-feedback">Please, enter your last name!</div>
                    </div>
					
					<div class="col-12">
                      <label for="yourName" class="form-label">Address</label>
                      <input type="text" name="address" class="form-control" id="yourName"  autocomplete="off" required>
                      <div class="invalid-feedback">Please, enter your address!</div>
                    </div>
                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Your Email</label>
                      <input type="email" name="email" class="form-control" id="yourEmail"  autocomplete="off" required>
                      <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                    </div>
					<div class="col-12">
                      <label for="yourMobile" class="form-label">Mobile Number</label>
                      <input type="text" name="contact" class="form-control" id="yourMobile"  autocomplete="off" required>
                      <div class="invalid-feedback">Please enter a Mobile Number!</div>
                    </div>
					
						<div class="col-12">
                      <label for="yourUsername" class="form-label">User Name</label>
                      <input type="text" name="username" class="form-control" id="yourUsername"  autocomplete="off" required>
                      <div class="invalid-feedback">Please enter a User Name!</div>
                    </div>

                    <div class="col-12 pass_show">
                      <label for="yourPassword" class="form-label">Password</label>
					  <div class="input-group mb-3 " >
                        <input type="password" name="password" id="password" class="form-control" id="yourPassword" 
						 pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8}"  maxlength="8" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
						   <span class="input-group-text" onclick="password_show_hide();">
							  <i class="bi bi-eye" id="show_eye"></i>
							  <i class="bi bi-eye-slash d-none" id="hide_eye"></i>
							</span>
						</div>
					   
						
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                  
                    <div class="col-12">
					 
                      <button class="btn btn-primary w-100" type="submit" name="create-account">Create Account</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Already have an account? <a href="login.php">Log in</a></p>
                    </div>
                  </form>

                </div>
              </div>

            
            </div>
          </div>
        </div>

      </section>

    </div>
	
			
  </main><!-- End #main -->


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="page/back/vendor/bootstrap/js/bootstrap.bundle.js"></script>
  <script src="page/back/vendor/php-email-form/validate.js"></script>
  <script src="page/back/vendor/quill/quill.min.js"></script>
  <script src="page/back/vendor/tinymce/tinymce.min.js"></script>
  <script src="page/back/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="page/back/vendor/chart.js/chart.min.js"></script>
  <script src="page/back/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="page/back/vendor/echarts/echarts.min.js"></script>

  <!-- Template Main JS File -->
  <script src="page/back/js/main.js"></script>
  <script>
	 function password_show_hide() {
	  var x = document.getElementById("password");
	  var show_eye = document.getElementById("show_eye");
	  var hide_eye = document.getElementById("hide_eye");
	  hide_eye.classList.remove("d-none");
	  if (x.type === "password") {
		x.type = "text";
		show_eye.style.display = "none";
		hide_eye.style.display = "block";
	  } else {
		x.type = "password";
		show_eye.style.display = "block";
		hide_eye.style.display = "none";
	  }
	}
  </script>
</body>

</html>