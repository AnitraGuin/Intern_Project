<?php
	session_start();
    include_once("conn.php");

	if($_SERVER['REQUEST_METHOD']=== 'POST'){
		if(!empty($_POST['login'])){
			$name = $_POST['name'];
			$password = md5($_POST['password']);

			$stmnt = "SELECT * FROM user_info WHERE
									name = '$name' AND password = '$password'";

			$result = mysqli_query($db,$stmnt);
			$count = mysqli_num_rows($result);
			if($count > 0){
				echo "<script>alert('Login Successful')</script>"; ?>

                <META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/internship-project3/index.html">
                <?php
				//echo $result['name'];
				$_SESSION['username'] = $name;
				header('location:index.php');
				//header("Location:admin_show.php");	
			}else{
				echo "<script>alert('Login not Successful')</script>"; ?>

                <META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/internship_project3/user_login.php">
                <?php
			}
		}
	}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
    <title>Log-in</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
	<div class="container py-5">
		<div class="row">
            <div class="col-md-8 mx-auto bg-white border p-5">
				<center>
				<form action="" method="post">
					<fieldset>
						<legend class="text-center fw-bold text-dark mb-3">Log-in</legend>
						<label for="uname">User-name</label>
						<input type = "text" name = "name" id="uname" placeholder="Enter your Email here"><br><br>
				
						<label for="upasswrd">Password:</label>
						<input type="password" name="password" id="upasswrd" placeholder="Enter your Password here"><br><br>
						<input type="submit" name="login" value="Login">

						<br><br>    
                        <p class="text-center text-dark mb-2">Create Account...</p>
                        <center><input type="button" onclick="location.href='sign-up.php'" value="Sign-up"></center>
					</fieldset>
				</form>
				</center>
			</div>
		</div>
	</div>
</body>
</html>