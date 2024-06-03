<?php 
	include_once("include/connection.php");
	$crud = trim($_POST['crud']);	
	$id = trim($_POST['id']);	
	$pname=trim($_POST['pname']);
	$splimit=trim($_POST['splimit']);
	$planprice=trim($_POST['planprice']);
	$duration=trim($_POST['duration']);
	$photoold=trim($_POST['photoold']);
	$datetime=date('Y-m-d H:i:s');
	mysqli_autocommit($con,FALSE);
	if($crud == 'insert'){
		$s1 = "select id from tblplantype where name='".$pname."'";	
		$r1 = mysqli_query($con,$s1);
		$cnt = mysqli_num_rows($r1);
		if($cnt<=0){
			$target_file = basename($_FILES["photo"]["name"]);
			$post_tmp_img = $_FILES["photo"]["tmp_name"];
			$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
			$getdatetimefillST=date('Y-m-d:H:i:s');
			$photo='img/brand_'.rand(1,1000).date('Y-m-d-H-i-s').'.'.$imageFileType;
			move_uploaded_file($post_tmp_img,"$photo");
			$sql = "INSERT INTO tblplantype (pname, splimit,planprice, duration, photo) VALUES ('".$pname."','".$splimit."', '".$planprice."', '".$duration."', '".$photo."')";
			if(mysqli_query($con, $sql)) {
				echo "1";
			} else {
				$error=1;
				echo "Error: " . $sql . "<br>" . mysqli_error($con);
			}
		}else{
			echo 'Exist';
			$error=1;
		}
	}else if($crud =='update'){
		$target_file = basename($_FILES["photo"]["name"]);
		$post_tmp_img = $_FILES["photo"]["tmp_name"];
		$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
		$photo = $_FILES["photo"]["name"];
		if($photo !=''){
			unlink($photoold);
			$photo='img/brand_'.rand(1,1000).date('Y-m-d-H-i-s').'.'.$imageFileType;
			move_uploaded_file($post_tmp_img,"$photo");
		}else{
			$photo=$photoold;	
		}
		$s = "update tblplantype set pname='".$pname."',splimit='".$splimit."' ,planprice='".$planprice."' ,duration='".$duration."',photo='".$photo."' 
		where id='".$id."'";
		$r = mysqli_query($con,$s);
		if($r >0){
			echo 1;
		}else{
			echo 0;
			$error=1;
		}
	}else if($crud =='delete'){
		echo $s1 = "select photo from tblplantype where id='".$id."'";	
		$r1 = mysqli_query($con,$s1);
		$cnt = mysqli_num_rows($r1);
		if($cnt > 0){
			$rowqw = mysqli_fetch_assoc($r1);
			unlink($rowqw['photo']);
			echo $s = "delete from tblplantype where id='$id'";
			$r = mysqli_query($con,$s);
			if($r >0){
				echo 1;
			}else{
				echo 0;
				$error=1;
			}
		}
	}
	if($error ==1){
		echo mysqli_error($con);
		mysqli_rollback($con);
	}else{
		mysqli_commit($con);
		//header("Location:AddBrand.php");
	}
?>