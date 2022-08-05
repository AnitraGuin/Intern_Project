<?php
    include("connection.php");

        //$sname=$sroll=$semail=$snumber=$sgender=$spassword=$scpassword=$sdob=$smyfile=$sdepartment=$syear=$ssports=$splayer='';

        if($_SERVER['REQUEST_METHOD']=== 'POST'){

            $sname = $_POST['name'];
            
            $semail = $_POST['email'];
            $snumber = $_POST['ph_number'];
            $sgender = $_POST['gender'];
            $spassword = $_POST['password'];
            $scpassword = $_POST['c_password'];
            $sdob = $_POST['DOB'];


            $stmnt = $conn->prepare("INSERT INTO user_info (name,email_id,contact,gender,password,c_password,
                                    DOB) VALUES 
                                    (:a,:b ,:c ,:d , :e, :f, :g)");

            $stmnt->bindvalue(':a',$sname);
            $stmnt->bindvalue(':b',$semail);
            $stmnt->bindvalue(':c',$snumber);
            $stmnt->bindvalue(':d',$sgender);
            $stmnt->bindvalue(':e',md5($spassword));
            $stmnt->bindvalue(':f',md5($scpassword));
            $stmnt->bindvalue(':g',$sdob);
            

            $stmnt->execute();

            echo "<script>alert('Record Created')</script>";
    ?>
    <META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/internship_project3/user_login.php">
    <?php
        }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
		<div class="row">
            <div class="col-md-8 mx-auto bg-white border p-5">
                
                    <form action="" method="post">
                    
                    <fieldset>
                            <legend class="text-center fw-bold text-dark mb-3">Personel Details</legend>
                            <div class="col-6 mb-4">
                                <label for="sname">Name</label>
                                <input type = "text" name = "name" id="sname" placeholder="Enter your Name here"><br>
                            </div>
                            <div class="col-6 mb-4">
                                <label for="semail">Email</label>
                                <input type="text" name="email" id="semail" placeholder="Enter your Email here"><br>
                            </div>
                            <div class="col-6 mb-4">    
                                <label for="spnumber">Contact number</label>
                                <input type="number" name="ph_number" id="spnumber" placeholder="Enter your phone number here"><br>
                            </div>
                            <div class="col-6 mb-4">    
                                <p1>Choose your Gender:- </p1>
                                <input type="radio" name="gender" id="male" value="Male">
                                <label for="male">Male</label>
                                <input type="radio" name="gender" id="female" value="Female">
                                <label for="female">Female</label><br>
                            </div>
                            <div class="col-6 mb-4">       
                                <label for="passwrd">Create Password:</label>
                                <input type="password" name="password" id="passwrd" placeholder="Enter your password here"><br>
                            </div>
                            <div class="col-6 mb-4">    
                                <label for="conpasswrd">Confirm Password:</label>
                                <input type="password" name="c_password" id="conpasswrd" placeholder="Re-enter your password here"><br>
                            </div>
                            <div class="col-6 mb-4">    
                                <label for="dob">Date of Birth</label>
                                <input type="date" name="DOB" id="dob"><br>
                            </div>
                        </fieldset>
                        
                        <br>
                        
                        <input type="submit" name="submit">
                        <input type="reset" name="reset"><br>
                        <br>    
                        <p class="text-center text-dark mb-3">Already have an Account?</p>
                        <center><input type="button" onclick="location.href='user_login.php'" value="Log-in"></center>
                    </form>
                    
            </div>
        </div>
    </div>
</body>
</html>