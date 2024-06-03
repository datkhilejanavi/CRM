<?php 
	require_once("include/connection.php");
	$crud = trim($_POST['crud']);	
	$idcrud = trim($_POST['crudid']);	
	if(isset($_POST['register'])){
		$fname=trim($_POST['fname']);
		$mb=trim($_POST['mb']);
		$email=trim($_POST['email']);
		$psw=trim($_POST['psw']);
		$cpsw=trim($_POST['cpsw']);
		$otp=trim($_POST['otp']);
		$datetime=date('Y-m-d H:i:s');
			$sql3 = "SELECT idregister FROM registration where email='".$email."'"; //for unique email setting.
			$result3 = mysqli_query($con, $sql3);
			if (mysqli_num_rows($result3) > 0) {
				echo "<script> alert('This User Already Exist.'); </script>";
				echo "<script> window.location='registration.php'; </script>";
			}else{
				$sql = "INSERT INTO registration (fname, mb, email,password, cpsw ,otp,datetime) VALUES ('".$fname."', '".$mb."', '".$email."','".$psw."', '".$cpsw."','".$otp."','".$datetime."')";
				if(mysqli_query($con, $sql)) {
					// $last_id = mysqli_insert_id($con); 	//get last inserted id
					echo "<script> alert('Registration Successfully...!'); </script>";
					echo "<script> window.location='index.php'; </script>";
				} else {
					echo "Error: " . $sql . "<br>" . mysqli_error($con);
				}
			}
 	}
	if(isset($_POST['personaldata'])){
		$actype=trim($_POST['actype']);
		$fname=trim($_POST['fname']);
		$mb=trim($_POST['mb']);
		$email=trim($_POST['email']);
		$address=trim($_POST['address']);
		$altmb=trim($_POST['altmb']);
		$datetime=date('Y-m-d H:i:s');
		if($crud == 'insert'){
			$sql2 = "INSERT INTO personalinfo (actype,fname, mb, email,address, altmb, datetime) VALUES ('".$actype."','".$fname."', '".$mb."', '".$email."','".$address."', '".$altmb."','".$datetime."')";
			if(mysqli_query($con, $sql2)) {
				echo 1;
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($con);
			}
		}else if($crud == 'update'){
			$s = "update personalinfo set actype='".$actype."',fname='".$fname."', mb='".$mb."',
			 email='".$email."',address='".$address."', altmb='".$altmb."',
			  datetime='".$datetime."'  where perid='".$idcrud."'";			
			 $r = mysqli_query($con,$s);
			if($r >0){
				echo 1;
			}else{
				echo 0;
			}
		}else if($crud == 'delete'){
			$s = "delete from personalinfo where perid='".$idcrud."'";
			$r = mysqli_query($con,$s);
			if($r >0){
				echo 1;
			}else{
				echo 0;
			}
			
		}
	}
	if(isset($_POST['planpackage'])){
		$pname=trim($_POST['pname']);
		$splimit=trim($_POST['splimit']);
		$planprice=trim($_POST['planprice']);
		$duration=trim($_POST['duration']);
		$photo=trim($_POST['photo']);
		$sqlplan = "INSERT INTO tblplantype (pname,splimit, planprice,duration, photo) VALUES ('".$pname."','".$splimit."','".$planprice."','".$duration."', '".$photo."')";
			if(mysqli_query($con, $sqlplan)) {
				// $last_id = mysqli_insert_id($con); 	//get last inserted id
				echo $last_id."---New record created successfully";
				echo "<script> alert('Registration Successfully...!'); </script>";
				echo "<script> window.location='planpackages.php'; </script>";
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($con);
			}
	}
	if(isset($_POST['newplan'])){
		$fname=trim($_POST['fname']);
		$transactiontype=trim($_POST['transactiontype']);
		$plan=trim($_POST['plan']);
		$planstartdate=trim($_POST['planstartdate']);
		$planenddate=trim($_POST['planenddate']);
		$fnameworker=trim($_POST['fnameworker']);
		if($crud == 'insert'){
			$sqlplan = "INSERT INTO newconnection (fname,transactiontype,plan,planstartdate, planenddate,fnameworker) VALUES ('".$fname."','".$transactiontype."','".$plan."','".$planstartdate."', '".$planenddate."','".$fnameworker."')";
			if(mysqli_query($con, $sqlplan)) {
				// $last_id = mysqli_insert_id($con); 	//get last inserted id
				echo $last_id."---New record created successfully";
				echo "<script> alert('Connection Successfully...!'); </script>";
				echo "<script> window.location='addplan.php'; </script>";
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($con);
			}
		}else if($crud == 'update'){
			$s = "update newconnection set fname='".$fname."',transactiontype='".$transactiontype."',plan='".$plan."',planstartdate='".$planstartdate."',planenddate='".$planenddate."',fnameworker='".$fnameworker."'where bill='".$idcrud."'";
			$r = mysqli_query($con,$s);
			if($r >0){
				echo 1;
			}else{
				echo 0;
			}
		}else if($crud == 'delete'){
			$s = "delete from newconnection where bill='".$idcrud."'";
			$r = mysqli_query($con,$s);
			if($r >0){
				echo 1;
			}else{
				echo 0;
			}
			
		}
	}
	if(isset($_POST['cuscomp'])){
		$complaintdate=trim($_POST['compdate']);
		$fname=trim($_POST['fname']);
		$Complaintsub=trim($_POST['Complaintsub']);
		$complaint=trim($_POST['Complaint']);
		$fnamew=trim($_POST['fname']);
		$workerdis=trim($_POST['workerdis']);
		$compstatus=trim($_POST['compstatus']);
		$coppriority=trim($_POST['coppriority']);
		if($crud == 'insert'){
			$sql = "INSERT INTO cuscomplaint (complaintdate,fname,Complaintsub,complaint,fnamew,workerdis,compstatus,coppriority) VALUES ('".$complaintdate."','".$fname."','".$Complaintsub."','".$complaint."','".$fnamew."','".$workerdis."','".$compstatus."','".$coppriority."')";
			if(mysqli_query($con, $sql)) {
				// $last_id = mysqli_insert_id($con); 	//get last inserted id
				//echo $last_id."---New record created successfully";
				echo "<script> alert('Compalient Register Successfully...!'); </script>";
				echo "<script> window.location='complaint.php'; </script>";
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($con);
			}
		}else if($crud =='update'){
			$s = "update cuscomplaint set complaintdate='".$complaintdate."',fname='".$fname."',Complaintsub='".$Complaintsub."',complaint='".$complaint."',fnamew='".$fnamew."',workerdis='".$workerdis."',compstatus='".$compstatus."',coppriority='".$coppriority."' where complaintid='".$idcrud."'";
			$r = mysqli_query($con,$s);
			if($r >0){
				echo 1;
			}else{
				echo 0;
			}
		}else if($crud =='delete'){
			$s = "delete from cuscomplaint where complaintid='".$idcrud."'";
			$r = mysqli_query($con,$s);
			if($r >0){
				echo 1;
			}else{
				echo 0;
			}
		}
	}
	if(isset($_POST['recharge'])){
		$fname=trim($_POST['fname']);
		$plan=trim($_POST['plan']);
		$transactiontype=trim($_POST['transactiontype']);
		$rechargeamount=trim($_POST['rechargeamount']);
		$adamount=trim($_POST['adamount']);
		$remamount=trim($_POST['remamount']);
		$planenddate=trim($_POST['planenddate']);
		$datetime=date('Y-m-d H:i:s');
		if($crud == 'insert'){
		$sqlplan = "INSERT INTO recharge (fname,plan,transactiontype,rechargeamount,adamount,remamount,planenddate,datetime) VALUES ('".$fname."','".$plan."','".$transactiontype."','".$rechargeamount."','".$adamount."','".$remamount."','".$planenddate."','".$datetime."')";
			if(mysqli_query($con, $sqlplan)) {
				// $last_id = mysqli_insert_id($con); 	//get last inserted id
				echo $last_id."---New record created successfully";
				echo "<script> alert('Recharge Successfully...!'); </script>";
				echo "<script> window.location='recharge.php'; </script>";
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($con);
			}
		}else if($crud == 'update'){
				$s = "update recharge set fname='".$fname."',plan='".$plan."',transactiontype='".$transactiontype."',rechargeamount='".$rechargeamount."',adamount='".$adamount."',remamount='".$remamount."', planenddate='".$planenddate."' where bill='".$idcrud."'";
			$r = mysqli_query($con,$s);
			if($r >0){
				echo 1;
			}else{
				echo 0;
			}
		}else if($crud == 'delete'){
			$s = "delete from recharge where bill='".$idcrud."'";
			$r = mysqli_query($con,$s);
			if($r >0){
				echo 1;
			}else{
				echo 0;
			}
			
		}
	}
?>