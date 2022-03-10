<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">

	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">

	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">

	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">

	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">

	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
    
     <link href="../css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">


</head>
<body id="body">
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url(images/tea6.jpg);background-repeat: none;
    background-size: cover;">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/tea6.jpg);">
					<span class="login100-form-title-1">
						Sign In
					</span>
				</div>
                <p class="alert" style="text-align:center; color:red;">
                    <?php
include "../db.php";

if(isset($_POST['login'])){
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    
    
    $sql="SELECT * FROM users WHERE email='$email' AND password='$password'";
    $results=mysqli_query($conn,$sql);
    if($results){
        $data=mysqli_num_rows($results);
        if($data==1){
            while($row=mysqli_fetch_assoc($results)){
                $id=$row['id'];
                 $fname=$row['fname'];
                 $sname=$row['sname'];
                 $lname=$row['lname'];
                 $email=$row['email'];
                 $pnumber=$row['pnumber'];
                 $usertype=$row['usertype'];
                 $profile=$row['profile'];
                 $password=$row['password'];
                 $factoryid=$row['factoryid'];
                 $bankname=$row['bankname'];
                 $bankbranch=$row['bankbranch'];
                 $accountnumber=$row['accountnumber'];
                 $accountname=$row['accountname'];
                 $collectioncenter=$row['collectioncenter'];
                
                if($row['usertype']=='Admin'){
                    
                    session_start();
                    $_SESSION['loggedin']=true;
                    $_SESSION['id']=$id;
                   
                    
                    header("location:../adminpanel/admin.php");
                    
                    
                    
                }else{
                    if($row['usertype']=='user'){
                        session_start();
                        $_SESSION['loggedin']=true;
                        $_SESSION['id']=$id;

                    header("location:../adminpanel/farmers.php");
                    }
                }
            }
            
        }else{
            echo "Incorrect email address or Password";
        }
    }
}

?>
                </p>

				<form action="login.php" method="post" class="login100-form validate-form">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Email</span>
						<input class="input100" type="email" name="email" placeholder="Enter Your Email Address">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" placeholder="Enter password">
						<span class="focus-input100"></span>
					</div>

					<div class="flex-sb-m w-full p-b-30">
						<div>
                        <a href="../index.php"><i class="fa fa-home fa-2x"></i></a>
                        </div>

						<div>
							<a href="#" class="txt1">
								
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="login">
							Login
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>