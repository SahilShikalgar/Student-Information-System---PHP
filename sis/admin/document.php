<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="">
</head>
<body>

</body>
</html>

<?php
	session_start();
	if(isset($_SESSION['admin']))
	{
		if($_SESSION['who']=='user')
		{
			header('location: ../student/dashboard-stud.php ');
		}
		if($_SESSION['who']=='admin')
		{

			//echo "admin";
			ob_start();
			require('fpdf\fpdf.php');


			$server = "localhost";
			$username = "root";
			$password = "";
			$db = "sis";


			$con = mysqli_connect($server,$username,$password,$db); 

			if($con)
			{
							}
		}
	}
	else
	{
		header("location:../login.php");
	}
?>
	