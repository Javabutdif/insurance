<?php
	session_start();
	error_reporting(0);
	
?>
<!doctype html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<head>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<link rel="stylesheet" href="/css/style.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<style>
		.divider:after,
.divider:before {
content: "";
flex: 1;
height: 1px;
background: #eee;
}
.h-custom {
height: calc(100% - 73px);
}
@media (max-width: 450px) {
.h-custom {
height: 100%;
}
}
		</style>
	</head>
	
	<body>
	<h1 style="color: black; text-align:center"> 
		Insurance System
	</h1>
	<section class="vh-100" >
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
    
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">

        <form action="Login.php" method="GET">
        

          

          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="text" id="form3Example3" class="form-control form-control-lg"
              placeholder="Enter a valid email address" name="email" required />
            <label class="form-label" for="form3Example3">Email</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <input type="password" id="form3Example4" class="form-control form-control-lg"
              placeholder="Enter password" name="password" required />
            <label class="form-label" for="form3Example4">Password</label>
          </div>

          <div class="d-flex justify-content-between align-items-center">
            <!-- Checkbox -->
            <div class="form-check mb-0">
              <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
              <label class="form-check-label" for="form2Example3">
                Remember me
              </label>
            </div>
            <a href="#!" class="text-body">Forgot password?</a>
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" class="btn btn-primary btn-lg" name="submit"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="Register.php"
                class="link-danger">Register</a></p>
          </div>

        </form>
      </div>
    </div>
  </div>
  <div
    class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
    <!-- Copyright -->
    <div class="text-white mb-3 mb-md-0">
      Copyright © 2020. All rights reserved.
    </div>
    <!-- Copyright -->

    <!-- Right -->
  
</section>
	

	
	
	

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>

	
</html>





<?php

	

	

	if(isset($_GET["submit"])){
		$email = $_GET["email"];
		$password = $_GET["password"];

		
		

		$con = mysqli_connect('localhost', 'root', '', 'insurance');

		$sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password' AND role = 'Administrator'";
		$result = mysqli_query($con, $sql);
        $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
		
		if($user["email"] != null){
			

			$_SESSION['name'] =  $user["firstName"]." ".$user["lastName"];
			

			$_SESSION['contact'] = $user["contact"];

			$_SESSION['email'] = $user["email"];
			
		
			header("Location: Admin.php");	
		}
		else
		{
            $sql1 = "SELECT * FROM user WHERE email = '$email' AND password = '$password' AND role = 'Policy Holder'";
		    $result = mysqli_query($con, $sql1);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            
            if($user["email"] != null){
			

                $_SESSION['name'] =  $user["firstName"]." ".$user["lastName"];
                
    
                $_SESSION['contact'] = $user["contact"];
    
                $_SESSION['email'] = $user["email"];
                
            
                header("Location: User.php");	
            }
            else{


			echo '<script>Swal.fire({
				icon: "error",
				title: "Oops...",
				text: "Incorret ID Number and Password!",
				
			  });</script>'; 

            }
		}
	}
		



?>


