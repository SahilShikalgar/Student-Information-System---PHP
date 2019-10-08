<?php 
	session_start();
	if(isset($_SESSION['admin']))
	{
		if(isset($_SESSION['who'])=="admin")
		{
			header('location:admin/dashboard.php');
		}
		else
		{
			header('location:student/dashboard-stud.php');	
		}
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
	<style type="text/css">
		body
		{
			background-image: url("assets/login_img.jpg");
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row mx-auto mt-5">
			<div class="col-md-6 offset-3 mt-5">
				<div class="card card-body mt-5">
					<form action="login.php" method="post">

						<div class="radio-inline">
							<label for="radio">Select User : </label>
							<input value="admin" type="radio" name="radio" class="ml-5" checked=""><label class="ml-2">Admin</label>
							<input value="user" class="ml-3" type="radio" name="radio" ><label class="ml-2">User</label>
						</div>

						<div class="form-group mt-2">
							<label for="nm">Username : </label>
							<input
							 type="text" name="name" id="nm" placeholder="Username" required="true" class="form-control"> 
						</div>
						<div class="form-group">
							<label for="ps">Password : </label>
							<input type="password" name="password" id="ps" placeholder="Password" class="form-control" required="true"> 
						</div>

						<input type="submit" name="login" class="btn btn-primary form-control" value="Login">
						<input type="reset" name="reset" class="btn btn-secondary form-control mt-2" value="Reset">
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

<?php
	$server="localhost";
	$username="root";
	$password="";
	$db="sis";

	if(isset($_REQUEST['login']))
	{	
		$con = mysqli_connect($server,$username,$password,$db);
		$i=0;

		switch($_REQUEST['radio']) {
			case 'admin':
					$i=0;
					$sql="select * from admin";
					$res=mysqli_query($con,$sql);
				break;
			case 'user':
					$sql="select * from user_final";
					$res=mysqli_query($con,$sql);
					$i=1;
			break;
			default:
			
				break;
		}
					if($con)
					{
						while($row=mysqli_fetch_array($res))
						{
							
								if($i==0)
								{
									if($row['name']==$_POST['name'] && $row['password']==$_POST['password'])
									{
										session_start();
										$_SESSION['admin']=$_POST['name'];
										$_SESSION['who']="admin";
										header("location:admin/dashboard.php");
									}
								}
								else
								{
									if($row['roll_no']==$_POST['name'] && $row['password']==$_POST['password'])
									{
										session_start();
										$_SESSION['admin']=$_POST['name'];
										$_SESSION['who']="user";
										header("location:student/dashboard-stud.php");
									}
								}
						}
						echo "<script>alert('Login Unsuccessful');</script>";
					}
					else
					{			
						echo "<script>alert('Cannot able to login due to database connectivity error');</script>";	
					}
	}
?>