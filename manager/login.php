<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<link rel="icon" type="image/png" href="images/icons8-comedy-2-filled-50.png"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<?php

	$server_username = "root";
	$server_password = "";
	$server_host = "localhost";
	$database = 'id9817382_fpt';	
	$conn = mysqli_connect($server_host,$server_username,$server_password,$database) or die("không thể kết nối tới database");
	mysqli_query($conn,"SET NAMES 'UTF8'");
	if (isset($_POST["btn_submit"])) {

		$username = $_POST["username"];
		$password = $_POST["password"];
		$sql = "select * from users where username = '$username' and password = '$password' ";
		$query = mysqli_query($conn,$sql);
		$num_rows = mysqli_num_rows($query);
		if ($num_rows==0) {
			echo '<script type="text/javascript">'; 
			echo 'alert("Username or password is not correct! !");'; 
			echo 'window.location.href = "login.php";';
			echo '</script>';

		}else{

			while ( $data = mysqli_fetch_array($query) ) {
	    		$_SESSION["user_id"] = $data["id"];
				$_SESSION['username'] = $data["username"];
				$_SESSION["name"] = $data["name"];
				$_SESSION["email"] = $data["email"];
				$_SESSION["permision"] = $data["permision"];
				$_SESSION["id_Trainer"] = $data["id_Trainer"];
				$_SESSION["id_Trainee"] = $data["id_Trainee"];
	    	}


			echo '<script type="text/javascript">'; 
			echo 'alert("Login successfully!");'; 
			echo 'window.location.href = "index.php";';
			echo '</script>';
		}
		
	}
	?>
	
	
<div id="Main_View_Login">
  <section class="main_view_Login">
    <div class="container" >
      <div class="row" >
    <div class="col-md-12 col-sm-12 col-xs-12">
		<div class="limiter">
				<div class="container-login100">
					<div class="wrap-login100">
						<div class="login100-form-title" style="background-image: url(../images/bg-01.jpg);">
							<span class="login100-form-title-1">
								Sign In
							</span>
						</div>

						<form class="login100-form validate-form" method="POST" action="login.php">
							<div class="wrap-input100 validate-input m-b-26">
								<span class="label-input100">Username</span>
								<input class="input100" type="text" name="username" placeholder="Enter username" required>
								<span class="focus-input100"></span>
							</div>

							<div class="wrap-input100 validate-input m-b-18" >
								<span class="label-input100">Password</span>
								<input class="input100" type="password" name="password" placeholder="Enter password" required>
								<span class="focus-input100"></span>
							</div>
							<div class="container-login100-form-btn">
								<input name="btn_submit" type="submit" class="btn" value="login" size="90">
							</div>
						</form>
					</div>
				</div>
			</div>
        </div>         
      </div>
    </div>
  </section>
</div>


</html>
</body>