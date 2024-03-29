<?php 



error_reporting(0);

?>
<!doctype html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<head>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

		<link rel="stylesheet" href="jems/css/style.css">
	
	</head>

	
	<body style="background-color: #eee;">
		
	<form action="Register.php"method="post">
	<section class="vh-100" >
		
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
			  <a class="btn btn-danger" href="Login.php">Back</a>
                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                <form class="mx-1 mx-md-4">

              
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="lName" class="form-control" name="lName" required />
                      <label class="form-label" for="lName">Last Name</label>
                    </div>
                  </div>

				  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="fName" class="form-control" name="fName" required />
                      <label class="form-label" for="fName">First Name</label>
                    </div>
                  </div>

				

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="password" class="form-control" name="password" required />
                      <label class="form-label" for="password">Password</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="form3Example4cd" class="form-control" name="confirmPassword" required />
                      <label class="form-label" for="form3Example4cd">Repeat your password</label>
                    </div>
                  </div>

				  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="email" id="email" class="form-control" name="email" required />
                      <label class="form-label" for="email">Email</label>
                    </div>
                  </div>

				

				  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="contact" class="form-control" name="contact" required />
                      <label class="form-label" for="address">Contact</label>
                    </div>
                  </div>
                  
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                   
            <select name="role" id="role" class="form-control">
                <option value="Policy Holder">Policy Holder</option>
                <option value="Agent">Agent</option>
                <option value="Administrator">Administrator</option>
              
           
            </select>
            <label class="form-label" for="level">Role</label>
     
                    </div>
                  </div>

				  

              

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button class="btn btn-primary btn-lg"  type="submit" name="submitRegister">Register</button>
                  </div>

                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="/jems/images/sign.webp"
                  class="img-fluid" alt="Sample image">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
	</form>
	



	

			<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>
</html>

<?php
session_start();
$con = mysqli_connect('localhost', 'root', '', 'insurance');
$num = "";





// Register
if(isset($_POST["submitRegister"])){
$last_Name = $_POST['lName'];
$first_Name = $_POST['fName'];
$passWord = $_POST['password'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$role = $_POST['role'];

// database insert SQL code

$sql1 = "INSERT INTO `user` (`lastname`, `firstname`, `contact`, `email`, `password`, `role`)
 VALUES ( '$last_Name', '$first_Name', '$contact', '$email', '$passWord', '$role')";


// insert in database 
if (mysqli_query($con, $sql1) ) {
    echo '<script>';
    echo 'alert("Successfully Register!");';
    echo 'window.location.href = "Login.php";';
    echo '</script>';
    
   
}
else{
    echo '<script>';
    echo 'alert("Duplicate Email!");';
    echo 'window.location.href = "Register.php";';
    echo '</script>';

   
    
}
mysqli_close($con);
}


//Modal Admin




?>


