<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link href="data/boostraplib.css" rel="stylesheet">
    <script src="data/jquery.js"></script>
    <script src="data/icon.js"></script>
</head>
<body>
<?php
    require_once("include/connection.php");
    if(isset($_POST['login'])){
        $username=trim($_POST['username']);
        $psw=trim($_POST['psw']);
        $rememberme=trim($_POST['rememberme']);
        $sql = "SELECT idregister,mb FROM registration where email='".$username."' and password='".$psw."'";
		$result = mysqli_query($con, $sql);
		if (mysqli_num_rows($result) > 0) {
			echo "<script> alert('Login Successfully...!'); </script>";
			$row = mysqli_fetch_assoc($result);
			$idregister=$row["idregister"];
 			$otp=rand(1111,9999);
			$_SESSION['idregister']=$row["idregister"];
			$_SESSION['mb']=$row["mb"];
			
			$sqlnew = "update registration set otp='".$otp."'where idregister='".$idregister."'";
			$res = mysqli_query($con, $sqlnew);
			echo "<script> window.location='otp.php'; </script>";
 		} else {
			echo "<script> alert('Please Valid Username & Password.'); </script>";
			echo "<script> window.location='index.php'; </script>";
 		}

        
    } 
    ?>
    <div class="container">
        <div class="row mt-5 shadow">
            <div class=" col-sm-8 col-md-8 col-lg-8 d-block">
                <form action="" method="post">
                    <h2 style="text-align: center;" class="pt-5 mt-3 mb-3">SIGN IN TO C.R.M.</h2>
                    <h6 style="text-align: center;" class="text-black-50">Use your email account:</h6>
                    <div class="container mt-2 mb-3">

                        <div class="input-group mb-3">
                            <span class="input-group-text bg-light"><i class="fa fa-user bg-light"></i></span>
                            <input type="text" class="form-control" id="username" name="username" placeholder="User Name" autofocus required >
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text bg-light"><i class="fa fa-lock bg-light"></i></span>
                            <input type="password" class="form-control" id="psw" name="psw" placeholder="Password:"required>
                        </div>
                        
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" id="rememberme" name="rememberme">Remember Me</label>
                        </div>

                        <p class="text-start"><a href="forgot.php"> Forgot Password?</a></p>

                        <div class="d-grid me-1 ms-1 mb-5">
                            <button type="submit" id="login" name="login" class="btn btn-outline btn-lg btn-info btn-block">login</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-sm-4 col-md-4 col-lg-4 bg-info">
                <img src="images/loginimg.jpg" class="img-fluid img-responsive" width="300" height="250" alt="sample image" style="background-size:cover !important;">
                <div class="container-fluid mt-1">
                    <h1 style="text-align: center;" class="mt-2">Hello, Friend!</h1>
                    <h6 class="mt-2" style="text-align: center;">Enter your personal details and start journey with us</h6>
                    
                    <div class="d-grid gap-3 mt-2 mb-2">
                        <button type="button" class="btn btn-outline btn-lg btn-block bg-light" onclick="window.location='registration.php'">SIGN UP</button>
                    </div>
                   
                </div>
            </div>
            
        </div>
    </div>
</body>
</html>


















