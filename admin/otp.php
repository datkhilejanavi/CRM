<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="data/boostraplib.css" rel="stylesheet">
    <script src="data/jquery.js"></script>
    <script src="data/icon.js"></script>
    <script src="boostraplib.js"></script>
	<style>
		body{
			font-family:"poppins",sans-serif;
		}
	</style>
</head>
<body class="pt-5" style="background-color:skyblue">
	<?php 
	require_once("include/connection.php");
	if(isset($_POST['loginotp'])){
  		$otp=trim($_POST['otp']);
		$sql = "SELECT idregister FROM registration where otp='".$otp."' and idregister='".$_SESSION['idregister']."'";
		$result = mysqli_query($con, $sql);
		if (mysqli_num_rows($result) > 0) {
			echo "<script> alert('OTP Verify Successfully...!'); </script>";
 			echo "<script> window.location='dashboard.php'; </script>";
 		} else {
			echo "<script> alert('Please Enter Valid OTP'); </script>";
			echo "<script> window.location='index.php'; </script>";
 		}
 	}
	// only for otp show start code
	$sqln = "SELECT otp FROM registration where idregister='".$_SESSION['idregister']."' and mb='".$_SESSION['mb']."'";
	$resultn = mysqli_query($con, $sqln);
	$rownew = mysqli_fetch_assoc($resultn);
	$otpshow=$rownew["otp"];
	// only for otp show start end
	?>
	


	<div class="container bg-white mt-5 rounded-3">
		<div class="row m-5 p-5">
			<h2 class="mb-2">OTP Verification</h2>
			<div class="col rounded-3" style="background-color:skyblue">
				<form action="" method="post" onsubmit="return validform()">
					<div class="mb-3 mt-3">
					  <label for="otp" class="mb-3">OTP: Verfication Code send on <?php echo "XXXXXX".substr($_SESSION['mb'],6); ?></label>
					  <label for="otp" class="mb-3">Temp Verfication Code Show : <?php echo $otpshow; ?></label>
					  <input type="text" class="form-control" id="otp" placeholder="Enter OTP" name="otp" autofocus required>
					</div>
					
					<div class="btn d-grid" >
					<button type="submit" name="loginotp" id="loginotp" class="btn btn-light d-bl" onclick="validform()">Verify</button>
					</div>
 				</form>
			</div>  
			<div class="col bg-light">
				<img src="images/otpimage.jpg" class="img-responsive img-fluid" >
			</div> 
	
		</div>  
	</div>  
</body>
</html>
