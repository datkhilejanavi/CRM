<?php
	error_reporting('E_ALL');
	set_time_limit(0);
	date_default_timezone_set('Asia/Kolkata');
	session_start();
	$dbhostname='localhost';
	$dbusername='root';
	$dbpassword='';
		
	$con=mysqli_connect("$dbhostname","$dbusername","$dbpassword");
	if(!$con){
		die ("Failed to connect to MySQL DataBase:".mysqli_connect_error());
	}
	$softdbname="crmdb";
	$dbconnect=mysqli_select_db($con,$softdbname);
	if(!$dbconnect){
		die ("Failed to Select DataBase: " . mysqli_error($con));
	}
	mysqli_query($con,"SET NAMES utf8");
?>